<?php

/**
 * Estatik Trendy Theme functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Estatik_Theme_Trendy
 * @since Estatik Theme Trendy 1.0
 */

define( 'ES_TRENDY_DIR',  trailingslashit( get_template_directory()));
define( 'ES_TRENDY_URL',  trailingslashit( get_template_directory_uri()));
define( 'ES_TRENDY_INC_DIR',  ES_TRENDY_DIR  .trailingslashit( 'inc' ) );
define( 'ES_TRENDY_WIDGETS_DIR',  ES_TRENDY_INC_DIR  .trailingslashit( 'widgets' ) );
define( 'ES_TRENDY_TEMPLATES_DIR',  ES_TRENDY_DIR  .trailingslashit( 'templates' ) );
define( 'ES_TRENDY_CUSTOM_STYLES_URL',  ES_TRENDY_URL  . trailingslashit( 'assets/css') );
define( 'ES_TRENDY_CUSTOM_STYLES_DIR',  ES_TRENDY_DIR  . trailingslashit( 'assets/css') );
define( 'ES_TRENDY_CUSTOM_SCRIPTS_URL', ES_TRENDY_URL  . trailingslashit('assets/js/custom' ) );
define( 'ES_TRENDY_VENDOR_SCRIPTS_URL', ES_TRENDY_URL  . trailingslashit('assets/js/vendor' ) );
define( 'ES_TRENDY_ADMIN_DIR',  ES_TRENDY_DIR  .trailingslashit( 'inc/admin' ) );
define( 'ES_TRENDY_ADMIN_IMAGES_URL',  ES_TRENDY_URL  . trailingslashit( 'inc/admin/assets/images') );
define( 'ES_TRENDY_ADMIN_CUSTOM_STYLES_URL',  ES_TRENDY_URL  . trailingslashit( 'inc/admin/assets/css/custom') );
define( 'ES_TRENDY_ADMIN_CUSTOM_SCRIPTS_URL', ES_TRENDY_URL  . trailingslashit('inc/admin/assets/js/custom' ) );
define( 'ES_TRENDY_ADMIN_TEMPLATES',          ES_TRENDY_DIR . trailingslashit('inc/admin/templates' ) );
define( 'ES_TRENDY_FONTS_URL',          ES_TRENDY_URL . trailingslashit('assets/fonts' ) );

require_once (ES_TRENDY_DIR . '/inc/class-trendy-theme.php');

/* init theme. */
Trendy_Theme::run();