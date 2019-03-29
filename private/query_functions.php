<?php

function find_navbar_content()
{
    global $db;

    $sql = "SELECT id, nombre FROM Categoria";

    $result = mysqli_query($db, $sql);

    confirm_result_set($result);

    return $result;
}

function insert_category($category)
{
    global $db;

    $sql = "INSERT INTO Categoria ";
    $sql .= "(nombre) ";
    $sql .= "VALUES (";
    $sql .= "'" . $category['nombre'] . "'";
    $sql .= ")";

    $res = mysqli_query($db, $sql);

    if ($res) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function get_all_articulos($idCategoria)
{
    global $db;

    $sql = '';
    if ($idCategoria == 0) {
        $sql = "SELECT id, titulo, updateAt, img FROM Articulo";
    } else {
        $sql = "SELECT id, titulo, updateAt, img FROM Articulo  WHERE idCategoria='" . $idCategoria . "'";
    }

    $result = mysqli_query($db, $sql);

    confirm_result_set($result);

    return $result;
}

function get_articulos_by_id($id)
{
    global $db;

    $sql = "SELECT titulo, contenido, updateAt, idCategoria, img FROM Articulo WHERE id='" . $id . "'";

    $result = mysqli_query($db, $sql);

    $articulo = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    return $articulo;
}

function insert_articulo($articulo)
{
    global $db;

    $sql = "INSERT INTO Articulo ";
    $sql .= "(titulo, contenido, idCategoria, img) ";
    $sql .= "VALUES (";
    $sql .= "'" . $articulo['titulo'] . "', ";
    $sql .= "'" . $articulo['contenido'] . "', ";
    $sql .= "'" . $articulo['idCategoria'] . "', ";
    $sql .= "'" . $articulo['img'] . "'";
    $sql .= ")";

    $res = mysqli_query($db, $sql);

    if ($res) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function update_articulo($articulo)
{
    global $db;
    $sql = "UPDATE Articulo SET ";
    $sql .= "titulo='" . $articulo['titulo'] . "', ";
    $sql .= "contenido='" . $articulo['contenido'] . "', ";
    $sql .= "img='" . $articulo['img'] . "' ";
    $sql .= "WHERE id='" . $articulo['id'] . "' ";
    $sql .= "LIMIT 1 ";

    $res = mysqli_query($db, $sql);

    if ($res) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}
