<?php
// Представление контроллера User - страница профиля.

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

		<div class="info">

			<div class="gradient-border">

				<div class="body">
					<div class="title text">
						<h2><?=__('user_communications.title1')?></h2>
					</div>

					<div class="messages">

					</div>

					<div class="form text">
						<form method="post" id="password-form">
							<label>
								<span><?=__('user_communications.message')?></span>
								<textarea class="input" name="message" id="message"></textarea>
								<div class="count">
									<span></span>
								</div>
							</label>
							<button type="submit" class="submit sm-buttons button text" name="button" value="password"><?=__('user_communications.send')?></button>
						</form>
					</div>

				</div>

			</div>

			<div class="gradient-border">

				<div class="body">
					<div class="title text">
						<h2><?=__('user_communications.title2')?></h2>
					</div>

					<div class="notification text">
						<p><?=__('user_communications.mes1')?></p>
					</div>

					<?php if(!isset($data['info']['tel'])): ?>
					<div class="notification text">
						<p><?=__('user_communications.mes2')?> <a href="<?=$router->buildUri('user.settings')?>"><?=__('user_communications.mes3')?></a> <?=__('user_communications.mes4')?></p>
					</div>
					<?php else: ?>
					<div class="form text">
						<form method="post" id="password-form">
							<button type="submit" class="submit sm-buttons button text" name="button" value="password"><?=__('user_communications.call')?></button>
						</form>
					</div>
					<?php endif; ?>
				</div>

			</div>

		</div>

	</div>

</div>


<script type="text/javascript">

$(document).ready(function() {

	// Показываем и скрываем счётчик набранного текста.
	$('#message').focusin(function() {
		$('.count').fadeIn();
	});

	$('#message').focusout(function() {
		$('.count').fadeOut();
	});

	// Максимальное количество символов.
	var maxLen = 300;
	$('.count span').text(maxLen);

	// При нажатии кнопки меняем показания счетчика.
	$('#message').keyup( function() {
		var $this = $(this);

		// Если введенное количество символов превышает максимальное, то лишнее обрезаем, а счетчик приравниваем 0.
		if($this.val().length > maxLen) {
			$('.count span').text(0);
			$this.val($this.val().substr(0, maxLen));
		} else {
			$('.count span').text(maxLen - $this.val().length);
		}
	});

});

</script>
