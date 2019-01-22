<?php
	/**
	 * Generate custom CSS styles based on theme customizer settings
	 */
	header("Content-type: text/css");
?>

<?php
	/**
	 * Body background color
	 */
?>
body {
	background-color: <?php echo get_theme_mod( 'background-color', '#fff' ); ?>
}

<?php
	/**
	 * Header text color
	 */
?>
#content h1,
#content h2,
#content h3,
#content h4,
#content h5,
#content h6 {
	background-color: <?php echo get_theme_mod( 'header_textcolor', '#333' ); ?>
}
