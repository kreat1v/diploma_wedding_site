<?php

$router = \App\Core\App::getRouter();

?>
<div class="sections map text link">
    <div class="title">
        <h2><?=__('bar-menu.title')?></h2>
    </div>

    <div class="map-block">
        <ul>

            <li>
                <a href="<?=$router->buildUri('.about')?>"><?=__('bar-menu.about')?></a>
            </li>
            <li>
                <a href="<?=$router->buildUri('.contacts')?>"><?=__('bar-menu.contacts')?></a>
            </li>

            <br>

            <li>
                <a href="<?=$router->buildUri('.stories')?>"><?=__('bar-menu.stories')?></a>
            </li>

            <br>

            <li>
                <a href="<?=$router->buildUri('.user')?>"><?=__('bar-menu.user')?></a>
            </li>
            <li>
                <a href="<?=$router->buildUri('.cart')?>"><?=__('bar-menu.cart')?></a>
            </li>

        </ul>
    </div>

    <div class="map-block">
        <ul>
            <?php foreach ($data as $value): ?>
                <?php $category = $value['category_name'] ?>
                <li>
                    <a href="<?=$router->buildUri(".$category")?>"><?=$value['title']?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
