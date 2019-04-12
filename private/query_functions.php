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
        $sql = "SELECT id, titulo, updateAt, img, idUsuario FROM Articulo";
    } else {
        $sql = "SELECT id, titulo, updateAt, img, idUsuario FROM Articulo  WHERE idCategoria='" . $idCategoria . "'";
    }

    $result = mysqli_query($db, $sql);

    confirm_result_set($result);

    return $result;
}

function get_articulos_by_id($id)
{
    global $db;

    $sql = "SELECT titulo, contenido, updateAt, idCategoria, img, idUsuario FROM Articulo WHERE id='" . $id . "'";

    $result = mysqli_query($db, $sql);

    $articulo = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    return $articulo;
}

function insert_articulo($articulo)
{
    global $db;

    $sql = "INSERT INTO Articulo ";
    $sql .= "(titulo, contenido, idCategoria, img, idUsuario) ";
    $sql .= "VALUES (";
    $sql .= "'" . $articulo['titulo'] . "', ";
    $sql .= "'" . $articulo['contenido'] . "', ";
    $sql .= "'" . $articulo['idCategoria'] . "', ";
    $sql .= "'" . $articulo['img'] . "', ";
    $sql .= "'" . $articulo['idUsuario'] . "'";
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

function login($user)
{
    global $db;

    $sql = "SELECT id, password, level FROM Usuario ";
    $sql .= "WHERE username='" . $user['username'] . "'";

    $result = mysqli_query($db, $sql);

    $usr = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    if (password_verify($user['password'], $usr['password'])) {

        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $usr['id'];
        $_SESSION["level"] = $usr['level'];

        return true;
    } else {
        logout();
        return false;
    }
}

function logout()
{
    session_destroy();
}

function createUser($user)
{
    global $db;

    $sql = "INSERT INTO Usuario ";
    $sql .= "(username, password, level) ";
    $sql .= "VALUES (";
    $sql .= "'" . $user['username'] . "', ";
    $sql .= "'" . $user['password'] . "', ";
    $sql .= "'" . $user['level'] . "'";
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

function update_user($user)
{
    global $db;
    $sql = "UPDATE Usuario SET ";
    $sql .= "username='" . $user['username'] . "', ";
    $sql .= "password='" . $user['password'] . "', ";
    $sql .= "level='" . $user['level'] . "' ";
    $sql .= "WHERE id='" . $user['id'] . "' ";
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

function get_all_usuarios()
{
    global $db;

    $sql = "SELECT id, username, level FROM Usuario";

    $result = mysqli_query($db, $sql);

    confirm_result_set($result);

    return $result;
}

function get_usuario_by_id($id)
{
    global $db;

    $sql = "SELECT id, username, password, level FROM Usuario WHERE id='" . $id . "'";

    $result = mysqli_query($db, $sql);

    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    return $user;
}