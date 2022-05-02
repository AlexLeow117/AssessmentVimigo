<?php
/**
 * Includes the inline css
 * 
 * @package Armonia
 * @since 1.0.0
 * 
 */

// theme color and hover color
$armonia_theme_color	= get_theme_mod( 'armonia_theme_color', '#f1cdc2' );
$armonia_theme_hover_color	= get_theme_mod( 'armonia_theme_hover_color', '#d6876f' );
echo ".post-card .card__content-info i,
	.news-block .news-block__header .header__controller .header__controller__tab .tab-item.active, .trail-item:before { color:" .esc_attr( $armonia_theme_color ). " }\n";

echo ".slick-dots li.slick-active button{ background:" .esc_attr( $armonia_theme_color ). " }\n";

echo ".pagination span.current, body.header-layout--three .site-title a.has_dot:after,
	.author-wrap.layout-one .author-tag,
	.widget_armonia_category_collection_widget .categories-wrap.layout-one .category-count { background-color:" .esc_attr( $armonia_theme_color ). " } .pagination a { color:" .esc_attr( $armonia_theme_color ). " }\n";

echo '#comments input[type="submit"],
	  .armonia-load-more, .shop__products__content .product .onsale,
	  .shop__products__content .add_to_cart_button,
	  .shop__products__content .add_to_cart_button, 
	  .shop__products__content .add_to_cart_button, 
	  ul.products li.product .button,
	  .woocommerce button.button, .woocommerce a.button.alt, .woocommerce button.button.alt,
	  .format-quote .post-card-quote .qoute__icon  { background-color:' .esc_attr( $armonia_theme_color ). '; }\n';


echo ".shop-detail__content__top .cart .quantity, .post-card-quote.-border { border-color: " .esc_attr( $armonia_theme_color ). " }\n";
echo ".shop-detail__content__top .cart .single_add_to_cart_button, .add_to_cart_button:hover, .woocommerce button.button:hover, 
	.woocommerce #respond input#submit:hover, 
	.woocommerce a.button:hover, 
	.woocommerce button.button:hover, 
	.woocommerce input.button:hover,
	.woocommerce a.button.alt:hover,
	.woocommerce button.button.alt:hover { background-color: " .esc_attr( $armonia_theme_color ). " }\n";

	echo "#menu-toggle:focus{ outline: 2px dotted " .esc_attr( $armonia_theme_color ). " }\n";

echo ".post-card .card__content-title:hover, 
	.post-card .card__content .more-btn:hover, 
	.wp-block-latest-posts__list a:hover,
	.widget_armonia_posts_list_widget .post-card .bmm-post-title a:hover,
	.card__button a:hover
	 { color:" .esc_attr( $armonia_theme_hover_color ). " }\n";

echo ".armonia-load-more:hover { background-color:" .esc_attr( $armonia_theme_hover_color ). " }\n";
echo "header .header-wrapper .header__icon-group a:hover { color: " .esc_attr( $armonia_theme_hover_color ). "}";

 // category colors
$categories = get_categories();
foreach( $categories as $category ) :
	$category_query = get_category_by_slug( $category->slug );
	if( $category_query ) {
		echo ".post-card .post-cat-" .esc_attr( $category_query->cat_ID ). ":after { background-color : " .esc_attr( $armonia_theme_color ). " }\n";
		echo ".trending-post .trending-post_content h5.post-cat-" .esc_attr( $category_query->cat_ID ). ":after { background-color : " .esc_attr( $armonia_theme_color ). " }\n";
	}
endforeach;

$about_author_section_option = get_theme_mod( 'about_author_section_option', true );
if( $about_author_section_option ) :
	// About Author style
	$frontpage_about_author_color = get_theme_mod( 'frontpage_about_author_color', '#000000' );
	$frontpage_about_author_secondary_color = get_theme_mod( 'frontpage_about_author_secondary_color', '#1a1919' );
 	echo "#armonia-about-author-section .author-title { color:" .esc_attr( $frontpage_about_author_color ). " }\n";
	echo  "#armonia-about-author-section .author-description { color:" .esc_attr( $frontpage_about_author_secondary_color ). " }\n";
