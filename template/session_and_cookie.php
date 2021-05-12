<?php
session_start();

if (!isset($_COOKIE['theme'])) {
    setcookie('theme', 'blue', time() + (86400 * 30), "/");
}
