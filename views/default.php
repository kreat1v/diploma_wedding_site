<?php

/** @var array $data */

use App\Core\Localization;
use App\Core\Session;

$router = \App\Core\App::getRouter();

?><!doctype html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title><?=\App\Core\Config::get('siteName')?></title>
	    <link rel="stylesheet" href="/css/index.css">
		<link href="https://fonts.googleapis.com/css?family=Caveat:400,700|Montserrat+Alternates:300,300i,400,400i,500,500i,700,700i&amp;subset=cyrillic" rel="stylesheet">
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
	</head>

	<body style="background: fixed url('/img/back.png') center no-repeat #F0F0FF; background-size: 100%">
		<header>
	        <div class="menu" <?=$router->getController('true') == 'Login' ? 'style="width: 750px"' : ''?>>
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
	            <div class="right-side">
	                <div class="search" id="search">
	                    <form>
	                        <input type="text" />
	                        <div class="cross"></div>
	                    </form>
	                </div>

	                <div class="buttons">
	                    <a href="#">
							<span><?=__('header.about')?></span>
						</a>
						<?php if($router->getController('true') != 'Login'): ?>
	                    <a href="#">
							<span><?=__('header.news')?></span>
						</a>
	                    <a href="#">
							<span><?=__('header.stories')?></span>
						</a>
	                    <a href="<?=$router->buildUri('.login')?>">
							<span><?=__('header.login')?></span>
						</a>
						<?php endif; ?>
	                </div>
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

	    <!-- Modal -->
	    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	        <div class="modal-dialog" role="document">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <h5 class="modal-title" id="exampleModalLabel">Hello!</h5>
	                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                        <span aria-hidden="true">&times;</span>
	                    </button>
	                </div>
	                <div class="modal-body">
	                    Do you want to subscribe to the newsletter?
	                </div>
	                <div class="modal-footer">
	                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	                    <a class="btn btn-primary" href="<?=$router->buildUri('subscription.index')?>">Yes</a>
	                </div>
	            </div>
	        </div>
	    </div> -->

	    <!-- <div class="modal fade" id="exitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	        <div class="modal-dialog" role="document">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <h5 class="modal-title" id="exampleModalLabel">Hello!</h5>
	                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                        <span aria-hidden="true">&times;</span>
	                    </button>
	                </div>
	                <div class="modal-body">
	                    Exit?
	                </div>
	                <div class="modal-footer">
	                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	                    <a class="btn btn-primary" href="<?=$router->buildUri('subscription.index')?>">Yes</a>
	                </div>
	            </div>
	        </div>
	    </div> -->

		<footer>
	        <div class="footer" class="menu">
	            <div class="menu-list">
	                <ul>
	                    <li><a href=""><?=__('footer.about')?></a></li>
	                    <li><a href=""><?=__('footer.communications')?></a></li>
	                    <li><a href=""><?=__('footer.contacts')?></a></li>
	                    <li><a href=""><?=__('footer.map')?></a></li>
	                    <li><a href="<?=Localization::getLang() == 'ru' ? Localization::chooseLang('en') : Localization::chooseLang('ru')?>">
							<i class="fas fa-globe"></i> <?=__('footer.language')?>
						</a></li>
	                </ul>
	            </div>
	            <div class="contacts">
	                <ul>
	                    <li><a title="<?=__('footer.tel')?>" href="tel: +380950001122">+38 (095) 000 11 22</a></li>
	                    <li><a title="<?=__('footer.tel')?>" href="tel: +380670001122">+38 (067) 000 11 22</a></li>
	                    <li><a title="<?=__('footer.mail')?>" href="mailto:kostyakomarov7@gmail.com">kostyakomarov7@gmail.com</a></li>
	                    <li>&copy К A L E I D O S C O P E - <?=date('Y')?></li>
	                </ul>
	            </div>
	            <div class="social">
	                <ul>
	                    <li><a href="https://www.facebook.com"><i class="fab fa-facebook-square fa-2x"></i></a></li>
	                    <li><a href="https://www.instagram.com"><i class="fab fa-instagram fa-2x"></i></a></li>
	                    <li><a href="https://telegram.org/"><i class="fab fa-telegram-plane fa-2x"></i></a></li>
	                </ul>
	            </div>
	        </div>
	    </footer>

		<script type="text/javascript" src="/js/jquery.backstretch.min.js"></script>
		<script type="text/javascript" src="/js/search.js"></script>
		<script type="text/javascript" src="/js/info-messages.js"></script>

	    <!-- <script type="application/javascript" src="/js/admin.js"></script>
	    <script type="application/javascript" src="/js/subscription.js"></script>
	    <script type="application/javascript" src="/js/close.js"></script>
	    <script type="application/javascript" src="/js/ad.js"></script>
	    <script type="application/javascript" src="/js/vote.js"></script>
	    <script type="application/javascript" src="/js/comments.js"></script>
	    <script type="application/javascript" src="/js/jquery.cookie.js"></script> -->

	</body>

</html>