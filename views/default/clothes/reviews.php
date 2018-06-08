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
                <div class="container text">
                    <div>
                        <span>Вы, 28 28 28</span>
                        <p> Элемент fieldset предназначен для группирования элементов формы. Такая группировка облегчает работу с формами, содержащими большое число данных. Например, один блок может быть предназначен для ввода текстовой информации, а другой — для флажков. Браузеры для повышения наглядности отображают результат использования тега fieldset в виде рамки. Ее вид зависит от операционной системы, а также используемого браузера (рис. 1, 2). </p>
                    </div>
                    <div class="avt">
                        <img src="">
                    </div>
                </div>
            </div>

            <div class="form text">
                <form method="post" id="message-form">
                    <label>
                        <span><?=__('user_communications.message')?></span>
                        <textarea class="input" name="reviews" id="message"></textarea>
                        <div class="count">
                            <span></span>
                        </div>
                    </label>
    				<button type="submit" class="submit sm-buttons button text" name="button" value="send"><?=__('user_settings.save')?></button>
                </form>
            </div>

        </div>

    </div>

</div>

<script type="text/javascript" src="/js/user-message.js"></script>
