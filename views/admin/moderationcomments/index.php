<?php

$router = \App\Core\App::getRouter();

?>

<div class="container">
    <div class="category">

        <div class="title text">
            <h2><?=__('admin_moderationcomments.title1')?></h2>
        </div>

        <div class="table text">
			<table>
                <tr>
                    <th><?=__('admin_moderationcomments.id')?></th>
                    <th><?=__('admin_moderationcomments.id_stories')?></th>
                    <th><?=__('admin_moderationcomments.comments')?></th>
                    <th><?=__('admin_moderationcomments.activity1')?></th>
                    <th></th>
                </tr>
				<?php foreach ($data['comments'] as $review): ?>
				<tr>
					<td><?=$review['id_users']?></td>
					<td><?=$review['id_stories']?></td>
                    <td>
                        <?php
                        if (mb_strlen($review['messages']) <= 50) {
                            echo $review['messages'];
                        } else {
                            echo mb_substr($review['messages'], 0, 50) . '...';
                        }
                        ?>
                    </td>
                    <td>
                        <button class="sm-buttons text bt-activate"
                                type="button"
                                name="button"
                                value="0"
                                <?=$review['active'] ? '' : 'style="display: none;"' ?>
                                data-id="<?=$review['id']?>">
                            <?=__('admin_moderationcomments.activity4')?>
                        </button>
                        <button class="sm-buttons text bt-activate"
                                type="button"
                                name="button"
                                value="1"
                                <?=$review['active'] ? 'style="display: none;"' : '' ?>
                                data-id="<?=$review['id']?>">
                            <?=__('admin_moderationcomments.activity3')?>
                        </button>
                    </td>
					<td>
                        <a class="sm-buttons" href="<?=$router->buildUri("moderationcomments.edit", [$review['id']])?>">
                            <?=__('admin_moderationcomments.edit')?>
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
                    <a href="<?=$data['pagination']['back'] ? $router->buildUri('moderationcomments.index', [1]) : ''?>">
                        <span>&laquo;</span>
                    </a>
                </li>

                <li class="<?=$data['pagination']['back'] ? '' : 'disabled'?>">
                    <a href="<?=$data['pagination']['back'] ? $router->buildUri('moderationcomments.index', [$data['pagination']['back']]) : ''?>"><?=__('pagination.previous')?></a>
                </li>

                <?php foreach ($data['pagination']['middle'] as $key => $value): ?>
                <li class="<?=$data['page'] == $key ? 'active' : ''?>">
                    <a href="<?=$router->buildUri('moderationcomments.index', [$key])?>"><?=$key?></a>
                </li>
                <?php endforeach; ?>

                <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                    <a href="<?=$data['pagination']['forward'] ? $router->buildUri('moderationcomments.index', [$data['pagination']['forward']]) : ''?>"><?=__('pagination.next')?></a>
                </li>

                <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                    <a href="<?=$router->buildUri('moderationcomments.index', [$data['pagination']['last']])?>">
                        <span>&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
        <?php endif; ?>

    </div>
</div>

<script type="text/javascript" src="/js/admin-moderationcomments.js"></script>
