<div class="container">
    <div class="category">

        <div class="title text">
            <h2><?=__('admin_cover.title1')?></h2>
        </div>

        <form class="form text" id="cover-form" method="post" enctype="multipart/form-data">

            <fieldset>
                <legend><?=__('admin_cover.title2')?></legend>

                <p><?=__('admin_cover.mes1')?></p>

                <div id="galery">

                    <?php foreach ($data as $img): ?>
                    <div class="file-upload" data-name="<?=$img?>">
                        <img class="product-image" style="display: block;" src="<?=App\Core\Config::get('coverImg') . DS . $img?>" />
                        <span class="delete-image">
                            <i class="fas fa-times-circle"></i>
                        </span>
                    </div>
                    <?php endforeach; ?>

                </div>

                <div class="tooltips-left image-error">
                    <div><?=__('admin_cover.tool')?></div>
                </div>

            </fieldset>

            <button type="submit" class="submit sm-buttons button text" name="button" value="send"><?=__('admin_cover.save')?></button>
        </form>

    </div>
</div>

<script type="text/javascript" src="/js/admin-cover.js"></script>
