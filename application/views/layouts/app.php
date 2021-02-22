<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ekky Ardian">
    <meta name="generator" content="Jekyll v4.1.1">
    <title><?= isset($title) ? $title : 'Simple Ecommerce'; ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/navbar-fixed/">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/libs/fontawesome/css/all.min.css">

    <!-- Favicons -->
    <!-- TODO: Coming soon -->

    <!-- Custom styles -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/app.css">
</head>

<body>
    
    <!-- Start of Navbar -->
    <?php $this->load->view('layouts/_navbar.php'); ?>
    <!-- End of Navbar -->

    <!-- Start of Content -->
    <main role="main" class="container">
    <?php $this->load->view($page); ?>
    </main>
    <!-- End of Content -->
    
    <!-- Start of calling js file -->
    <script src="<?= base_url() ?>assets/libs/jquery/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/js/app.js"></script>
    <!-- End of calling js file -->

</body>

</html>
