<?php

$router = \App\Core\App::getRouter();

?>

<div class="container">
    <div class="category">

        <div class="title text">
            <h2><?=__('admin_product.title1')?></h2>
        </div>

        <div class="table text">
			<table>
                <tr>
                    <th><?=__('admin_product.category')?></th>
                    <th><?=__('admin_product.count')?></th>
                    <th></th>
                </tr>
				<?php foreach ($data['data'] as $category): ?>
				<tr>
					<td><?=$category['title']?></td>
                    <td><?php
                    $categoryName = $category['category_name'];
                    $count = 'count_' . $categoryName;
                    echo $data[$categoryName];
                    ?></td>
					<td>
                        <a class="sm-buttons" href="<?=$router->buildUri("product.$categoryName")?>">
                            <?=__('admin_product.view')?>
                        </a>
                    </td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>

    </div>
</div>
