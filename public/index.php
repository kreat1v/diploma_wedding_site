<?php
// Тоочка входа.

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

include(ROOT.DS.'etc'.DS.'bootstrap.php');

try {

	$uri = $_SERVER['REQUEST_URI'];
	App\Core\App::run($uri);

} catch (Exception $e) {

	if (App\Core\Config::get('debug')) {

		echo '<pre>', var_export($e, 1), '</pre>';

	} else {

		$route = App\Core\App::getRouter()->getRoute();

		$page404 = new \App\Views\Base(
			[],
			ROOT.DS.'views'.DS.'404.php'
		);
		$content = $page404->render();

		$layout = new \App\Views\Base(
			['content' => $content],
			ROOT.DS.'views'.DS.$route.'.php'
		);

		header('HTTP/1.1 404 Not Found');
		echo $layout->render();

	}
}
