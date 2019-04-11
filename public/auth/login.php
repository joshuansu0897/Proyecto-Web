<?php

require_once('../../private/initialize.php');

$err = false;
if (is_post_request()) {

    $user = [];

    $user['username'] = isset($_POST['username']) ? $_POST['username'] : '';
    $user['password'] = isset($_POST['password']) ? $_POST['password'] : '';

    // para encripar el password
    //echo password_hash($user['password'], PASSWORD_DEFAULT);

    if (login($user)) {
        redirect_to(url_for('/index.php'));
    } else {
        $err = true;
    }
}
?>

<?php include(SHARED_PATH . '/head.php'); ?>

<body>

    <?php include(SHARED_PATH . '/navbar.php'); ?>

    <main role="main">

        <div class="album py-5 bg-light">
            <div class="col-md-6 mx-auto">
                <div class="card rounded-0">
                    <div class="card-header">
                        <h3 class="mb-0">Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo url_for('/auth/login.php'); ?>" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control form-control-lg rounded-0" id="username" name="username" required="true">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control form-control-lg rounded-0" name="password" required="true">
                            </div>
                            <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Login</button>
                        </form>
                    </div>
                </div>

                <?php
                if ($err) {
                    errLogin('invalid username or password.');
                }
                ?>

            </div>
        </div>

    </main>

    <?php include(SHARED_PATH . '/footer.php'); ?>

</body>