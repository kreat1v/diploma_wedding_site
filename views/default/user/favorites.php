<?php

$router = \App\Core\App::getRouter();

?>
<div class="user">
	<div class="container">

		<div class="menu">
			<ul>
				<?php foreach (\App\Core\Config::get('userMenu') as $value): ?>
				<li class="buttons">
					<a class="<?=$router->getAction('true') == $value ? 'active' : ''?>" href="<?=$router->buildUri('user.' . $value)?>"><?=__('user_menu.' . $value)?></a>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div class="favorites">
			<div class="title text">
				<h2><?=__('user_favorites.title')?></h2>
			</div>

			<?php if (count($data) > 0): ?>
			<div class="table text">
				<table>
					<tr>
						<th><?=__('user_favorites.name')?></th>
						<th><?=__('user_favorites.price')?></th>
						<th><?=__('user_favorites.stock')?></th>
						<th></th>
						<th></th>
					</tr>
					<?php foreach ($data as $key => $value): ?>
					<tr>
						<td><?=$value['title']?></td>
						<td><?=$value['price']?></td>
						<td><?=isset($value['stock']) ? $value['stock'] : '-'?></td>
						<td>
							<a class="sm-buttons" href="<?=$router->buildUri('clothes.view', [$value['id']])?>">
								<?=__('user_favorites.view')?>
							</a>
						</td>
						<td>
							<span class="delete" data-idprod="<?=$key?>"><i class="fas fa-times"></i></span>
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
			<?php else: ?>
			<div class="text">
				<p><?=__('user_favorites.mes')?></p>
			</div>
			<?php endif; ?>
		</div>

	</div>
</div>

<script type="text/javascript" src="/js/delete-favorites.js"></script>
