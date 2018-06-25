<?php

use \App\Core\Config;

$router = \App\Core\App::getRouter();
$edit = isset($data['edit']) ? true : false;

?>

<div class="container">
    <div class="category">

        <!-- Если есть $data со списком услуг - выводим таблицу всех доступных услуг в данной категории. -->
        <?php if (isset($data['product'])): ?>

            <div class="title text">
                <h2><?=__('admin_product.title1')?></h2>
                <h4><?=$data['category']?></h4>
            </div>

            <div class="bt text">
                <a class="sm-buttons" href="<?=$router->buildUri('product.filming', ['new'])?>">
                    <?=__('admin_product.new')?>
                </a>
            </div>

            <div class="table text">
    			<table>
                    <tr>
                        <th><?=__('admin_product.id')?></th>
                        <th><?=__('admin_product.name')?></th>
                        <th><?=__('admin_product.activity1')?></th>
                        <th><?=__('admin_product.stock1')?></th>
                        <th></th>
                        <th></th>
                    </tr>
    				<?php foreach ($data['product'] as $value): ?>
    				<tr>
    					<td><?=$value['id_filming']?></td>
    					<td><?=$value['title']?></td>
                        <td><?=$value['active'] == 1 ? __('admin_product.activity2') : '-'?></td>
                        <td><?=$value['stock'] ? __('admin_product.stock2') : '-'?></td>
                        <?php if ($value['active'] == 1): ?>
    					<td>
                            <a class="sm-buttons" href="<?=$router->buildUri('default.filming.view', [$value['id_filming']])?>">
                                <?=__('admin_product.view')?>
                            </a>
                        </td>
                        <?php else: ?>
                        <td></td>
                        <?php endif; ?>
    					<td>
                            <a class="sm-buttons" href="<?=$router->buildUri('admin.product.filming', ['edit', $value['id_filming']])?>">
                                <?=__('admin_product.edit')?>
                            </a>
                        </td>
    				</tr>
    				<?php endforeach; ?>
    			</table>
    		</div>

            <!-- Пагинация для вывода товаров. -->
            <?php if ($data['pagination']): ?>
            <nav>
                <ul class="pagination text">
                    <li class="<?=$data['pagination']['back'] ? '' : 'disabled'?>">
                        <a href="<?=$data['pagination']['back'] ? $router->buildUri('admin.product.filming', [1]) : ''?>">
                            <span>&laquo;</span>
                        </a>
                    </li>

                    <li class="<?=$data['pagination']['back'] ? '' : 'disabled'?>">
                        <a href="<?=$data['pagination']['back'] ? $router->buildUri('admin.product.filming', [$data['pagination']['back']]) : ''?>"><?=__('pagination.previous')?></a>
                    </li>

                    <?php foreach ($data['pagination']['middle'] as $key => $value): ?>
                    <li class="<?=$data['page'] == $key ? 'active' : ''?>">
                        <a href="<?=$router->buildUri('admin.product.filming', [$key])?>"><?=$key?></a>
                    </li>
                    <?php endforeach; ?>

                    <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                        <a href="<?=$data['pagination']['forward'] ? $router->buildUri('admin.product.filming', [$data['pagination']['forward']]) : ''?>"><?=__('pagination.next')?></a>
                    </li>

                    <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                        <a href="<?=$router->buildUri('admin.product.filming', [$data['pagination']['last']])?>">
                            <span>&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <?php endif; ?>

        <!-- Иначе выводим редактор услуги. -->
        <?php else: ?>

            <div class="title text">
                <?php if($edit): ?>
                <h2><?=__('admin_product.title2')?></h2>
                <?php else: ?>
                <h2><?=__('admin_product.title3')?></h2>
                <?php endif; ?>
                <h4><?=$data['category']?></h4>
            </div>

            <form class="form text" id="product-form" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend><?=__('admin_product.title4')?></legend>

                    <label>
                        <span><?=__('admin_product.ru')?></span>
                        <input class="input" id="title-ru" type="text" name="titleRu" value="<?=$edit ? $data['edit']['ru']['title'] : ''?>">
                        <div class="tooltips-left">
                            <div><?=__('admin_product.tool1')?></div>
                        </div>
                    </label>

                    <label>
                        <span><?=__('admin_product.en')?></span>
                        <input class="input" id="title-en" type="text" name="titleEn" value="<?=$edit ? $data['edit']['en']['title'] : ''?>">
                        <div class="tooltips-left">
                            <div><?=__('admin_product.tool1')?></div>
                        </div>
                    </label>
                </fieldset>

                <fieldset>
                    <legend><?=__('admin_product.title5')?></legend>

                    <label>
                        <span><?=__('admin_product.ru')?></span>
                        <textarea class="textarea" id="text-ru" name="textRu"><?=$edit ? $data['edit']['ru']['text'] : ''?></textarea>
                        <div class="tooltips-left">
                            <div><?=__('admin_product.tool1')?></div>
                        </div>
                    </label>

                    <label>
                        <span><?=__('admin_product.en')?></span>
                        <textarea class="textarea" id="text-en" name="textEn"><?=$edit ? $data['edit']['en']['text'] : ''?></textarea>
                        <div class="tooltips-left">
                            <div><?=__('admin_product.tool1')?></div>
                        </div>
                    </label>
                </fieldset>

                <fieldset>
                    <legend><?=__('admin_product.title6')?></legend>

                    <label>
                        <span><?=__('admin_product.price')?></span>
                        <input class="input" id="price" type="text" name="price" value="<?=$edit ? $data['edit']['main']['price'] : ''?>">
                        <div class="tooltips-left">
                            <div><?=__('admin_product.tool2')?></div>
                        </div>
                    </label>

                    <label>
                        <span><?=__('admin_product.stock')?></span>
                        <input class="input" id="stock" type="text" name="stock" value="<?=$edit ? $data['edit']['main']['stock'] : ''?>">
                        <div class="tooltips-left">
                            <div><?=__('admin_product.tool7')?></div>
                        </div>
                    </label>
                </fieldset>

                <fieldset>
                    <legend><?=__('admin_product.title7')?></legend>

                    <p><?=__('admin_product.mes2')?></p>

                    <label>
                        <span><?=__('admin_product.ru')?></span>
                        <textarea class="input" id="contacts-ru" name="contactsRu"><?=$edit ? $data['edit']['ru']['contacts'] : ''?></textarea>
                        <div class="tooltips-left">
                            <div><?=__('admin_product.tool6')?></div>
                        </div>
                        <div class="count">
                            <span>100</span>
                        </div>
                    </label>

                    <label>
                        <span><?=__('admin_product.en')?></span>
                        <textarea class="input" id="contacts-en" name="contactsEn"><?=$edit ? $data['edit']['en']['contacts'] : ''?></textarea>
                        <div class="tooltips-left">
                            <div><?=__('admin_product.tool6')?></div>
                        </div>
                        <div class="count">
                            <span>100</span>
                        </div>
                    </label>

                    <label>
                        <span><?=__('admin_product.tel')?></span>
                        <input class="input" id="telephone" type="tel" name="tel" value="<?=$edit ? $data['edit']['main']['tel'] : ''?>" />
                        <div class="tooltips-left">
                            <div><?=__('admin_product.tool1')?></div>
                        </div>
                    </label>

                    <p><?=__('admin_product.mes3')?></p>

                    <label>
                        <span><?=__('admin_product.fb')?></span>
                        <input type="text" name="fb" value="<?=$edit ? $data['edit']['main']['fb'] : ''?>" class="input" />
                    </label>

                    <label>
                        <span><?=__('admin_product.inst')?></span>
                        <input type="text" name="inst" value="<?=$edit ? $data['edit']['main']['inst'] : ''?>" class="input" />
                    </label>

                    <label>
                        <span><?=__('admin_product.teleg')?></span>
                        <input type="text" name="telegram" value="<?=$edit ? $data['edit']['main']['telegram'] : ''?>" class="input" />
                    </label>
                </fieldset>

                <fieldset>
                    <legend><?=__('admin_product.title8')?></legend>

                    <p><?=__('admin_product.mes4')?></p>

                    <div id="galery">

                        <?php if(isset($data['edit']['galery']) && $data['edit']['galery'] != false): ?>
                            <?php foreach ($data['edit']['galery'] as $img): ?>
                            <div class="file-upload"
                                    data-name="<?=$img?>"
                                    data-category="<?=$data['edit']['category']?>"
                                    data-id="<?=$data['edit']['main']['id']?>">
                                <img class="product-image" style="display: block;" src="<?=Config::get('filmingImg') . $data['edit']['main']['id'] . DS . $img?>" />
                                <span class="delete-image">
                                    <i class="fas fa-times-circle"></i>
                                </span>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </div>

                    <div class="tooltips-left image-error">
                        <div><?=__('admin_product.tool8')?></div>
                    </div>

                </fieldset>

                <label>
                    <input type="checkbox" name="active" value="1" class="option-input checkbox" <?=$edit && $data['edit']['main']['active'] ? 'checked' : ''?> />
                    <span><?=__('admin_product.activity2')?></span>
                </label>

                <button type="submit" class="submit sm-buttons button text" name="button" value="send"><?=__('admin_product.save')?></button>
            </form>

        <?php endif; ?>

    </div>
</div>

<script type="text/javascript" src="/js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="/js/admin-product.js"></script>
