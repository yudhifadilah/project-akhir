<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>
<section class="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <?php if (session()->getFlashdata('msg')) : ?>
            <input type="hidden" name="flash-msg" id="flash-msg" data-flash="<?= session()->getFlashdata('msg'); ?>">
        <?php endif; ?>

        <div class="row">
            <div class="col-md-12">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-900">Edit <?= $title; ?></h1>

                <!-- Form Edit Organisasi -->
                <div class="card shadow">
                    <div class="card-body">
                        <form method="post" action="<?= base_url('WargaController/update/' . $warga['id']) ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" value="<?php echo $warga['nama']; ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" value="<?php echo $warga['alamat']; ?>" class="form-control" required></input>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $warga['tanggal_lahir']; ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" name="pekerjaan" value="<?php echo $warga['pekerjaan']; ?>" class="form-control" required></input>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                             <div class="form-check">
                                <input type="radio" name="jenis_kelamin" value="Laki-Laki" <?php if ($warga['jenis_kelamin'] == 'Laki-Laki') echo 'checked'; ?>>
                                <label class="form-check-label">Laki - Laki</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="jenis_kelamin" value="Perempuan" <?php if ($warga['jenis_kelamin'] == 'Perempuan') echo 'checked'; ?>>
                                <label class="form-check-label">Perempuan</label>
                            </div>
                        </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <input type="text" name="agama" value="<?php echo $warga['agama']; ?>" class="form-control" required></input>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Update" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</section>
<?= $this->endSection(); ?>

<?= $this->section('additional-js'); ?>

<script>
    tinymce.init({
        selector: '#content',
        height: 300, // Tinggi editor
        menubar: false, // Menyembunyikan menubar
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help'
    });
</script>
<?= $this->endSection(); ?>
