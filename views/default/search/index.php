<?php if (!empty($data) || !empty($_GET['query'])): ?>

<div class="sections map text link">
    <div class="title">
        <h2><?=__('search.title1')?></h2>
    </div>

    <div class="map-block">

    <?php if (!empty($data)): ?>
        <ul>
            <?php foreach ($data as $value): ?>
                <li>
                    <a href="<?=$value['link']?>"><?=$value['title']?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p><?=__('search.mes')?></p>
    <?php endif; ?>

    </div>

</div>

<?php else: ?>

<div class="cart">

    <div class="gradient-border">

        <div class="body">

            <div class="title text">
                <h2><?=__('search.title2')?></h2>
            </div>

            <div class="form text">
                <form method="get">

                    <label>
                        <span><?=__('search.query')?></span>
                        <input type="text" name="query" class="input" />
                    </label>

                    <button type="submit" class="submit sm-buttons button text"><?=__('search.send')?></button>

                </form>
            </div>

        </div>

    </div>

</div>

<?php endif; ?>
