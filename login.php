<?php require_once './template/header.php'; ?>
<?php
if (isLoggedIn()) {
    header('Location: ./' );
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["password"])) {
    try {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $query = $db->prepare("SELECT id, username from user where username=:username and password=:password");
        $query->execute([
            'username' => $username,
            'password' => md5($password)
        ]);
        $result_count = $query->rowCount();
        if ($result_count > 0){
            $result = $query->fetch();
            $_SESSION['username'] = $result['username'];
            $_SESSION['user_id'] = $result['id'];
            header('Location: ./');
        } else {
            throw new Exception("Username atau password salah!");
        }
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
        <h1>Login</h1>
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card">
                    <form action="./login.php" method="POST">
                        <div class="card-content">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" id="username" name="username" required class="validate">
                                    <label for="username">Username</label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="password" id="password" name="password" required class="validate">
                                    <label for="password">Password</label>
                                </div>
                                <div class="col s12 right-align">
                                    <button type="submit" class="btn waves-effect waves-light <?= $theme ?>"
                                            name="submit">Login
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
<?php require_once './template/footer.php'; ?>