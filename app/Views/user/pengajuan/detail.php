<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

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

            <div class="card shadow card-detail">
                <div class="card-header">
                    <h3 class="mb-0 text-gray-900"><?= $title; ?></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">Nama Pengajuan</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            <?= $data['nama_pengaju']; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">Status Pengajuan</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            <?= ($data['status_pengajuan'] == 1 ? 'Pengajuan Baru' : ($data['status_pengajuan'] == 2 ? 'Sedang Diproses' : 'Telah Selesai')) ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">Tanggal Pengajuan</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            <?= date('d M Y', strtotime($data['created_at'])); ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">Perihal</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            <?= $data['judul_pengajuan']; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">Rincian</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            <span class="text-justify"><?= $data['isi_pengajuan']; ?></span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">Foto Bukti</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            <a href="/uploads/<?= $bukti['img_satu'] ?>" target="_blank"><img src="/uploads/<?= $bukti['img_satu'] ?>" class="img-fluid img-thumbnail" width="100"></a>
                            <?php if ($bukti['img_dua'] != null) : ?>
                                <a href="/uploads/<?= $bukti['img_dua'] ?>" target="_blank"><img src="/uploads/<?= $bukti['img_dua'] ?>" class="img-fluid img-thumbnail" width="100"></a>
                            <?php endif; ?>
                            <?php if ($bukti['img_tiga'] != null) : ?>
                                <a href="/uploads/<?= $bukti['img_tiga'] ?>" target="_blank"><img src="/uploads/<?= $bukti['img_tiga'] ?>" class="img-fluid img-thumbnail" width="100"></a>
                            <?php endif; ?>
                            <?php if ($bukti['img_empat'] != null) : ?>
                                <a href="/uploads/<?= $bukti['img_empat'] ?>" target="_blank"><img src="/uploads/<?= $bukti['img_empat'] ?>" class="img-fluid img-thumbnail" width="100"></a>
                            <?php endif; ?>
                            <?php if ($bukti['img_lima'] != null) : ?>
                                <a href="/uploads/<?= $bukti['img_lima'] ?>" target="_blank"><img src="/uploads/<?= $bukti['img_lima'] ?>" class="img-fluid img-thumbnail" width="100"></a>
                            <?php endif; ?>
                            <?php if ($bukti['img_enam'] != null) : ?>
                                <a href="/uploads/<?= $bukti['img_enam'] ?>" target="_blank"><img src="/uploads/<?= $bukti['img_enam'] ?>" class="img-fluid img-thumbnail" width="100"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>
