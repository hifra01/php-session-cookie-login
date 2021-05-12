<?php
$theme_list = array(
    'blue' => 'light-blue darken-4',
    'red' => 'red darken-4'
);
if (isset($_COOKIE['theme']) && !array_key_exists($_COOKIE['theme'], $theme_list)) {
    setcookie('theme', 'blue', time() + (86400 * 30), "/");
    $theme = $theme_list['blue'];
} else {
    $theme = (isset($_COOKIE['theme'])) ? $theme_list[$_COOKIE['theme']] : $theme_list['blue'];
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Quiz 2 Pemroweb - 192410102043</title>
</head>
<body>
