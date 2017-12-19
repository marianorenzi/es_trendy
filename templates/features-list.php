<?php

/**
 * @var array $features_list
 * @var string $features_list_title
 */

?>

<div class="es-features-list-wrap">
	<h3><?php echo $features_list_title; ?>:</h3>
	<ul>
		<?php
		foreach ( $features_list as $item ): ;?>
			<?php $background_path = ES_TRENDY_DIR . 'assets/images/features/' . $item->taxonomy . '_'  . $item->slug . '.svg';
			if ( file_exists( $background_path ) ) {
				$background_url = ES_TRENDY_URL . 'assets/images/features/' . $item->taxonomy . '_'  . $item->slug . '.svg';
			}
			else {
				$background_url = ES_TRENDY_URL . 'assets/images/features/es_feature.svg';
			}
			?>
			<li class="<?php echo $item->taxonomy; ?>">
				<div class="es_feature__item-background" style="background-image: url(<?php echo $background_url; ?>);"></div>
				<div><?php echo $item->name; ?></div>
			</li>
		<?php
		endforeach; ?>
	</ul>
</div>