endif;

// footer colophon section
$footer_bg_color = get_theme_mod( 'footer_bg_color', '#000000' );
$footer_hover_color = get_theme_mod( 'footer_hover_color', '#ffffff' );
$footer_color = get_theme_mod( 'footer_color', '#ffffff' );
echo "footer#colophon { background-color: " .esc_attr( $footer_bg_color ). "}\n";
echo "footer#colophon a, footer#colophon h5, footer#colophon h2, footer#colophon h4, footer#colophon p, footer#colophon div {color: " .esc_attr( $footer_color ). ";}\n";
echo "footer#colophon a:hover {color: " .esc_attr( $footer_hover_color ). ";}\n";

// bottom footer
$bottom_footer_bg_color = get_theme_mod( 'bottom_footer_bg_color', '#f0f0f0' );
$bottom_footer_hover_color = get_theme_mod( 'bottom_footer_hover_color', '#111111' );
$bottom_footer_color = get_theme_mod( 'bottom_footer_color', '#ffffff' );
echo "#bottom-footer { background-color: " .esc_attr( $bottom_footer_bg_color ). "}\n";
echo "#bottom-footer a, #bottom-footer h5, #bottom-footer p, #bottom-footer div,  {color: " .esc_attr( $bottom_footer_color ). "}\n";
echo "#bottom-footer a:hover {color: " .esc_attr( $bottom_footer_hover_color ). "}\n";

if( get_theme_mod( 'scroll_to_top_option', true ) ) :
	// scroll to top colors
	$scroll_to_top_color = get_theme_mod( 'scroll_to_top_color', '#ffffff' );
	$scroll_to_top_hover_color = get_theme_mod( 'scroll_to_top_hover_color', '#f0f0f0' );
	$scroll_to_top_hover_bg_color = get_theme_mod( 'scroll_to_top_hover_bg_color', '#262626' );
	$scroll_to_top_bg_color = get_theme_mod( 'scroll_to_top_bg_color', '#000000' );
   
	//scroll to top border
   $scroll_to_top_border = get_theme_mod( 'scroll_to_top_border', 'show' );
   $scroll_to_top_border_color = get_theme_mod( 'scroll_to_top_border_color', '#ffffff' );

   // padding
   $scroll_to_top_padding_top = get_theme_mod( 'scroll_to_top_padding_top', 6 );
   $scroll_to_top_padding_right = get_theme_mod( 'scroll_to_top_padding_right', 10 );
   $scroll_to_top_padding_bottom = get_theme_mod( 'scroll_to_top_padding_bottom', 6 );
   $scroll_to_top_padding_left = get_theme_mod( 'scroll_to_top_padding_left', 10 );

   echo "#armonia-scroll-to-top { color: " .esc_attr( $scroll_to_top_color ). "; background-color: " .esc_attr( $scroll_to_top_bg_color ). ";}\n";
   echo "#armonia-scroll-to-top { padding: " .esc_attr( $scroll_to_top_padding_top ). "px " .esc_attr( $scroll_to_top_padding_right )."px " .esc_attr( $scroll_to_top_padding_bottom ). "px " .esc_attr( $scroll_to_top_padding_left ). "px }\n";

   if( $scroll_to_top_border != 'hide' ) echo "#armonia-scroll-to-top { border: 1px solid; border-color: " .esc_attr( $scroll_to_top_border_color ). " }\n";
   echo "#armonia-scroll-to-top:hover { color: " .esc_attr( $scroll_to_top_hover_color ). "; background-color: " .esc_attr( $scroll_to_top_hover_bg_color ). " }\n";
