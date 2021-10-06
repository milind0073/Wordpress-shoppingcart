<form role="search" class="search-form" action="<?php echo esc_url(home_url('/'));?>">
	<div class="input-group input-group-lg">
		<input type="text" name="s" class="form-control" placeholder="<?php esc_attr_e("Search","consultera");?>&hellip;">
		<div class="input-group-append">
			<button class="btn" type="submit">
				<i class="fa fa-search"></i>
			</button>
		</div>
	</div>
</form>