<?php

$router = \App\Core\App::getRouter();

?>
<div class="container">
	<div class="feedback">

		<div class="title text">
			<h2><?=__('admin_feedback.title3')?></h2>
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
					<th></th>
				</tr>
				<?php foreach ($data as $value): ?>
				<tr>
					<td><?=$value['id_users']?></td>
					<td><?=$value['firstName'] . ' ' . $value['secondName']?></td>
					<td><?=$value['email']?></td>
					<td><?=$value['tel']?></td>
					<td><?=$value['date']?></td>
					<td>
						<form method="post"  id="form-archive">
							<input type="hidden" name="id" value="<?=$value['id_users']?>">
							<button class="sm-buttons text" type="button" name="button" value="archive" id="archive"><?=__('admin_feedback.archive')?></button>
						</form>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
		<?php else: ?>
		<div class="text">
			<p><?=__('admin_feedback.mes7')?></p>
		</div>
		<?php endif; ?>

	</div>
</div>

<script type="text/javascript" src="/js/admin-calls.js"></script>
