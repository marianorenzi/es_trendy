<?php

/**
 * The template Name: Estatik Trendy Contact
 **/
?>
<?php get_header(); ?>
<?php if ( have_posts() ): ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="contact-block__map">
			<div class="js-contact-map"></div>
		</div>
		<article class="contact-block-background">
			<div class="contact-block">
				<section class="contact-block__info">
					<div class="contact-block__container">
						<?php the_content();?>
						<ul class="contact-block__contact-information">
							<?php if ( !empty( $es_trendy_options->contact_address ) ):?>
							<li>
								<p><i class="fa fa-map-marker" aria-hidden="true"></i></p>
								<p><?php echo $es_trendy_options->contact_address;?></p>
							</li>
							<?php endif;?>
							<?php if ( !empty( $es_trendy_options->contact_tel ) ):?>
							<li>
								<p><i class="fa fa-phone"></i></p>
								<p><?php echo $es_trendy_options->contact_tel?></p>
							</li>
							<?php endif;?>
							<?php if ( !empty( $es_trendy_options->contact_email ) ):?>
							<li>
								<p><i class="fa fa-envelope"></i></p>
								<p><?php echo $es_trendy_options->contact_email?></p>
							</li>
							<?php endif;?>
						</ul>
					</div>
				</section>
				<?php Es_Trendy_Contact_Form::build();?>
			</div>
		</article>
	<?php endwhile; ?>
<?php endif; ?>
<?php if ( is_active_sidebar( 'bottom-sidebar' ) ) dynamic_sidebar('bottom-sidebar');?>
<?php get_footer(); ?>

