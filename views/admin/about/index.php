<div class="container">
    <div class="category">

        <div class="title text">
            <h2><?=__('admin_about.title1')?></h2>
        </div>

        <form class="form text" id="category-form" method="post">

            <fieldset>
                <legend><?=__('admin_about.title2')?></legend>

                <p><?=__('admin_about.mes')?></p>

                <label>
                    <span><?=__('admin_about.ru')?></span>
                    <textarea class="textarea" id="first-text-ru" name="ruText"><?=$data['ru_text']?></textarea>
                    <div class="tooltips-left">
                        <div><?=__('admin_about.tool')?></div>
                    </div>
                </label>

                <label>
                    <span><?=__('admin_about.en')?></span>
                    <textarea class="textarea" id="first-text-en" name="enText"><?=$data['en_text']?></textarea>
                    <div class="tooltips-left">
                        <div><?=__('admin_about.tool')?></div>
                    </div>
                </label>
            </fieldset>

            <button type="submit" class="submit sm-buttons button text" name="button" value="send"><?=__('admin_about.save')?></button>
        </form>

    </div>
</div>

<script type="text/javascript" src="/js/admin-category.js"></script>
