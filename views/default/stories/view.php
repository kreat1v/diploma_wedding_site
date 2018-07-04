<?php

use App\Core\Session;
use App\Core\Config;

$router = \App\Core\App::getRouter();

// pre($data);

?>
<div class="stories-view">

    <div class="gradient-border">

        <div class="body">

            <div class="title text">
                <h2><?=$data['stories']['title']?></h2>

                <?php
                $image = Config::get('storiesImgRoot') . $data['stories']['id_stories'] . DS . $data['galery'][0];
                $imageArr = getimagesize($image);
                if ($imageArr[0] < $imageArr[1]) {
                    $imageClass = 'avatar-width';
                } else {
                    $imageClass = 'avatar-height';
                }
                ?>

                <div class="avatar <?=$imageClass?>">
                    <img src="<?=Config::get('storiesImg') . $data['stories']['id_stories'] . DS . $data['galery'][0]?>" />
                </div>
            </div>

            <div class="main text">
                <?=$data['stories']['content']?>
            </div>

            <div class="thumbs">

                <?php foreach($data['galery'] as $value): ?>
                    <a href="<?=Config::get('storiesImg') . $data['stories']['id_stories'] . DS . $value?>" style="background-image:url(<?=Config::get('storiesImgWeb') . $data['stories']['id_stories'] . '/' . $value?>)"></a>
                <?php endforeach; ?>

            </div>

            <div class="messages" id="messages">

                <?php foreach($data['comments'] as $value): ?>
                <div class="container text">
                    <div>
                        <span>
                            <?php
                            echo isset($value['firstName']) ? $value['firstName'] : $value['email'];
                            echo ", ";
                            echo $value['date'];
                            ?>
                        </span>
                        <p><?=$value['messages']?></p>
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

            <?php if(Session::get('id') && Session::get('role') == 'user'): ?>
            <div class="form text">
                <form method="post" id="message-form">
                    <label>
                        <span><?=__('stories.comment')?></span>
                        <textarea class="input" name="messages" id="message"></textarea>
                        <div class="count">
                            <span></span>
                        </div>
                    </label>
    				<button type="submit" class="submit sm-buttons button text" name="button" value="send"><?=__('stories.send')?></button>
                </form>
            </div>
            <?php else: ?>
            <div class="notification text">
                <p><?=__('stories.mes2')?><a href="<?=$router->buildUri('.login')?>"><?=__('stories.mes3')?></a><?=__('stories.mes4')?></p>
            </div>
            <?php endif; ?>

        </div>

    </div>

</div>

<script type="text/javascript" src="/js/stories.js"></script>
<script type="text/javascript" src="/js/touchTouch.jquery.js"></script>
