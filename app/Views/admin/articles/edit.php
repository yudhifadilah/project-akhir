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

                <!-- Form Edit Artikel -->
                <div class="card shadow">
                    <div class="card-body">
                        <form method="post" action="/admin/articles/update/<?php echo $article['id']; ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Judul Artikel</label>
                                <input type="text" name="title" value="<?php echo $article['title']; ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="content">Isi Artikel</label>
                                <textarea name="content" id="content" class="form-control" rows="8" required><?php echo $article['content']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image_filename">Gambar Artikel</label>
                                <input type="file" name="image_filename" id="image_filename" class="form-control-file">
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

<script src="path_to_tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#content',
        height: 300,  // Sesuaikan tinggi editor
        plugins: 'lists link',
        toolbar: 'bold italic | numlist bullist link',
    });
</script>
<?= $this->endSection(); ?>
