<?php // Представление админского контроллера по умолчанию - Index.

$router = \App\Core\App::getRouter();

?>
<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-8 col-12">
        <h2>Category management</h2>
    </div>
</div>

<div class="row my-margin-bottom">
    <div class="col-xl-6 col-lg-6 col-md-8 col-12 pt-3">
        <ul class="list-group">
            <?php foreach ($data as $category): ?>
                <li class="list-group-item">
                    <?=$category['category_name']?>
                    <?php if ($category['active'] == 1): ?>
                    <span class="badge badge-danger ml-2">moderation</span>
                    <?php endif; ?>
                    <a class="btn btn-sm btn-success" style="float: right" href="<?=$router->buildUri('edit', [$category['id']])?>">Edit</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
