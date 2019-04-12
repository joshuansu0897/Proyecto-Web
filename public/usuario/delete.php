<?php require_once('../../private/initialize.php');

if (!isLogin() && !isRoot()) {
    redirect_to(url_for('/index.php'));
}

if (!isset($_GET['idu'])) {
    redirect_to(url_for('/usuario/list.php'));
}

$idu = $_GET['idu'];

$res = delete_user($idu);
redirect_to(url_for('/usuario/list.php'));
