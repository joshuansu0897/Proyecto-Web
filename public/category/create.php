<?php

require_once('../../private/initialize.php');

if (is_post_request()) {

    $category = [];

    $category['nombre'] = isset($_POST['nombre']) ? $_POST['nombre'] : '';

    $result = insert_category($category);
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/category/show.php?id=' . $new_id));
} else {
    redirect_to(url_for('/category/new.php'));
}
