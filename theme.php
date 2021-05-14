<?php require_once './template/header.php'; ?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["theme"])) {
    try {
        setcookie('theme', $_POST["theme"], time() + (86400 * 30), "/");
        $successMessage = "Ubah tema sukses";
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
    <h1>Atur Tema</h1>
    <div class="row">
        <div class="col s12 m6 offset-m3">
            <div class="card">
                <form action="./theme.php" method="POST">
                    <div class="card-content">
                        <span class="card-title">Pilih Warna</span>
                        <div class="row">
                            <div class="input-field col s12">
                                <div class="card light-blue darken-4">
                                    <div class="card-content">
                                        <label for="blue">
                                            <input class="with-gap" name="theme" id="blue" value="blue"
                                                   type="radio" <?= ($_COOKIE['theme'] == 'blue') ? 'checked' : '' ?>/>
                                            <span class="white-text">Biru</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-field col s12">
                                <div class="card red darken-4">
                                    <div class="card-content">
                                        <label for="red">
                                            <input class="with-gap" name="theme" id="red" value="red" type="radio" <?= ($_COOKIE['theme'] == 'red') ? 'checked' : '' ?>/>
                                            <span class="white-text">Merah</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 right-align">
                                <button type="submit" class="btn waves-effect waves-light <?= $theme ?>"
                                        name="submit">Ubah Tema
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
