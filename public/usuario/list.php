<?php require_once('../../private/initialize.php');

if (isLogin() && isRoot()) {
    redirect_to(url_for('/staff/index.php'));
}

?>

<?php include(SHARED_PATH . '/head.php'); ?>

<?php
$usuarios = get_all_usuarios();
?>

<body>

    <?php include(SHARED_PATH . '/navbar.php'); ?>

    <main role="main">

        <div class="album py-5 bg-light">

            <div class="container">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Username</th>
                            <th scope="col">id</th>
                            <th scope="col">level</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuario) { ?>
                            <tr>
                                <th scope="row"><?php echo h($usuario['username']); ?></th>
                                <td><?php echo h($usuario['id']); ?></td>
                                <td><?php echo h($usuario['level']); ?></td>
                                <td><a a class="action" href="<?php echo url_for('/usuarios/edit.php?id=' . h(u($usuario['id']))); ?>">Edit</a></td>
                                <td><a a class="action" href="<?php echo url_for('/usuarios/delete.php?id=' . h(u($usuario['id']))); ?>">Delete</a></td>
                            </tr>
                        <?php
                    } ?>
                    </tbody>
                </table>

            </div>
        </div>

    </main>

    <?php include(SHARED_PATH . '/footer.php'); ?>

</body>