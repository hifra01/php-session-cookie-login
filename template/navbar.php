<?php if (isLoggedIn()): ?>
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="./settings.php" class="black-text">Pengaturan Akun</a></li>
        <li><a href="./theme.php" class="black-text">Atur Tema</a></li>
        <li><a href="#!" onclick="initLogoutModal()" class="black-text">Logout</a></li>
    </ul>
<?php endif; ?>

<nav class="<?= $theme ?>">
    <div class="nav-wrapper container">
        <a href="#" class="brand-logo">Quiz 2</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="./">Beranda</a></li>
            <?php if (!isLoggedIn()): ?>
                <!--Bila Belum Login-->
                <li><a href="./register.php">Register</a></li>
                <li><a href="./login.php">Login</a></li>
            <?php else: ?>
                <!--Bila Sudah Login-->
                <li>
                    <a class="dropdown-trigger" href="#!" data-target="dropdown1">
                        Halo, <?= $_SESSION['username']; ?>
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<ul class="sidenav sidenav-close" id="mobile-demo">
    <li><a href="./">Beranda</a></li>
    <?php if (!isLoggedIn()): ?>
        <!--Bila Belum Login-->
        <li><a href="./register.php">Register</a></li>
        <li><a href="./login.php">Login</a></li>
    <?php else: ?>
        <!--Bila Sudah Login-->
        <li><a href="./settings.php">Pengaturan Akun</a></li>
        <li><a href="./theme.php">Atur Tema</a></li>
        <li><a href="#!" onclick="initLogoutModal()">Logout</a></li>
    <?php endif; ?>
</ul>
