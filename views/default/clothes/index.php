<?php

/** @var array $data from \App\Views\Base::render() */

use \App\Core\Config;

$router = \App\Core\App::getRouter();
$filter =  !empty($router->getQuery()) ? '?' . $router->getQuery() : '';

?>
<div class="sections">

    <div class="format text">
        <h1><?=$data['title']?></h1>
        <?=$data['text']?>
    </div>

    <div class="container">

        <div class="product">

            <?php if (!empty($data['product'])):
                foreach ($data['product'] as $value): ?>
                <div class="gradient-border">

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
                                        <h5><?=__('products.contacts')?></h5>
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
                                    <p><?=__('products.size')?>:
                                    <?=$value['s'] ? 'S ' : ''?>
                                    <?=$value['m'] ? 'M ' : ''?>
                                    <?=$value['l'] ? 'L ' : ''?>
                                    <?=$value['xl'] ? 'XL ' : ''?>
                                    </p>
                                    <p><?=__('products.brand')?>: <?=$value['brand']?></p>
                                    <p><?=__('products.price')?>: <?=$value['price']?></p>
                                </div>

                                <div class="bt">
                                    <a href="#" class="sm-buttons">
                                        <span><i class="fas fa-shopping-cart fa-lg"></i></span>
                                        <span><?=__('products.basket')?></span>
                                    </a>
                                    <a href="#" class="sm-buttons">
                                        <span><i class="fas fa-heart fa-lg"></i></span>
                                        <span><?=__('products.favorites')?></span>
                                    </a>
                                    <a href="#" class="sm-buttons">
                                        <span><i class="fas fa-comments fa-lg"></i></span>
                                        <span><?=__('products.reviews')?></span>
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
                            <a href="<?=$data['pagination']['back'] ? $router->buildUri('clothes.index', [1]).$filter : ''?>">
                                <span>&laquo;</span>
                            </a>
                        </li>

                        <li class="<?=$data['pagination']['back'] ? '' : 'disabled'?>">
                            <a href="<?=$data['pagination']['back'] ? $router->buildUri('clothes.index', [$data['pagination']['back']]).$filter : ''?>"><?=__('pagination.previous')?></a>
                        </li>

                        <?php foreach ($data['pagination']['middle'] as $key => $value): ?>
                        <li class="<?=$data['page'] == $key ? 'active' : ''?>">
                            <a href="<?=$router->buildUri('clothes.index', [$key]).$filter?>"><?=$key?></a>
                        </li>
                        <?php endforeach; ?>

                        <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                            <a href="<?=$data['pagination']['forward'] ? $router->buildUri('clothes.index', [$data['pagination']['forward']]).$filter : ''?>"><?=__('pagination.next')?></a>
                        </li>

                        <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                            <a href="<?=$router->buildUri('clothes.index', [$data['pagination']['last']]).$filter?>">
                                <span>&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <?php endif;
            else: ?>
            <div class="format text">
                <p><?=__('products.not_found')?></p>
            </div>
        <?php endif; ?>
        </div>

        <div class="filter text">
            <form method="get" id="filter-clothes">
                <div class="sex">
                    <h4><?=__('filter.sex')?></h4>
                    <label>
                        <input type="radio" name="sex" value="m" class="option-input radio" <?=isset($data['get']['sex']) && $data['get']['sex'] == 'm' ? 'checked' : ''?> /><?=__('filter.m')?>
                    </label>
                    <label>
                        <input type="radio" name="sex" value="f" class="option-input radio" <?=isset($data['get']['sex']) && $data['get']['sex'] == 'f' ? 'checked' : ''?> /><?=__('filter.f')?>
                    </label>
                </div>

                <div class="price" id='myform'>
                    <h4><?=__('filter.price')?></h4>
                    <label>
                        <?=__('filter.from')?> <input type="number" id="min" value='<?=isset($data['get']['price']) ? $data['get']['price'][0] : ''?>' />
                    </label>
                    <label>
                        <?=__('filter.to')?> <input type="number" id="max" value='<?=isset($data['get']['price']) ? $data['get']['price'][1] : ''?>' />
                    </label>
                    <div id="slider-range"></div>
                </div>
                <input id='price' type='hidden' name='price' />

                <div class="brands">
                    <h4><?=__('filter.brand')?></h4>
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
                    <h4><?=__('filter.size')?></h4>
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
                        <input type="submit" value="<?=__('filter.filter')?>" class="sm-buttons text" />
                    </div>
                    <div>
                        <a class="sm-buttons" href="<?=$router->buildUri('.clothes')?>"><?=__('filter.reset')?></a>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>

<script type="text/javascript" src="/js/buttons.js"></script>
<script type="text/javascript" src="/js/filter-clothes.js"></script>
