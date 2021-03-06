<?php

use \App\Core\Config;
use \App\Core\Session;

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
                    $image = Config::get('filmingImgRoot') . $data['product']['id_filming'] . DS . $data['galery'][0];
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
                        <img src="<?=Config::get('filmingImg') . $data['product']['id_filming'] . DS . $data['galery'][0]?>"/>
                    </div>

                    <h3 class="text"><?=$data['product']['title']?></h3>

                    <div class="top">

                        <div class="card">

                            <div class="image <?=$imageClass?>">
                                <img src="<?=Config::get('filmingImg') . $data['product']['id_filming'] . DS . $data['galery'][0]?>"/>
                            </div>

                            <div class="details text">

                                <div class="center">
                                    <h5><?=__('products.contacts')?></h5>
                                    <p><?=$data['product']['contacts']?></p>
                                    <a href="tel: <?=$data['product']['tel']?>"><i class="fas fa-phone"></i> <?=$data['product']['tel']?></a>
                                    <span></span>
                                    <ul>
                                        <?php if (isset($data['product']['fb'])): ?>
                                        <li><a href="<?='https://www.facebook.com/'.$data['product']['fb']?>"><i class="fab fa-facebook-square"></i></a></li>
                                        <?php endif; ?>
                                        <?php if (isset($data['product']['inst'])): ?>
                                        <li><a href="<?='https://www.instagram.com/'.$data['product']['inst']?>"><i class="fab fa-instagram"></i></a></li>
                                        <?php endif; ?>
                                        <?php if (isset($data['product']['telegram'])): ?>
                                        <li><a href="<?='https://www.telegram.me/'.$data['product']['telegram']?>"><i class="fab fa-telegram-plane"></i></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>

                            </div>

                        </div>

                        <div class="body text">

                            <div class="main-text">
                                <p><?=$data['product']['text']?></p>
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

                            <div class="main-contacts">
                                <span>
                                    <?=__('products.contacts')?>:
                                </span>
                                <p><?=$data['product']['contacts']?></p>
                                <ul class="link">
                                    <li><a href="tel: <?=$data['product']['tel']?>"><i class="fas fa-phone"></i> <?=$data['product']['tel']?></a></li>
                                    <?php if (isset($data['product']['fb'])): ?>
                                    <li><a href="<?='https://www.facebook.com/'.$data['product']['fb']?>"><i class="fab fa-facebook-square"></i> Facebook</a></li>
                                    <?php endif; ?>
                                    <?php if (isset($data['product']['inst'])): ?>
                                    <li><a href="<?='https://www.instagram.com/'.$data['product']['inst']?>"><i class="fab fa-instagram"></i> Instagram</a></li>
                                    <?php endif; ?>
                                    <?php if (isset($data['product']['telegram'])): ?>
                                    <li><a href="<?='https://www.telegram.me/'.$data['product']['telegram']?>"><i class="fab fa-telegram-plane"></i> Telegram</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>

                        </div>

                    </div>

                    <div class="bt">
                        <?php if(Session::get('id') && Session::get('role') == 'user'): ?>
                            <?php if(empty(Session::get('cart')['filming'])): ?>
                            <form method="post">
                                <input class="id_products" type="hidden" name="id_products" value="<?=$data['product']['id_filming']?>">
                                <input class="category" type="hidden" name="category" value="<?=lcfirst($router->getController(true))?>">
                                <button class="sm-buttons text cart-bt" type="button">
                                    <span><i class="fas fa-shopping-cart fa-lg"></i></span>
                                    <span><?=__('products.basket')?></span>
                                </button>
                            </form>
                            <?php endif; ?>
                            <?php if(!in_array($data['product']['id_filming'] . $data['category'], $data['favorites'])): ?>
                            <form method="post">
                                <input class="id_products" type="hidden" name="id_products" value="<?=$data['product']['id_filming']?>">
                                <input class="category" type="hidden" name="category" value="<?=lcfirst($router->getController(true))?>">
                                <input class="id_users" type="hidden" name="id_users" value="<?=\App\Core\App::getSession()->get('id')?>">
                                <button class="sm-buttons text favorites-bt" type="button">
                                    <span><i class="fas fa-heart fa-lg"></i></span>
                                    <span><?=__('products.favorites')?></span>
                                </button>
                            </form>
                            <?php endif; ?>
                        <?php endif; ?>
                        <a href="<?=$router->buildUri('filming.reviews', [$data['product']['id_filming']])?>" class="sm-buttons text">
                            <span><i class="fas fa-comments fa-lg"></i></span>
                            <span><?=__('products.reviews')?></span>
                        </a>
                    </div>

                    <?php if ($data['galery'] && count($data['galery']) > 1): ?>
                    <div class="galery">
                        <div class="panels">
                            <?php foreach ($data['galery'] as $img): ?>
                            <a href="<?=\App\Core\Config::get('filmingImg') . $data['product']['id_filming'] . DS . $img?>" class="panel">
                                <div class="panel__content" style="background-image: url('<?=\App\Core\Config::get('filmingImgWeb') . $data['product']['id_filming'] . '/' . $img?>');"></div>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="mob-gallery">
                        <?php foreach ($data['galery'] as $img): ?>
                        <a href="<?=\App\Core\Config::get('filmingImg') . $data['product']['id_filming'] . DS . $img?>" style="background-image: url('<?=\App\Core\Config::get('filmingImgWeb') . $data['product']['id_filming'] . '/' . $img?>');"></a>
                        <?php endforeach; ?>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript" src="/js/buttons.js"></script>
<script type="text/javascript" src="/js/add-favorites.js"></script>
<script type="text/javascript" src="/js/add-cart.js"></script>
<script type="text/javascript" src="/js/touchTouch.jquery.js"></script>
<script type="text/javascript" src="/js/gallery.js"></script>
