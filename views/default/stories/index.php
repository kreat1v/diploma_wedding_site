<?php

use \App\Core\Config;

$router = \App\Core\App::getRouter();

?>

<div class="stories">

    <div class="title text">

        <?=__('stories.title')?>

    </div>

    <div class="components text">

        <?php foreach ($data['stories'] as $stories): ?>
        <a href="<?=$router->buildUri('stories.view', [$stories['id_stories']])?>" class="item">

            <?php
            $image = Config::get('storiesImgRoot') . $stories['id_stories'] . DS . $stories['galery'][0];
            $imageArr = getimagesize($image);
            if ($imageArr[0] < $imageArr[1]) {
                $imageClass = 'image-width';
            } else {
                $imageClass = 'image-height';
            }
            ?>

            <div class="image <?=$imageClass?>">
                <img src="<?=Config::get('storiesImg') . $stories['id_stories'] . DS . $stories['galery'][0]?>"/>
            </div>

            <h4>
                <?=$stories['title']?>
            </h4>

        </a>
        <?php endforeach; ?>

    </div>

    <!-- Пагинация для вывода историй. -->
    <?php if ($data['pagination']): ?>
    <nav>
        <ul class="pagination text">
            <li class="<?=$data['pagination']['back'] ? '' : 'disabled'?>">
                <a href="<?=$data['pagination']['back'] ? $router->buildUri('stories.index', [1]) : ''?>">
                    <span>&laquo;</span>
                </a>
            </li>

            <li class="<?=$data['pagination']['back'] ? '' : 'disabled'?>">
                <a href="<?=$data['pagination']['back'] ? $router->buildUri('stories.index', [$data['pagination']['back']]) : ''?>"><?=__('pagination.previous')?></a>
            </li>

            <?php foreach ($data['pagination']['middle'] as $key => $value): ?>
            <li class="<?=$data['page'] == $key ? 'active' : ''?>">
                <a href="<?=$router->buildUri('stories.index', [$key])?>"><?=$key?></a>
            </li>
            <?php endforeach; ?>

            <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                <a href="<?=$data['pagination']['forward'] ? $router->buildUri('stories.index', [$data['pagination']['forward']]) : ''?>"><?=__('pagination.next')?></a>
            </li>

            <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                <a href="<?=$router->buildUri('stories.index', [$data['pagination']['last']])?>">
                    <span>&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    <?php endif; ?>

</div>
