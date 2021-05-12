<?php require_once './template/header.php'; ?>
<?php
if (isLoggedIn()) {
    header('Location: ./' );
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];

        if (checkUsernameExist($username)) {
            throw new Exception("Username sudah digunakan!");
        }

        if (strlen($password) < 8) {
            throw new Exception("Panjang password harus 8 karakter atau lebih!");
        }

        if ($password != $confirmPassword) {
            throw new Exception("Konfirmasi password tidak sesuai!");
        }

        $query = $db->prepare("INSERT INTO user(username, password) VALUES (:username, :password)");
        $query->execute([
            'username' => $username,
            'password' => md5($password)
        ]);
        $successMessage = "Registrasi berhasil";
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
    }
}
?>

    <div class="container">
        <h1>Register</h1>
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card">
                    <form action="register.php" method="POST">
                        <div class="card-content">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" id="username" name="username">
                                    <label for="username">Username</label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="password" id="password" name="password">
                                    <label for="password">Password</label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="password" id="confirmPassword" name="confirmPassword">
                                    <label for="confirmPassword">Konfirmasi Password</label>
                                </div>
                                <div class="col s12 right-align">
                                    <button type="submit" class="btn waves-effect waves-light <?= $theme ?>"
                                            name="submit">Register
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
        initSuccessModal("<?php echo $successMessage; ?>");
    </script>
<?php endif; ?>
<?php require_once './template/footer.php'; ?>