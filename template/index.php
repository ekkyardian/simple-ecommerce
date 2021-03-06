<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ekky> Ardian">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Simple Eccomerce</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/navbar-fixed/">

    <!-- Bootstrap core CSS -->
    <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/libs/fontawesome/css/all.min.css">

    <!-- Favicons -->
    <!-- TODO: Coming soon -->

    <!-- Custom styles -->
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">EShop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?p=home">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-manage" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Manage</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-manage">
                            <a href="index.php?p=category" class="dropdown-item">Category</a>
                            <a href="index.php?p=product" class="dropdown-item">Product</a>
                            <a href="index.php?p=order" class="dropdown-item">Order</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index.php?p=cart" class="nav-link">
                            <i class="fas fa-shopping-cart"></i> Cart 0
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?p=login" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?p=register" class="nav-link">Register</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-user-info" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Ekky</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-user-info">
                            <a href="index.php?p=profile" class="dropdown-item">Profile</a>
                            <a href="index.php?p=order" class="dropdown-item">Order</a>
                            <a href="index.php?p=logout" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main role="main" class="container">
        <!-- Content here -->
        <?php
        if (@$_GET['p']=='home' OR @$_GET['p']=='') {
            include "home.php";
        }
        else if (@$_GET['p']=='category') {
            include "category.php";
        }
        else if (@$_GET['p']=='product') {
            include "product.php";
        }
        else if (@$_GET['p']=='order') {
            include "order.php";
        }
        else if (@$_GET['p']=='cart') {
            include "cart.php";
        }
        else if (@$_GET['p']=='login') {
            include "login.php";
        }
        else if (@$_GET['p']=='register') {
            include "register.php";
        }
        else if (@$_GET['p']=='profile') {
            include "profile.php";
        }
        else if (@$_GET['p']=='profile-update') {
            include "profile-update.php";
        }
        else if (@$_GET['p']=='logout') {
            include "logout.php";
        }
        else if (@$_GET['p']=='checkout') {
            include "checkout.php";
        }
        else if (@$_GET['p']=='checkout-success') {
            include "checkout-success.php";
        }
        else if (@$_GET['p']=='payment-confirmation') {
            include "payment-confirmation.php";
        }
        else if (@$_GET['p']=='list-orders') {
            include "list-orders.php";
        }
        else if (@$_GET['p']=='order-detail') {
            include "order-detail.php";
        }
        else if (@$_GET['p']=='manage-user') {
            include "manage-user.php";
        }
        else if (@$_GET['p']=='manage-category') {
            include "manage-category.php";
        }
        else if (@$_GET['p']=='manage-product') {
            include "manage-product.php";
        }
        else if (@$_GET['p']=='manage-status-order') {
            include "manage-status-order.php";
        }
        else if (@$_GET['p']=='add-user') {
            include "add-user.php";
        }
        else if (@$_GET['p']=='add-category') {
            include "add-category.php";
        }
        else if (@$_GET['p']=='add-product') {
            include "add-product.php";
        }
        else {
            include "404.php";
        }
        ?>
    </main>
    <script src="assets/libs/jquery/jquery-3.5.1.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
