<div class="sections map text link">
    <div class="title">
        <h2><?=__('search.title')?></h2>
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
