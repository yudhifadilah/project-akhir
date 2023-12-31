<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sistem Layanan Informasi Rukun Warga Cilame</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url() ?>/assets/img/favicon.png" rel="icon">
    <link href="<?php echo base_url() ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url() ?>/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url() ?>/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: BizLand - v3.6.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:rukunwargacilame@gmail.com">rukunwargacilame@gmail.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+62896-9271-3590</span></i>
            </div>
           <!-- =======  <div class="social-links d-none d-md-flex align-items-center">
                <a href="ig" class="instagram"><i class="bi bi-instagram"></i></a>
            </div> ======= -->
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <!-- <h1 class="logo"><a href="#">s<span></span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
         <a href="index.html" class="logo"><img src="<?php echo base_url() ?>/assets/img/portfolio/lg.svg" width="200px" height="100px"></a> 

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto " href="#portfolio">Tentang Kami</a></li>
                    <li><a class="nav-link scrollto" href="#team">Kas RW</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                </ul>

                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Selamat Datang Di <span>Aplikasi Sistem Pelayanan Rukun Warga Cilame</span></h1>
            <h2>Rukun Warga Cilame Memiliki Sekitar 500 Jiwa</h2>
            <div class="d-flex">
                <a href="<?php echo base_url('Auth') ?>" class="btn-get-started scrollto">Login</a>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">



    <section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Tentang Kami</h2>
            <h3>Struktur <span>Organisasi</span></h3>
            <p>Struktur utama yang ada dalam tingkatan pemerintahan RW (Rukun Warga)</p>
        </div>
        <div class="row mb-4">
            <div class="col-md d-flex justify-content-center">
                <!-- Menambahkan gaya CSS untuk menghilangkan garis pada tombol -->
                <a href="/ShowStruktur" target="_blank" class="btn btn-primary" style="text-decoration: none;">
                    Lihat Selengkapnya
                </a>
            </div>
            <!-- Tambahkan elemen <a> dengan atribut "href" ke gambar selanjutnya -->
        </div>
    </div>
</section>

    <!-- ======= Struktur Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Keuangan Rukun Warga Cilame</h2>
                <h3>Transparansi <span>Keuangan</span></h3>
            </div>

            <!-- Assuming you have a container to wrap the grid -->
            <div class="container">

    <!-- Tambahkan tombol toggle untuk menyembunyikan/menampilkan tabel -->
    <button id="toggleTableBtn" class="btn btn-primary mb-3">Kas RW</button>

    <table id="keuanganTable" class="table table-hover table-blue">
      <thead>
        <tr>
          <th scope="col">Tanggal</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Jumlah</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($keuangan_rw as $keuangan) : ?>
          <tr>
            <td><?= $keuangan['tanggal']; ?></td>
            <td><?= $keuangan['deskripsi']; ?></td>
            <td><?= $keuangan['jumlah']; ?></td>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
        </div>
    </section>

    

        <!-- End Portfolio Section -->

        <!-- ======= Struktur Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>News</h2>
                    <h3>Rukun Warga  <span>Terkini</span></h3>
                </div>

<!-- Assuming you have a container to wrap the grid -->
<div class="container">
    <div class="row">
        <?php
        // Mengurutkan artikel berdasarkan judul secara abjad
        $sortedArticles = $articles;
        usort($sortedArticles, function ($a, $b) {
            return strcmp($a['title'], $b['title']);
        });

        foreach ($sortedArticles as $article) : ?>
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="member">
                    <div class="member-img">
                        <img src="<?= base_url('assets/img/postingan/' . $article['image_filename']) ?>" class="img-fluid" alt="card">
                    </div>
                    <div class="card-body">
                     <!-- <div class="social">
                            <a href=""><i class="bi bi-twitter"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div> -->
                    <div class="member-info">
                    <h4 class="card-title"><?= $article['title']; ?></h4>
                        <span><?= substr($article['content'], 0, 50); ?></span><br>
                        <a href="<?= base_url('/showPost/show/' . $article['id']); ?>" class="btn btn-primary">Baca Selengkapnya</a> 
                    </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>



        </section><!-- End Team Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Kontak</h2>
                    <h3><span>Kontak Kami</span></h3>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-6">
                        <div class="info-box mb-4">
                            <i class="bx bx-map"></i>
                            <h3>Alamat</h3>
                            <p>Ngamprah, Kabupaten Bandung Barat</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Kami</h3>
                            <p>rukunwargacilame@gmail.com</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-phone-call"></i>
                            <h3>Hubungi Kami</h3>
                            <p>(022) 82004212</p>
                        </div>
                    </div>

                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31691.028190846686!2d107.50114034732!3d-6.845144561785449!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e37ebcdecaf7%3A0x8bdc2dd419543f72!2sCilame%2C%20Ngamprah%2C%20West%20Bandung%20Regency%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1691049971645!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3><img src="<?php echo base_url() ?>/assets/img/portfolio/lg.svg" width="100px" height="100px"><span></span></h3>
                        <p>
                        Jl. Ngamprah, Kabupaten Bandung Barat
                            <strong>Telefon:</strong> (022) 82004212<br>
                            <strong>Email:</strong> rukunwargacilame@gmail.com<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#hero">Beranda</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Tentang Kami</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#team">Kas RW</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#contact">Kontak</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Social Media Kami</h4>
                        <div class="social-links mt-3">
                            <a href="https://www.instagram.com/desa_cilame/" class="instagram"><i class="bx bxl-instagram"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>Gesang</span></strong>.
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
                Designed by &copy; Gesang <?= date('Y'); ?></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url() ?>/assets/vendor/aos/aos.js"></script>
    <script src="<?php echo base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/vendor/php-email-form/validate.js"></script>
    <script src="<?php echo base_url() ?>/assets/vendor/purecounter/purecounter.js"></script>
    <script src="<?php echo base_url() ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url() ?>/assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    // Toggle tabel ketika tombol di klik
    $("#toggleTableBtn").on("click", function () {
      $("#keuanganTable").toggle();
    });
  });
</script>

</body>

</html>