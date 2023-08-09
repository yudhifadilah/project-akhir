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

                <!-- Form Postingan Organisasi -->
                <div class="card shadow">
                    <div class="card-body">
                        <form action="/KeuanganRWController/store" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input name="deskripsi" id="deskripsi" class="form-control" rows="8" required>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control-file">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /. container-fluid -->

</section>
<?= $this->endSection(); ?>

<?= $this->section('additional-js'); ?>

<script>
    // ... kode JavaScript DataTables dan lainnya ...
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
</script>
<?= $this->endSection(); ?>
