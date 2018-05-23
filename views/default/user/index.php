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
					<a href="<?=$router->buildUri('user.' . $value)?>"><?=__('user_menu.' . $value)?></a>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div class="info">
			<div class="gradient-border">
				<div class="body">
					<div class="blur">
						<img src="<?=\App\Core\Config::get('systemImg') . 'user.png'?>">
					</div>

					<div class="avatar">
						<img src="<?=\App\Core\Config::get('systemImg') . 'user.png'?>">
					</div>

					<div class="data text">
						<p class="lead"><b>Your first name:</b> <?=$data['firstName']?></p>
						<p class="lead"><b>Your second name:</b> <?=$data['secondName']?></p>
						<p class="lead"><b>Your email:</b> <?=$data['email']?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
