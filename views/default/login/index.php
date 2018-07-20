<?php
// Представление контроллера Login - страница авторизации и регистрации.

$router = \App\Core\App::getRouter();
?>
<div class="login text">
	<div class="gradient-border ">
		<div class="cont">

			<div class="form sign-in">
				<h2><?=__('login.mes1')?></h2>
				<form method="post" id="login-form">
					<label>
						<span><?=__('login.email')?></span>
						<input type="email" name="email" id="login-email" />
						<div class="tooltips-right">
							<div><?=__('login.tool1')?></div>
						</div>
					</label>
					<label>
						<span><?=__('login.password')?></span>
						<input type="password" name="password" id="login-password" />
						<div class="tooltips-right">
							<div><?=__('login.tool2')?></div>
						</div>
					</label>
					<button type="submit" class="submit sm-buttons text" name="button" value="login"><?=__('login.login')?></button>
				</form>
			</div>

			<div class="sub-cont">
				<div class="img">
					<div class="img__text m--up">
						<h2><?=__('register.mes2')?></h2>
						<p><?=__('register.mes3')?></p>
					</div>
					<div class="img__text m--in">
						<h2><?=__('login.mes2')?></h2>
						<p><?=__('login.mes3')?></p>
					</div>
					<div class="img__btn" id="register">
						<span class="m--up"><?=__('register.register')?></span>
						<span class="m--in"><?=__('login.login')?></span>
					</div>
				</div>

				<div class="form sign-up index">
					<h2><?=__('register.mes1')?></h2>
					<form method="post" id="register-form">
						<label>
							<span><?=__('register.email')?></span>
							<input type="email" name="email" id="register-email" />
							<div class="tooltips-left">
								<div><?=__('register.tool1')?></div>
							</div>
							<div class="tooltips-left check-email">
								<div><?=__('register.tool2')?></div>
							</div>
						</label>
						<label>
							<span><?=__('register.password')?></span>
							<input type="password" name="password" id="register-password" />
							<div class="tooltips-left">
								<div><?=__('register.tool3')?></div>
							</div>
							<div class="help">
								<div class="tooltips-top">
									<div><?=__('register.tool4')?></div>
								</div>
								<i class="far fa-question-circle"></i>
							</div>
						</label>
						<label>
							<span><?=__('register.conf')?></span>
							<input type="password" name="confirm_password" id="register-confpassword" />
							<div class="tooltips-left">
								<div><?=__('register.tool5')?></div>
							</div>
						</label>
						<button type="submit" class="submit sm-buttons text" name="button" value="register"><?=__('register.register')?></button>
					</form>
				</div>
			</div>

		</div>

		<div class="mob-cont">


			<form method="post" id="login-form">

				<h2><?=__('login.mes4')?></h2>

				<label>
					<span><?=__('login.email')?></span>
					<input type="email" name="email" id="login-email" />
					<div class="tooltips-top">
						<div><?=__('login.tool1')?></div>
					</div>
				</label>
				<label>
					<span><?=__('login.password')?></span>
					<input type="password" name="password" id="login-password" />
					<div class="tooltips-top">
						<div><?=__('login.tool2')?></div>
					</div>
				</label>
				<button type="submit" class="submit sm-buttons text" name="button" value="login"><?=__('login.login')?></button>

			</form>


			<form method="post" id="register-form">

				<h2><?=__('login.mes5')?></h2>

				<label>
					<span><?=__('register.email')?></span>
					<input type="email" name="email" id="register-email" />
					<div class="tooltips-top">
						<div><?=__('register.tool1')?></div>
					</div>
					<div class="tooltips-top check-email">
						<div><?=__('register.tool2')?></div>
					</div>
				</label>
				<label>
					<span><?=__('register.password')?></span>
					<input type="password" name="password" id="register-password" />
					<div class="tooltips-top">
						<div><?=__('register.tool3')?></div>
					</div>
					<div class="help">
						<div class="tooltips-top">
							<div><?=__('register.tool4')?></div>
						</div>
						<i class="far fa-question-circle"></i>
					</div>
				</label>
				<label>
					<span><?=__('register.conf')?></span>
					<input type="password" name="confirm_password" id="register-confpassword" />
					<div class="tooltips-top">
						<div><?=__('register.tool5')?></div>
					</div>
				</label>
				<button type="submit" class="submit sm-buttons text" name="button" value="register"><?=__('register.register')?></button>

			</form>

		</div>

	</div>
</div>

<script type="text/javascript" src="/js/login.js"></script>
<script type="text/javascript" src="/js/validation-login.js"></script>