endif;

 // header bg color
 $header_bottom_box_shadow = get_theme_mod( 'header_bottom_box_shadow', 'show' );
 $header_bg_color = get_theme_mod( 'header_bg_color', esc_attr( '#ffffff' ) );
 $header_bg_img = get_header_image();

 if( get_header_image() ){
 echo "header.theme-default { background-image : url(" .esc_attr( $header_bg_img). "); background-size: cover; background-position: center center; background-repeat: no-repeat; background-blend-mode: overlay; background-color: #727171!important; }";
}
if($header_bg_color) {
	echo "header.theme-default { background-color: ". esc_attr($header_bg_color)."}";
}
if($header_bottom_box_shadow == 'show') {
	echo "header.theme-default { box-shadow: 0px 5px 5px 0 rgb(48 68 78 / 50%);}\n";
}
 // header search toggle 
 $header_search_toggle_color = get_theme_mod( 'header_search_toggle_color', '#000000' );
 $header_search_toggle_hover_color = get_theme_mod( 'header_search_toggle_hover_color', '#000000' );

 echo ".header__icon-group #search i{ color: ". esc_attr($header_search_toggle_color).";}\n";
  echo "header .header-wrapper .header__icon-group #search:hover i{ color: ". esc_attr($header_search_toggle_hover_color).";}\n";

 // header sidebar toggle bar 
 $header_sidebar_toggle_color = get_theme_mod( 'header_sidebar_toggle_color', '#e49c86' );
 $header_sidebar_toggle_hover_color = get_theme_mod( 'header_sidebar_toggle_hover_color', '#e49c86' );

 echo ".armonial-side-wrapper .burger span{ background: ". esc_attr($header_sidebar_toggle_color).";}\n";
 echo ".armonial-side-wrapper .burger:hover span{ background: ". esc_attr($header_sidebar_toggle_hover_color).";}\n";

 // header menu 
 $header_menu_font_family = get_theme_mod( 'header_menu_font_family', 'Montserrat' );
 $header_menu_font_weight = get_theme_mod( 'header_menu_font_weight', 700 );
 $header_menu_font_style = get_theme_mod( 'header_menu_font_style', 'normal' );
 $header_menu_font_size = get_theme_mod( 'header_menu_font_size', 15 );

 // site title typography
 $site_title_font_family = get_theme_mod( 'site_title_font_family', 'Cormorant Garamond' );
 $site_title_font_weight = get_theme_mod( 'site_title_font_weight', 600 );
 $site_title_font_style = get_theme_mod( 'site_title_font_style', 'normal' );
 $site_title_font_size = get_theme_mod( 'site_title_font_size', 80 );

 echo "body header .site-title a{ font-family: " .esc_attr( $site_title_font_family ). ", serif; font-weight: " .esc_attr( $site_title_font_weight ). "; font-style: " .esc_attr( $site_title_font_style ). "; font-size: " .esc_attr( $site_title_font_size ). "px;}";

 echo "header .header-wrapper nav ul>li>a { font-family: " .esc_attr( $header_menu_font_family ). "; font-weight: " .esc_attr( $header_menu_font_weight ). "; font-style: " .esc_attr( $header_menu_font_style ). "; font-size: " .esc_attr( $header_menu_font_size ). "px}";

 $armonia_container_width = get_theme_mod('armonia_global_container_width', 1300 );
 $armonia_sidebar_width = get_theme_mod('armonia_global_container_sidebar_width', 25);
 $armonia_primary_width = 100 - $armonia_sidebar_width;
 echo "@media (min-width: 1170px){ .container { max-width: " .esc_attr( $armonia_container_width ). "px} }\n";

echo "@media (min-width: 768px){ .secondary-section { max-width: " .esc_attr( $armonia_sidebar_width  ). "%;
		flex: 0 0 ". esc_attr( $armonia_sidebar_width  ) ."%;
	} .primary-section { max-width: " .esc_attr( $armonia_primary_width ). "%; flex: 0 0 ". esc_attr( $armonia_primary_width  ) ."%;} }\n";

