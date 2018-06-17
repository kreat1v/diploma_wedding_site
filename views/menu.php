<?php

$router = \App\Core\App::getRouter();

foreach ($data as $value):

    $categoryName = $value['category_name'];

    if ($router->getRoute() == 'admin') {
        $link = $router->buildUri("product.$categoryName");
    } else {
        $link = $router->buildUri(".$categoryName");
    }

?>
<li><a class="" href="<?=$link?>"><?=$value['title']?></a></li>
<?php endforeach; ?>
