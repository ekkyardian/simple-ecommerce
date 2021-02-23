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
                    <a class="nav-link" href="<?= base_url() ?>">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-manage" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Manage</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-manage">
                        <a href="<?= base_url('category') ?>" class="dropdown-item">Category</a>
                        <a href="<?= base_url('product') ?>" class="dropdown-item">Product</a>
                        <a href="<?= base_url('order') ?>" class="dropdown-item">Order</a>
                        <a href="<?= base_url('user') ?>" class="dropdown-item">User</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index.php?p=cart" class="nav-link">
                            <i class="fas fa-shopping-cart"></i> Cart 0
                        </a>
                    </li>
                    <?php if (!$this->session->userdata('is_login')) :?>
                    <li class="nav-item">
                    <a href="<?= base_url('/login') ?>" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('/register') ?>" class="nav-link">Register</a>
                    </li>
                    <?php else : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-user-info" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('name') ?></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-user-info">
                            <a href="index.php?p=profile" class="dropdown-item">Profile</a>
                            <a href="index.php?p=order" class="dropdown-item">Order</a>
                            <a href="<?= base_url('/logout') ?>" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
