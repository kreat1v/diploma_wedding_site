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
                        $image = Config::get('decorImgRoot') . $value['id_decor'] . DS . $value['galery'][0];
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
                            <img src="<?=Config::get('decorImg') . $value['id_decor'] . DS . $value['galery'][0]?>"/>
                        </div>

                        <h3 class="text"><?=$value['title']?></h3>

                        <div class="top">

                            <div class="card">

                                <div class="image <?=$imageClass?>">
                                    <img src="<?=Config::get('decorImg') . $value['id_decor'] . DS . $value['galery'][0]?>"/>
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
                                    <?php $decor = $value['service'];?>
                                    <p><?=__('products.service')?>: <?=__("decor.$decor")?></p>
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

                            </div>

                        </div>

                        <div class="bt">
                            <?php if(Session::get('id') && Session::get('role') == 'user'): ?>
                                <?php if(empty(Session::get('cart')['decor'])): ?>
                                <form method="post">
                                    <input class="id_products" type="hidden" name="id_products" value="<?=$value['id_decor']?>">
                                    <input class="category" type="hidden" name="category" value="<?=lcfirst($router->getController(true))?>">
                                    <button class="sm-buttons text cart-bt" type="button">
                                        <span><i class="fas fa-shopping-cart fa-lg"></i></span>
                                        <span><?=__('products.basket')?></span>
                                    </button>
                                </form>
                                <?php endif; ?>
                                <?php if(!in_array($value['id_decor'] . $data['category'], $data['favorites'])): ?>
                                <form method="post">
                                    <input class="id_products" type="hidden" name="id_products" value="<?=$value['id_decor']?>">
                                    <input class="category" type="hidden" name="category" value="<?=lcfirst($router->getController(true))?>">
                                    <input class="id_users" type="hidden" name="id_users" value="<?=\App\Core\App::getSession()->get('id')?>">
                                    <button class="sm-buttons text favorites-bt" type="button">
                                        <span><i class="fas fa-heart fa-lg"></i></span>
                                        <span><?=__('products.favorites')?></span>
                                    </button>
                                </form>
                                <?php endif; ?>
                            <?php endif; ?>
                            <a href="<?=$router->buildUri('decor.reviews', [$value['id_decor']])?>" class="sm-buttons text">
                                <span><i class="fas fa-comments fa-lg"></i></span>
                                <span><?=__('products.reviews')?></span>
                            </a>
                        </div>

                        <?php if ($value['galery'] && count($value['galery']) > 1): ?>
                        <div class="galery">
                            <div class="panels">
                                <?php foreach ($value['galery'] as $img): ?>
                                <a href="<?=\App\Core\Config::get('decorImg') . $value['id_decor'] . DS . $img?>" class="panel">
                                    <div class="panel__content" style="background-image: url('<?=\App\Core\Config::get('decorImgWeb') . $value['id_decor'] . '/' . $img?>');"></div>
                                </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>

                </div>
                <?php endforeach; ?>

                <?php if ($data['pagination']): ?>
                <nav>
                    <ul class="pagination text">
                        <li class="<?=$data['pagination']['back'] ? '' : 'disabled'?>">
                            <a href="<?=$data['pagination']['back'] ? $router->buildUri('decor.index', [1]).$filter : ''?>">
                                <span>&laquo;</span>
                            </a>
                        </li>

                        <li class="<?=$data['pagination']['back'] ? '' : 'disabled'?>">
                            <a href="<?=$data['pagination']['back'] ? $router->buildUri('decor.index', [$data['pagination']['back']]).$filter : ''?>"><?=__('pagination.previous')?></a>
                        </li>

                        <?php foreach ($data['pagination']['middle'] as $key => $value): ?>
                        <li class="<?=$data['page'] == $key ? 'active' : ''?>">
                            <a href="<?=$router->buildUri('decor.index', [$key]).$filter?>"><?=$key?></a>
                        </li>
                        <?php endforeach; ?>

                        <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                            <a href="<?=$data['pagination']['forward'] ? $router->buildUri('decor.index', [$data['pagination']['forward']]).$filter : ''?>"><?=__('pagination.next')?></a>
                        </li>

                        <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                            <a href="<?=$router->buildUri('decor.index', [$data['pagination']['last']]).$filter?>">
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
                    <h4><?=__('filter.service')?></h4>
                    <?php foreach ($data['filter']['service'] as $value): ?>
                    <?php
                        $service = $value['service'];
                    ?>
                    <label>
                        <input type="checkbox" value="<?=$service?>" class="option-input checkbox"
                        <?php
                        if (isset($data['get']['service']) && array_search($service, $data['get']['service']) !== false) {
                            echo "checked";
                        }
                        ?>
                        /><?=__("decor.$service")?>
                    </label>
                    <?php endforeach; ?>
                </div>
                <input id='brand' type='hidden' name='service' />

                <div class="bt">
                    <div>
                        <input type="submit" value="<?=__('filter.filter')?>" class="sm-buttons text" />
                    </div>
                    <div>
                        <a class="sm-buttons" href="<?=$router->buildUri('.decor')?>"><?=__('filter.reset')?></a>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>

<script type="text/javascript" src="/js/buttons.js"></script>
<script type="text/javascript" src="/js/filter.js"></script>
<script type="text/javascript" src="/js/add-favorites.js"></script>
<script type="text/javascript" src="/js/add-cart.js"></script>
<script type="text/javascript" src="/js/touchTouch.jquery.js"></script>
<script type="text/javascript" src="/js/gallery.js"></script>
