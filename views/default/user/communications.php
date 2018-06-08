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

		<div class="info">

			<div class="gradient-border">

				<div class="body">
					<div class="title text">
						<h2><?=__('user_communications.title1')?></h2>
					</div>

					<div class="messages" id="messages">
						<?php foreach($data['messages'] as $value): ?>
							<?php if (!isset($value['admin'])): ?>
							<div class="mes-user text">
								<div>
									<span>Вы, <?=$value['date']?></span>
									<p><?=$value['message']?></p>
								</div>
								<div class="avt">
									<img src="<?=$data['avatar']?>">
								</div>
							</div>
							<?php else: ?>
							<div class="mes-admin text">
								<div class="avt">
									<img src="<?=\App\Core\Config::get('systemImg') . 'admin.png'?>">
								</div>
								<div>
									<span>Администратор, <?=$value['date']?></span>
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
							<button type="submit" class="submit sm-buttons button text" name="button" value="message"><?=__('user_communications.send')?></button>
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
					<?php elseif($data['calls']): ?>
					<div class="notification text">
						<p><?=__('user_communications.mes7')?></p>
					</div>
					<?php else: ?>
					<div class="form text">
						<form method="post" id="password-form">
							<button type="submit" class="submit sm-buttons button text" name="button" value="call"><?=__('user_communications.call')?></button>
						</form>
					</div>
					<?php endif; ?>
				</div>

			</div>

		</div>

	</div>

</div>

<script type="text/javascript" src="/js/validation-usercommunications.js"></script>
<script type="text/javascript" src="/js/communications-messages.js"></script>
