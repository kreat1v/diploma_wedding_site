<?php

$router = \App\Core\App::getRouter();

?>
<div class="cart">

    <div class="gradient-border">

        <div class="body">

            <div class="title text">
                <h2><?=__('cart.title1')?></h2>
            </div>

            <div class="list">

                <ul>
                    <?php foreach($data['category'] as $value): ?>
                    <?php $categoryName = $value['category_name']; ?>
                    <li class="text">

                        <span class="dot <?=array_key_exists($value['category_name'], $data['cart']) ? 'inactive' : ''?>">
                            <i class="far fa-dot-circle"></i>
                        </span>

                        <span class="check <?=array_key_exists($value['category_name'], $data['cart']) ? '' : 'inactive'?>">
                            <i class="fas fa-check-circle"></i>
                        </span>

                        <span class="<?=array_key_exists($value['category_name'], $data['cart']) ? 'line2' : 'line'?>">
                            <a class="link" href="<?=$router->buildUri(".$categoryName")?>"><?=$value['title']?></a>
                        </span>

                        <?php if (array_key_exists($value['category_name'], $data['cart'])): ?>
                        <span class="name-product">
                            <a class="link" href="<?=$router->buildUri("$categoryName.view", [$data['cart'][$categoryName]['id_products']])?>"><?=$data['cart'][$categoryName]['title']?></a>
                        </span>

                        <span class="delete" data-name="<?=$value['category_name']?>">
                            <i class="fas fa-times"></i>
                        </span>
                        <?php endif; ?>

                    </li>
                    <?php endforeach; ?>
                </ul>

            </div>

            <div class="form text cart-order">

                <a class="sm-buttons" href="<?=$router->buildUri("cart.ordering")?>"><?=__('cart.order')?></a>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript" src="/js/cart.js"></script>
