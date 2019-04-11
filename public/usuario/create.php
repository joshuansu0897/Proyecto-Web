<?php

require_once('../../private/initialize.php');

if (!isLogin() && !isRoot()) {
    redirect_to(url_for('/index.php'));
}

if (is_post_request()) {

    $usuario = [];

    $usuario['password'] = isset($_POST['password']) ? utf8_encode($_POST['password']) : null;
    $usuario['level'] = isset($_POST['level']) ? utf8_encode($_POST['level']) : null;
    $usuario['username'] = isset($_POST['username']) ? $_POST['username'] : null;

    $usuario['password'] = password_hash($usuario['password'], PASSWORD_DEFAULT);

    $result = createUser($usuario);
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/usuario/list.php'));
} else {
    redirect_to(url_for('/'));
}
