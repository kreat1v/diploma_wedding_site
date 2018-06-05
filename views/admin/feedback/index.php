<?php

$router = \App\Core\App::getRouter();

?>
<div class="container">

	<?php if (isset($data['messagesList'])): ?>
	<div class="title text">
		<h2>Активные сообщения</h2>
	</div>

	<div class="table text">
		<table>
			<tr>
				<th>id</th><th>Имя</th><th>Email</th><th>Ответить</th>
			</tr>
			<?php foreach ($data['messagesList'] as $value): ?>
			<tr>
				<td><?=$value['id_users']?></td>
				<td><?=$value['firstName'] . ' ' . $value['secondName']?></td>
				<td><?=$value['email']?></td>
				<td>Ответить</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<?php endif; ?>

	<?php if (isset($data['message'])): ?>
	<div class="title text">
		<h2>Сообщения от пользователя ID<?=$data['user']['id']?></h2>
		<h4><?=$data['user']['email']?></h4>
	</div>

	<div class="messages text">
		<?php foreach ($data['message'] as $value): ?>
			<?php if (isset($value['admin'])): ?>
			<p>Admin</p>
			<?php else: ?>
			<p><?=$data['user']['firstName']?> <?=$data['user']['secondName']?></p>
			<?php endif; ?>
		<p><?=$value['date']?></p>
		<p><?=$value['message']?></p>
		<br>
		<?php endforeach; ?>
	</div>

	<div class="form text">
		<form method="post" id="message-form">
			<label>
				<span><?=__('user_communications.message')?></span>
				<textarea class="input" name="message" id="message"></textarea>
				<div class="count">
					<span></span>
				</div>
			</label>
			<label>
				<input type="checkbox" name="active" value="0" class="option-input checkbox" checked /> Закрыть диалог?
			</label>
			<button type="submit" class="submit sm-buttons button text" name="button" value="message"><?=__('user_communications.send')?></button>
		</form>
	</div>
	<?php endif; ?>

</div>
