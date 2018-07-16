<div class="container">
    <div class="category">

        <div class="title text">
            <h2><?=__('admin_category.title1')?></h2>
        </div>

        <form class="form text" id="category-form" method="post">
            <fieldset>
                <legend><?=__('admin_category.title2')?></legend>

                <p><?=__('admin_category.mes1')?></p>

                <label>
                    <span><?=__('admin_category.ru')?></span>
                    <input class="input" id="title-ru" type="text" name="titleRu" value="<?=htmlspecialchars($data['ru']['title'])?>">
                    <div class="tooltips-left">
                        <div><?=__('admin_category.tool1')?></div>
                    </div>
                </label>

                <label>
                    <span><?=__('admin_category.en')?></span>
                    <input class="input" id="title-en" type="text" name="titleEn" value="<?=htmlspecialchars($data['en']['title'])?>">
                    <div class="tooltips-left">
                        <div><?=__('admin_category.tool2')?></div>
                    </div>
                </label>
            </fieldset>

            <fieldset>
                <legend><?=__('admin_category.title3')?></legend>

                <p><?=__('admin_category.mes2')?></p>

                <label>
                    <span><?=__('admin_category.ru')?></span>
                    <textarea class="textarea" id="first-text-ru" name="firstTextRu"><?=htmlspecialchars($data['ru']['first_text'])?></textarea>
                    <div class="tooltips-left">
                        <div><?=__('admin_category.tool3')?></div>
                    </div>
                </label>

                <label>
                    <span><?=__('admin_category.en')?></span>
                    <textarea class="textarea" id="first-text-en" name="firstTextEn"><?=htmlspecialchars($data['en']['first_text'])?></textarea>
                    <div class="tooltips-left">
                        <div><?=__('admin_category.tool3')?></div>
                    </div>
                </label>
            </fieldset>

            <fieldset>
                <legend><?=__('admin_category.title4')?></legend>

                <label>
                    <span><?=__('admin_category.ru')?></span>
                    <input class="input" id="full-title-ru" type="text" name="fullTitleRu" value="<?=htmlspecialchars($data['ru']['full_title'])?>">
                    <div class="tooltips-left">
                        <div><?=__('admin_category.tool3')?></div>
                    </div>
                </label>

                <label>
                    <span><?=__('admin_category.en')?></span>
                    <input class="input" id="full-title-en" type="text" name="fullTitleEn" value="<?=htmlspecialchars($data['en']['full_title'])?>">
                    <div class="tooltips-left">
                        <div><?=__('admin_category.tool3')?></div>
                    </div>
                </label>
            </fieldset>

            <fieldset>
                <legend><?=__('admin_category.title5')?></legend>

                <p><?=__('admin_category.mes2')?></p>

                <label>
                    <span><?=__('admin_category.ru')?></span>
                    <textarea class="textarea" id="second-text-ru" name="secondTextRu"><?=htmlspecialchars($data['ru']['second_text'])?></textarea>
                    <div class="tooltips-left">
                        <div><?=__('admin_category.tool3')?></div>
                    </div>
                </label>

                <label>
                    <span><?=__('admin_category.en')?></span>
                    <textarea class="textarea" id="second-text-en" name="secondTextEn"><?=htmlspecialchars($data['en']['second_text'])?></textarea>
                    <div class="tooltips-left">
                        <div><?=__('admin_category.tool3')?></div>
                    </div>
                </label>
            </fieldset>

            <label>
                <input type="checkbox" name="active" value="1" class="option-input checkbox" <?=$data['main']['active'] == 1 ? 'checked' : ''?> />
                <span><?=__('admin_category.activity2')?></span>
            </label>

            <button type="submit" class="submit sm-buttons button text" name="button" value="send"><?=__('admin_category.save')?></button>
        </form>

    </div>
</div>

<script type="text/javascript" src="/js/admin-category.js"></script>
