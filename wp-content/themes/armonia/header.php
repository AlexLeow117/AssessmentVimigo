<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Armonia
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	wp_body_open();
?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'armonia' ); ?></a>
	<?php
		/**
		 * Header template parts
		 * 
		 * @since 1.0.0
		 */
		get_template_part( 'template-parts/header/layout', 'three' );
?>
	<div id="content">
      <div class="container">
		  <?php
		  	/**
			 * hook - armonia_before_content_hook
			 * 
			 * 
			 */
			do_action( 'armonia_before_content_hook' );