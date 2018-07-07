<div class="container">
    <div class="category">

        <div class="title text">
            <h2><?=__('admin_moderationreviews.title2')?></h2>
            <h4>
                <?php
                if (isset($data['user']['firstName'])){
                    echo $data['user']['firstName'] . ' ' . $data['user']['secondName'] . ', ';
                }
                echo $data['user']['email'];
                ?>
            </h4>
        </div>

        <form class="form text" id="moderationedit-form" method="post">

            <label>
                <span><?=__('admin_moderationreviews.review')?></span>
                <textarea class="textarea" id="messages" name="reviews"><?=$data['reviews']['reviews']?></textarea>
                <div class="tooltips-left">
                    <div><?=__('admin_category.tool3')?></div>
                </div>
            </label>

            <label>
                <input type="checkbox" name="active" value="1" class="option-input checkbox" <?=$data['reviews']['active'] == 1 ? 'checked' : ''?> />
                <span><?=__('admin_moderationreviews.activity2')?></span>
            </label>

            <button type="submit" class="submit sm-buttons button text" name="button" value="send"><?=__('admin_moderationreviews.save')?></button>
        </form>

    </div>
</div>

<script type="text/javascript" src="/js/admin-moderationedit.js"></script>
