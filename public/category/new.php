<?php
require_once('../../private/initialize.php');

if (!isLogin() && isRoot()) {
    redirect_to(url_for('/index.php'));
}
?>

<?php include(SHARED_PATH . '/head.php'); ?>

<body>

    <?php include(SHARED_PATH . '/navbar.php'); ?>

    <main role="main">

        <div class="album py-5 bg-light">
            <div class="container">

                <form action="<?php echo url_for('/category/create.php'); ?>" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre Categoria</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required="true">
                    </div>
                    <button type="submit" class="btn btn-primary">Crear Categoria</button>
                </form>
            </div>
        </div>

    </main>

    <?php include(SHARED_PATH . '/footer.php'); ?>

</body>