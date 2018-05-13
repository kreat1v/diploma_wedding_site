<?php if (isset($data['news']['img_dir'])): ?>
	<div class="form-group">
		<?php foreach ($data['gallery'] as $key => $img):?>
			<div class="my-img-size">
				<img src="<?=DS.'img'.DS.$data['news']['img_dir'].DS.$img?>" alt="img" class="img-thumbnail">
				<a href="<?=$router->buildUri('news.deleteImage', [$router->getParams()[0], $key])?>#button" class="close" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>