<?php

/** @var array $data */

use App\Core\Localization;
use App\Core\Session;
use App\Core\Config;

$router = \App\Core\App::getRouter();

if(Session::get('id')) {

	$session_id = Session::get('id');

	if (!file_exists(Config::get('userImgRoot') . $session_id)) {

		$avatar = Config::get('systemImg') . 'user.png';

	} else {

		$paths = array_values(array_diff(scandir(Config::get('userImgRoot') . $session_id), ['.', '..']));
		$avatar = Config::get('userImg') . $session_id . DS . $paths[0];

	}

} else {

	$session_id = false;

}

?><!doctype html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title><?=Config::get('siteName')?></title>
		<link href="<?=Config::get('systemImg') . "favicon.ico"?>" rel="icon" type="image/x-icon" />
	    <link rel="stylesheet" href="/css/index.css">
		<link href="https://fonts.googleapis.com/css?family=Caveat:400,700|Montserrat+Alternates:300,300i,400,400i,500,500i,700,700i&amp;subset=cyrillic" rel="stylesheet">
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
	</head>

	<body>
		<header>
	        <div class="menu" <?=$router->getController('true') == 'Login' ? 'style="width: 750px"' : ''?>>
				<a href="<?=$router->buildUri('.')?>">
					<div class="wrap">
		                <div class="logo">
		                    <div class="grid">
		                        <div class="red nw"></div>
		                        <div class="blue sw"></div>
		                        <div class="blue se"></div>
		                        <div class="red ne"></div>
		                        <div class="yellow ne"></div>
		                        <div class="navy se"></div>
		                        <div class="navy sw"></div>
		                        <div class="yellow nw"></div>
		                        <div class="yellow se"></div>
		                        <div class="navy ne"></div>
		                        <div class="navy nw"></div>
		                        <div class="yellow sw"></div>
		                        <div class="red sw"></div>
		                        <div class="blue nw"></div>
		                        <div class="blue ne"></div>
		                        <div class="red se"></div>
		                    </div>
		                    <div class="grid">
		                        <div class="blue se"></div>
		                        <div class="navy ne"></div>
		                        <div class="navy nw"></div>
		                        <div class="blue sw"></div>
		                        <div class="navy sw"></div>
		                        <div class="black nw"></div>
		                        <div class="black ne"></div>
		                        <div class="navy se"></div>
		                        <div class="navy nw"></div>
		                        <div class="black sw"></div>
		                        <div class="black se"></div>
		                        <div class="navy ne"></div>
		                        <div class="blue ne"></div>
		                        <div class="navy se"></div>
		                        <div class="navy sw"></div>
		                        <div class="blue nw"></div>
		                    </div>
		                    <div class="grid">
		                        <div class="red nw"></div>
		                        <div class="blue sw"></div>
		                        <div class="blue se"></div>
		                        <div class="red ne"></div>
		                        <div class="yellow ne"></div>
		                        <div class="navy se"></div>
		                        <div class="navy sw"></div>
		                        <div class="yellow nw"></div>
		                        <div class="yellow se"></div>
		                        <div class="navy ne"></div>
		                        <div class="navy nw"></div>
		                        <div class="yellow sw"></div>
		                        <div class="red sw"></div>
		                        <div class="blue nw"></div>
		                        <div class="blue ne"></div>
		                        <div class="red se"></div>
		                    </div>
		                </div>
		                <div class="byline">
		                    <span>K</span>
		                    <span>A</span>
		                    <span>L</span>
		                    <span>E</span>
		                    <span>I</span>
		                    <span>D</span>
		                    <span>O</span>
		                    <span>S</span>
		                    <span>C</span>
		                    <span>O</span>
		                    <span>P</span>
		                    <span>E</span>
		                </div>
		            </div>
				</a>

	            <div class="right-side">
	                <div class="search" id="search">
	                    <form>
	                        <input type="text" id="search-form" />
	                        <div class="cross"></div>
	                    </form>

						<div class="result text">
							<ul></ul>
							<div class="all">
								<a href=""><?=__('search.all')?></a>
							</div>
						</div>
	                </div>

	                <div class="buttons">
	                    <a href="<?=$router->buildUri('.about')?>">
							<span><?=__('header.about')?></span>
						</a>
						<?php if($router->getController('true') != 'Login'): ?>
	                    <a href="<?=$router->buildUri('.stories')?>">
							<span><?=__('header.stories')?></span>
						</a>
							<?php if (!$session_id):?>
		                    <a href="<?=$router->buildUri('.login')?>">
								<span><?=__('header.login')?></span>
							</a>
							<?php endif; ?>
						<?php endif; ?>
	                </div>

					<?php if ($session_id && Session::get('role') == 'user'):?>
					<div class="user-buttons text">
						<a class="body" href="<?=$router->buildUri('.user')?>">
							<div class="avatar">
								<img src="<?=$avatar?>">
							</div>
							<span><?=Session::get('name') ? Session::get('name') : Session::get('email')?></span>
						</a>
						<a class="close" href="<?=$router->buildUri('user.logout')?>">
							<span><i class="fas fa-times"></i></span>
						</a>
					</div>
					<?php elseif($session_id && Session::get('role') == 'admin'):?>
					<div class="user-buttons text">
						<a class="body" href="<?=$router->buildUri('.admin')?>">
							<div class="avatar">
								<img src="<?=Config::get('systemImg') . 'admin.png'?>">
							</div>
							<span>Admin</span>
						</a>
						<a class="close" href="<?=$router->buildUri('user.logout')?>">
							<span><i class="fas fa-times"></i></span>
						</a>
					</div>
					<?php endif; ?>
	            </div>
	        </div>
	    </header>

		<main>
			<div class="tooltips-main">
				<?php if (Session::hasFlash()):
					foreach (Session::getFlash() as $message): ?>
						<div class="tooltips">
							<div class="close">
								<i class="far fa-times-circle"></i>
							</div>
							<div>
								<?=$message?>
							</div>
						</div>
					<?php endforeach;
				endif; ?>
			</div>
			<?=$data['content']?>
		</main>

		<!-- Модальное окно. -->
		<?php if(Session::get('role') != 'admin'):?>
		<div class="modal">
			<div class="modal-content">
					<div class="modal-close" id="modal-no">
						<i class="far fa-times-circle"></i>
					</div>
					<div>
						<span><?=__('subscription.mes1')?></span>
					</div>
					<div class="modal-button">
						<a href="<?=$router->buildUri('.subscription')?>" id="modal-yes"><?=__('subscription.but')?></a>
					</div>
			</div>
		</div>
		<?php endif; ?>

		<footer>
	        <div class="footer" class="menu">
	            <div class="menu-list">
	                <ul>
	                    <li><a href="<?=$router->buildUri('.about')?>"><?=__('footer.about')?></a></li>
	                    <li><a href=""><?=__('footer.communications')?></a></li>
	                    <li><a href="<?=$router->buildUri('.contacts')?>"><?=__('footer.contacts')?></a></li>
	                    <li><a href="<?=$router->buildUri('.map')?>"><?=__('footer.map')?></a></li>
	                    <li><a href="<?=Localization::getLang() == 'ru' ? Localization::chooseLang('en') : Localization::chooseLang('ru')?>">
							<i class="fas fa-globe"></i> <?=__('footer.language')?>
						</a></li>
	                </ul>
	            </div>
				<?=$data['contacts']?>
	        </div>
	    </footer>

		<!-- Боковое меню -->
		<div>
			<div id="bar-menu">
				<span><i class="fas fa-bars fa-2x"></i></span>
			</div>

			<div id="bar-main">
				<ul class="link text">

					<li>
						<a href="<?=$router->buildUri('.about')?>"><?=__('bar-menu.about')?></a>
					</li>
					<li>
						<a href="<?=$router->buildUri('.contacts')?>"><?=__('bar-menu.contacts')?></a>
					</li>

					<br>

					<li>
						<a href="<?=$router->buildUri('.stories')?>"><?=__('bar-menu.stories')?></a>
					</li>

					<br>

					<?=$data['category']?>

					<br>

					<li>
						<a href="<?=$router->buildUri('.user')?>"><?=__('bar-menu.user')?></a>
					</li>
					<li>
						<a href="<?=$router->buildUri('.cart')?>"><?=__('bar-menu.cart')?></a>
					</li>

				</ul>
			</div>
		</div>

		<!-- Корзина -->
		<?php if (Session::get('role') === 'user' && $router->getController(true) != 'Cart'): ?>
			<div>
				<div id="cart" data-lang="<?=$router->getLang()?>">
					<span><i class="fas fa-shopping-cart fa-2x"></i></span>
				</div>

				<div id="cart-main">
					<div class="cart">

						<div class="title text">
							<h2><?=__('cart.title1')?></h2>
						</div>

						<div class="list">
							<ul></ul>
						</div>

						<div class="form text cart-order">
							<a class="sm-buttons" href="<?=$router->buildUri("cart.ordering")?>"><?=__('cart.order1')?></a>
						</div>

					</div>
				</div>
			</div>
		<?php endif; ?>

		<!-- Кнопка вверх -->
		<div id="back-top">
			<div>
				<span><i class="fas fa-chevron-circle-up fa-2x"></i></span>
			</div>
		</div>

		<script type="text/javascript" src="/js/jquery.backstretch.min.js"></script>
		<script type="text/javascript" src="/js/search.js"></script>
		<script type="text/javascript" src="/js/info-messages.js"></script>
		<script type="text/javascript" src="/js/jquery.nicescroll.min.js"></script>
		<script type="text/javascript" src="/js/bar-menu.js"></script>
		<script type="text/javascript" src="/js/cart.js"></script>
		<script type="text/javascript" src="/js/back-top.js"></script>
		<script type="text/javascript" src="/js/jquery.cookie.js"></script>
	    <script type="text/javascript" src="/js/subscription.js"></script>

	</body>

</html>
