<?php require_once('../../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/head.php'); ?>

<?php
$id = isset($_GET['id']) ? $_GET['id'] : '1';
$articulos = get_all_articulos($id);
?>

<body>

    <?php include(SHARED_PATH . '/navbar.php'); ?>

    <main role="main">

        <div class="album py-5 bg-light">

            <div class="container">

                <?php
                if (isLogin()) {
                    echo '
                    <form action="' . url_for('/articulo/new.php?id=' . $id) . '" method="post">
                        <button type="submit" class="btn btn-primary">Crear Articulo</button>
                    </form>
                    ';
                }
                ?>

                <?php include(SHARED_PATH . '/showdata.php'); ?>

            </div>
        </div>

    </main>

    <?php include(SHARED_PATH . '/footer.php'); ?>

</body>