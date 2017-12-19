<?php global $es_trendy_options; ?>

</main>
<footer>
	<div class="footer">
		<div class="footer__copyright">
			<?php echo $es_trendy_options->copyright; ?>
		</div>
			<?php
			if (has_nav_menu('footer_menu'))
				wp_nav_menu( array(
					'menu' => 'footer_menu',
					'theme_location' => 'footer_menu',
					'menu_class'     => 'footer__menu',
					'depth'          => 1,
				) );
			?>
		<?php if ( ! empty( $es_trendy_options->facebook_link ) || ! empty( $es_trendy_options->google_plus_link ) || ! empty( $es_trendy_options->linkedin_link )
		           || ! empty( $es_trendy_options->twitter_link )
		): ?>
			<div class="footer__socials">
				<?php if ( ! empty( $es_trendy_options->facebook_link ) ): ?>
					<a href="<?php echo $es_trendy_options->facebook_link; ?>" target="_blank">
						<i class="fa fa-facebook" aria-hidden="true"></i>
					</a>
				<?php endif; ?>
				<?php if ( ! empty( $es_trendy_options->google_plus_link ) ): ?>
					<a href="<?php echo $es_trendy_options->google_plus_link; ?>" target="_blank">
						<i class="fa fa-google-plus"></i>
					</a>
				<?php endif; ?>
				<?php if ( ! empty( $es_trendy_options->linkedin_link ) ): ?>
					<a href="<?php echo $es_trendy_options->linkedin_link; ?>" target="_blank">
						<i class="fa fa-linkedin" aria-hidden="true"></i>
					</a>
				<?php endif; ?>
				<?php if ( ! empty( $es_trendy_options->twitter_link ) ): ?>
					<a href="<?php echo $es_trendy_options->twitter_link; ?>" target="_blank">
						<i class="fa fa-tumblr" aria-hidden="true"></i>
					</a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</footer>
<?php wp_footer();?>
<div class="overlay" style="display:none"></div>
</body>
</html>
