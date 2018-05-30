<?php

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

				<div class="avatar-select">

					<div class="form text">

						<h2><?=__('user_settings.title_avatar')?></h2>
						<div class="avatar">
							<img class="cropim" src="<?=$data['avatar']?>" />
						</div>

						<form class="avatar-crop" enctype="multipart/form-data" method="post">
							<div>
								<img id='image' class="cropimage" src="" />
							</div>
							<div class="results">
								<input type="hidden" class="cropX" name="cropX" value="">
								<input type="hidden" class="cropY" name="cropY" value="">
								<input type="hidden" class="cropW" name="cropW" value="">
								<input type="hidden" class="cropH" name="cropH" value="">
							</div>

							<div class="file-upload submit sm-buttons button">
							     <label>
							          <input type="file" name="avatar" id="imgInput">
							          <?=__('user_settings.choose')?>
							     </label>
							</div>
							<button class="submit sm-buttons button text" type="submit" name="button" value="avatar"><?=__('user_settings.download')?></button>
							<?php if (!strstr($data['avatar'], 'user.png')): ?>
							<button class="submit sm-buttons button text" type="submit" name="button" value="deleteAvatar"><?=__('user_settings.delete')?></button>
							<?php endif; ?>
						</form>

					</div>

				</div>

			</div>

			<div class="gradient-border">

				<div class="body">

					<div class="form text">
						<h2><?=__('user_settings.title')?></h2>
						<form method="post" id="data-form">
							<div class="sex">
								<span><?=__('user_settings.sex')?></span>
								<label>
									<input type="radio" name="sex" value="m" class="option-input radio" <?=isset($data['info']['sex']) && $data['info']['sex'] == 'm' ? 'checked' : ''?> />
									<span><?=__('user_settings.guy')?></span>
								</label>
								<label>
									<input type="radio" name="sex" value="f" class="option-input radio" <?=isset($data['info']['sex']) && $data['info']['sex'] == 'f' ? 'checked' : ''?> />
									<span><?=__('user_settings.girl')?></span>
								</label>
							</div>
							<label>
								<span><?=__('user_settings.name')?></span>
								<input type="text" name="firstName" value="<?=isset($data['info']['firstName']) ? $data['info']['firstName'] : ''?>" class="input" id="first-name" />
								<div class="tooltips-left">
									<div><?=__('user_settings.tool1')?></div>
								</div>
							</label>
							<label>
								<span><?=__('user_settings.surname')?></span>
								<input type="text" name="secondName" value="<?=isset($data['info']['secondName']) ? $data['info']['secondName'] : ''?>" class="input" id="second-name" />
								<div class="tooltips-left">
									<div><?=__('user_settings.tool2')?></div>
								</div>
							</label>
							<label>
								<span><?=__('user_settings.telephone')?></span>
								<input type="tel" name="tel" value="<?=isset($data['info']['tel']) ? $data['info']['tel'] : ''?>" class="input" id="telephone" />
							</label>
							<label>
								<span><?=__('user_settings.email')?></span>
								<input type="email" name="email" value="<?=isset($data['info']['email']) ? $data['info']['email'] : ''?>" class="input" id="email" />
								<div class="tooltips-left">
									<div><?=__('user_settings.tool3')?></div>
								</div>
								<div class="tooltips-left check-email">
									<div><?=__('user_settings.tool4')?></div>
								</div>
							</label>
							<button type="submit" class="submit sm-buttons button text" name="button" value="data"><?=__('user_settings.save')?></button>
						</form>
					</div>

				</div>

			</div>

			<div class="gradient-border">

				<div class="body">

					<div class="form text">
						<form method="post" id="password-form">
							<h2><?=__('user_settings.title_pas')?></h2>
							<label>
								<span><?=__('user_settings.old_pas')?></span>
								<input type="password" name="oldPassword" class="input" id="old-password" />
								<div class="tooltips-left">
									<div><?=__('user_settings.tool5')?></div>
								</div>
							</label>
							<label>
								<span><?=__('user_settings.password')?></span>
								<input type="password" name="password" class="input" id="password" />
								<div class="tooltips-left">
									<div><?=__('user_settings.tool5')?></div>
								</div>
								<div class="help">
									<div class="tooltips-top">
										<div><?=__('user_settings.tool6')?></div>
									</div>
									<i class="far fa-question-circle"></i>
								</div>
							</label>
							<label>
								<span><?=__('user_settings.conf')?></span>
								<input type="password" name="confirmPassword" class="input" id="confirm-password" />
								<div class="tooltips-left">
									<div><?=__('user_settings.tool7')?></div>
								</div>
							</label>
							<button type="submit" class="submit sm-buttons button text" name="button" value="password"><?=__('user_settings.change')?></button>
						</form>
					</div>

				</div>

			</div>

		</div>

	</div>

</div>

<script type="text/javascript" src="/js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="/js/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="/js/jquery.cropbox.js"></script>
<script type="text/javascript" src="/js/avatar-crop.js"></script>
<script type="text/javascript" src="/js/validation-usersettings.js"></script>
