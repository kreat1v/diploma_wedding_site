<?php

$router = \App\Core\App::getRouter();

?>

<div class="container">
    <div class="category">

        <div class="title text">
            <h2><?=__('admin_orders.title')?></h2>
        </div>

        <div class="table text">
			<table class="small">
                <tr>
                    <th><?=__('admin_orders.date')?></th>
                    <th><?=__('admin_orders.contacts')?></th>
                    <th><?=__('admin_orders.message')?></th>
                    <th><?=__('admin_orders.method')?></th>
                    <th><?=__('admin_orders.services')?></th>
                    <th><?=__('admin_orders.price')?></th>
                    <th></th>
                </tr>
				<?php foreach ($data['orders'] as $orders): ?>
				<tr>
					<td><?=date('d.m.Y H:i', strtotime($orders['date']))?></td>
					<td><?=$orders['contacts']?></td>
					<td><?=$orders['message'] ? $orders['message'] : '-'?></td>
                    <?php $payment = $orders['payment'] ?>
                    <td><?=__("cart.$payment")?></td>
                    <td>
                        <ol>
                            <?php foreach ($orders['products'] as $products): ?>
                            <li>
                                <?=$products['category_title']?> - <?=$products['title']?>
                            </li>
                            <?php endforeach; ?>
                        </ol>
                    </td>
                    <td><?=$orders['price']?></td>
                    <td>
                        <button class="sm-buttons text bt-orders" <?=$orders['active'] ? '' : 'style="display: none;"' ?> type="button" data-id="<?=$orders['id']?>">
                            <?=__('admin_orders.paid1')?>
                        </button>
                        <span <?=$orders['active'] ? 'style="display: none;"' : '' ?>>
                            <?=__('admin_orders.paid2')?>
                        </span>
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
                    <a href="<?=$data['pagination']['back'] ? $router->buildUri('orders.index', [1]) : ''?>">
                        <span>&laquo;</span>
                    </a>
                </li>

                <li class="<?=$data['pagination']['back'] ? '' : 'disabled'?>">
                    <a href="<?=$data['pagination']['back'] ? $router->buildUri('orders.index', [$data['pagination']['back']]) : ''?>"><?=__('pagination.previous')?></a>
                </li>

                <?php foreach ($data['pagination']['middle'] as $key => $value): ?>
                <li class="<?=$data['page'] == $key ? 'active' : ''?>">
                    <a href="<?=$router->buildUri('orders.index', [$key])?>"><?=$key?></a>
                </li>
                <?php endforeach; ?>

                <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                    <a href="<?=$data['pagination']['forward'] ? $router->buildUri('orders.index', [$data['pagination']['forward']]) : ''?>"><?=__('pagination.next')?></a>
                </li>

                <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                    <a href="<?=$router->buildUri('orders.index', [$data['pagination']['last']])?>">
                        <span>&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
        <?php endif; ?>

    </div>
</div>

<script type="text/javascript" src="/js/admin-orders.js"></script>
