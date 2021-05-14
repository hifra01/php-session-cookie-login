<?php require_once './template/header.php'; ?>
<?php
if (!isLoggedIn()) {
    header('Location: ./');
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $oldPass = $_POST['oldPassword'];
        $newPass = $_POST['newPassword'];
        $confirmPass = $_POST['confirmPassword'];

        if (!isPasswordCorrect($_SESSION['user_id'], $oldPass)) {
            throw new Exception("Password salah!");
        }

        if ($oldPass !== $newPass) {
            throw new Exception("Password baru tidak boleh sama dengan password lama!");
        }

        if (strlen($newPass) < 8) {
            throw new Exception("Panjang password baru harus 8 karakter atau lebih!");
        }

        if ($newPass !== $confirmPass) {
            throw new Exception("Password baru tidak sesuai!");
        }

        $query = $db->prepare("UPDATE user SET password=:password WHERE id=:id");
        $query->execute([
            'password' => md5($newPass),
            'id' => $_SESSION['user_id']
        ]);
        $successMessage = "Ubah Password berhasil! Silakan login kembali.";

    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
    }
}

?>
<?php
require_once './template/html_header.php';
require_once './template/navbar.php';
?>
<div class="container">
    <h1>Pengaturan Akun</h1>
    <div class="row">
        <div class="col s12 m6 offset-m3">
            <div class="card">
                <form action="./settings.php" method="POST">
                    <div class="card-content">
                        <span class="card-title">Ubah Password</span>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="password" id="oldPassword" name="oldPassword" required class="validate" minlength="8">
                                <label for="oldPassword">Password Lama</label>
                            </div>
                            <div class="input-field col s12">
                                <input type="password" id="newPassword" name="newPassword" required class="validate" minlength="8">
                                <label for="newPassword">Password Baru</label>
                            </div>
                            <div class="input-field col s12">
                                <input type="password" id="confirmPassword" name="confirmPassword" required class="validate" minlength="8">
                                <label for="confirmPassword">Konfirmasi Password Baru</label>
                            </div>
                            <div class="col s12 right-align">
                                <button type="submit" class="btn waves-effect waves-light <?= $theme ?>"
                                        name="submit">Ubah Password
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once './template/modal_and_scripts.php'; ?>
<?php if (isset($errorMessage)): ?>
    <script>
        initErrorModal("<?php echo $errorMessage; ?>");
    </script>
<?php endif; ?>
<?php if (isset($successMessage)): ?>
    <script>
        initChangePasswordModal("<?php echo $successMessage; ?>");
    </script>
<?php endif; ?>
<?php require_once './template/footer.php'; ?>
