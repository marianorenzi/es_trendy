<?php
/**
 * Theme Color styles
 */
global $es_trendy_options;
$theme_color = $es_trendy_options->theme_color;

if ($theme_color <> '#5fd400'):
$color = new Color( $theme_color);
if ( $theme_color == '#000000') {
	$theme_color_dark = '#' . $color->lighten(5);
	$theme_color_light = '#' . $color->lighten(10);
	$theme_color_dark_grad = '#' . $color->lighten(20);
	$theme_color_light_grad = '#' . $color->lighten(50);
}
else {
	$theme_color_dark = '#' . $color->darken(5);
	$theme_color_light = '#' . $color->lighten(10);
	$theme_color_dark_grad = '#' . $color->darken(20);
	$theme_color_light_grad = '#' . $color->lighten(20);
}

?>
<style>
	.header__phone div i,
	.header__adress div i,
	.header__mail div i,
	.content-block__title:hover > span,
	.widget_recent_entries > ul > li > a:hover,
	.footer__menu li a:hover,
	.es-wrap .listing__sort-list > li > a,
	.color-menu .navigate-line__wrapper > .mobile-menu__button::before,
	.widget_archive > ul > li > a:hover,
	.widget_recent_comments > ul > li > a:hover,
	.widget_tag_cloud a:hover,
	.widget_calendar a:hover{
		color: <?php echo $theme_color_dark;?>;
	}

	.main-menu__menu > li:hover,
	.property_gallery .slick-arrow:hover,
	.es-top-arrow a:hover > i,
	.es-agent-register__wrap .es-field .es-field__content input[type=submit],
	.es-listing .properties .listing__btn-wrap .theme-btn,
	.theme-btn {
		border-bottom: 2px solid <?php echo $theme_color_dark;?>;
	}

	.main-menu__menu li ul,
	.article-block__copy .es-wrap .pagination .nav-links > ul > li:hover > a,
	.nav-links > ul > li:hover > a,
	.post-type-archive-properties .pagination .nav-links > ul > li:hover > .page-numbers,
    .tax-es_category .es-wrap .pagination .nav-links > ul > li:hover > a,
	.contact-block__contact-information li p:first-child,
	.contact-block__send-form-wrapper,
	.es-agent-register__wrap .es-field .es-field__content .theme-btn:hover,
	.es-listing .properties .listing__btn-wrap .theme-btn:hover,
	.theme-btn:hover,
	.contact-block-line__grid li p:first-child,
	.search--compact .search--compact-wrapper .widgettitle:before,
	.search--wide .search--compact-wrapper .widgettitle:before,
	.color-menu .main-menu__menu a:before,
	.es-properties-map .es-overlay .es-overlay__info .es-overlay__content .es-overlay__more-link:hover,
	.footer__socials a,
	.widget_categories,
    .es-share-wrapper > a{
		background-color: <?php echo $theme_color_dark;?>;
	}

	.article-block__copy .es-wrap .pagination .nav-links > ul > li:hover > a,
	.nav-links > ul > li:hover > a,
	.post-type-archive-properties .pagination .nav-links > ul > li:hover > .page-numbers,
    .tax-es_category .es-wrap .pagination .nav-links > ul > li:hover > a,
	.offer-of-the-week,
	.widget_categories > .widget-title {
		border: 1px solid <?php echo $theme_color_dark;?>;
	}

	.widget_es_request_widget .es-request-widget-wrap,
	.es-login__wrap form {
		background: <?php echo $theme_color_dark;?>;
	}

	.sidr ul li:hover > a,
	.sidr ul li:hover > span, .sidr ul li.active > a,
	.sidr ul li.active > span, .sidr ul li.sidr-class-active > a,
	.sidr ul li.sidr-class-active > span,
	.sidr ul li ul li:hover > a,
	.sidr ul li ul li:hover > span, .sidr ul li ul li.active > a,
	.sidr ul li ul li.active > span, .sidr ul li ul li.sidr-class-active > a,
	.sidr ul li ul li.sidr-class-active > span,
	.bx-controls-direction a:hover {
		box-shadow: 0 0 15px 3px <?php echo $theme_color_dark;?> inset;
	}

	.search--compact .search--compact-wrapper .widgettitle:after {
		border-top: 8px solid <?php echo $theme_color_dark;?>;
	}

	.color-menu .main-menu__menu > li > a {
		border-right: 1px solid <?php echo $theme_color_dark;?>;
	}

	.es-properties-map .es-overlay .es-overlay__info .es-overlay__content .es-overlay__more-link {
		border-bottom: 2px solid <?php echo $theme_color_dark;?>;
	}

	.article-block__posted i,
	.article-block__posted a,
	.article-block__reply i,
	.article-block__reply span,
	.article-block__tags,
	.article-block__tags > i,
	.article-block__tags > a,
	.es-single-tabs li a,
	.es-agent__url,
	.latest-news__block-wrapper a:hover,
	.es-wrap .listing__sort-list > li > a:hover,
	.testimonials__quote,
	.navigate-line__login li div,
	.navigate-line__login li p,
	.navigate-line__login li a,
	.sidr-class-mobile-menu__button::before,
	.login-menu-item:before,
	.article-block__copy a{
		color: <?php echo $theme_color;?>;
	}

	.nav-links > ul > li > .page-numbers,
	.article-block__copy .es-wrap .pagination .nav-links > ul > li > .page-numbers,
	.post-type-archive-properties .nav-links > .page-numbers > li > .page-numbers,
    .tax-es_category .es-wrap .pagination .nav-links > ul > li > .page-numbers{
		color: <?php echo $theme_color;?>;
	}

	.es-single-tabs li a:hover,
	.property_gallery .slick-arrow:hover,
	.es-top-arrow a:hover > i,
	.widget_es_request_widget .es-request-widget-wrap form h3,
	.article-block__copy .es-wrap .pagination .nav-links > ul > li .prev,
	.nav-links > ul > li .prev,
	.post-type-archive-properties .pagination .nav-links > .page-numbers > li .prev,
    .tax-es_category .es-wrap .pagination .nav-links > ul > li .prev,
	.article-block__copy .es-wrap .pagination .nav-links > ul > li .next,
	.nav-links > ul > li .next,
	.post-type-archive-properties .pagination .nav-links > ul > li .next,
    .tax-es_category .es-wrap .pagination .nav-links > ul > li .next,
	.widget_search,
	.contact-block-background,
	.message_sent__container,
	.es-agent-register__wrap .es-field .es-field__content input[type=submit],
	.es-listing .properties .listing__btn-wrap .theme-btn,
	.theme-btn,
	.bx-controls-direction a:hover,
	.contact-block-line,
	.search--wide-color,
	.search--compact .search--compact-wrapper .widgettitle,
	.search--wide .search--compact-wrapper .widgettitle,
	.color-menu,
	.color-menu .main-menu__menu li ul,
	.es-properties-map .es-overlay .es-overlay__info .es-overlay__content .es-overlay__more-link,
	.es_feature .es_feature__item-background,
	.es-single-tabs li,
    .es-property-categories a{
		background-color: <?php echo $theme_color;?>;
	}

	.article-block__copy .es-wrap .pagination .nav-links > ul > li > .page-numbers,
	.nav-links > ul > li > .page-numbers,
	.post-type-archive-properties .nav-links > .page-numbers > li > .page-numbers,
    .tax-es_category .es-wrap .pagination .nav-links > ul > li > .page-numbers,
	.article-block__copy .es-wrap .pagination .nav-links > ul > li .prev,
	.nav-links > ul > li .prev,
	.post-type-archive-properties .pagination .nav-links > .page-numbers > li .prev,
	.article-block__copy .es-wrap .pagination .nav-links > ul > li .next,
	.nav-links > ul > li .next,
	.post-type-archive-properties .pagination .nav-links > ul > li .next,
    .tax-es_category .es-wrap .pagination .nav-links > ul > li .next,
	.es-dropdown-wrap.show,
	.article-block__copy .es-wrap .pagination .nav-links > ul > li .prev,
	.nav-links > ul > li .prev,
	.post-type-archive-properties .pagination .nav-links > .page-numbers > li .prev,
    .tax-es_category .es-wrap .pagination .nav-links > ul > li .prev{
		border: 1px solid <?php echo $theme_color;?>;
	}

	.why-choose-us__why-choose-img {
		border: 6px solid <?php echo $theme_color;?>;
	}

	.widget_categories > ul > li > a:before,
	.main-menu__menu a:before,
	.main-menu ul li:before,
	.sidr ul li:hover > a,
	.sidr ul li:hover > span, .sidr ul li.active > a,
	.sidr ul li.active > span, .sidr ul li.sidr-class-active > a,
	.sidr ul li.sidr-class-active > span{
		background: <?php echo $theme_color;?>;
	}

	@media (max-width: 600px) {
		.header__top__button-wrapper > .mobile-contact__button {
			background-color: <?php echo $theme_color;?>;
		}

	}

	.main-menu__menu > li:hover > ul li a {
		border-bottom: 1px solid <?php echo $theme_color;?>;
	}

	.bx-controls-direction a:hover,
	.es-search__wrapper.es-search__wrapper--vertical .es-search__buttons .es-button__wrap input[type="submit"]{
		border-bottom: 2px solid <?php echo $theme_color;?> !important;
	}

	.nav-links > ul > li .current {
		background-color: <?php echo $theme_color_light;?>;
		border: 1px solid <?php echo $theme_color_light;?>;
	}

	.widget_categories,
	.es-agent__item:hover,
	.listing__property-info-wrap,
	.es-single-tabs li,
	.es-agent__item:hover,
	.es-agent__footer
	{
		background-image: -webkit-linear-gradient(left, <?php echo $theme_color_light_grad;?>, <?php echo $theme_color_dark_grad;?>);
		background-image: -o-linear-gradient(left, <?php echo $theme_color_light_grad;?>, <?php echo $theme_color_dark_grad;?>);
		background-image: linear-gradient(to right, <?php echo $theme_color_light_grad;?>, <?php echo $theme_color_dark_grad;?>);
	}

	.article-block__copy .es-wrap .pagination .nav-links > ul > li .next,
	.nav-links > ul > li .next,
	.post-type-archive-properties .pagination .nav-links > ul > li .next,
	.article-block__copy .es-wrap .pagination .nav-links > ul > li .prev,
	.nav-links > ul > li .prev,
	.post-type-archive-properties .pagination .nav-links > ul > li .prev,
    .tax-es_category .es-wrap .pagination .nav-links > ul > li .next,
    .tax-es_category .es-wrap .pagination .nav-links > ul > li .prev{
		color:#ffffff;
	}

	.es-agent-register__logged .es-btn-orange-bordered,
	.search--compact .es-button-orange-corner,
	.search--wide .es-button-orange-corner,
	.search--full .es-button-orange-corner,
	.es-search__wrapper.es-search__wrapper--horizontal .es-button-orange-corner {
		background-color: <?php echo $theme_color;?> !important;
		border-bottom: 2px solid <?php echo $theme_color_dark;?> !important;
	}

	.es-agent-register__logged .es-btn-orange-bordered:hover,
	.search--compact .es-button-orange-corner:hover,
	.search--wide .es-button-orange-corner:hover,
	.search--full .es-button-orange-corner:hover,
	.es-search__wrapper.es-search__wrapper--horizontal .es-button-orange-corner:hover {
		background-color: <?php echo $theme_color_dark;?> !important;
	}

	.es-login__wrap .es-login__links a {
		color: <?php echo $theme_color_dark;?> !important;
	}

	.es-search__wrapper.es-search__wrapper--vertical .es-search__buttons .es-button__wrap input[type="submit"] {
		background-color: <?php echo $theme_color;?> !important;
	}

	.es-search__wrapper.es-search__wrapper--vertical .es-search__buttons .es-button__wrap input[type="submit"]:hover {
		background-color: <?php echo $theme_color_dark;?> !important;
	}

	.search--wide .search--compact-wrapper .widgettitle,
	.search--wide .search--compact-wrapper .widgettitle:before{
		background-color: unset;
	}

	.current-menu-item a{
		background-color: <?php echo $theme_color;?>;
		border-bottom: 2px solid <?php echo $theme_color_dark;?>;
	}

	.nav-links > ul > li .current, .post-type-archive-properties .pagination .nav-links > ul > li .current,
    .tax-es_category .es-wrap .pagination .nav-links > ul > li .current{
		background-color: <?php echo $theme_color_light_grad?>;
		border: 1px solid <?php echo $theme_color_light?>;
	}
</style>
<?php endif;?>