<?php

$router = \App\Core\App::getRouter();

?>
<?php foreach ($data as $value): ?>
<li><a class="" href="<?=$router->buildUri('product.edit', [$value['category_name']])?>"><?=$value['title']?></a></li>
<?php endforeach; ?>
