<?php

use \App\Core\Config;
use \App\Core\Session;

// Получаем роутер.
$router = \App\Core\App::getRouter();

// Получаем get-запрос.
$filter =  !empty($router->getQuery()) ? '?' . $router->getQuery() : '';

?>
<div class="sections">

    <!-- Заголовок и сопроводительный текст. -->
    <div class="format text">
        <h1><?=$data['title']?></h1>
        <?=$data['text']?>
    </div>

    <div class="container">

        <div class="product">

            <!-- Проходим циклом по массиву $data['product'] и обрабатываем данные. -->
            <?php if (!empty($data['product'])):
                foreach ($data['product'] as $value): ?>
                <div class="gradient-border">

                    <?php if (isset($value['stock'])): ?>
                    <div class="ribbon text"><span><?=__('products.stock')?></span></div>
                    <?php endif; ?>

                    <div class="goods">

                        <!-- Получаем информацию об изображении. Добавляем соответствующие классы, в зависимости от размера изображения. -->
                        <?php
                        $image = Config::get('clothesImgRoot') . $value['id_clothes'] . DS . $value['galery'][0];
                        $imageArr = getimagesize($image);
                        if ($imageArr[0] < $imageArr[1]) {
                            $imageClass = 'image-width';
                            $blurClass = 'blur-width';
                        } else {
                            $imageClass = 'image-height';
                            $blurClass = 'blur-height';
                        }
                        ?>

                        <!-- Размытый фон карточки товара. -->
                        <div class="blur <?=$blurClass?>">
                            <img src="<?=Config::get('clothesImg') . $value['id_clothes'] . DS . $value['galery'][0]?>"/>
                        </div>

                        <!-- Заголовок -->
                        <h3 class="text"><?=$value['title']?></h3>

                        <div class="top">

                            <!-- Контакты товара и фото. -->
                            <div class="card">

                                <div class="image <?=$imageClass?>">
                                    <img src="<?=Config::get('clothesImg') . $value['id_clothes'] . DS . $value['galery'][0]?>"/>
                                </div>

                                <div class="details text">

                                    <div class="center">
                                        <h5><?=__('products.contacts')?></h5>
                                        <p><?=$value['contacts']?></p>
                                        <a href="tel: <?=$value['tel']?>"><i class="fas fa-phone"></i> <?=$value['tel']?></a>
                                        <span></span>
                                        <ul>
                                            <?php if (isset($value['fb'])): ?>
                                            <li><a href="<?='https://www.facebook.com/'.$value['fb']?>"><i class="fab fa-facebook-square"></i></a></li>
                                            <?php endif; ?>
                                            <?php if (isset($value['inst'])): ?>
                                            <li><a href="<?='https://www.instagram.com/'.$value['inst']?>"><i class="fab fa-instagram"></i></a></li>
                                            <?php endif; ?>
                                            <?php if (isset($value['telegram'])): ?>
                                            <li><a href="<?='https://www.telegram.me/'.$value['telegram']?>"><i class="fab fa-telegram-plane"></i></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>

                                </div>

                            </div>

                            <!-- Описание товара и параметры. -->
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
                                    <p>
                                        <span>
                                            <?=__('products.price')?>:
                                        </span>
                                        <span class="<?=isset($value['stock']) ? 'old-price' : ''?>">
                                            <?=$value['price']?>
                                        </span>
                                        <?php if (isset($value['stock'])): ?>
                                        <span>
                                            <?=$value['stock']?>
                                        </span>
                                        <?php endif; ?>
                                    </p>
                                </div>

                                <div class="main-contacts">
                                    <span>
                                        <?=__('products.contacts')?>:
                                    </span>
                                    <p><?=$value['contacts']?></p>
                                    <ul class="link">
                                        <li><a href="tel: <?=$value['tel']?>"><i class="fas fa-phone"></i> <?=$value['tel']?></a></li>
                                        <?php if (isset($value['fb'])): ?>
                                        <li><a href="<?='https://www.facebook.com/'.$value['fb']?>"><i class="fab fa-facebook-square"></i> Facebook</a></li>
                                        <?php endif; ?>
                                        <?php if (isset($value['inst'])): ?>
                                        <li><a href="<?='https://www.instagram.com/'.$value['inst']?>"><i class="fab fa-instagram"></i> Instagram</a></li>
                                        <?php endif; ?>
                                        <?php if (isset($value['telegram'])): ?>
                                        <li><a href="<?='https://www.telegram.me/'.$value['telegram']?>"><i class="fab fa-telegram-plane"></i> Telegram</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>

                            </div>

                        </div>

                        <!-- Кнопки действий. -->
                        <div class="bt">
                            <?php if(Session::get('id') && Session::get('role') == 'user'): ?>
                                <?php if(empty(Session::get('cart')['clothes'])): ?>
                                <form method="post">
                                    <input class="id_products" type="hidden" name="id_products" value="<?=$value['id_clothes']?>">
                                    <input class="category" type="hidden" name="category" value="<?=lcfirst($router->getController(true))?>">
                                    <button class="sm-buttons text cart-bt" type="button">
                                        <span><i class="fas fa-shopping-cart fa-lg"></i></span>
                                        <span><?=__('products.basket')?></span>
                                    </button>
                                </form>
                                <?php endif; ?>
                                <?php if(!in_array($value['id_clothes'] . $data['category'], $data['favorites'])): ?>
                                <form method="post">
                                    <input class="id_products" type="hidden" name="id_products" value="<?=$value['id_clothes']?>">
                                    <input class="category" type="hidden" name="category" value="<?=lcfirst($router->getController(true))?>">
                                    <input class="id_users" type="hidden" name="id_users" value="<?=\App\Core\App::getSession()->get('id')?>">
                                    <button class="sm-buttons text favorites-bt" type="button">
                                        <span><i class="fas fa-heart fa-lg"></i></span>
                                        <span><?=__('products.favorites')?></span>
                                    </button>
                                </form>
                                <?php endif; ?>
                            <?php endif; ?>
                            <a href="<?=$router->buildUri('clothes.reviews', [$value['id_clothes']])?>" class="sm-buttons text">
                                <span><i class="fas fa-comments fa-lg"></i></span>
                                <span><?=__('products.reviews')?></span>
                            </a>
                        </div>

                        <!-- Галерея фото товара. -->
                        <?php if ($value['galery'] && count($value['galery']) > 1): ?>
                        <div class="galery">
                            <div class="panels">
                                <?php foreach ($value['galery'] as $img): ?>
                                <a href="<?=\App\Core\Config::get('clothesImg') . $value['id_clothes'] . DS . $img?>" class="panel">
                                    <div class="panel__content" style="background-image: url('<?=\App\Core\Config::get('clothesImgWeb') . $value['id_clothes'] . '/' . $img?>');"></div>
                                </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="mob-gallery">
                            <?php foreach ($value['galery'] as $img): ?>
                            <a href="<?=\App\Core\Config::get('clothesImg') . $value['id_clothes'] . DS . $img?>" style="background-image: url('<?=\App\Core\Config::get('clothesImgWeb') . $value['id_clothes'] . '/' . $img?>');"></a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
                <?php endforeach; ?>

                <!-- Пагинация для вывода карточек товаров. -->
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

        <!-- Фильтр товаров. -->
        <div class="filter text">

            <div id="close-filter">
                <span><i class="fas fa-times"></i></span>
            </div>

            <form method="get" id="filter">

                <div class="sex">
                    <h4><?=__('filter.sex')?></h4>
                    <label>
                        <input type="radio" name="sex" value="m" class="option-input radio" <?=isset($data['get']['sex']) && $data['get']['sex'] == 'm' ? 'checked' : ''?> /><?=__('filter.m')?>
                    </label>
                    <label>
                        <input type="radio" name="sex" value="f" class="option-input radio" <?=isset($data['get']['sex']) && $data['get']['sex'] == 'f' ? 'checked' : ''?> /><?=__('filter.f')?>
                    </label>
                </div>

                <div class="price" data-max="<?=$data['filter']['maxPrice']?>">
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
                        <a class="sm-buttons text" href="<?=$router->buildUri('.clothes')?>"><?=__('filter.reset')?></a>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>

<div id="bar-filter">
    <span><i class="fas fa-filter fa-2x"></i></span>
</div>

<script type="text/javascript" src="/js/buttons.js"></script>
<script type="text/javascript" src="/js/filter.js"></script>
<script type="text/javascript" src="/js/add-favorites.js"></script>
<script type="text/javascript" src="/js/add-cart.js"></script>
<script type="text/javascript" src="/js/touchTouch.jquery.js"></script>
<script type="text/javascript" src="/js/gallery.js"></script>
