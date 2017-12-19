<?php global $es_trendy_options; ?>
<!DOCTYPE html>
<html class="nomargin" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php $favicon = wp_get_attachment_image_url( $es_trendy_options->favicon_attachment_id,
    'original' );?>
    <link rel="shortcut icon"
          href="<?php echo ! empty( $favicon ) ? wp_get_attachment_image_url( $es_trendy_options->favicon_attachment_id,
            'original' ) : ES_TRENDY_URL . 'assets/images/favicon.ico'; ?>">
	<?php wp_head(); ?>
	<?php if ( !empty( $es_trendy_options->option_css ) ):?>
        <style>
            <?php echo $es_trendy_options->option_css;?>
        </style>
	<?php endif;?>
</head>
<body <?php body_class(); ?>>
<header>
	<div class="header__top-line">
		<div class="es_header_logo">
			<a href="<?php echo site_url(); ?>">
                <?php if ( !empty( $es_trendy_options->logo_attachment_id ) && wp_get_attachment_image_url( $es_trendy_options->logo_attachment_id,
                        'original' )):?>
                    <img src="<?php echo wp_get_attachment_image_url( $es_trendy_options->logo_attachment_id,
                        'original' ); ?>"/>
                <?php else:?>
                    <img src="<?php echo ES_TRENDY_URL . 'assets/images/logo.png';?>">
                <?php endif;?>
			</a>
		</div>
		<ul class="header__contact-information">
			<?php if( !empty( $es_trendy_options->contact_tel ) ):?>
			<li class="header__phone">
				<div><i class="fa fa-phone"></i><?php echo $es_trendy_options->tel_title ?></div>
				<div><?php echo $es_trendy_options->contact_tel ?></div>
			</li>
			<?php endif;?>
			<?php if( !empty( $es_trendy_options->contact_email ) ):?>
			<li class="header__mail">
				<div><i class="fa fa-envelope"></i><?php echo $es_trendy_options->email_title ?></div>
				<div><?php echo $es_trendy_options->contact_email ?></div>
			</li>
			<?php endif;?>
			<?php if( !empty( $es_trendy_options->contact_address ) ):?>
			<li class="header__adress">
				<div><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $es_trendy_options->address_title ?>
				</div>
				<div><?php echo $es_trendy_options->contact_address ?></div>
			</li>
			<?php endif;?>
		</ul>
		<div class="header__top__button-wrapper">
			<a class="mobile-contact__button" href="#"></a>
			<a class="mobile-menu__button menu-button" href="#"></a>
		</div>
	</div>
</header>
<div class="navigate-line <?php if ( $es_trendy_options->search_style == 'wide' && is_page_template('page-templates/page-with-top-search.php') ):?>color-menu<?php endif;?>">
	<div class="navigate-line__wrapper">
		<a class="mobile-menu__button menu-button" href="#"></a>
		<nav class="main-menu">
			<?php
			if ( has_nav_menu( 'main_menu' ) ) {
				wp_nav_menu( array(
					'menu'           => 'main_menu',
					'theme_location' => 'main_menu',
					'menu_class'     => 'main-menu__menu',
					'depth'          => 3,
				) );
			}
			?>
		</nav>

		<nav class="mobile-menu">
			<a class="mobile-menu__button menu-button" href="#"></a>
			<?php
			if ( has_nav_menu( 'main_menu' ) ) {
				wp_nav_menu( array(
					'menu'           => 'main_menu',
					'theme_location' => 'main_menu',
					'menu_class'     => 'main-menu__menu',
					'depth'          => 3,
				) );
			}
			?>
			<?php
			if ( is_user_logged_in() ) { ?>
				<?php if ( has_nav_menu( 'account_menu' ) ) {
					wp_nav_menu( array(
						'menu'           => 'account_menu',
						'theme_location' => 'account_menu',
						'menu_class'     => 'navigate-line__login',
						'depth'          => 3,
					) );
				}
				?>
			<?php } else {
				if ( has_nav_menu( 'login_menu' ) ) {
					wp_nav_menu( array(
						'menu'           => 'login_menu',
						'theme_location' => 'login_menu',
						'menu_class'     => 'navigate-line__login',
						'depth'          => 3,
					) );
				}
			}
			?>
		 </nav>
		<?php
		if ( is_user_logged_in() ) { ?>
			<ul class="navigate-line__login">
				<li>
					<p><i class="fa fa-user" aria-hidden="true"></i></p>
					<div><?php _e( 'Hello', 'es-trendy' ); ?></div>
				</li>
				<li class="es-submit-property-wrap"><?php if ( has_nav_menu( 'account_menu' ) ) {
					wp_nav_menu( array(
						'menu'           => 'account_menu',
						'theme_location' => 'account_menu',
						'depth'          => 2,
					) );
				}
				?>
                </li>
			</ul>

		<?php } else {
			if ( has_nav_menu( 'login_menu' ) ) {
				wp_nav_menu( array(
					'menu'           => 'login_menu',
					'theme_location' => 'login_menu',
					'menu_class'     => 'navigate-line__login',
					'depth'          => 3,
				) );
			}
		}
		?>
	</div>
</div>
<main>
