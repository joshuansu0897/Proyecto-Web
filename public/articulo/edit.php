<?php require_once('../../private/initialize.php');

if (!isLogin()) {
    redirect_to(url_for('/staff/index.php'));
}

if (!isset($_GET['ida'])) {
    redirect_to(url_for('/'));
}

$ida = $_GET['ida'];

if (is_post_request()) {

    $articulo = [];

    $articulo['id'] = $ida;

    $articulo['titulo'] = isset($_POST['titulo']) ? utf8_encode($_POST['titulo']) : null;
    $articulo['contenido'] = isset($_POST['contenido']) ? utf8_encode($_POST['contenido']) : null;
    $articulo['img'] = isset($_POST['img']) ? $_POST['img'] : null;

    $result = update_articulo($articulo);
    redirect_to(url_for('/articulo/show.php?ida=' . $ida . (isset($_GET['id']) ? "&id=" . $_GET['id'] : "")));
} else {
    $articulo = get_articulos_by_id($ida);
    if (getUserId() !== $articulo['idUsuario']){
        redirect_to(url_for('/articulo/show.php?ida=' . $ida . (isset($_GET['id']) ? "&id=" . $_GET['id'] : "")));
    }
}
?>

<?php include(SHARED_PATH . '/head.php'); ?>

<head>
    <!-- summernote -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js" defer></script>
</head>

<body>

    <?php include(SHARED_PATH . '/navbar.php'); ?>

    <main role="main">

        <div class="album py-5 bg-light">
            <div class="container">

                <a class="back-link" href="javascript:history.go(-1)">&laquo; Back</a>
                
                <form action="<?php echo url_for('/articulo/edit.php?ida=' . $ida . (isset($_GET['id']) ? "&id=" . $_GET['id'] : "")); ?>" method="post">
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input value="<?php echo utf8_decode($articulo['titulo']); ?>" type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo del Articulo" required="true">
                    </div>

                    <textarea name="contenido" class="form-group" id="contenido">
                    <?php echo utf8_decode($articulo['contenido']); ?>
                    </textarea>

                    <div class="form-group">
                        <label for="img">Imagen</label>
                        <input value="<?php echo utf8_decode($articulo['img']); ?>" type="url" class="form-control" id="img" name="img" placeholder="https://imagen.png">
                    </div>

                    <button type="submit" class="btn btn-primary">Publicar Articulo</button>
                </form>
            </div>
        </div>

    </main>

    <?php include(SHARED_PATH . '/footer.php'); ?>

    <script>
        $(document).ready(function() {
            $('#contenido').summernote({
                placeholder: 'Contenido Del Articulo...',
                height: 300
            });
        });
    </script>

</body> 