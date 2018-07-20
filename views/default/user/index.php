<?php

$router = \App\Core\App::getRouter();

?>
<div class="user">

	<div class="container">

		<div class="user-menu">
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

					<div class="avatar">
						<img class="cropim" src="<?=$data['avatar']?>" />
					</div>

					<?php if (isset($data['info']['firstName'])): ?>
					<div class="title text">
						<h2><?=$data['info']['firstName'] . ' ' . $data['info']['secondName']?></h2>
					</div>
					<?php endif; ?>

					<div class="data text">
						<p><b><?=__('user_index.email')?>:</b> <?=$data['info']['email']?></p>
						<?php if (isset($data['info']['tel'])): ?>
						<p><b><?=__('user_index.tel')?>:</b> <?=$data['info']['tel']?></p>
						<?php endif; ?>
					</div>

					<?php if (!isset($data['info']['firstName']) || !isset($data['info']['secondName']) || !isset($data['info']['email']) || !isset($data['info']['tel'])): ?>
					<div class="notification text">
						<p><?=__('user_index.mes1')?> <a href="<?=$router->buildUri('user.settings')?>"><?=__('user_index.mes2')?></a> <?=__('user_index.mes3')?></p>
					</div>
					<?php endif; ?>

				</div>

			</div>

		</div>

	</div>

</div>
