<?php

$router = \App\Core\App::getRouter();

?>

<div class="container">
    <div class="category">

        <div class="title text">
            <h2><?=__('admin_user.title')?></h2>
        </div>

        <div class="table text">
			<table>
                <tr>
                    <th><?=__('admin_user.id')?></th>
                    <th><?=__('admin_user.first_name')?></th>
                    <th><?=__('admin_user.second_name')?></th>
                    <th>E-Mail</th>
                    <th><?=__('admin_user.tel')?></th>
                    <th><?=__('admin_user.activity1')?></th>
                </tr>
				<?php foreach ($data['users'] as $users): ?>
                    <?php if ($users['role'] == 'admin'): ?>
                    <?php continue; ?>
                    <?php else: ?>
    				<tr>
    					<td><?=$users['id']?></td>
    					<td><?=$users['firstName']?></td>
    					<td><?=$users['secondName']?></td>
    					<td><?=$users['email']?></td>
    					<td><?=$users['tel']?></td>
                        <td>
                            <button class="sm-buttons text bt-activate"
                                    type="button"
                                    name="button"
                                    value="0"
                                    <?=$users['active'] ? '' : 'style="display: none;"' ?>
                                    data-id="<?=$users['id']?>">
                                <?=__('admin_user.activity3')?>
                            </button>
                            <button class="sm-buttons text bt-activate"
                                    type="button"
                                    name="button"
                                    value="1"
                                    <?=$users['active'] ? 'style="display: none;"' : '' ?>
                                    data-id="<?=$users['id']?>">
                                <?=__('admin_user.activity2')?>
                            </button>
                        </td>
    				</tr>
                    <?php endif; ?>
				<?php endforeach; ?>
			</table>
		</div>

        <!-- Пагинация. -->
        <?php if ($data['pagination']): ?>
        <nav>
            <ul class="pagination text">
                <li class="<?=$data['pagination']['back'] ? '' : 'disabled'?>">
                    <a href="<?=$data['pagination']['back'] ? $router->buildUri('user.index', [1]) : ''?>">
                        <span>&laquo;</span>
                    </a>
                </li>

                <li class="<?=$data['pagination']['back'] ? '' : 'disabled'?>">
                    <a href="<?=$data['pagination']['back'] ? $router->buildUri('user.index', [$data['pagination']['back']]) : ''?>"><?=__('pagination.previous')?></a>
                </li>

                <?php foreach ($data['pagination']['middle'] as $key => $value): ?>
                <li class="<?=$data['page'] == $key ? 'active' : ''?>">
                    <a href="<?=$router->buildUri('user.index', [$key])?>"><?=$key?></a>
                </li>
                <?php endforeach; ?>

                <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                    <a href="<?=$data['pagination']['forward'] ? $router->buildUri('user.index', [$data['pagination']['forward']]) : ''?>"><?=__('pagination.next')?></a>
                </li>

                <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                    <a href="<?=$router->buildUri('user.index', [$data['pagination']['last']])?>">
                        <span>&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
        <?php endif; ?>

    </div>
</div>

<script type="text/javascript" src="/js/admin-user.js"></script>
