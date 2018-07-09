<?php

$router = \App\Core\App::getRouter();

// pre($data);

?>
<div class="cart">

    <div class="gradient-border">

        <div class="body">

            <div class="title text">
                <h2>Оформление заказа</h2>
            </div>

            <div class="">

                <ol>
                    <?php foreach($data['cart'] as $value): ?>
                    <li class="text">
                        <b><?=$value['category_title']?></b> - <?=$value['title']?> - <?=$value['price']?> <?=$value['stock']?>
                    </li>
                    <?php endforeach; ?>
                </ol>

                <b>Итог:</b>
                <?php if ($data['fullPrice'] != $data['stockPrice']): ?>
                <span>
                    <?=$data['fullPrice']?>
                </span>
                <?php endif; ?>
                <span>
                    <?=$data['stockPrice']?>
                </span>

            </div>

            <div class="form text cart-order">

                <a class="sm-buttons" href="<?=$router->buildUri("cart.ordering")?>"><?=__('cart.order')?></a>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript" src="/js/cart.js"></script>
