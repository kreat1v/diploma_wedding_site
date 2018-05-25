<?php

$router = \App\Core\App::getRouter();

?>
<div class="user">

	<div class="container">

		<div class="menu">
			<ul>
				<?php foreach (\App\Core\Config::get('userMenu') as $value): ?>
				<li class="buttons">
					<a href="<?=$router->buildUri('user.' . $value)?>"><?=__('user_menu.' . $value)?></a>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div class="info">

			<div class="gradient-border">

				<div class="avatar-select">

					<div class="form text">
						<!-- <form enctype="multipart/form-data" method="post">

							<div class="cropFrame">
								<img id="image" src="#" alt="" class="cropImage" cropwidth="200" cropheight="200" />
							</div>
							<div class="results">
								<b>X</b>: <span class="cropX"></span>
								<b>Y</b>: <span class="cropY"></span>
								<b>W</b>: <span class="cropW"></span>
								<b>H</b>: <span class="cropH"></span>
							</div>
							<div class="download">
								<a href="#" download="crop.png">Download</a>
							</div>
							<label>
								<input type="file" name="avatar" id="imgInput">
								<div class="tooltips-right">
									<div><?=__('login.tool1')?></div>
								</div>
							</label>

							<button type="submit" class="submit sm-buttons" name="button" value="avatar"><?=__('user_settings.download')?></button>
						</form> -->

						<h2><?=__('user_settings.title_avatar')?></h2>

						<div class="avatar">
							<img class="cropim" alt="avatar" src="<?=\App\Core\Config::get('systemImg') . 'user.png'?>" />
						</div>

						<form class="avatar-crop" enctype="multipart/form-data" method="post">
							<div>
								<img id='image' class="cropimage" src="" />
							</div>
							<div class="file-upload submit sm-buttons button">
							     <label>
							          <input type="file" name="avatar" id="imgInput">
							          <?=__('user_settings.choose')?>
							     </label>
							</div>

							<button class="submit sm-buttons button text" type="submit" name="button" value="avatar"><?=__('user_settings.download')?></button>
						</form>

						<!-- <div class="download">
							<a href="#" download="crop.png">Download</a>
						</div> -->

					</div>

				</div>

			</div>

			<br>

			<div class="gradient-border">

				<div class="body">

					<div class="form text">
						<h2><?=__('user_settings.title')?></h2>
						<form method="post" id="f-form">
							<div class="sex">
								<span><?=__('user_settings.sex')?></span>
								<label>
									<input type="radio" name="sex" value="m" class="option-input radio" <?=isset($data['get']['sex']) && $data['get']['sex'] == 'm' ? 'checked' : ''?> />
									<span><?=__('user_settings.guy')?></span>
								</label>
								<label>
									<input type="radio" name="sex" value="f" class="option-input radio" <?=isset($data['get']['sex']) && $data['get']['sex'] == 'f' ? 'checked' : ''?> />
									<span><?=__('user_settings.girl')?></span>
								</label>
							</div>
							<label>
								<span><?=__('user_settings.name')?></span>
								<input type="text" name="name" class="input" id="login-password" />
								<div class="tooltips-right">
									<div><?=__('login.tool2')?></div>
								</div>
							</label>
							<label>
								<span><?=__('user_settings.surname')?></span>
								<input type="text" name="surname" class="input" id="login-password" />
								<div class="tooltips-right">
									<div><?=__('login.tool2')?></div>
								</div>
							</label>
							<label>
								<span><?=__('user_settings.telephone')?></span>
								<input type="tel" name="tel" class="input" id="telephone" />
								<div class="tooltips-right">
									<div><?=__('login.tool2')?></div>
								</div>
							</label>
							<label>
								<span><?=__('user_settings.email')?></span>
								<input type="email" name="email" class="input" id="login-email" />
								<div class="tooltips-right">
									<div><?=__('login.tool1')?></div>
								</div>
							</label>
							<button type="submit" class="submit sm-buttons button text" name="button" value="login"><?=__('user_settings.save')?></button>
						</form>
					</div>

				</div>

			</div>

			<br>

			<div class="gradient-border">

				<div class="body">

					<div class="form text">
						<form method="post" id="f-form">
							<h2><?=__('user_settings.title_pas')?></h2>
							<label>
								<span><?=__('user_settings.old_pas')?></span>
								<input type="password" name="oldPassword" class="input" id="login-email" />
								<div class="tooltips-right">
									<div><?=__('login.tool1')?></div>
								</div>
							</label>
							<label>
								<span><?=__('user_settings.password')?></span>
								<input type="password" name="password" class="input" id="login-email" />
								<div class="tooltips-right">
									<div><?=__('login.tool1')?></div>
								</div>
							</label>
							<label>
								<span><?=__('user_settings.conf')?></span>
								<input type="password" name="confirmPassword" class="input" id="login-password" />
								<div class="tooltips-right">
									<div><?=__('login.tool2')?></div>
								</div>
							</label>
							<button type="submit" class="submit sm-buttons button text" name="button" value="login"><?=__('user_settings.change')?></button>
						</form>
					</div>

				</div>

			</div>

		</div>

	</div>

</div>

<script type="text/javascript" src="/js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="/js/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="/js/jquery.cropbox.js"></script>
<script type="text/javascript">
$("#telephone").mask("+38 (999) 999 - 99 - 99");

function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<script type="text/javascript">

    $(document).ready(function() {

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result);
					// setTimeout(function() {
					// 	$('#image').show('500');
					// }, 2000);
                    $(".cropim").attr('src', e.target.result);

                    $( function () {
                        var image = $( '.cropimage' ),
                            cropwidth = image.attr('cropwidth'),
                            cropheight = image.attr('cropheight'),
                            results = image.next('.results' ),
                            x = $('.cropX', results),
                            y = $('.cropY', results),
                            w = $('.cropW', results),
                            h = $('.cropH', results),
                            download = results.next('.download').find('a');

                        image.cropbox({
                            width: cropwidth,
                            height: cropheight,
                            showControls: 'always'
                        }, function() {
                            var attributes = $( '.cropimage' ).prop("attributes");
                            $(".cropim").attr('style', attributes['style'].value);
                    	})
                        .on('cropbox', function( event, results, img ) {
                            var attributes = $( '.cropimage' ).prop("attributes");
                            $(".cropim").attr('style', attributes['style'].value);

                            x.text( results.cropX );
                            y.text( results.cropY );
                            w.text( results.cropW );
                            h.text( results.cropH );
                            download.attr('href', img.getDataURL());
                        });
                    } );
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInput").change(function(){
          readURL(this);
        });

    });
</script>
