<?php
session_start();
require_once 'config.php';
require_once 'functions.php';

if (!isLoggedIn() && basename($_SERVER['PHP_SELF']) != 'login.php') {
    redirect('login.php');
}
?>