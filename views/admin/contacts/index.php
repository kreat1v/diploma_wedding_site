<div class="container">
    <div class="category">

        <div class="title text">
            <h2><?=__('admin_contacts.title1')?></h2>
        </div>

        <form class="form text" id="contacts-form" method="post">

            <fieldset>
                <legend><?=__('admin_contacts.title2')?></legend>

                <label>
                    <span><?=__('admin_contacts.ru')?></span>
                    <textarea class="input" id="ru_text" name="ru_text"><?=$data['ru_text']?></textarea>
                    <div class="tooltips-left">
                        <div><?=__('admin_contacts.tool1')?></div>
                    </div>
                </label>

                <label>
                    <span><?=__('admin_contacts.en')?></span>
                    <textarea class="input" id="en_text" name="en_text"><?=$data['en_text']?></textarea>
                    <div class="tooltips-left">
                        <div><?=__('admin_contacts.tool1')?></div>
                    </div>
                </label>
            </fieldset>

            <fieldset>
                <legend><?=__('admin_contacts.title3')?></legend>

                <p><?=__('admin_contacts.mes1')?></p>

                <label>
                    <span><?=__('admin_contacts.ru')?></span>
                    <input class="input" type="text" id="ru_address" name="ru_address" value="<?=$data['ru_address']?>" />
                    <div class="tooltips-left">
                        <div><?=__('admin_contacts.tool1')?></div>
                    </div>
                </label>

                <label>
                    <span><?=__('admin_contacts.en')?></span>
                    <input class="input" type="text" id="en_address" name="en_address" value="<?=$data['en_address']?>" />
                    <div class="tooltips-left">
                        <div><?=__('admin_contacts.tool1')?></div>
                    </div>
                </label>

                <p><?=__('admin_contacts.mes2')?></p>

                <label>
                    <span>E-mail</span>
                    <input class="input" type="email" name="email" id="email" value="<?=$data['email']?>" />
                    <div class="tooltips-left">
                        <div><?=__('admin_contacts.tool2')?></div>
                    </div>
                </label>

                <p><?=__('admin_contacts.mes3')?></p>

                <label>
                    <span><?=__('admin_contacts.tel')?></span>
                    <input class="input telephone" id="telephone" type="tel" name="tel1" value="<?=$data['tel1']?>" />
                    <div class="tooltips-left">
                        <div><?=__('admin_contacts.tool1')?></div>
                    </div>
                </label>

                <label>
                    <span><?=__('admin_contacts.tel')?></span>
                    <input class="input telephone" type="tel" name="tel2" value="<?=$data['tel2']?>" />
                </label>

                <label>
                    <span><?=__('admin_contacts.tel')?></span>
                    <input class="input telephone" type="tel" name="tel3" value="<?=$data['tel3']?>" />
                </label>

                <p><?=__('admin_contacts.mes4')?></p>

                <label>
                    <span><?=__('admin_contacts.fb')?></span>
                    <input type="text" name="fb" value="<?=$data['fb']?>" class="input" />
                </label>

                <label>
                    <span><?=__('admin_contacts.inst')?></span>
                    <input type="text" name="instagram" value="<?=$data['instagram']?>" class="input" />
                </label>

                <label>
                    <span><?=__('admin_contacts.teleg')?></span>
                    <input type="text" name="telegram" value="<?=$data['telegram']?>" class="input" />
                </label>
            </fieldset>

            <button type="submit" class="submit sm-buttons button text" name="button" value="send"><?=__('admin_contacts.save')?></button>
        </form>

    </div>
</div>

<script type="text/javascript" src="/js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="/js/admin-contacts.js"></script>
