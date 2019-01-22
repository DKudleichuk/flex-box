<?php
	/**
	 * Footer template
	 */
?>

	<?php
		do_action( 'flexbox_before_footer');
		do_action( 'flexbox_footer');
		do_action( 'flexbox_after_footer');
	?>	

</div><!-- #main-wrapper -->

<?php wp_footer(); ?>
</body>
</html>