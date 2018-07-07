<?php

// Получаем язык.
$lang = \App\Core\App::getRouter()->getLang();

// Получаем имя языкового поля.
$langText = $lang . '_text';
$langAddress = $lang . '_address';

?>
<div class="sections text center">
    <p>
        <?=$data[$langText]?>
    </p>

    <p>
        <b><?=__('contacts.adr')?></b> <?=$data[$langAddress]?>
    </p>

    <p>
        <b><?=__('contacts.tel')?></b>
        <?php
        echo $data['tel1'];
        echo $data['tel2'] ? ', ' . $data['tel2'] : '';
        echo $data['tel3'] ? ', ' . $data['tel3'] : '';
        ?>
    </p>

    <p>
        <b><?=__('contacts.email')?></b> <?=$data['email']?>
    </p>

    <?php if (isset($data['fb']) || isset($data['instagram']) || isset($data['telegram'])): ?>
    <p class="link">
        <?=__('contacts.social')?> -
        <?php
        echo $data['fb'] ? '<a href="https://www.facebook.com/' . $data['fb'] . '"><i class="fab fa-facebook-square"></i> Facebook </a>' : '';
        echo $data['instagram'] ? '<a href="https://www.instagram.com/' . $data['instagram'] . '"><i class="fab fa-instagram"></i> Instagram </a>' : '';
        echo $data['telegram'] ? '<a href="https://telegram.me/' . $data['telegram'] . '"><i class="fab fa-telegram-plane"></i> Telegram </a>' : '';
        ?>
    </p>
    <?php endif; ?>
</div>
