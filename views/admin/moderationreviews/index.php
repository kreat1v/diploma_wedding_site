<?php

$router = \App\Core\App::getRouter();

?>

<div class="container">
    <div class="category">

        <div class="title text">
            <h2><?=__('admin_moderationreviews.title1')?></h2>
        </div>

        <div class="table text">
			<table>
                <tr>
                    <th><?=__('admin_moderationreviews.category')?></th>
                    <th><?=__('admin_moderationreviews.count')?></th>
                    <th></th>
                </tr>
				<?php foreach ($data['data'] as $category): ?>
				<tr>
					<td><?=$category['title']?></td>
                    <td><?php
                    $categoryName = $category['category_name'];
                    echo $data[$categoryName];
                    ?></td>
					<td>
                        <a class="sm-buttons" href="<?=$router->buildUri("moderationreviews.view", [$categoryName])?>">
                            <?=__('admin_moderationreviews.view')?>
                        </a>
                    </td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>

    </div>
</div>
