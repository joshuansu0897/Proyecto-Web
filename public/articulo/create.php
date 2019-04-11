<?php

require_once('../../private/initialize.php');

if (!isLogin()) {
    redirect_to(url_for('/staff/index.php'));
}

if (is_post_request()) {

    $articulo = [];

    $articulo['idCategoria'] = $_GET['id'];
    $articulo['titulo'] = isset($_POST['titulo']) ? utf8_encode($_POST['titulo']) : null;
    $articulo['contenido'] = isset($_POST['contenido']) ? utf8_encode($_POST['contenido']) : null;
    $articulo['img'] = isset($_POST['img']) ? $_POST['img'] : null;

    $result = insert_articulo($articulo);
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/articulo/show.php?ida=' . $new_id . "&id=" . $_GET['id']));
} else {
    redirect_to(url_for('/'));
}
