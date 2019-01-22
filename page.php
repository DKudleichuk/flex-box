<?php
	/**
	 * Single page template
	 */
	get_header();
	the_post();
?>
	
	<!--
		Start layout
	-->
	<?php do_action( 'flexbox_layout_start'); ?>

		<?php do_action( 'flexbox_before_single_post'); ?>

		<article <?php post_class(); ?>>

			<!--
				Page title
			-->
			<?php
				do_action( 'flexbox_before_single_post_title');
				do_action( 'flexbox_single_post_title');
				do_action( 'flexbox_after_single_post_title');
			?>

			<!--
				Page content
			-->
			<?php
				do_action( 'flexbox_before_single_post_content');
				do_action( 'flexbox_single_post_content');
				do_action( 'flexbox_after_single_post_content');
			?>

			<!--
				Page comments
			-->
			<?php
				do_action( 'flexbox_before_single_post_comments');
				do_action( 'flexbox_single_post_comments');
				do_action( 'flexbox_after_single_post_comments');
			?>

		</article>

		<?php do_action( 'flexbox_after_single_post'); ?>

		<!--
			Sidebar
		-->
		<?php get_sidebar(); ?>

	<!--
		End layout
	-->
	<?php do_action( 'flexbox_layout_end'); ?>

<?php get_footer();