// Header main menu
$header_menu_hover_effect = get_theme_mod( 'header_menu_hover_effect', 'none' ); // menu hover effect
if( $header_menu_hover_effect == 'none' ) echo "header .header-wrapper nav ul>li>a:hover:after { left: -100%; }\n";

if( $header_menu_hover_effect == 'default' ) echo "header .header-wrapper nav ul > li.current-menu-item > a:after {left: 0;}\n";

$header_menu_mobile_toggle_button_color = get_theme_mod( 'header_menu_mobile_toggle_button_color', '#000000' );
$header_menu_mobile_toggle_button_background_color = get_theme_mod( 'header_menu_mobile_toggle_button_background_color', '#ffffff' );
$header_menu_background_type = get_theme_mod( 'header_menu_background_type', 'solid' ); // menu background type
$header_menu_background_color = get_theme_mod( 'header_menu_background_color', '#ffffff' );
$header_menu_background_hover_color = get_theme_mod( 'header_menu_background_hover_color', '#e49c86' );
$header_menu_font_color = get_theme_mod( 'header_menu_font_color', '#000000' );
$header_menu_font_hover_color = get_theme_mod( 'header_menu_font_hover_color', '#e49c86' );

 //top border
$header_menu_border_top = get_theme_mod( 'header_menu_border_top', 'hide' );

 //bottom border
$header_menu_border_bottom = get_theme_mod( 'header_menu_border_bottom', 'show' );

if( $header_menu_background_type === 'solid' ) echo ".menu_nav_content { background-color : " .esc_attr( $header_menu_background_color ). "; }";

echo "header .header-wrapper nav ul>li > .children, header .header-wrapper nav ul>li > .sub-menu, header nav.toggled { background-color : " .esc_attr( $header_menu_background_color ). "; }";

echo "header .header-wrapper nav ul>li> .children li>a, header .header-wrapper nav ul>li> .sub-menu li>a { color : ". esc_attr( $header_menu_font_color ) ."; }";

if( $header_menu_background_type !== 'solid' ) echo ".menu_nav_content { background : " .esc_attr( $header_menu_background_type ). "; }";
echo "header .header-wrapper nav ul>li>a:after{ background-color : " .esc_attr( $header_menu_background_hover_color ). "; }";

echo "header .header-wrapper nav ul>li>a, header .header-wrapper nav ul>li:after  { color : ". esc_attr( $header_menu_font_color ) ."; }";
echo "header .header-wrapper nav ul>li>a:hover, header .header-wrapper nav ul>li> .children li>a:hover, header .header-wrapper nav ul>li> .sub-menu li>a:hover, header .header-wrapper nav ul>li.current-menu-item>a,
	#site-navigation li.page_item_has_children:after, #site-navigation li.menu-item-has-children:after { color: ". esc_attr( $header_menu_font_hover_color )  ."}";

if($header_menu_border_top == 'show'){
	echo "body .menu_nav_content, body.header-layout--three .row-full   { border-top : 1px solid #000000;}";
}

if( $header_menu_border_bottom == 'show' ) {
	echo "body .menu_nav_content, body.header-layout--three .row-full { border-bottom : 1px solid #000000;}";
	echo "body.header-layout--three .row-full { border-bottom : 4px double #cfac9f;}";
}
echo "header #menu-toggle { color : ". esc_attr( $header_menu_mobile_toggle_button_color ) ."; background-color: ". esc_attr( $header_menu_mobile_toggle_button_background_color )."; }";

	// 404 page button
if( is_404() ) :
	echo "body.error404 .error-404__content .btn { color: #ffffff; background-color: " .esc_attr( $armonia_theme_color ). " }\n";
	echo "body.error404 .error-404__content .btn:hover { background-color: " .esc_attr( $armonia_theme_hover_color ). " }\n";
endif;