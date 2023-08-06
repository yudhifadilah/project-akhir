<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sistem Layanan Informasi Desa</title>
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
                <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:desaciwaruga@gmail.com">desaciwaruga@gmail.com</a></i>
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
                    <li><a class="nav-link scrollto " href="/">Beranda</a></li>
                    <li><a class="nav-link scrollto " href="/">Tentang Kami</a></li>
                    <li><a class="nav-link scrollto active" href="/">Berita Warga</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                </ul>

                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>
    <title>Sistem Layanan Informasi Desa - Artikel</title>
    <!-- Tambahkan link CSS Bootstrap dan custom CSS di sini -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-title {
            font-size: 2rem;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 20px;
        }

        .card-text {
            font-size: 1.1rem;
            color: #555;
            line-height: 1.8;
        }

        .center-image {
            display: flex;
            justify-content: center;
        }

        .center-text {
            text-align: center;
        }

        .article-content {
            text-align: justify;
        }

        /* Optional: add more styles here */

    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="card-title center-text"><?= $article['title']; ?></h1>
            <div class="center-image">
                <img src="<?= base_url('assets/img/postingan/' . $article['image_filename']) ?>" class="img-fluid" alt="Gambar Artikel">
            </div>
            <br><p class="card-text article-content"><?= $article['content']; ?></p>
        </div>
    </div>
</div>

    <!-- Masukkan link script Bootstrap di sini -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
                Jl. Waruga jaya, Kabupaten Bandung Barat
                    <strong>Telefon:</strong> (022) 82004212<br>
                    <strong>Email:</strong> desaciwaruga@gmail.com<br>
                </p>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><i class="bx bx-chevron-right"></i> <a href="#hero">Beranda</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Tentang Kami</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#team">Berita Warga</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#contact">Kontak</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
                <h4>Social Media Kami</h4>
                <div class="social-links mt-3">
                    <a href="https://www.instagram.com/desaciwaruga/" class="instagram"><i class="bx bxl-instagram"></i></a>
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

</body>

</html>

