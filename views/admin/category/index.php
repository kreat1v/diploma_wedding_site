<?php

$router = \App\Core\App::getRouter();

?>

<div class="container">
    <div class="category">

        <div class="title text">
            <h2><?=__('admin_category.title')?></h2>
        </div>

        <div class="table text">
			<table>
                <tr>
                    <th><?=__('admin_category.category')?></th>
                    <th><?=__('admin_category.activity1')?></th>
                    <th></th>
                </tr>
				<?php foreach ($data as $category): ?>
				<tr>
					<td><?=$category['title']?></td>
                    <td><?=$category['active'] == 1 ? __('admin_category.activity2') : '-'?></td>
					<td>
                        <a class="sm-buttons" href="<?=$router->buildUri('admin.category.edit', [$category['id_category']])?>">
                            <?=__('admin_category.edit')?>
                        </a>
                    </td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>

    </div>
</div>
