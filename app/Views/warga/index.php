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
                                <table class="table table-striped table-main" id="tbl-articles">
                                    <!-- Table headers and data loop to display the list of organizational structures -->
                                    <thead>
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <th>Alamat</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Pekerjaan</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Agama</th>
                                            <th data-orderable="false">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($warga as $w) : ?>
                                            <tr>
                                                <td><?= $w['nama']; ?></td>
                                                <td><?= $w['alamat']; ?></td>
                                                <td><?= $w['tanggal_lahir']; ?></td>
                                                <td><?= $w['pekerjaan']; ?></td>
                                                <td><?= $w['jenis_kelamin']; ?></td>
                                                <td><?= $w['agama']; ?></td>
                                                <td>
                                                    <a href="<?= base_url('/WargaController/edit/' . $w['id']); ?>" class="btn btn-sm btn-primary">Edit</a>
                                                    <a href="<?= base_url('/WargaController/hard_delete/' . $w['id']); ?>" class="btn btn-sm btn-danger hapus-article" data-toggle="modal" data-target="#modal-hapus" data-organizationid="<?= $w['id']; ?>">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                             <!-- Modal Hapus Artikel -->
                             <div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapusLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?= base_url('/WargaController/hard_delete') ?>" method="post" id="formHapusArtikel">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-hapusLabel">Yakin ingin menghapus Struktur ini?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span class="text-gray-900">Klik "Yakin" untuk konfirmasi menghapus Data ini.</span>
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" id="organisasi_id">
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
                <!-- /. container-fluid -->
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('additional-js'); ?>
<script>
    $(document).ready(function () {
        var table;

        function tbl_organizations() {
            table = $("#tbl-organizations").DataTable({
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": '<?= base_url('/WargaController/dt_organizations') ?>',
                    "type": "post",
                    "dataSrc": function (data) {
                        // Map the data to the required format for DataTables
                        return data.data;
                    }
                },
                "columns": [
                    {"data": "nama"},
                    {"data": "alamat"},
                    {"data": "tanggal_lahir"},
                    {"data": "pekerjaan"},
                    {"data": "jenis_kelamin"},
                    {"data": "agama"},
                    {
                        "data": "id",
                        "render": function (data, type, row, meta) {
                            return '<a href="/WargaController/edit/' + data + '" class="btn btn-sm btn-primary">Edit</a>' +
                                '<button type="button" data-toggle="modal" data-target="#modal-hapus" data-organizationid="' + data + '" class="btn btn-sm btn-danger hapus-article">Hapus</button>';
                        }
                    }
                ],
                "language": {
                    "processing": "Loading data..",
                    "infoEmpty": "0 entri",
                    "info": "<span class='text-gray-900'>Menampilkan _TOTAL_ data warga.</span>",
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

        tbl_organizations();

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
            var organizationid = $(this).data('organizationid');
            $(".modal-body #organisasi_id").val(organizationid);
        });

        // Submit form delete menggunakan AJAX
        $('#formHapusArtikel').submit(function (e) {
            e.preventDefault();

            var organizationid = $("#organisasi_id").val();

            $.ajax({
                url: $(this).attr('action') + '/' + organizationid,
                method: 'post',
                dataType: 'json',
                data: {
                    id: organizationid,
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
                        table.ajax.reload(null, true); // Refresh the data table after successful deletion
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
                     window.location.reload(); // Remove this line, as reloading the page is not necessary here
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>
