<?php require_once('../../private/initialize.php');

if (!isset($_GET['ida'])) {
    indexOrBack();
}

$ida = isset($_GET['ida']) ? $_GET['ida'] : '-1';
$articulo = get_articulos_by_id($ida);

if ($articulo['idUsuario'] !== getUserId() && !isRoot()) {
    indexOrBack();
}

$res = delete_articulo($ida);
indexOrBack();
