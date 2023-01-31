<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <?php $this->load->view("_partials/navbar.php") ?><br><br>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="<?php echo base_url('aset_login/fonts/icomoon/style.css') ?>" rel="stylesheet">

    <link href="<?php echo base_url('aset_login/css/owl.carousel.min.css') ?>" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url('aset_login/css/bootstrap.min.css') ?>" rel="stylesheet">
    
    <!-- Style -->
    <link href="<?php echo base_url('aset_login/css/style.css') ?>" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../assets/img/bmkgps.png" />  

    <!-- bootstrap.min css -->
    <!-- Vavicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/bmkgps.png') ?>" />  

    <!-- bootstrap.min css -->
    <link href="<?php echo base_url('aset_userb/plugins/bootstrap/css/bootstrap.css') ?>" rel="stylesheet" />
    <!--link rel="stylesheet" href="aset_userb/plugins/bootstrap/css/bootstrap.css"-->

    <!-- Icofont Css -->
    <link href="<?php echo base_url('aset_userb/plugins/fontawesome/css/all.css') ?>" rel="stylesheet" />
    <!--link rel="stylesheet" href="aset_userb/plugins/fontawesome/css/all.css"-->

    <!-- animate.css -->
    <link href="<?php echo base_url('aset_userb/plugins/animate-css/animate.css') ?>" rel="stylesheet" />
    <!--link rel="stylesheet" href="aset_userb/plugins/animate-css/animate.css"-->

    <!-- Icofont -->
    <link href="<?php echo base_url('aset_userb/plugins/icofont/icofont.css') ?>" rel="stylesheet" />
    <!--link rel="stylesheet" href="aset_userb/plugins/icofont/icofont.css"-->

    <!-- Main Stylesheet -->
    <link href="<?php echo base_url('aset_userb/css/style.css') ?>" rel="stylesheet" />
    <!--link rel="stylesheet" href="aset_userb/css/style.css"-->
        <!-- Header-->
        <header class="py-5">
            <div class="container px-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xxl-6">
                        <div class="text-center my-5">
                            <h1 class="fw-bolder mb-3">Selamat! Permintaan Sudah Kami Terima</h1>
                            <p class="lead fw-normal text-muted mb-4">Kami Akan Segera Menghubungi Anda Secepatnya Melalui Whatsapp Untuk Konfirmasi Lebih Lanjut, Terima Kasih</p>
                            <div class="d-grid gap-3 justify-content-sm-center">
                                    <a class="btn btn-primary btn-lg px-6 me-sm-6" href="<?php echo base_url('index.php/home') ?>">Kembali Ke Home</a>
                                    <a class="btn btn-danger btn-lg px-6 me-sm-6" href="<?php echo base_url('index.php/booking') ?>">Lanjut Booking</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </main>
    <!-- Footer-->
    <?php $this->load->view("_partials/footer.php") ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>