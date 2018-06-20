<?php

$router = \App\Core\App::getRouter();

?>

<div class="container">
    <div class="category">

        <?php if (isset($data['product'])): ?>

            <div class="title text">
                <h2><?=__('admin_product.title1')?></h2>
                <h5><?=__('admin_product.title1')?></h5>
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
    					<td><?=$value['id']?></td>
    					<td><?=$value['title']?></td>
                        <td><?=$value['active'] == 1 ? __('admin_product.activity2') : '-'?></td>
                        <td><?=$value['stock'] ? __('admin_product.stock2') : '-'?></td>
    					<td>
                            <a class="sm-buttons" href="<?=$router->buildUri('default.clothes.view', [$value['id']])?>">
                                <?=__('admin_product.view')?>
                            </a>
                        </td>
    					<td>
                            <a class="sm-buttons" href="<?=$router->buildUri('admin.product.clothes', ['edit', $value['id']])?>">
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
                        <a href="<?=$data['pagination']['back'] ? $router->buildUri('admin.product.clothes', [1]) : ''?>">
                            <span>&laquo;</span>
                        </a>
                    </li>

                    <li class="<?=$data['pagination']['back'] ? '' : 'disabled'?>">
                        <a href="<?=$data['pagination']['back'] ? $router->buildUri('admin.product.clothes', [$data['pagination']['back']]) : ''?>"><?=__('pagination.previous')?></a>
                    </li>

                    <?php foreach ($data['pagination']['middle'] as $key => $value): ?>
                    <li class="<?=$data['page'] == $key ? 'active' : ''?>">
                        <a href="<?=$router->buildUri('admin.product.clothes', [$key])?>"><?=$key?></a>
                    </li>
                    <?php endforeach; ?>

                    <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                        <a href="<?=$data['pagination']['forward'] ? $router->buildUri('admin.product.clothes', [$data['pagination']['forward']]) : ''?>"><?=__('pagination.next')?></a>
                    </li>

                    <li class="<?=$data['pagination']['forward'] ? '' : 'disabled'?>">
                        <a href="<?=$router->buildUri('admin.product.clothes', [$data['pagination']['last']])?>">
                            <span>&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <?php endif; ?>

        <?php elseif (isset($data['edit'])): ?>

            <form class="form text" id="category-form" method="post">
                <fieldset>
                    <legend><?=__('admin_category.title2')?></legend>

                    <p><?=__('admin_category.mes1')?></p>

                    <label>
                        <span><?=__('admin_category.ru')?></span>
                        <input class="input" id="title-ru" type="text" name="titleRu" value="<?=$data['ru']['title']?>">
                        <div class="tooltips-left">
                            <div><?=__('admin_category.tool1')?></div>
                        </div>
                    </label>

                    <label>
                        <span><?=__('admin_category.en')?></span>
                        <input class="input" id="title-en" type="text" name="titleEn" value="<?=$data['en']['title']?>">
                        <div class="tooltips-left">
                            <div><?=__('admin_category.tool2')?></div>
                        </div>
                    </label>
                </fieldset>

                <fieldset>
                    <legend><?=__('admin_category.title3')?></legend>

                    <p><?=__('admin_category.mes2')?></p>

                    <label>
                        <span><?=__('admin_category.ru')?></span>
                        <textarea class="textarea" id="first-text-ru" name="firstTextRu"><?=$data['ru']['first_text']?></textarea>
                        <div class="tooltips-left">
                            <div><?=__('admin_category.tool3')?></div>
                        </div>
                    </label>

                    <label>
                        <span><?=__('admin_category.en')?></span>
                        <textarea class="textarea" id="first-text-en" name="firstTextEn"><?=$data['en']['first_text']?></textarea>
                        <div class="tooltips-left">
                            <div><?=__('admin_category.tool3')?></div>
                        </div>
                    </label>
                </fieldset>

                <fieldset>
                    <legend><?=__('admin_category.title4')?></legend>

                    <label>
                        <span><?=__('admin_category.ru')?></span>
                        <input class="input" id="full-title-ru" type="text" name="fullTitleRu" value="<?=$data['ru']['full_title']?>">
                        <div class="tooltips-left">
                            <div><?=__('admin_category.tool3')?></div>
                        </div>
                    </label>

                    <label>
                        <span><?=__('admin_category.en')?></span>
                        <input class="input" id="full-title-en" type="text" name="fullTitleEn" value="<?=$data['en']['full_title']?>">
                        <div class="tooltips-left">
                            <div><?=__('admin_category.tool3')?></div>
                        </div>
                    </label>
                </fieldset>

                <fieldset>
                    <legend><?=__('admin_category.title5')?></legend>

                    <p><?=__('admin_category.mes2')?></p>

                    <label>
                        <span><?=__('admin_category.ru')?></span>
                        <textarea class="textarea" id="second-text-ru" name="secondTextRu"><?=$data['ru']['second_text']?></textarea>
                        <div class="tooltips-left">
                            <div><?=__('admin_category.tool3')?></div>
                        </div>
                    </label>

                    <label>
                        <span><?=__('admin_category.en')?></span>
                        <textarea class="textarea" id="second-text-en" name="secondTextEn"><?=$data['en']['second_text']?></textarea>
                        <div class="tooltips-left">
                            <div><?=__('admin_category.tool3')?></div>
                        </div>
                    </label>
                </fieldset>

                <label>
                    <input type="checkbox" name="active" value="1" class="option-input checkbox" <?=$data['main']['active'] == 1 ? 'checked' : ''?> />
                    <span><?=__('admin_category.activity2')?></span>
                </label>

                <button type="submit" class="submit sm-buttons button text" name="button" value="send"><?=__('admin_category.save')?></button>
            </form>

        <?php else: ?>

        <?php endif; ?>

    </div>
</div>
