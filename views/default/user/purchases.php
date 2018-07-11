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
				<h2><?=__('user_purchases.title')?></h2>
			</div>

			<?php if (count($data) > 0): ?>
			<div class="table text">
				<table>
					<tr>
						<th><?=__('user_purchases.date')?></th>
						<th><?=__('user_purchases.message')?></th>
						<th><?=__('user_purchases.method')?></th>
						<th><?=__('user_purchases.services')?></th>
						<th><?=__('user_purchases.price')?></th>
						<th></th>
					</tr>
					<?php foreach ($data as $value): ?>
					<tr>
						<td><?=date('d.m.Y H:i', strtotime($value['date']))?></td>
						<td><?=$value['message'] ? $value['message'] : '-'?></td>
						<?php $payment = $value['payment'] ?>
						<td><?=__("cart.$payment")?></td>
						<td>
							<ol>
								<?php foreach ($value['products'] as $products): ?>
								<li>
									<?=$products['title']?>
								</li>
								<?php endforeach; ?>
							</ol>
						</td>
						<td><?=$value['price']?></td>
						<td><?=$value['active'] ? __('user_purchases.paid2') : __('user_purchases.paid1')?></td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
			<?php else: ?>
			<div class="text">
				<p><?=__('user_purchases.mes')?></p>
			</div>
			<?php endif; ?>
		</div>

	</div>
</div>

<script type="text/javascript" src="/js/delete-favorites.js"></script>
