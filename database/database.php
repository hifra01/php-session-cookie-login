<?php
//echo "Hello from database <br/>";
$db_host = 'localhost';
$db_name = 'pweb-quiz2';
$db_user = 'root';
$db_pass = '';
$db_charset = 'utf8mb4';

$db_dsn = "mysql:host=$db_host;dbname=$db_name;charset=$db_charset";
$db_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $db = new PDO($db_dsn, $db_user, $db_pass, $db_options);
    function checkUsernameExist($username)
    {
        global $db;
        $query = $db->prepare("SELECT COUNT(*) FROM user WHERE username=:username");
        $query->execute([
            'username' => $username,
        ]);
        $result = $query->fetchColumn();

        if ((int)$result > 0){
            return true;
        }
        return false;
    }

    function isPasswordCorrect($id, $password) {
        global $db;
        $query = $db->prepare("SELECT password FROM user WHERE id=:id");
        $query->execute([
            'id' => $id
        ]);
        $result = $query->fetch();

        if (md5($password) == $result['password']) {
            return true;
        }

        return false;
    }
} catch (PDOException $e) {
    die($e->getMessage());
}

