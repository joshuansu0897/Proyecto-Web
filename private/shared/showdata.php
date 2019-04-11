<div class="row">
    <?php foreach ($articulos as $articulo) { ?>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="<?php echo isset($articulo['img']) && $articulo['img'] != "" ? $articulo['img'] : "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22208%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20208%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1695dffea54%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A11pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1695dffea54%22%3E%3Crect%20width%3D%22208%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2265.9921875%22%20y%3D%22117.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" ?>" data-holder-rendered="true">
                <div class="card-body">
                    <p class="card-text"><?php echo utf8_decode($articulo['titulo']); ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="<?php echo url_for("/articulo/show.php?ida=" . $articulo['id'] . (isset($id) ? "&id=" . $id : "")); ?>" class="btn btn-sm btn-outline-secondary" role="button">View</a>
                            <?php
                            if ($articulo['id'] === getUserId()) {
                                echo '
                        <a href="' . url_for("/articulo/edit.php?ida=" . $articulo['id'] . (isset($id) ? "&id=" . $id : "")) . '" class="btn btn-sm btn-outline-secondary" role="button">Edit</a>';
                            } ?>
                        </div>
                        <small class="text-muted">
                            <?php
                            $date1 = new DateTime($articulo['updateAt']);
                            $date2 = $date1->diff(new DateTime());
                            if ($date2->y > 0) {
                                echo $date2->y . ' years';
                            } else if ($date2->m > 0) {
                                echo $date2->m . ' months';
                            } else if ($date2->d > 0) {
                                echo $date2->d . ' days';
                            } else if ($date2->h > 0) {
                                echo $date2->h . ' hours';
                            } else if ($date2->i > 0) {
                                echo $date2->i . ' minutes';
                            } else if ($date2->s > 0) {
                                echo $date2->s . ' seconds';
                            }
                            ?>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    <?php
} ?>
</div>