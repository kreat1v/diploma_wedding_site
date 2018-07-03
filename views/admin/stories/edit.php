<?php

use \App\Core\Config;

$router = \App\Core\App::getRouter();
$edit = isset($data['edit']) ? true : false;

?>
<div class="container">
    <div class="category">

        <div class="title text">
            <?php if($edit): ?>
            <h2><?=__('admin_stories.title2')?></h2>
            <?php else: ?>
            <h2><?=__('admin_stories.title3')?></h2>
            <?php endif; ?>
        </div>

        <form class="form text" id="stories-form" method="post" enctype="multipart/form-data">

            <fieldset>
                <legend><?=__('admin_stories.title4')?></legend>

                <label>
                    <span><?=__('admin_stories.ru')?></span>
                    <input class="input" id="title-ru" type="text" name="titleRu" value="<?=$edit ? $data['edit']['ru']['title'] : ''?>">
                    <div class="tooltips-left">
                        <div><?=__('admin_stories.tool1')?></div>
                    </div>
                </label>

                <label>
                    <span><?=__('admin_stories.en')?></span>
                    <input class="input" id="title-en" type="text" name="titleEn" value="<?=$edit ? $data['edit']['en']['title'] : ''?>">
                    <div class="tooltips-left">
                        <div><?=__('admin_stories.tool1')?></div>
                    </div>
                </label>
            </fieldset>

            <fieldset>
                <legend><?=__('admin_stories.title5')?></legend>

                <p><?=__('admin_stories.mes1')?></p>

                <label>
                    <span><?=__('admin_stories.ru')?></span>
                    <textarea class="textarea" id="content-ru" name="contentRu"><?=$edit ? $data['edit']['ru']['content'] : ''?></textarea>
                    <div class="tooltips-left">
                        <div><?=__('admin_stories.tool1')?></div>
                    </div>
                </label>

                <label>
                    <span><?=__('admin_stories.en')?></span>
                    <textarea class="textarea" id="content-en" name="contentEn"><?=$edit ? $data['edit']['en']['content'] : ''?></textarea>
                    <div class="tooltips-left">
                        <div><?=__('admin_stories.tool1')?></div>
                    </div>
                </label>
            </fieldset>

            <fieldset>
                <legend><?=__('admin_stories.title6')?></legend>

                <p><?=__('admin_stories.mes2')?></p>

                <div id="galery">

                    <?php if(isset($data['edit']['galery']) && $data['edit']['galery'] != false): ?>
                        <?php foreach ($data['edit']['galery'] as $img): ?>
                        <div class="file-upload"
                                data-name="<?=$img?>"
                                data-id="<?=$data['edit']['main']['id']?>">
                            <img class="product-image" style="display: block;" src="<?=Config::get('storiesImg') . $data['edit']['main']['id'] . DS . $img?>" />
                            <span class="delete-image">
                                <i class="fas fa-times-circle"></i>
                            </span>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>

                <div class="tooltips-left image-error">
                    <div><?=__('admin_stories.tool2')?></div>
                </div>

            </fieldset>

            <label>
                <input type="checkbox" name="active" value="1" class="option-input checkbox" <?=$data['edit']['main']['active'] == 1 ? 'checked' : ''?> />
                <span><?=__('admin_stories.activity2')?></span>
            </label>

            <button type="submit" class="submit sm-buttons button text" name="button" value="send"><?=__('admin_stories.save')?></button>
        </form>

    </div>
</div>

<script type="text/javascript" src="/js/admin-stories.js"></script>
