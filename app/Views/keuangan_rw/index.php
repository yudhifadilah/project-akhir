<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>
<section class="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <?php if (session()->getFlashdata('msg')) : ?>
            <!-- Move this hidden input inside a form if you're planning to use it for deletion -->
            <input type="hidden" name="flash-msg" id="flash-msg" data-flash="<?= session()->getFlashdata('msg'); ?>">
        <?php endif; ?>

        <div class="row">
            <div class="col-12">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-900"><?= $title; ?></h1>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="table-responsive">
                            <div class="table-actions">
                            <a id="download-pdf" class="btn btn-primary">Download PDF</a>
                                </div>    
                            <table class="table table-striped table-main" id="tbl-keuangan">
                                    <!-- Table headers and data loop to display the list of organizational structures -->
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Deskripsi</th>
                                            <th>Jumlah</th>
                                            <th data-orderable="false">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($keuangan_rw as $keuangan) : ?>
                                            <tr>
                                            <td><?= $keuangan['tanggal']; ?></td>
                                            <td><?= $keuangan['deskripsi']; ?></td>
                                            <td><?= $keuangan['jumlah']; ?></td>
                                                <td>
                                                    <a href="<?= base_url('/KeuanganRWController/edit/' . $keuangan['id']); ?>" class="btn btn-sm btn-primary">Edit</a>
                                                    <a href="#" class="btn btn-sm btn-danger hapus-article" data-toggle="modal" data-target="#modal-hapus" data-keuanganid="<?= $keuangan['id']; ?>">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('/KeuanganRWController/hard_delete') ?>" method="post" id="formHapusArtikel">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-hapusLabel">Yakin ingin menghapus Keuangan ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span class="text-gray-900">Klik "Yakin" untuk konfirmasi menghapus Keuangan ini.</span>
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" id="keuangan_id">
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
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('additional-js'); ?>
   <script>
    $(document).ready(function () {
        var table;

        function tbl_keuangan() {
            table = $("#tbl-keuangan").DataTable({
                // DataTables configuration...
            });
        }

        tbl_keuangan();
                // Download PDF
                $('#download-pdf').on('click', function () {
                    alert("Tombol Download PDF Ditekan"); // Tambahkan baris ini
            var doc = new jsPDF();
            var pdfElement = document.getElementById('tbl-keuangan');
            var pdf = new jsPDF('p', 'pt', 'a4');
            pdf.autoTable({
            html: pdfElement,
            startY: 15,
            theme: 'grid'
            });
            pdf.save('keuangan.pdf');
        });

        // Toast notification for successful deletion
        var msg = $("#flash-msg").data('flash');
        if (msg) {
            $.toast({
                text: msg,
                position: "top-right",
                hideAfter: 3000,
            });
        }

        // Show modal delete and set the organization ID
        $('#tbl-keuangan').off('click', '.hapus-article').on('click', '.hapus-article', function () {
            var keuanganId = $(this).data('keuanganid');
            $(".modal-body #keuangan_id").val(keuanganId);
        });

        // Submit form delete using AJAX
        $('#formHapusArtikel').submit(function (e) {
            e.preventDefault();

            var keuanganId = $("#keuangan_id").val();

            $.ajax({
                url: $(this).attr('action') + '/' + keuanganId,
                method: 'post',
                dataType: 'json',
                data: {
                    id: keuanganId,
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
                        table.ajax.reload(null, false);
                        $('.btn-yakin').html('Yakin');
                    } else {
                        console.log(res.msg);
                        $('.btn-yakin').html('Yakin');
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log(xhr.responseText);
                    $('.btn-yakin').html('Yakin');
                },
                complete: function () {
                    window.location.reload(); // Remove this line, as reloading the page is not necessary here
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>
