<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>
<section class="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <?php if (session()->getFlashdata('msg')) : ?>
            <input type="hidden" name="flash-msg" id="flash-msg" data-flash="<?= session()->getFlashdata('msg'); ?>">
        <?php endif; ?>

        <div class="row">
            <div class="col-12">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-900"><?= $title; ?></h1>

                <div class="card shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-main" id="tbl-articles">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Isi</th>
                                        <th>Gambar</th>
                                        <th>Tanggal</th>
                                        <th data-orderable="false">#</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                    <form action="<?= base_url('/admin/ArticleController/hard_delete') ?>" method="post" id="formHapusArtikel">
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
    <!-- /. container-fluid -->
</section>
<?= $this->endSection(); ?>

<?= $this->section('additional-js'); ?>
<script>
    $(document).ready(function () {
        var table;

        function tbl_articles() {
            table = $("#tbl-articles").DataTable({
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": '<?= base_url('/admin/ArticleController/dt_articles') ?>',
                    "type": "post",
                    "dataSrc": function (data) {
                        // Map the data to the required format for DataTables
                        return data.data;
                    }
                },
                "columns": [
                    {"data": "id"},
                    {"data": "title"},
                    {"data": "content"},
                    {
                        "data": "image_filename",
                        "render": function (data, type, row, meta) {
                            if (data) {
                                return '<img src="/assets/img/postingan/' + data + '" alt="Gambar Artikel" width="100">';
                            } else {
                                return '';
                            }
                        }
                    },
                    {"data": "created_at"},
                    {
                        "data": "id",
                        "render": function (data, type, row, meta) {
                            return '<a href="/admin/articles/edit/' + data + '" class="btn btn-sm btn-primary">Edit</a>' +
                                '<button type="button" data-toggle="modal" data-target="#modal-hapus" data-articleid="' + data + '" class="btn btn-sm btn-danger hapus-article">Hapus</button>';
                        }
                    }
                ],
                "language": {
                    "processing": "Loading data..",
                    "infoEmpty": "0 entri",
                    "info": "<span class='text-gray-900'>Menampilkan _TOTAL_ data artikel.</span>",
                    "infoFiltered": "(difilter dari _MAX_ total entri)",
                    "emptyTable": "Belum ada data",
                    "lengthMenu": "Menampilkan _MENU_ entri",
                    "search": "Pencarian:",
                    "zeroRecords": "Data tidak ditemukan",
                    "paginate": {
                        "first": "Awal",
                        "last": "Akhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    },
                    "paging": true,
                    "lengthChange": true,
                    "pageLength": 5,
                }
            });
        }

        tbl_articles();

        // Pesan berhasil di verifikasi (approved)
        var msg = $("#flash-msg").data('flash');
        if (msg) {
            $.toast({
                text: msg,
                position: "top-right",
                hideAfter: 3000,
            });
        }

        // Menampilkan modal delete
        $('#tbl-articles').off('click', '.hapus-article').on('click', '.hapus-article', function () {
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
                    $('.btn-yakin').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <i>Loading...</i>');
                },
                success: function (res) {
                    $.toast({
                        text: res.msg,
                        position: "top-right",
                        hideAfter: 2500,
                    });

                    if (res.success) {
                        $("#modal-hapus").modal('toggle');
                        table.ajax.reload(null, false); // Refresh the data table after successful deletion
                        $('.btn-yakin').html('Yakin'); // Reset the button text
                    } else {
                        console.log(res.msg); // Log any error messages
                        $('.btn-yakin').html('Yakin'); // Reset the button text
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log(xhr.responseText);
                    $('.btn-yakin').html('Yakin'); // Reset the button text
                },
                complete: function () {
                    window.location.reload(); // Refresh the page after the deletion process is complete
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>
