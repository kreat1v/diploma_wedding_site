<?php

$router = \App\Core\App::getRouter();

?>
<div class="cart">

    <div class="gradient-border">

        <div class="body">

            <div class="title text">
                <h2><?=__('cart.title2')?></h2>
            </div>

            <div class="text">

                <ol>
                    <?php foreach($data['cart'] as $value): ?>
                    <li>
                        <b><?=$value['category_title']?></b> -
                        <?=$value['title']?> -
                        <span class="<?=$value['stock'] ? 'old-price' : ''?>"><?=$value['price']?></span>
                        <?=$value['stock']?>
                    </li>
                    <?php endforeach; ?>
                </ol>

                <div class="center">
                    <b><?=__('cart.totals')?>:</b>
                    <?php if ($data['fullPrice'] != $data['stockPrice']): ?>
                    <span class="old-price">
                        <?=$data['fullPrice']?>
                    </span>
                    <?php endif; ?>
                    <span>
                        <?=$data['stockPrice']?>
                    </span>
                </div>

            </div>

            <?php if ($data['userData']): ?>
            <div class="form text">

                <form method="post" id="data-form">
                    <label>
                        <span><?=__('cart.message')?></span>
                        <textarea class="input" name="message" id="message"></textarea>
                    </label>

                    <div class="payment center">
                        <span><?=__('cart.way')?></span>
                        <label>
                            <input type="radio" name="payment" value="bank" class="option-input radio" checked />
                            <span><?=__('cart.bank')?></span>
                        </label>
                        <label>
                            <input type="radio" name="payment" value="terminal" class="option-input radio" />
                            <span><?=__('cart.terminal')?></span>
                        </label>
                        <label>
                            <input type="radio" name="payment" value="reconciliation" class="option-input radio" />
                            <span><?=__('cart.reconciliation')?></span>
                        </label>
                    </div>

                    <button type="submit" class="submit sm-buttons button text" name="button" value="orders"><?=__('cart.order2')?></button>
                </form>

            </div>
            <?php else: ?>
            <div class="notification text center">

				<p><?=__('cart.mes1')?> <a href="<?=$router->buildUri('user.settings')?>"><?=__('cart.mes2')?></a>.</p>

            </div>
            <?php endif; ?>

        </div>

    </div>

</div>
