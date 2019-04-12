<?php require_once('../../private/initialize.php');

if (!isLogin() && !isRoot()) {
    redirect_to(url_for('/index.php'));
}

if (!isset($_GET['idu'])) {
    redirect_to(url_for('/usuario/list.php'));
}

$idu = $_GET['idu'];

$user = get_usuario_by_id($idu);

$err = false;
if (is_post_request()) {

    $usuario = [];

    $usuario['id'] = $idu;

    $usuario['password'] = isset($_POST['password']) ? utf8_encode($_POST['password']) : $user['password'];
    $usuario['level'] = isset($_POST['level']) ? utf8_encode($_POST['level']) : $user['level'];
    $usuario['username'] = isset($_POST['username']) ? $_POST['username'] : $user['username'];

    if (isset($_POST['password'])) {
        $usuario['password'] = password_hash($usuario['password'], PASSWORD_DEFAULT);
    }

    if (password_verify($_POST['passwordOld'], $user['password'])) {
        $result = update_user($usuario);
        redirect_to(url_for('/usuario/list.php'));
    }
    $err = true;
}
?>

<?php include(SHARED_PATH . '/head.php'); ?>

<body>

    <?php include(SHARED_PATH . '/navbar.php'); ?>

    <main role="main">

        <div class="album py-5 bg-light">
            <div class="container">

                <form action="<?php echo url_for('/usuario/edit.php?idu=' . $idu); ?>" method="POST" oninput='passwordConfirm.setCustomValidity(passwordConfirm.value != password.value ? "Passwords do not match." : "")'>

                    <?php
                    if ($err) {
                        err('invalid password.');
                    }
                    ?>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" value="<?php echo utf8_decode($user['username']); ?>" name="username" required="true">
                    </div>

                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="password" required="true">
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="passwordConfirm" required="true">
                    </div>

                    <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" class="form-control" name="passwordOld" required="true">
                    </div>

                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="level">
                            <option value="1" <?php echo $user['level'] == 1 ? 'selected' : '' ?>>Creator</option>
                            <option value="2" <?php echo $user['level'] == 2 ? 'selected' : '' ?>>Root</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Editar Usuario</button>
                </form>
            </div>
        </div>

    </main>

    <?php include(SHARED_PATH . '/footer.php'); ?>

</body>