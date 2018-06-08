<?php

$router = \App\Core\App::getRouter();

?>
<div class="container">
	<div class="feedback">

		<?php if (isset($data['messagesList'])): ?>
		<div class="title text">
			<h2><?=__('admin_feedback.title1')?></h2>
		</div>

			<?php if (count($data['messagesList']) > 0): ?>
			<div class="table text">
				<table>
					<tr>
						<th>id</th>
						<th><?=__('admin_feedback.name')?></th>
						<th>E-mail</th>
						<th></th>
					</tr>
					<?php foreach ($data['messagesList'] as $value): ?>
					<tr>
						<td><?=$value['id_users']?></td>
						<td><?=$value['firstName'] . ' ' . $value['secondName']?></td>
						<td><?=$value['email']?></td>
						<td>
							<a class="sm-buttons" href="<?=$router->buildUri('feedback.index', ['view', $value['id_users']])?>"><?=__('admin_feedback.view')?></a>
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
			<?php else: ?>
			<div class="text">
				<p><?=__('admin_feedback.mes5')?></p>
			</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php if (isset($data['message'])): ?>
		<div class="title text">
			<h2><?=__('admin_feedback.mes_title')?> ID<?=$data['user']['id']?></h2>
			<h4>
				<?php
				if (isset($data['user']['firstName'])){
					echo $data['user']['firstName'] . ' ' . $data['user']['secondName'] . ', ';
				}
				echo $data['user']['email'];
				?>
			</h4>
		</div>

		<div class="messages" id="messages" data-idus="<?=$data['user']['id']?>">
			<?php foreach($data['message'] as $value): ?>
				<?php if (isset($value['admin'])): ?>
				<div class="mes-admin text" data-idmes="<?=$value['id']?>">
					<div class="action">
						<div class="edit">
							<i class="fas fa-edit"></i>
						</div>
						<div class="delete">
							<i class="fas fa-times"></i>
						</div>
					</div>
					<div>
						<span>Admin, <?=$value['date']?></span>
						<p><?=$value['message']?></p>
					</div>
					<div class="avt">
						<img src="<?=\App\Core\Config::get('systemImg') . 'admin.png'?>">
					</div>
				</div>
				<?php else: ?>
				<div class="mes-user text">
					<div class="avt">
						<img src="<?=$data['avatar']?>">
					</div>
					<div>
						<span>User, <?=$value['date']?></span>
						<p><?=$value['message']?></p>
					</div>
				</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>

		<div class="form text">
			<form method="post" id="message-form">
				<label>
					<span><?=__('admin_feedback.message')?></span>
					<textarea class="input" name="message" id="message"></textarea>
					<div class="count">
						<span></span>
					</div>
				</label>
				<label>
					<input type="checkbox" name="active" value="0" class="option-input checkbox" checked />
					<span><?=__('admin_feedback.close_dialog')?></span>
				</label>
				<button type="submit" class="submit sm-buttons button text" name="button" value="message"><?=__('admin_feedback.send')?></button>
			</form>
		</div>
		<?php endif; ?>

	</div>
</div>

<script type="text/javascript" src="/js/admin-messages.js"></script>
