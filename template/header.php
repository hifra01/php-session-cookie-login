<?php
require_once './template/session_and_cookie.php';
require_once './database/database.php';

function isLoggedIn(): bool
{
    if(isset($_SESSION['user_id']) && isset($_SESSION['username'])){
        return true;
    }
    return false;
}