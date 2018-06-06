<?php

$router = \App\Core\App::getRouter();

?>
<div class="container">
	<div class="feedback">

		<?php if (isset($data['messagesList'])): ?>
		<div class="title text">
			<h2>Активные диалоги</h2>
		</div>

		<div class="table text">
			<table>
				<tr>
					<th>id</th>
					<th>Имя</th>
					<th>Email</th>
					<th></th>
				</tr>
				<?php foreach ($data['messagesList'] as $value): ?>
				<tr>
					<td><?=$value['id_users']?></td>
					<td><?=$value['firstName'] . ' ' . $value['secondName']?></td>
					<td><?=$value['email']?></td>
					<td>
						<a class="sm-buttons" href="<?=$router->buildUri('admin.feedback.index.view') . DS . $value['id_users']?>">Просмотр</a>
					</td>
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

		<div class="messages" id="messages">
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
						<span>Вы, <?=$value['date']?></span>
						<p><?=$value['message']?></p>
					</div>
				</div>
				<?php endif; ?>
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
					<input type="checkbox" name="active" value="0" class="option-input checkbox" checked />
					<span>Закрыть диалог?</span>
				</label>
				<button type="submit" class="submit sm-buttons button text" name="button" value="message"><?=__('user_communications.send')?></button>
			</form>
		</div>
		<?php endif; ?>

	</div>
</div>

<script type="text/javascript">

	// По клику на кнопке редактирования сообщения открываем форму редактирования.
	$('.edit').click(function() {

		// Если какая-ллибо форма уже открыта, она закроется. Иначе форма открывается.
		if ($('.form-edit').length) {

			$('.form-edit').remove();

		} else {

			var parent = $(this).parents('.mes-admin');
			var mes = $(parent).find('p').text();
			var form = '<div class="form-edit">' +
						'<form>' +
						'<textarea name="editMessage" id="newMes">' + mes + '</textarea>' +
						'<button class="button" type="button" name="button" value="edit" id="edit"><i class="far fa-save fa-2x"></i></button>' +
						'</form>' +
						'</div>';

			$(parent).after(form);

			$('#edit').click(function() {

				var idMes = $(parent).attr('data-idmes');
				var newMes = $('#newMes').val();

				$.ajax({
					url: '/admin/feedback/editmessage',
					type: 'post',
					data: {
						id: idMes,
						message: newMes
					},

					success: function(response) {
						var data = JSON.parse(response);

						if (data.result === 'success') {

							$('.form-edit').remove();

							$(parent).find('p').text(newMes);

						} else {

							$('.form-edit').remove();

							var error = '<div class="form-edit text">' +
										'<p>' + data.msg + '</p>' +
										'</div>';

							$(parent).after(error);

							setTimeout(function() {
								$('.form-edit').remove();
							}, 1500);

						}
					},

					error: function (response) {
						$('.form-edit').remove();

						var error = '<div class="form-edit text">' +
									'<p>Error!</p>' +
									'</div>';

						$(parent).after(error);

						setTimeout(function() {
							$('.form-edit').remove();
						}, 1000);
			        }

				});

			});
		}

	});

</script>
