<?php

use \App\Core\Config;

$router = \App\Core\App::getRouter();

?>
<div class="sections">

    <div class="container">

        <div class="product view-product">

            <div class="gradient-border">

                <?php if (isset($data['product']['stock'])): ?>
                <div class="ribbon text"><span><?=__('products.stock')?></span></div>
                <?php endif; ?>

                <div class="goods">

                    <?php
                    $image = Config::get('hotelImgRoot') . $data['product']['id'] . DS . $data['galery'][0];
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
                        <img src="<?=Config::get('hotelImg') . $data['product']['id'] . DS . $data['galery'][0]?>"/>
                    </div>

                    <h3 class="text"><?=$data['product']['title']?></h3>

                    <div class="top">

                        <div class="card">

                            <div class="image <?=$imageClass?>">
                                <img src="<?=Config::get('hotelImg') . $data['product']['id'] . DS . $data['galery'][0]?>"/>
                            </div>

                            <div class="details text">

                                <div class="center">
                                    <h5><?=__('products.contacts')?></h5>
                                    <p><?=$data['product']['contacts']?></p>
                                    <a href="tel: <?=$data['product']['tel']?>"><i class="fas fa-phone"></i> <?=$data['product']['tel']?></a>
                                    <span></span>
                                    <ul>
                                        <?php if (isset($data['product']['fb'])): ?>
                                        <li><a href="<?='https://www.'.$data['product']['fb']?>"><i class="fab fa-facebook-square"></i></a></li>
                                        <?php endif; ?>
                                        <?php if (isset($data['product']['inst'])): ?>
                                        <li><a href="<?='https://www.'.$data['product']['inst']?>"><i class="fab fa-instagram"></i></a></li>
                                        <?php endif; ?>
                                        <?php if (isset($data['product']['telegram'])): ?>
                                        <li><a href="<?='https://www.'.$data['product']['telegram']?>"><i class="fab fa-telegram-plane"></i></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>

                            </div>

                        </div>

                        <div class="body text">

                            <div class="main-text">
                                <p><?=$data['product']['text']?></p>
                                <p>
                                    <?=__('products.stars') . ': '?>
                                    <?php for ($i = 1; $i <= $data['product']['stars']; $i++): ?>
                                    <i class="fas fa-star"></i>
                                    <?php endfor; ?>
                                </p>
                                <p>
                                    <span>
                                        <?=__('products.price')?>:
                                    </span>
                                    <span class="<?=isset($data['product']['stock']) ? 'old-price' : ''?>">
                                        <?=$data['product']['price']?>
                                    </span>
                                    <?php if (isset($data['product']['stock'])): ?>
                                    <span>
                                        <?=$data['product']['stock']?>
                                    </span>
                                    <?php endif; ?>
                                </p>
                            </div>

                        </div>

                    </div>

                    <div class="bt">
                        <?php if(\App\Core\Session::get('id') && \App\Core\Session::get('role') == 'user'): ?>
                        <form method="post">
                            <input class="id_products" type="hidden" name="id_products" value="<?=$data['product']['id']?>">
                            <input class="category" type="hidden" name="category" value="<?=lcfirst($router->getController(true))?>">
                            <input class="id_users" type="hidden" name="id_users" value="<?=\App\Core\App::getSession()->get('id')?>">
                            <button class="sm-buttons text basket-bt" type="button">
                                <span><i class="fas fa-shopping-cart fa-lg"></i></span>
                                <span><?=__('products.basket')?></span>
                            </button>
                        </form>
                            <?php if(!in_array($data['product']['id'] . $data['category'], $data['favorites'])): ?>
                            <form method="post">
                                <input class="id_products" type="hidden" name="id_products" value="<?=$data['product']['id']?>">
                                <input class="category" type="hidden" name="category" value="<?=lcfirst($router->getController(true))?>">
                                <input class="id_users" type="hidden" name="id_users" value="<?=\App\Core\App::getSession()->get('id')?>">
                                <button class="sm-buttons text favorites-bt" type="button">
                                    <span><i class="fas fa-heart fa-lg"></i></span>
                                    <span><?=__('products.favorites')?></span>
                                </button>
                            </form>
                            <?php endif; ?>
                        <?php endif; ?>
                        <a href="<?=$router->buildUri('hotel.reviews', [$data['product']['id']])?>" class="sm-buttons text">
                            <span><i class="fas fa-comments fa-lg"></i></span>
                            <span><?=__('products.reviews')?></span>
                        </a>
                    </div>

                    <?php if ($data['galery'] && count($data['galery']) > 1): ?>
                    <div class="galery">
                        <div class="panels">
                            <?php foreach ($data['galery'] as $img): ?>
                            <a href="javascript:void(0)" class="panel">
                                <div class="panel__content" style="background-image: url('<?=\App\Core\Config::get('hotelImgWeb') . $data['product']['id'] . '/' . $img?>');"></div>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript" src="/js/buttons.js"></script>
<script type="text/javascript" src="/js/add-favorites-or-basket.js"></script>
