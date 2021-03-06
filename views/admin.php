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
	    <link rel="stylesheet" href="/css/admin-index.css">
		<link href="https://fonts.googleapis.com/css?family=Caveat:400,700|Montserrat+Alternates:300,300i,400,400i,500,500i,700,700i&amp;subset=cyrillic" rel="stylesheet">
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
	</head>

	<body>
        <div class="admin-menu">
            <nav>
                <ul class="menu-bar text">
					<li>
						<a href="<?=$router->buildUri('.category')?>"><?=__('admin_menu.category')?></a>
					</li>
					<li>
						<a href="<?=$router->buildUri('.product')?>"><?=__('admin_menu.goods')?></a>
						<ul>
							<?=$data['category']?>
						</ul>
					</li>
					<li>
						<a href="<?=$router->buildUri('.orders')?>"><?=__('admin_menu.orders')?></a>
					</li>

					<br>

					<li>
						<a href="<?=$router->buildUri('.stories')?>"><?=__('admin_menu.stories')?></a>
					</li>

					<br>

					<li>
						<a href="<?=$router->buildUri('.user')?>"><?=__('admin_menu.users')?></a>
					</li>
                    <li><a href="<?=$router->buildUri('.feedback')?>"><?=__('admin_menu.feedback')?></a>
                        <ul>
                            <li><a href="<?=$router->buildUri('.feedback')?>"><?=__('admin_feedback.title1')?></a></li>
                            <li><a href="<?=$router->buildUri('feedback.archiveddialogs')?>"><?=__('admin_feedback.title2')?></a></li>
                            <li><a href="<?=$router->buildUri('feedback.activerequests')?>"><?=__('admin_feedback.title3')?></a></li>
                            <li><a href="<?=$router->buildUri('feedback.archiverequests')?>"><?=__('admin_feedback.title4')?></a></li>
                        </ul>
                    </li>
					<li>
						<a href="<?=$router->buildUri('.moderationreviews')?>"><?=__('admin_menu.moderationreviews')?></a>
					</li>
					<li>
						<a href="<?=$router->buildUri('.moderationcomments')?>"><?=__('admin_menu.moderationcomments')?></a>
					</li>

					<br>

					<li>
						<a href="<?=$router->buildUri('.about')?>"><?=__('admin_menu.about')?></a>
					</li>
					<li>
						<a href="<?=$router->buildUri('.cover')?>"><?=__('admin_menu.photo')?></a>
					</li>
					<li>
						<a href="<?=$router->buildUri('.contacts')?>"><?=__('admin_menu.contacts')?></a>
					</li>
                </ul>
            </nav>
        </div>

        <div class="content">
            <header>
    	        <div class="menu">
    				<a href="<?=$router->buildUri('default.category.index')?>">
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
    	                <div class="lang text">
                            <a href="<?=Localization::getLang() == 'ru' ? Localization::chooseLang('en') : Localization::chooseLang('ru')?>">
    							<i class="fas fa-globe"></i> <?=__('admin_menu.language')?>
    						</a>
    	                </div>

    					<div class="user-buttons text">
    						<a class="body" href="<?=$router->buildUri('.')?>">
    							<div class="avatar">
    								<img src="<?=Config::get('systemImg') . 'admin.png'?>">
    							</div>
    							<span>Admin</span>
    						</a>
    						<a class="close" href="<?=$router->buildUri('default.user.logout')?>">
    							<span><i class="fas fa-times"></i></span>
    						</a>
    					</div>
    	            </div>
    	        </div>
    	    </header>

    		<main>

    			<div class="tooltips-main" style="left: 22%">
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

				<div class="main-content">

					<?=$data['content']?>

				</div>

				<div class="style-message text">

					<p><?=__('admin_menu.style')?></p>

				</div>

    		</main>
        </div>

		<!-- Модальное окно. -->
		<?php if (Session::hasModal()): ?>
		<div class="modal">
			<div class="modal-content">
					<div class="modal-close" id="modal-no">
						<i class="far fa-times-circle"></i>
					</div>
					<div>
						<span>
							<?=Session::getModal()?>
						</span>
					</div>
					<div class="modal-button">
						<button class="text" type="button" id="modal-yes"><i class="fas fa-check"></i></button>
					</div>
			</div>
		</div>
		<?php endif; ?>

		<script type="text/javascript" src="/js/info-messages.js"></script>
		<script type="text/javascript" src="/js/jquery.nicescroll.min.js"></script>

	</body>

</html>
