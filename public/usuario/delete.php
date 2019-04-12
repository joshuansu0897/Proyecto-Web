<?php require_once('../../private/initialize.php');

if (!isLogin() && !isRoot()) {
    indexOrBack();
}

if (!isset($_GET['idu'])) {
    redirect_to(url_for('/usuario/list.php'));
}

$idu = $_GET['idu'];

$res = delete_user($idu);
redirect_to(url_for('/usuario/list.php'));
