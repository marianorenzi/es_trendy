<div class="post-search-form">
	<form class="post-search-form__form"  role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input class="post-search-form__input" type="text" placeholder="<?php _e('Enter key word', 'es-theme') ?>" value="<?php echo get_search_query(); ?>" name="s">
		<button class="post-search-form__button" type="submit">
			<i class="fa fa-search" aria-hidden="true"></i>
		</button>
	</form>
</div>
