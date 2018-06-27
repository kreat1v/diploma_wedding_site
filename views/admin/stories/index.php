<?php

$router = \App\Core\App::getRouter();

?>

<div class="container">
    <div class="category">

        <div class="title text">
            <h2><?=__('admin_stories.title1')?></h2>
        </div>

        <div class="bt text">
            <a class="sm-buttons" href="<?=$router->buildUri('stories.edit')?>">
                <?=__('admin_stories.new')?>
            </a>
        </div>

        <div class="table text">
			<table>
                <tr>
                    <th><?=__('admin_stories.id')?></th>
                    <th><?=__('admin_stories.name')?></th>
                    <th><?=__('admin_stories.activity1')?></th>
                    <th></th>
                    <th></th>
                </tr>
				<?php foreach ($data['stories'] as $value): ?>
				<tr>
					<td><?=$value['id_stories']?></td>
					<td><?=$value['title']?></td>
                    <td><?=$value['active'] == 1 ? __('admin_stories.activity2') : '-'?></td>
                    <?php if ($value['active'] == 1): ?>
					<td>
                        <a class="sm-buttons" href="<?=$router->buildUri('default.stories.view', [$value['id_stories']])?>">
                            <?=__('admin_stories.view')?>
                        </a>
                    </td>
                    <?php else: ?>
                    <td></td>
                    <?php endif; ?>
					<td>
                        <a class="sm-buttons" href="<?=$router->buildUri('stories.edit', [$value['id_stories']])?>">
                            <?=__('admin_stories.edit')?>
                        </a>
                    </td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>

        <!-- Пагинация для вывода товаров. -->
        <?php if ($data['pagination']): ?>
        <nav>
            <ul class="pagination text">
                <li class="<?=$data['pagination']['back'] ? '' : 'disabled'?>">
                    <a href="<?=$data['pagination']['back'] ? $router->buildUri('stories.index', [1]) : ''?>">
                        <span>&laquo;</span>
                    </a>
                </li>

                <li class="<?=$data['pagination']['back'] ? '' : 'disabled'?>">
                    <a href="<?=$data['pagination']['back'] ? $router->buildUri('stories.index', [$data['pagination']['back']]) : ''?>"><?=__('pagination.previous')?></a>
                </li>

                <?php foreach ($data['pagination']['middle'] as $key => $value): ?>
                <li class="<?=$data['page'] == $key ? 'active' : ''?>">
                    <a href="<?=$router->buildUri('stories.index', [$key])?>"><?=$key?></a>
                </li>
                <?php endforeach; ?>

                <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                    <a href="<?=$data['pagination']['forward'] ? $router->buildUri('stories.index', [$data['pagination']['forward']]) : ''?>"><?=__('pagination.next')?></a>
                </li>

                <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                    <a href="<?=$router->buildUri('stories.index', [$data['pagination']['last']])?>">
                        <span>&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
        <?php endif; ?>

    </div>
</div>
