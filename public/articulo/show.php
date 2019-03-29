<?php require_once('../../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/head.php'); ?>

<?php
$ida = isset($_GET['ida']) ? $_GET['ida'] : '0';
$articulo = get_articulos_by_id($ida);
?>

<body>

    <?php include(SHARED_PATH . '/navbar.php'); ?>

    <main role="main">

        <div class="album py-5 bg-light">

            <div class="container">

                <a class="back-link" href="javascript:history.go(-1)">&laquo; Back</a>

                <h1><?php echo utf8_decode($articulo['titulo']); ?></h1>

                <?php 
                if (isset($articulo['img']) && $articulo['img'] != "") {
                    echo ("<img class=\"rounded mx-auto d-block\" data-src=\"holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail\" alt=\"Thumbnail [100%x225]\" style=\"height: 450px; width: 85%; display: block;\" src=\"" . $articulo['img'] . "\" data-holder-rendered=\"true\">");
                }
                ?>

                <div class="container">
                    <?php echo utf8_decode($articulo['contenido']); ?>
                </div>

                <div>
                    <small class="text-muted">Last Update: <?php 
                                                            $date1 = new DateTime($articulo['updateAt']);
                                                            echo $date1->format('F j, Y, g:i a T');
                                                            ?></small>
                </div>

            </div>
        </div>

    </main>

    <?php include(SHARED_PATH . '/footer.php'); ?>

</body> 