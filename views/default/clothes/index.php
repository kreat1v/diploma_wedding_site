<?php

/** @var array $data from \App\Views\Base::render() */

use \App\Core\Config;

$router = \App\Core\App::getRouter();
?>
<div class="sections">
    <!-- <?php print_r($data['info'])?> -->

    <div class="info">
        <?php foreach ($data['info'] as $value): ?>
        <div class="gradient-border ">
            <div class="goods">
                <div class="card">

                </div>
                <?=$value['title']?>
                <div class="text">

                </div>
                <div class="buttons">

                </div>
                <div class="galery">

                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="filter">
        <form class="" method="get" id="filter-clothes">
            <div class="">
                <label>
                    <input type="radio" name="sex" value="m" <?=isset($data['get']['sex']) && $data['get']['sex'] == 'm' ? 'checked' : ''?> />Man
                </label>
                <br>
                <label>
                    <input type="radio" name="sex" value="f" <?=isset($data['get']['sex']) && $data['get']['sex'] == 'f' ? 'checked' : ''?> />Female
                </label>
                <br>
                <hr>
            </div>

            <div class="price" id='myform'>
                <label for="amount">Price range:</label>
                <input type="number" id="min" value='<?=isset($data['get']['price']) ? $data['get']['price'][0] : ''?>' />
                <input type="number" id="max" value='<?=isset($data['get']['price']) ? $data['get']['price'][1] : ''?>' />
                <div id="slider-range"></div>
            </div>
            <input id='price' type='hidden' name='price' />
            <hr>

            <div class="brands">
                <?php foreach ($data['filter']['brand'] as $value): ?>
                <label>
                    <input type="checkbox" value="<?=lcfirst($value['brand'])?>"
                    <?php
                    if (isset($data['get']['brand']) && array_search(lcfirst($value['brand']), $data['get']['brand']) !== false) {
                        echo "checked";
                    }
                    ?>
                    /><?=$value['brand']?>
                </label>
                <br>
                <?php endforeach; ?>
            </div>
            <input id='brand' type='hidden' name='brand' />
            <hr>

            <div class="size">
                <?php foreach ($data['filter']['size'] as $value): ?>
                <label>
                    <input type="checkbox" value="<?=$value?>"
                    <?php
                    if (isset($data['get']['size']) && array_search($value, $data['get']['size']) !== false) {
                        echo "checked";
                    }
                    ?>
                    /><?=mb_strtoupper($value)?>
                </label>
                <br>
                <?php endforeach; ?>
            </div>
            <input id='size' type='hidden' name='size' />
            <hr>

            <input type="submit" value="GO">
            <div id="reset">
                <a href="<?=$router->buildUri('.clothes')?>">Reset</a>
            </div>
        </form>
    </div>

</div>

<script type="text/javascript" src="/js/filter-clothes.js"></script>
