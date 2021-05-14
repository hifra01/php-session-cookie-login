<?php require_once './template/header.php';
require_once './template/html_header.php';
require_once './template/navbar.php'; ?>


<main class="container">
    <?php if (!isLoggedIn()): ?>
        <!--Bila belum Login-->
        <h1>Selamat Datang!</h1>
        <div class="row">
            <div class="col s12 m6">
                <div class="card <?= $theme ?>">
                    <div class="card-content white-text">
                        <span class="card-title">Register</span>
                        <p>Klik link di bawah ini untuk melakukan register</p>
                    </div>
                    <div class="card-action">
                        <a href="./register.php" class="yellow-text">Register</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card <?= $theme ?>">
                    <div class="card-content white-text">
                        <span class="card-title">Login</span>
                        <p>Klik link di bawah ini untuk melakukan login</p>
                    </div>
                    <div class="card-action">
                        <a href="./login.php" class="yellow-text">Login</a>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <!--Bila sudah Login-->
        <h1>Halo, <?= $_SESSION['username'] ?>!</h1>
        <div class="row">
            <div class="col s12 m6">
                <div class="card <?= $theme ?>">
                    <div class="card-content white-text">
                        <span class="card-title">Pengaturan Akun</span>
                        <p>Klik link di bawah ini untuk mengubah pengaturan akun</p>
                    </div>
                    <div class="card-action">
                        <a href="./settings.php" class="yellow-text">Pengaturan Akun</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card <?= $theme ?>">
                    <div class="card-content white-text">
                        <span class="card-title">Atur Tema</span>
                        <p>Klik link di bawah ini untuk mengatur tema</p>
                    </div>
                    <div class="card-action">
                        <a href="./theme.php" class="yellow-text">Atur Tema</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <h2>Tentang demo app ini</h2>
        <p>Pada demo app ini, <b>Cookie</b> digunakan untuk menyimpan preferensi tema, dan <b>Session</b> digunakan
            untuk menyimpan
            informasi login pengguna.</p>
        <p>Informasi yang disimpan adalah sebagai berikut:</p>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Value</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>$_SESSION['user_id']</td>
                <td><?= (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 'Tidak Tersedia' ?></td>
            </tr>
            <tr>
                <td>$_SESSION['username']</td>
                <td><?= (isset($_SESSION['username'])) ? $_SESSION['username'] : 'Tidak Tersedia' ?></td>
            </tr>
            <tr>
                <td>$_COOKIE['theme']</td>
                <td><?= (isset($_COOKIE['theme'])) ? $_COOKIE['theme'] : 'Tidak Tersedia' ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</main>
<footer class="page-footer <?= $theme ?>">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Dibuat Oleh</h5>
                <p class="grey-text text-lighten-4">Hilman Fathur Rakhmad (192410102043)</p>
                <p class="grey-text text-lighten-4">Pemrograman Berbasis Web - E</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="https://github.com/hifra01" target="_blank">My Github</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            Dibuat menggunakan <a href="https://materializecss.com/" class="grey-text text-lighten-4" target="_blank">Materialize CSS</a>
        </div>
    </div>
</footer>
<?php require_once './template/modal_and_scripts.php'; ?>
<?php require_once './template/footer.php'; ?>
