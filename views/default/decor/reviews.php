<?php

$router = \App\Core\App::getRouter();

?>
<div class="reviews" data-category="<?=$data['category']?>" data-product="<?=$data['id_product']?>">

    <div class="gradient-border">

        <div class="body">

            <div class="title text">
                <h2><?=$data['title']?></h2>
                <div class="avatar <?=$data['avatar-class']?>">
                    <img src="<?=$data['avatar']?>" />
                </div>
            </div>

            <div class="messages" id="messages">

                <?php foreach($data['reviews'] as $value): ?>
                <div class="container text">
                    <div>
                        <span>
                            <?php
                            echo isset($value['firstName']) ? $value['firstName'] : $value['email'];
                            echo ", ";
                            echo $value['date'];
                            ?>
                        </span>
                        <p><?=$value['reviews']?></p>
                    </div>
                    <div class="avt">
                        <?php
                        if (!file_exists(\App\Core\Config::get('userImgRoot') . $value['id'])) {
                            $avatar = \App\Core\Config::get('systemImg') . 'user.png';
                        } else {
                            $paths = array_values(array_diff(scandir(\App\Core\Config::get('userImgRoot') . $value['id']), ['.', '..']));
                            $avatar = \App\Core\Config::get('userImg') . $value['id'] . DS . $paths[0];
                        }
                        ?>
                        <img src="<?=$avatar?>">
                    </div>
                </div>
                <?php endforeach; ?>

            </div>

            <?php if(\App\Core\Session::get('id') && \App\Core\Session::get('role') == 'user'): ?>
            <div class="form text">
                <form method="post" id="message-form">
                    <label>
                        <span><?=__('reviews.review')?></span>
                        <textarea class="input" name="reviews" id="message"></textarea>
                        <div class="count">
                            <span></span>
                        </div>
                    </label>
    				<button type="submit" class="submit sm-buttons button text" name="button" value="send"><?=__('reviews.send')?></button>
                </form>
            </div>
            <?php elseif(\App\Core\Session::get('id') && \App\Core\Session::get('role') == 'admin'): ?>            
            <?php else: ?>
            <div class="notification text">
                <p><?=__('reviews.mes2')?><a href="<?=$router->buildUri('.login')?>"><?=__('reviews.mes3')?></a><?=__('reviews.mes4')?></p>
            </div>
            <?php endif; ?>

        </div>

    </div>

</div>

<script type="text/javascript" src="/js/user-message.js"></script>
<script type="text/javascript" src="/js/reviews.js"></script>
