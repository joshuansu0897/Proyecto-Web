<?php
$subjects = find_navbar_content();
$id = isset($_GET['id']) ? $_GET['id'] : 0;
?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <a href="<?php echo url_for('/'); ?>" class="navbar-brand d-flex align-items-center">
        <img src="<?php echo url_for('/img/celula1.svg'); ?>" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
        <strong>CienciasPro</strong>
    </a>
    <ul class="navbar-nav">
        <?php foreach ($subjects as $subject) { ?>
            <li class="nav-item">
                <a class="nav-link <?php if ($id == $subject['id']) echo "active" ?>" href="<?php echo url_for('/category/show.php?id=' . h(u($subject['id']))); ?>"><?php echo strtoupper($subject['nombre']) ?></a>
            </li>
        <?php
    } ?>
        <?php
        if (isLogin() && isRoot()) {
            echo '<li class="nav-item">
            <a class="nav-link" href="' . url_for('/category/new.php') . '"><strong>+</strong></a>
        </li>';
        }
        ?>
    </ul>
    <ul class="navbar-nav ml-auto">
        <?php
        if (!isLogin()) {
            echo '<li class="nav-item">
            <a class="nav-link" href="' . url_for('/auth/login.php') . '">Iniciar sesión</a>
        </li>';
        }

        if (isLogin() && isRoot()) {
            echo '<li class="nav-item">
            <a class="nav-link" href="' . url_for('/usuario/list.php') . '">Usuarios</a>
        </li>';
        }

        if (isLogin()) {
            echo '<li class="nav-item">
            <a class="nav-link" href="' . url_for('/auth/logout.php') . '">Cerrar sesión</a>
        </li>';
        }
        ?>
    </ul>
</nav>