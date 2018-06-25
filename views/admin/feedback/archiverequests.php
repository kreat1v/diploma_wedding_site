<?php

$router = \App\Core\App::getRouter();

?>
<div class="container">
	<div class="feedback">

		<div class="title text">
			<h2><?=__('admin_feedback.title4')?></h2>
		</div>

		<?php if (count($data['callsList']) > 0): ?>

		<div class="table text">
			<table>
				<tr>
					<th>id</th>
					<th><?=__('admin_feedback.name')?></th>
					<th>E-mail</th>
					<th><?=__('admin_feedback.tel')?></th>
					<th><?=__('admin_feedback.date')?></th>
				</tr>
				<?php foreach ($data['callsList'] as $value): ?>
				<tr>
					<td><?=$value['id_users']?></td>
					<td><?=$value['firstName'] . ' ' . $value['secondName']?></td>
					<td><?=$value['email']?></td>
					<td><?=$value['tel']?></td>
					<td><?=$value['date']?></td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>

			<!-- Пагинация. -->
			<?php if ($data['pagination']): ?>
			<nav>
				<ul class="pagination text">
					<li class="<?=$data['pagination']['back'] ? '' : 'disabled'?>">
						<a href="<?=$data['pagination']['back'] ? $router->buildUri('admin.feedback.archiverequests', [1]) : ''?>">
							<span>&laquo;</span>
						</a>
					</li>

					<li class="<?=$data['pagination']['back'] ? '' : 'disabled'?>">
						<a href="<?=$data['pagination']['back'] ? $router->buildUri('admin.feedback.archiverequests', [$data['pagination']['back']]) : ''?>"><?=__('pagination.previous')?></a>
					</li>

					<?php foreach ($data['pagination']['middle'] as $key => $value): ?>
					<li class="<?=$data['page'] == $key ? 'active' : ''?>">
						<a href="<?=$router->buildUri('admin.feedback.archiverequests', [$key])?>"><?=$key?></a>
					</li>
					<?php endforeach; ?>

					<li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
						<a href="<?=$data['pagination']['forward'] ? $router->buildUri('admin.feedback.archiverequests', [$data['pagination']['forward']]) : ''?>"><?=__('pagination.next')?></a>
					</li>

					<li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
						<a href="<?=$router->buildUri('admin.feedback.archiverequests', [$data['pagination']['last']])?>">
							<span>&raquo;</span>
						</a>
					</li>
				</ul>
			</nav>
			<?php endif; ?>

		<?php else: ?>

		<div class="text">
			<p><?=__('admin_feedback.mes8')?></p>
		</div>

		<?php endif; ?>

	</div>
</div>
