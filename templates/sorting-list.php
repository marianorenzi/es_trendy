<?php if ( $list = Es_Archive_Sorting::get_sorting_dropdown_values() ):
	$current_value = ! empty( $_GET['view_sort'] ) ? $_GET['view_sort'] : false; ?>
	<ul class="listing__sort-list">
		<?php foreach ( $list as $key => $value ) : ?>
			<li class="<?php echo $key == $current_value ? 'active' : ''; ?>">
				<a href="<?php echo add_query_arg( 'view_sort', $key,
					es_get_current_url() ); ?>"><?php echo $value; ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif;
