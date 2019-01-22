<div class="loop <?php echo \Flexbox\Helper\Front::get_grid_class(); ?>">

	<?php
		/**
		 * Page titles for WooCommerce
		 */
	?>

	<?php if( \Flexbox\Helper\Utils::is_woocommerce() && ( is_shop() || is_product_taxonomy() ) ): ?>

		<h1><?php woocommerce_page_title(); ?></h1>

	<?php
		/**
		 * Search page
		 */
	?>

	<?php elseif( is_search() ): ?>

		<?php 
			$search_term = get_query_var( 's');
			if( $search_term <> '' ):
		?>
		<h1><?php printf( __( 'Search results for "%s"', 'flex-box'), $search_term ); ?></h1>
		<?php else: ?>
		<h1><?php _e( 'Search', 'flex-box'); ?></h1>
		<?php endif; ?>

		<?php get_search_form(); ?>

	<?php
		/**
		 * Author page
		 */
	?>

	<?php elseif( is_author() ): ?>

		<?php $author = get_user_by( 'ID', get_query_var( 'author') ); ?>

		<h1><?php printf( __( 'Posts written by "%s"', 'flex-box'), $author->display_name ); ?></h1>

	<?php
		/**
		 * Tags
		 */
	?>

	<?php elseif( is_tag() ): ?>

		<?php $tag = get_term_by( 'slug', get_query_var( 'tag'), 'post_tag' ); ?>

		<h1><?php printf( __( 'Posts tagged with "%s"', 'flex-box'), $tag->name ); ?></h1>

	<?php
		/**
		 * Category
		 */
	?>

	<?php elseif( is_category() ): ?>

		<?php $category = get_term_by( 'slug', get_query_var( 'category_name'), 'category' ); ?>

		<h1><?php printf( __( 'Posts in "%s" category', 'flex-box'), $category->name ); ?></h1>

	<?php
		/**
		 * Archive
		 */
	?>

	<?php elseif( is_archive() ): ?>

		<?php
			$month = get_query_var( 'monthnum');
			$month_name = date( "F", mktime(0, 0, 0, $month, 10));
		?>

		<h1><?php printf( __( 'Archive for %s %s', 'flex-box'), $month_name, get_query_var( 'year') ); ?></h1>

	<?php endif; ?>
