<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laboratorium PTIK</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">

    <link href="<?php echo base_url('css/bootstrap.min.css') ?>" rel="stylesheet">

    <link href="<?php echo base_url('css/bootstrap-icons.css') ?>" rel="stylesheet">

    <link href="<?php echo base_url('css/templatemo-topic-listing.css') ?>" rel="stylesheet">
    <link rel="shortcut icon" href=<?php echo base_url("img/logo/uns.png") ?>>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href=<?= base_url('/node_modules/sweetalert2/dist/sweetalert2.min.css') ?>>

    <!--

TemplateMo 590 topic listing

https://templatemo.com/tm-590-topic-listing

-->
</head>

<body id="top">

    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <i class="bi-back"></i>
                    <img src="<?php echo base_url('/img/logo/ptik.png'); ?>" height="25" alt="" loading="lazy" />
                </a>

                <div class="d-lg-none ms-auto me-4">
                    <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_2">Jadwal</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_3">Ruangan</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_4">Booking</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_5">FAQs</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_6">Contact</a>
                        </li>


                    </ul>

                    <div class="d-none d-lg-block">
                        <a href="/otentikasi" class="navbar-icon bi-person smoothscroll"></a>
                    </div>
                </div>
            </div>
        </nav>


        <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                        <h2 class="text-white text-center">Peminjaman Laboratorium PTIK</h2>
                        <h6 class="text-center">Mau pinjam ruang lab PTIK? Yuk cek tanggal ketersediaannya dulu!</h6>
                        <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bi-search" id="basic-addon1"></span>
                                <input name="tanggal_pemakaian" type="date" class="form-control" id="tanggal_pemakaian" aria-label="Search by Date">
                                <button type="submit" class="form-control" class="bi-search">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="featured-section" id="section_2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="custom-block custom-block-overlay">
                            <div class="d-flex flex-column h-100">
                                <img src="images/businesswoman-using-tablet-analysis.jpg" class="custom-block-image img-fluid" alt="">
                                <div class="custom-block-overlay-text d-flex">
                                    <div class="col-12 text-center">
                                        <h3 class="text-black mb-2 text-center">Jadwal Laboratorium PTIK</h3>
                                        <br>
                                        <table class="display compact" id="labtabel">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Ruangan</th>
                                                    <th>Jam Mulai</th>
                                                    <th>Jam Berakhir</th>
                                                    <th>Tanggal Digunakan</th>
                                                    <th>Status Ruangan</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $no = 1;
                                            $tanggal_pemakaian = $_GET['tanggal_pemakaian'] ?? null; // Ambil nilai tanggal dari inputan form
                                            foreach ($ruangan as $u) {
                                                $tanggal_data = date('Y-m-d', strtotime($u['tanggal'])); // Ubah format tanggal
                                                if ($tanggal_pemakaian && $tanggal_data !== $tanggal_pemakaian) {
                                                    continue; // Lewati data yang tidak sesuai dengan tanggal yang dipilih
                                                }
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $u['nama_ruangan']; ?></td>
                                                    <td><?php echo $u['jam_mulai']; ?></td>
                                                    <td><?php echo $u['jam_berakhir']; ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($u['tanggal'])); ?></td>
                                                    <td>
                                                        <?php
                                                        switch ($u['status_jadwal']) {
                                                            case 1:
                                                                echo "<span class='text-success text-bold'>Sedang berlangsung...</span>";
                                                                break;
                                                            case 2:
                                                                echo "<span class='text-primary text-bold'>Akan datang...</span>";
                                                                break;
                                                            case 3:
                                                                echo "<span class='text-danger text-bold'>Sudah lewat, harap hapus jadwal ini..</span>";
                                                            default:
                                                                break;
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                                <div class="section-overlay"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="explore-section section-padding" id="section_3">
            <div class="container">

                <div class="col-12 text-center">
                    <h2 class="mb-4">Laboratorium PTIK</h1>
                </div>

            </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="design-tab" data-bs-toggle="tab" data-bs-target="#design-tab-pane" type="button" role="tab" aria-controls="design-tab-pane" aria-selected="true">Ruangan</button>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                        <div class="custom-block bg-white shadow-lg d-flex align-items-center justify-content-center flex-column">
                                            <div>
                                                <h5 class="mb-2">Ruangan Software Engineer</h5>
                                            </div>
                                            <img src="<?php echo base_url('img/logo/monitor.png') ?>" alt="" width="300px">
                                        </div>
                                    </div>


                                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                        <div class="custom-block bg-white shadow-lg d-flex align-items-center justify-content-center flex-column">
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">Ruangan Multimedia Studio</h5>
                                                </div>
                                            </div>
                                            <img src="<?php echo base_url('img/logo/monitor.png') ?>" alt="" width="300px">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="custom-block bg-white shadow-lg d-flex align-items-center justify-content-center flex-column">
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">Ruangan Computer Network </h5>
                                                </div>
                                            </div>
                                            <img src="<?php echo base_url('img/logo/monitor.png') ?>" alt="" width="300px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <section class="timeline-section section-padding" id="section_4">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="text-white mb-4">Bagaimana Cara Booking Lab?</h1>
                    </div>

                    <div class="col-lg-10 col-12 mx-auto">
                        <div class="timeline-container">
                            <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                                <div class="list-progress">
                                    <div class="inner"></div>
                                </div>

                                <li>
                                    <h4 class="text-white mb-3">Cek jadwal penggunaan lab melalui kolom cari</h4>
                                    <div class="icon-holder">
                                        <i class="bi-search"></i>
                                    </div>
                                </li>

                                <li>
                                    <h4 class="text-white mb-3">Daftar menjadi anggota &amp; tunggu validasi admin</h4>

                                    <div class="icon-holder">
                                        <i class="bi-person"></i>
                                    </div>
                                </li>

                                <li>
                                    <h4 class="text-white mb-3">Setelah dikonfirmasi, Login &amp; lakukan peminjaman lab</h4>
                                    <div class="icon-holder">
                                        <i class="bi-bookmark"></i>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 text-center mt-5">
                        <p class="text-white">
                            Ingin daftar member?
                            <a href="/otentikasi" class="btn custom-btn custom-border-btn ms-3">Klik disini!</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>


        <section class="faq-section section-padding" id="section_5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <h2 class="mb-4">Pertanyaan yang Sering Diajukan</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-5 col-12">
                        <img src="images/faq_graphic.jpg" class="img-fluid" alt="FAQs">
                    </div>
                    <div class="col-lg-6 col-12 m-auto">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Bagaimana cara mendaftar?
                                    </button>
                                </h2>

                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Dengan mengklik tombol <strong>mendaftar</strong> pada halaman login, kemudian tunggu hingga status pengguna <strong> diterima</strong> oleh Administrator
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Mengapa sistem menampilkan pesan user belum aktif?
                                    </button>
                                </h2>

                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Setelah selesai mendaftar harap menunggu <strong>konfirmasi</strong> dari Administrator untuk menerima anda sebagai pengguna baru
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="contact-section section-padding section-bg" id="section_6">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-5">Get in touch</h2>
                    </div>

                    <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                        <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.144545460616!2d110.77181747504986!3d-7.559214292454665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a14450edd210d%3A0xa6ea1f9494841e84!2sFKIP%20JPTK%20UNS%20Kampus%20V!5e0!3m2!1sid!2sid!4v1698589552254!5m2!1sid!2sid" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12 mb-3 mb-lg- mb-md-0 ms-auto">
                        <h4 class="mb-3">Pendidikan Teknik Informatika dan Komputer</h4>

                        <p>Kampus V JPTK FKIP UNS</p>
                        <p>Jl. Jend. Ahmad Yani 200A Pabelan, Kartasura, Sukoharjo 57100</p>

                        <hr>

                        <p class="d-flex align-items-center mb-1">
                            <span class="me-2">Phone</span>

                            <a href="tel: 305-240-9671" class="site-footer-link">
                                305-240-9671
                            </a>
                        </p>

                        <p class="d-flex align-items-center">
                            <span class="me-2">Email</span>

                            <a href="mailto:info@company.com" class="site-footer-link">
                                info@company.com
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-12 mb-4 pb-2">
                    <a class="navbar-brand mb-2" href="index.html">
                        <i class="bi-back"></i>
                        <img src="<?php echo base_url('/img/logo/ptik.png'); ?>" height="25" alt="" loading="lazy" />
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <h6 class="site-footer-title mb-3">Resources</h6>

                    <ul class="site-footer-links">
                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Home</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Jadwal</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Ruangan</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Booking</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">FAQs</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 col-6 mb-4 mb-lg-0">
                    <h6 class="site-footer-title mb-3">Information</h6>

                    <p class="text-white d-flex mb-1">
                        <a href="https://api.whatsapp.com/send/?phone=6285747768629&text&type=phone_number&app_absent=0" class="site-footer-link" target="_blank">
                            085747768629
                        </a>
                    </p>

                    <p class="text-white d-flex mb-1">
                        <a href="mailto:lanjar17@gmail.com" class="site-footer-link">
                            lanjar17@gmail.com
                        </a>
                    </p>
                    <p class="text-white d-flex ">
                        <a href="mailto:adhidharmawan04@gmail.com" class="site-footer-link">
                            adhidharmawan04@gmail.com
                        </a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-lg-0 ms-auto">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            English</button>

                        <ul class="dropdown-menu">
                            <li><button class="dropdown-item" type="button">Thai</button></li>

                            <li><button class="dropdown-item" type="button">Myanmar</button></li>

                            <li><button class="dropdown-item" type="button">Arabic</button></li>
                        </ul>
                    </div>

                    <p class="copyright-text mt-lg-5 mt-4">Copyright © 2023 Lanjar Dwi Saputro &amp; Muh Adhi Dharmawan.<br> All rights reserved.</p>

                </div>

            </div>
        </div>
    </footer>


    <!-- JAVASCRIPT FILES -->

    <script>
        $(document).ready(function() {
            new DataTable('#labtabel');
        });

        $.extend($.fn.dataTable.defaults, {
            searching: false,
            lengthChange: false,
            info: false
        });
    </script>
    <script src="<?php echo base_url('js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?php echo base_url('js/jquery.sticky.js') ?>"></script>
    <script src="<?php echo base_url('js/click-scroll.js') ?>"></script>
    <script src="<?php echo base_url('js/custom.js') ?>"></script>

</body>

</html>