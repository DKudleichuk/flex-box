<?php
	/**
	 * Error 404 template
	 */
	get_header();
?>
	
	<?php do_action( 'flexbox_layout_start'); ?>
				
		<?php
			do_action( 'flexbox_before_page_404_content');
			do_action( 'flexbox_page_404_content');
			do_action( 'flexbox_after_page_404_content');
		?>
		
	<?php do_action( 'flexbox_layout_end'); ?>

<?php get_footer();
