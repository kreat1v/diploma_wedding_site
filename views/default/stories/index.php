<?php

use \App\Core\Config;

// Получаем роутер.
$router = \App\Core\App::getRouter();

// pre($data);

?>

<div class="stories">

    <div class="">

        <p>Истории пар, которым мы смогли помочь воплотить в жизнь их свадебную мечту.</p>

    </div>

    <div class="">

        <?php foreach ($data as $stories): ?>
        <div class="">
            <a href="#" class="">
                <?=$stories['title']?>
            </a>
        </div>
        <?php endforeach; ?>
        
    </div>

</div>
