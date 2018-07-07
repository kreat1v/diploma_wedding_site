<div class="container">
    <div class="category">

        <div class="title text">
            <h2><?=__('admin_moderationcomments.title2')?></h2>
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
                <span><?=__('admin_moderationcomments.comments')?></span>
                <textarea class="textarea" id="messages" name="comments"><?=$data['comments']['messages']?></textarea>
                <div class="tooltips-left">
                    <div><?=__('admin_category.tool3')?></div>
                </div>
            </label>

            <label>
                <input type="checkbox" name="active" value="1" class="option-input checkbox" <?=$data['comments']['active'] == 1 ? 'checked' : ''?> />
                <span><?=__('admin_moderationcomments.activity2')?></span>
            </label>

            <button type="submit" class="submit sm-buttons button text" name="button" value="send"><?=__('admin_moderationcomments.save')?></button>
        </form>

    </div>
</div>

<script type="text/javascript" src="/js/admin-moderationedit.js"></script>
