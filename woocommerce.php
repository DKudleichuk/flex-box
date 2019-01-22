<?php
	/**
	 * Woocommerce template
	 */
	get_header();
?>
	
	<!--
		Start layout
	-->
	<?php do_action( 'flexbox_layout_start'); ?>

		<?php do_action( 'flexbox_before_loop'); ?>

			<?php woocommerce_content(); ?>

		<?php do_action( 'flexbox_after_loop'); ?>

		<!--
			Sidebar
		-->
		<?php get_sidebar(); ?>

	<!--
		End layout
	-->
	<?php do_action( 'flexbox_layout_end'); ?>

<?php get_footer();