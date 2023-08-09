<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-900"><?= $title; ?></h1>

    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('msg'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    <a href="/pengaduan" class="btn btn-secondary">&laquo; Kembali ke daftar pengaduan</a>
                </div>
                <div class="card-body">
                    <?= form_open_multipart('/pengaduan/tambah_pengaduan'); ?>
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="judul_pengaduan">Perihal</label>
                                <input type="text" name="judul_pengaduan" id="judul_pengaduan" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="isi_pengaduan">Jelaskan lebih rinci</label>
                                <textarea name="isi_pengaduan" id="isi_pengaduan" class="form-control" rows="4" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Pengadu</label>
                                <div class="form-check">
                                    <input class="form-check-input anonym" type="radio" name="nama_pengadu" id="nama_pengadu1" value="anonym" checked>
                                    <label class="form-check-label" for="nama_pengadu1">Samarkan (anonym)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nama_pengadu" id="nama_pengadu2">
                                    <label class="form-check-label" for="nama_pengadu2">Gunakan nama sendiri</label>
                                </div>
                                <input type="text" class="form-control pengadu" value="<?= $user['nama']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Upload foto bukti</label>
                                <p class="text-info mb-2">Aturan: wajib upload 1 gambar, maksimal 3 gambar, setiap gambar maksimal ukuran 1 MB.</p>
                                <input type="file" name="images[]" id="images" class="p-1 form-control-file" multiple required>
                            </div>
                            <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                        </div>
                    </div>
                    <button class="btn btn-primary">Tambah Data</button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('additional-js'); ?>
<script>
    $('.pengadu').hide();
    $('input[type=radio]').click(function() {
        if ($(this).hasClass('anonym')) {
            $('.pengadu').hide();
        } else {
            $('.pengadu').show();
        }
    });
</script>
<?= $this->endSection(); ?>
