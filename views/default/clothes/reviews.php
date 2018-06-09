<?php

$router = \App\Core\App::getRouter();

?>
<div class="reviews">

    <div class="gradient-border">

        <div class="body">

            <div class="title text">
                <h2><?=$data['title']?></h2>
                <div class="avatar">
                    <img src="<?=$data['avatar']?>" alt="">
                </div>
            </div>

            <div class="messages">

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

        </div>

    </div>

</div>

<script type="text/javascript" src="/js/user-message.js"></script>
