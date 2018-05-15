<?php

/** @var array $data from \App\Views\Base::render() */

use \App\Core\Config;

$router = \App\Core\App::getRouter();
?>
<div class="sections">
    <!-- <pre> -->
    <!-- <?php print_r($data['info'])?> -->
    <!-- <?php print_r($data['galery'])?> -->

    <div class="info">

        <?php foreach ($data['info'] as $value): ?>
        <div class="gradient-border ">

            <div class="goods">

                <div class="blur">
                    <img src="<?=\App\Core\Config::get('imgDir_clothes') . $value['img_dir'] . DS . $value['galery'][0]?>"/>
                </div>

                <h3 class="text"><?=$value['title']?></h3>

                <div class="top">

                    <div class="card">

                        <div class="image">
                            <img src="<?=\App\Core\Config::get('imgDir_clothes') . $value['img_dir'] . DS . $value['galery'][0]?>"/>
                        </div>

                        <div class="details text">

                            <div class="center">
                                <h5>Контакты</h5>
                                <p><?=$value['contacts']?></p>
                                <a href="tel: <?=$value['tel']?>"><i class="fas fa-phone"></i> <?=$value['tel']?></a>
                                <span></span>
                                <ul>
                                    <?php if (isset($value['fb'])): ?>
                                    <li><a href="<?='https://www.'.$value['fb']?>"><i class="fab fa-facebook-square"></i></a></li>
                                    <?php endif; ?>
                                    <?php if (isset($value['inst'])): ?>
                                    <li><a href="<?='https://www.'.$value['inst']?>"><i class="fab fa-instagram"></i></a></li>
                                    <?php endif; ?>
                                    <?php if (isset($value['telegram'])): ?>
                                    <li><a href="<?='https://www.'.$value['telegram']?>"><i class="fab fa-telegram-plane"></i></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>

                        </div>

                    </div>

                    <div class="body text">

                        <div class="main-text">
                            <p><?=$value['text']?></p>
                        </div>

                        <div class="bt">
                            <a href="#" class="sm-buttons">
                                <span><i class="fas fa-shopping-cart fa-lg"></i></span>
                                <span>В корзину</span>
                            </a>
                            <a href="#" class="sm-buttons">
                                <span><i class="fas fa-heart fa-lg"></i></span>
                                <span>В избранное</span>
                            </a>
                            <a href="#" class="sm-buttons">
                                <span><i class="fas fa-comments fa-lg"></i></span>
                                <span>Обсуждение</span>
                            </a>
                        </div>

                    </div>

                </div>

                <div class="galery">
                    <div class="panels">
                        <?php foreach ($value['galery'] as $img): ?>
                        <a href="javascript:void(0)" class="panel">
                            <div class="panel__content" style="background-image: url('<?=\App\Core\Config::get('imgDir_clothes_web') . $value['img_dir'] . '/' . $img?>');"></div>
                        </a>
                        <?php endforeach; ?>
                    </div>
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

<script type="text/javascript">
    $(document).ready(function() {

        $('.sm-buttons').hover(function(){
            $(this).find("span:last-child").show();
        }, function(){
            $(this).find("span:last-child").hide();
        });

    });

    // функция - показывающая сколько пикселей div видно на экране
    // function inViewport($el) {
    //     var elH = $el.outerHeight(),
    //         H   = $(window).height(),
    //         r   = $el[0].getBoundingClientRect(),
    //         t   = r.top,
    //         b   = r.bottom;
    //     return Math.max(0, t > 0 ? Math.min(elH, H - t) : (b < H ? b : H));
    // }
    //
    // $(window).on("scroll resize", function(){
    //     console.log( inViewport($('#elementID')) ); // n px in viewport
    // });

</script>

<script type="text/javascript" src="/js/filter-clothes.js"></script>
