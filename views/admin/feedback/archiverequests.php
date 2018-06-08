<?php

$router = \App\Core\App::getRouter();

?>
<div class="container">
	<div class="feedback">

		<div class="title text">
			<h2><?=__('admin_feedback.title4')?></h2>
		</div>

		<?php if (count($data) > 0): ?>
		<div class="table text">
			<table>
				<tr>
					<th>id</th>
					<th><?=__('admin_feedback.name')?></th>
					<th>E-mail</th>
					<th><?=__('admin_feedback.tel')?></th>
					<th><?=__('admin_feedback.date')?></th>
				</tr>
				<?php foreach ($data as $value): ?>
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
		<?php else: ?>
		<div class="text">
			<p><?=__('admin_feedback.mes8')?></p>
		</div>
		<?php endif; ?>

	</div>
</div>
