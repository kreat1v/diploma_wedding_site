<?php

use \App\Core\Config;
use \App\Core\Session;

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

                    <?php if (isset($value['stock'])): ?>
                    <div class="ribbon text"><span><?=__('products.stock')?></span></div>
                    <?php endif; ?>

                    <div class="goods">

                        <?php
                        $image = Config::get('hotelImgRoot') . $value['id_hotel'] . DS . $value['galery'][0];
                        $imageArr = getimagesize($image);
                        if ($imageArr[0] < $imageArr[1]) {
                            $imageClass = 'image-width';
                            $blurClass = 'blur-width';
                        } else {
                            $imageClass = 'image-height';
                            $blurClass = 'blur-height';
                        }
                        ?>

                        <div class="blur <?=$blurClass?>">
                            <img src="<?=Config::get('hotelImg') . $value['id_hotel'] . DS . $value['galery'][0]?>"/>
                        </div>

                        <h3 class="text"><?=$value['title']?></h3>

                        <div class="top">

                            <div class="card">

                                <div class="image <?=$imageClass?>">
                                    <img src="<?=Config::get('hotelImg') . $value['id_hotel'] . DS . $value['galery'][0]?>"/>
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

                            <div class="body text">

                                <div class="main-text">
                                    <p><?=$value['text']?></p>
                                    <p>
                                        <?=__('products.stars') . ': '?>
                                        <?php for ($i = 1; $i <= $value['stars']; $i++): ?>
                                        <i class="fas fa-star"></i>
                                        <?php endfor; ?>
                                    </p>
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

                        <div class="bt">
                            <?php if(Session::get('id') && Session::get('role') == 'user'): ?>
                                <?php if(empty(Session::get('cart')['hotel'])): ?>
                                <form method="post">
                                    <input class="id_products" type="hidden" name="id_products" value="<?=$value['id_hotel']?>">
                                    <input class="category" type="hidden" name="category" value="<?=lcfirst($router->getController(true))?>">
                                    <button class="sm-buttons text cart-bt" type="button">
                                        <span><i class="fas fa-shopping-cart fa-lg"></i></span>
                                        <span><?=__('products.basket')?></span>
                                    </button>
                                </form>
                                <?php endif; ?>
                                <?php if(!in_array($value['id_hotel'] . $data['category'], $data['favorites'])): ?>
                                <form method="post">
                                    <input class="id_products" type="hidden" name="id_products" value="<?=$value['id_hotel']?>">
                                    <input class="category" type="hidden" name="category" value="<?=lcfirst($router->getController(true))?>">
                                    <input class="id_users" type="hidden" name="id_users" value="<?=\App\Core\App::getSession()->get('id')?>">
                                    <button class="sm-buttons text favorites-bt" type="button">
                                        <span><i class="fas fa-heart fa-lg"></i></span>
                                        <span><?=__('products.favorites')?></span>
                                    </button>
                                </form>
                                <?php endif; ?>
                            <?php endif; ?>
                            <a href="<?=$router->buildUri('hotel.reviews', [$value['id_hotel']])?>" class="sm-buttons text">
                                <span><i class="fas fa-comments fa-lg"></i></span>
                                <span><?=__('products.reviews')?></span>
                            </a>
                        </div>

                        <?php if ($value['galery'] && count($value['galery']) > 1): ?>
                        <div class="galery">
                            <div class="panels">
                                <?php foreach ($value['galery'] as $img): ?>
                                <a href="<?=\App\Core\Config::get('hotelImg') . $value['id_hotel'] . DS . $img?>" class="panel">
                                    <div class="panel__content" style="background-image: url('<?=\App\Core\Config::get('hotelImgWeb') . $value['id_hotel'] . '/' . $img?>');"></div>
                                </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="mob-gallery">
                            <?php foreach ($value['galery'] as $img): ?>
                            <a href="<?=\App\Core\Config::get('hotelImg') . $value['id_hotel'] . DS . $img?>" style="background-image: url('<?=\App\Core\Config::get('hotelImgWeb') . $value['id_hotel'] . '/' . $img?>');"></a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
                <?php endforeach; ?>

                <?php if ($data['pagination']): ?>
                <nav>
                    <ul class="pagination text">
                        <li class="<?=$data['pagination']['back'] ? '' : 'disabled'?>">
                            <a href="<?=$data['pagination']['back'] ? $router->buildUri('hotel.index', [1]).$filter : ''?>">
                                <span>&laquo;</span>
                            </a>
                        </li>

                        <li class="<?=$data['pagination']['back'] ? '' : 'disabled'?>">
                            <a href="<?=$data['pagination']['back'] ? $router->buildUri('hotel.index', [$data['pagination']['back']]).$filter : ''?>"><?=__('pagination.previous')?></a>
                        </li>

                        <?php foreach ($data['pagination']['middle'] as $key => $value): ?>
                        <li class="<?=$data['page'] == $key ? 'active' : ''?>">
                            <a href="<?=$router->buildUri('hotel.index', [$key]).$filter?>"><?=$key?></a>
                        </li>
                        <?php endforeach; ?>

                        <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                            <a href="<?=$data['pagination']['forward'] ? $router->buildUri('hotel.index', [$data['pagination']['forward']]).$filter : ''?>"><?=__('pagination.next')?></a>
                        </li>

                        <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                            <a href="<?=$router->buildUri('hotelr.index', [$data['pagination']['last']]).$filter?>">
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

            <div id="close-filter">
                <span><i class="fas fa-times"></i></span>
            </div>

            <form method="get" id="filter">

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
                    <h4><?=__('filter.stars')?></h4>
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                    <label>
                        <input type="checkbox" value="<?=$i?>" class="option-input checkbox"
                        <?php
                        if (isset($data['get']['stars']) && array_search($i, $data['get']['stars']) !== false) {
                            echo "checked";
                        }
                        ?>
                        />
                        <?php for ($j = 1; $j <= $i; $j++): ?>
                        <i class="fas fa-star"></i>
                        <?php endfor; ?>
                    </label>
                    <?php endfor; ?>
                </div>
                <input id='brand' type='hidden' name='stars' />

                <div class="bt">
                    <div>
                        <input type="submit" value="<?=__('filter.filter')?>" class="sm-buttons text" />
                    </div>
                    <div>
                        <a class="sm-buttons text" href="<?=$router->buildUri('.hotel')?>"><?=__('filter.reset')?></a>
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
