<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>
<section class="content">
    <div class="container-fluid">
        <?php if (session()->getFlashdata('msg')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-12">
                <h1 class="h3 mb-4 text-gray-900"><?= $title; ?></h1>

                <div class="card shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="tbl-articles">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Isi</th>
                                        <th>Gambar</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($articles as $index => $article) : ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= $article['title'] ?></td>
                                            <td><?= $article['content'] ?></td>
                                            <td>
                                                <?php if ($article['image_filename']) : ?>
                                                    <img src="<?= base_url('assets/img/postingan/' . $article['image_filename']) ?>" alt="Gambar Artikel" width="100">
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $article['created_at'] ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/articles/edit/' . $article['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                                                <button type="button" data-toggle="modal" data-target="#modal-hapus" data-articleid="<?= $article['id'] ?>" class="btn btn-sm btn-danger hapus-article">Hapus</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Hapus Artikel -->
        <div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapusLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?= base_url('/admin/ArticleController/hardDelete') ?>" method="post" id="formHapusArtikel">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-hapusLabel">Yakin ingin menghapus artikel ini?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span class="text-gray-900">Klik "Yakin" untuk konfirmasi menghapus artikel ini.</span>
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" id="artikel_id">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary btn-yakin">Yakin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('additional-js'); ?>
<script>
    $(document).ready(function () {
        $('#tbl-articles').DataTable({
            // ... konfigurasi DataTable lainnya ...
        });

        // Menampilkan modal delete
        $('#tbl-articles').on('click', '.hapus-article', function () {
            var articleId = $(this).data('articleid');
            $(".modal-body #artikel_id").val(articleId);
        });

        // Submit form delete menggunakan AJAX
        $('#formHapusArtikel').submit(function (e) {
            e.preventDefault();

            var articleId = $("#artikel_id").val();

            $.ajax({
                url: $(this).attr('action') + '/' + articleId,
                method: 'post',
                dataType: 'json',
                data: {
                    id: articleId,
                    _method: 'DELETE',
                    "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                },
                beforeSend: function () {
                    $('.btn-yakin').prop('disabled', true);
                },
                success: function (response) {
                    if (response.success) {
                        $('#modal-hapus').modal('hide');
                        window.location.reload(true);
                        alert('Artikel berhasil dihapus.');
                    }
                },
                complete: function () {
                     window.location.reload(); // Remove this line, as reloading the page is not necessary here
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>
