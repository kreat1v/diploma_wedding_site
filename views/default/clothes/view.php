<?php

use \App\Core\Config;

$router = \App\Core\App::getRouter();

?>
<div class="sections">

    <div class="container">

        <div class="product view-product">

            <div class="gradient-border">

                <div class="goods">

                    <div class="blur">
                        <img src="<?=Config::get('clothesImg') . $data['product']['id'] . DS . $data['galery'][0]?>"/>
                    </div>

                    <h3 class="text"><?=$data['product']['title']?></h3>

                    <div class="top">

                        <div class="card">

                            <div class="image">
                                <img src="<?=Config::get('clothesImg') . $data['product']['id'] . DS . $data['galery'][0]?>"/>
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
                                <p><?=__('products.size')?>:
                                <?=$data['product']['s'] ? 'S ' : ''?>
                                <?=$data['product']['m'] ? 'M ' : ''?>
                                <?=$data['product']['l'] ? 'L ' : ''?>
                                <?=$data['product']['xl'] ? 'XL ' : ''?>
                                </p>
                                <p><?=__('products.brand')?>: <?=$data['product']['brand']?></p>
                                <p><?=__('products.price')?>: <?=$data['product']['price']?></p>
                            </div>

                        </div>

                    </div>

                    <div class="bt text">
                        <a href="#" class="sm-buttons">
                            <span><i class="fas fa-shopping-cart fa-lg"></i></span>
                            <span><?=__('products.basket')?></span>
                        </a>
                        <a href="#" class="sm-buttons">
                            <span><i class="fas fa-heart fa-lg"></i></span>
                            <span><?=__('products.favorites')?></span>
                        </a>
                        <a href="<?=$router->buildUri('clothes.reviews', [$data['product']['id']])?>" class="sm-buttons">
                            <span><i class="fas fa-comments fa-lg"></i></span>
                            <span><?=__('products.reviews')?></span>
                        </a>
                    </div>

                    <?php if ($data['galery']): ?>
                    <div class="galery">
                        <div class="panels">
                            <?php foreach ($data['galery'] as $img): ?>
                            <a href="javascript:void(0)" class="panel">
                                <div class="panel__content" style="background-image: url('<?=\App\Core\Config::get('clothesImgWeb') . $data['product']['id'] . '/' . $img?>');"></div>
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
<script type="text/javascript" src="/js/filter-clothes.js"></script>
