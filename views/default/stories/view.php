<?php

use App\Core\Session;
use App\Core\Config;

$router = \App\Core\App::getRouter();

?>
<div class="stories-view" data-id="<?=$data['stories']['id_stories']?>">

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

            <div class="panel text">

                <div class="like" data-item="stories" data-id="<?=$data['stories']['id_stories']?>">
                    <span class="like-image <?=$data['stories']['like'] ? 'like-off' : ''?>">
                        <i class="far fa-heart"></i>
                    </span>
                    <span class="like-active <?=$data['stories']['like'] ? '' : 'like-off'?>">
                        <i class="fas fa-heart"></i>
                    </span>
                    <span class="like-number <?=$data['stories']['like'] ? 'like-number-active' : ''?>">
                        <?=$data['likesCount']?>
                    </span>
                </div>

                <div class="views">
                    <i class="fas fa-eye"></i> <?=$data['views']?>
                </div>

                <div class="date">
                    <?=date('d.m.Y', strtotime($data['stories']['date']))?>
                </div>

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
                        <div class="panels">
                            <div class="like" data-item="comments" data-id="<?=$value['id']?>">
                                <span class="like-image <?=$value['like'] ? 'like-off' : ''?>">
                                    <i class="far fa-heart"></i>
                                </span>
                                <span class="like-active <?=$value['like'] ? '' : 'like-off'?>">
                                    <i class="fas fa-heart"></i>
                                </span>
                                <span class="like-number <?=$value['like'] ? 'like-number-active' : ''?>">
                                    <?=$value['likesCount']?>
                                </span>
                            </div>
                            <div class="answ">
                                <span>
                                    <i class="fas fa-reply"></i>
                                </span>
                                <span>
                                    <?=count($value['answers'])?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="avt">
                        <?php
                        if (!file_exists(\App\Core\Config::get('userImgRoot') . $value['id_users'])) {
                            $avatar = \App\Core\Config::get('systemImg') . 'user.png';
                        } else {
                            $paths = array_values(array_diff(scandir(\App\Core\Config::get('userImgRoot') . $value['id_users']), ['.', '..']));
                            $avatar = \App\Core\Config::get('userImg') . $value['id_users'] . DS . $paths[0];
                        }
                        ?>
                        <img src="<?=$avatar?>">
                    </div>
                </div>
                <div class="answers">
                    <div class="form-answ">
                        <form method="post">
                            <textarea name="answers"></textarea>
                            <div class="count-answ text">
                                <span>300</span>
                            </div>
                            <input type="hidden" name="id" value="<?=$value['id']?>">
                            <button class="button" type="submit" name="button" value="answers"><i class="fas fa-reply fa-2x"></i></button>
                        </form>
                    </div>
                    <?php foreach($value['answers'] as $answ): ?>
                        <div class="container text">
                            <div>
                                <span>
                                    <?php
                                    echo isset($answ['firstName']) ? $answ['firstName'] : $answ['email'];
                                    echo ", ";
                                    echo $answ['date'];
                                    ?>
                                </span>
                                <p><?=$answ['messages']?></p>
                            </div>
                            <div class="avt">
                                <?php
                                if (!file_exists(\App\Core\Config::get('userImgRoot') . $answ['id_users'])) {
                                    $avatar = \App\Core\Config::get('systemImg') . 'user.png';
                                } else {
                                    $paths = array_values(array_diff(scandir(\App\Core\Config::get('userImgRoot') . $answ['id_users']), ['.', '..']));
                                    $avatar = \App\Core\Config::get('userImg') . $answ['id_users'] . DS . $paths[0];
                                }
                                ?>
                                <img src="<?=$avatar?>">
                            </div>
                        </div>
                    <?php endforeach; ?>
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

<script type="text/javascript" src="/js/user-message.js"></script>
<script type="text/javascript" src="/js/stories.js"></script>
<script type="text/javascript" src="/js/touchTouch.jquery.js"></script>
