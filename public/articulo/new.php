<?php require_once('../../private/initialize.php');

if (!isLogin()) {
    redirect_to(url_for('/index.php'));
}

if (!isset($_GET['id'])) {
    redirect_to(url_for('/'));
}

$id = $_GET['id'];

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

                <form action="<?php echo url_for('/articulo/create.php?id=' . $id); ?>" method="post">
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo del Articulo" required="true">
                    </div>

                    <div class="form-group">
                        <textarea name="contenido" class="form-group" id="contenido"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="img">Imagen</label>
                        <input type="url" class="form-control" id="img" name="img" placeholder="https://imagen.png">
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