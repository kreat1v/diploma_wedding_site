<?php

$router = \App\Core\App::getRouter();

$category = $data['category'];

?>

<div class="container">
    <div class="category">

        <div class="title text">
            <h2><?=__('admin_moderationreviews.title1')?></h2>
            <h4><?=$data['categoryName']?></h4>
        </div>

        <div class="table text">
			<table>
                <tr>
                    <th><?=__('admin_moderationreviews.id')?></th>
                    <th><?=__('admin_moderationreviews.review')?></th>
                    <th><?=__('admin_moderationreviews.activity1')?></th>
                    <th></th>
                </tr>
				<?php foreach ($data['reviews'] as $review): ?>
				<tr>
					<td><?=$review['id_users']?></td>
                    <td>
                        <?php
                        if (mb_strlen($review['reviews']) <= 50) {
                            echo $review['reviews'];
                        } else {
                            echo mb_substr($review['reviews'], 0, 50) . '...';
                        }
                        ?>
                    </td>
                    <td>
                        <button class="sm-buttons text bt-activate"
                                type="button"
                                name="button"
                                value="0"
                                <?=$review['active'] ? '' : 'style="display: none;"' ?>
                                data-id="<?=$review['id']?>"
                                data-category="<?=$category?>">
                            <?=__('admin_moderationreviews.activity4')?>
                        </button>
                        <button class="sm-buttons text bt-activate"
                                type="button"
                                name="button"
                                value="1"
                                <?=$review['active'] ? 'style="display: none;"' : '' ?>
                                data-id="<?=$review['id']?>"
                                data-category="<?=$category?>">
                            <?=__('admin_moderationreviews.activity3')?>
                        </button>
                    </td>
					<td>
                        <a class="sm-buttons" href="<?=$router->buildUri("moderationreviews.edit", [$category, $review['id']])?>">
                            <?=__('admin_moderationreviews.edit')?>
                        </a>
                    </td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>

        <!-- Пагинация. -->
        <?php if ($data['pagination']): ?>
        <nav>
            <ul class="pagination text">
                <li class="<?=$data['pagination']['back'] ? '' : 'disabled'?>">
                    <a href="<?=$data['pagination']['back'] ? $router->buildUri('moderationreviews.view', [$data['category'], 1]) : ''?>">
                        <span>&laquo;</span>
                    </a>
                </li>

                <li class="<?=$data['pagination']['back'] ? '' : 'disabled'?>">
                    <a href="<?=$data['pagination']['back'] ? $router->buildUri('moderationreviews.view', [$data['category'], $data['pagination']['back']]) : ''?>"><?=__('pagination.previous')?></a>
                </li>

                <?php foreach ($data['pagination']['middle'] as $key => $value): ?>
                <li class="<?=$data['page'] == $key ? 'active' : ''?>">
                    <a href="<?=$router->buildUri('moderationreviews.view', [$data['category'], $key])?>"><?=$key?></a>
                </li>
                <?php endforeach; ?>

                <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                    <a href="<?=$data['pagination']['forward'] ? $router->buildUri('moderationreviews.view', [$data['category'], $data['pagination']['forward']]) : ''?>"><?=__('pagination.next')?></a>
                </li>

                <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                    <a href="<?=$router->buildUri('moderationreviews.view', [$data['category'], $data['pagination']['last']])?>">
                        <span>&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
        <?php endif; ?>

    </div>
</div>

<script type="text/javascript" src="/js/admin-moderationreviews.js"></script>
