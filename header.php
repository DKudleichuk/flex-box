<?php
	/**
	 * Header template
	 */
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="main-wrapper">
	
	<?php
		do_action( 'flexbox_before_header');
		do_action( 'flexbox_header');
		do_action( 'flexbox_after_header');
	?>