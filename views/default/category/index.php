<?php

/** @var array $data from \App\Views\Base::render() */

use \App\Core\Config;

$router = \App\Core\App::getRouter();
?>

<div class="main">
    <div class="gradient-border">
        <div class="main-cover">
            <?=__('category.quote')?>
        </div>
    </div>
</div>

<div class="progress-bar format text">
    <h1><?=__('category.title')?></h1>
    <?=__('category.text')?>

    <?php foreach ($data as $key => $value): ?>
    <h2 class='progressbar-header'><?=$value['title']?></h2>
    <?=$value['first_text']?>
    <div class="buttons">
        <a href="<?=$router->buildUri('.' . $value['category_name'])?>">
            <span><?=__('category.button')?></span>
        </a>
    </div>
    <?php endforeach; ?>
</div>

<script type="text/javascript" src="/js/main-cover.js"></script>
<script type="text/javascript" src="/js/progress-bar.js"></script>
