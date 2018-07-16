<div class="cart">

	<div class="gradient-border">

		<div class="body">

            <div class="title text">
                <h2><?=__('subscription.title')?></h2>
            </div>

			<div class="form text">
				<form method="post" id="subscription-form">

					<label>
						<span><?=__('user_settings.email')?></span>
						<input type="email" name="email" value="" class="input" id="email" />
						<div class="tooltips-left">
							<div><?=__('user_settings.tool3')?></div>
						</div>
						<div class="tooltips-left check-email">
							<div><?=__('user_settings.tool4')?></div>
						</div>
					</label>

					<button type="submit" class="submit sm-buttons button text" name="button" value="data"><?=__('subscription.send')?></button>

				</form>
			</div>

		</div>

	</div>
</div>

<script type="text/javascript" src="/js/validation-subscription.js"></script>
