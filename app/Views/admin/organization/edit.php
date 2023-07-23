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
                        <form method="post" action="/admin/organization/update/<?php echo $organization['id']; ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" name="name" value="<?php echo $organization['name']; ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <textarea name="jabatan" id="jabatan" class="form-control" rows="8" required><?php echo $organization['jabatan']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Gambar Artikel</label>
                                <input type="file" name="image" id="image" class="form-control-file">
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
