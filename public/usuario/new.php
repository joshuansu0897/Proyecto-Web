<?php require_once('../../private/initialize.php');

if (!isLogin() && !isRoot()) {
    redirect_to(url_for('/index.php'));
}

?>

<?php include(SHARED_PATH . '/head.php'); ?>

<body>

    <?php include(SHARED_PATH . '/navbar.php'); ?>

    <main role="main">

        <div class="album py-5 bg-light">
            <div class="container">

                <form action="<?php echo url_for('/usuario/create.php'); ?>" method="post" oninput='passwordConfirm.setCustomValidity(passwordConfirm.value != password.value ? "Passwords do not match." : "")'>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required="true">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required="true">
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="passwordConfirm" required="true">
                    </div>

                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="level">
                            <option value="1">Creator</option>
                            <option value="2">Root</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Crear Usuario</button>
                </form>
            </div>
        </div>

    </main>

    <?php include(SHARED_PATH . '/footer.php'); ?>

</body>