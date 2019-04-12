<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/head.php'); ?>

<?php
$articulos = get_all_articulos(0);
?>

<body>

    <?php include(SHARED_PATH . '/navbar.php'); ?>

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">CienciasPro</h1>
                <p class="lead text-muted">Es una pagina para un proyecto escolar.</p>
            </div>
        </section>

        <div class="album py-5 bg-light">

            <div class="container">

                <?php include(SHARED_PATH . '/showdata.php'); ?>

            </div>
        </div>

    </main>

    <?php include(SHARED_PATH . '/footer.php'); ?>

</body> 