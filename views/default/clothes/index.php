<?php

/** @var array $data from \App\Views\Base::render() */

use \App\Core\Config;

$router = \App\Core\App::getRouter();

?>
<div class="sections">
    <!-- <pre> -->
    <!-- <?php print_r($data['info'])?> -->

    <div class="title format text">
        <h1><?=$data['title']?></h1>
        <?=$data['text']?>
    </div>

    <div class="container">

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
                                <p>Размеры:
                                <?=$value['s'] ? 'S ' : ''?>
                                <?=$value['m'] ? 'M ' : ''?>
                                <?=$value['l'] ? 'L ' : ''?>
                                <?=$value['xl'] ? 'XL ' : ''?>
                                </p>
                                <p>Брэнд: <?=$value['brand']?></p>
                                <p>Цена: <?=$value['price']?></p>
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

            <?php if ($data['pagination']): ?>
            <nav>
                <ul class="pagination text">
                    <li class="<?=$data['pagination']['back'] ? '' : 'disabled'?>">
                        <a href="<?=$data['pagination']['back'] ? $router->buildUri('clothes.index', [1]) : ''?>">
                            <span>&laquo;</span>
                        </a>
                    </li>

                    <li class="<?=$data['pagination']['back'] ? '' : 'disabled'?>">
                        <a href="<?=$data['pagination']['back'] ? $router->buildUri('clothes.index', [$data['pagination']['back']]) : ''?>">Previous</a>
                    </li>

                    <?php foreach ($data['pagination']['middle'] as $key => $value): ?>
                    <li class="<?=$router->getParams()[1] == $key ? 'active' : ''?>">
                        <a href="<?=$router->buildUri('clothes.index', [$key])?>"><?=$key?></a>
                    </li>
                    <?php endforeach; ?>

                    <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                        <a href="<?=$data['pagination']['forward'] ? $router->buildUri('clothes.index', [$data['pagination']['forward']]) : ''?>">Next</a>
                    </li>

                    <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                        <a href="<?=$router->buildUri('clothes.index', [$data['pagination']['last']])?>" aria-label="Last">
                            <span>&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <?php endif; ?>
        </div>

        <div class="filter text">
            <form method="get" id="filter-clothes">
                <div class="sex">
                    <h4>Пол</h4>
                    <label>
                        <input type="radio" name="sex" value="m" class="option-input radio" <?=isset($data['get']['sex']) && $data['get']['sex'] == 'm' ? 'checked' : ''?> />Man
                    </label>
                    <label>
                        <input type="radio" name="sex" value="f" class="option-input radio" <?=isset($data['get']['sex']) && $data['get']['sex'] == 'f' ? 'checked' : ''?> />Female
                    </label>
                </div>

                <div class="price" id='myform'>
                    <h4>Цена</h4>
                    <label>
                        От <input type="number" id="min" value='<?=isset($data['get']['price']) ? $data['get']['price'][0] : ''?>' />
                    </label>
                    <label>
                        до <input type="number" id="max" value='<?=isset($data['get']['price']) ? $data['get']['price'][1] : ''?>' />
                    </label>
                    <div id="slider-range"></div>
                </div>
                <input id='price' type='hidden' name='price' />

                <div class="brands">
                    <h4>Брэнд</h4>
                    <?php foreach ($data['filter']['brand'] as $value): ?>
                    <label>
                        <input type="checkbox" value="<?=lcfirst($value['brand'])?>" class="option-input checkbox"
                        <?php
                        if (isset($data['get']['brand']) && array_search(lcfirst($value['brand']), $data['get']['brand']) !== false) {
                            echo "checked";
                        }
                        ?>
                        /><?=$value['brand']?>
                    </label>
                    <?php endforeach; ?>
                </div>
                <input id='brand' type='hidden' name='brand' />

                <div class="size">
                    <h4>Размер</h4>
                    <?php foreach ($data['filter']['size'] as $value): ?>
                    <label>
                        <input type="checkbox" value="<?=$value?>" class="option-input checkbox"
                        <?php
                        if (isset($data['get']['size']) && array_search($value, $data['get']['size']) !== false) {
                            echo "checked";
                        }
                        ?>
                        /><?=mb_strtoupper($value)?>
                    </label>
                    <?php endforeach; ?>
                </div>
                <input id='size' type='hidden' name='size' />

                <div class="bt">
                    <div>
                        <input type="submit" value="Фильтр" class="sm-buttons text" />
                    </div>
                    <div>
                        <a class="sm-buttons" href="<?=$router->buildUri('.clothes')?>">Сбросить</a>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <ul class="pagination text">
        <li><a href="#">«</a></li>
        <li><a href="#">1</a></li>
        <li class="active"><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">»</a></li>
    </ul>

</div>

<script type="text/javascript">

    $(document).ready(function() {

        $('.sm-buttons').hover(function(){
            $(this).find("span:last-child").show(15);
        }, function(){
            $(this).find("span:last-child").hide(15);
        });

    });
</script>

<script type="text/javascript" src="/js/filter-clothes.js"></script>
