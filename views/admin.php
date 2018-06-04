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
						<a href="#">О нас</a>
					</li>
                    <li>
                        <a href="#">Фото обложки</a>
                    </li>
                    <li>
                        <a href="#">Контакты</a>
                    </li>

					<br>

					<li>
						<a href="#">Истории</a>
					</li>

					<br>

                    <li>
                        <a href="#">Категории</a>
                    </li>
                    <li>
                        <a href="#">Товары</a>
                        <ul>
                            <li><a href="#">Оформление</a></li>
                            <li><a href="#">Одежда</a></li>
                            <li><a href="#">Авто</a></li>
                        </ul>
                    </li>
                    <li>
						<a href="#">Заказы</a>
					</li>

					<br>

                    <li><a href="#">Обратная связь</a>
                        <ul>
                            <li><a href="#">Сообщения</a></li>
                            <li><a href="#">Звонки</a></li>
                        </ul>
                    </li>
					<li>
						<a href="#">Модерация</a>
						<ul>
							<li><a href="#">Отзывы о товарах</a></li>
							<li><a href="#">Комментарии историй</a></li>
						</ul>
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
    						<a class="close" href="<?=$router->buildUri('user.logout')?>">
    							<span><i class="fas fa-times"></i></span>
    						</a>
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
        </div>

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

		<script type="text/javascript" src="/js/jquery.backstretch.min.js"></script>
		<script type="text/javascript" src="/js/search.js"></script>
		<script type="text/javascript" src="/js/info-messages.js"></script>
		<script type="text/javascript" src="/js/jquery.nicescroll.min.js"></script>

		<script type="text/javascript">
		$(document).ready(function() {
	        $("html").niceScroll();
		});
		</script>

	    <!-- <script type="application/javascript" src="/js/admin.js"></script>
	    <script type="application/javascript" src="/js/subscription.js"></script>
	    <script type="application/javascript" src="/js/close.js"></script>
	    <script type="application/javascript" src="/js/ad.js"></script>
	    <script type="application/javascript" src="/js/vote.js"></script>
	    <script type="application/javascript" src="/js/comments.js"></script>
	    <script type="application/javascript" src="/js/jquery.cookie.js"></script> -->

	</body>

</html>
