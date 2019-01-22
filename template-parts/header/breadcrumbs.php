<?php
	/**
	 * This template uses bcn_display() function from "Breadcrumb NavXT" plugin to display breadcrumbs
	 * if the plugin was not installed and activated, breadcrumbs will be now shown
	 * 
	 * plugin URL: https://wordpress.org/plugins/breadcrumb-navxt/
	 */
?>

<?php if( filter_var( get_theme_mod( 'header_display_breadcrumbs'), FILTER_VALIDATE_BOOLEAN ) ): ?>
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<nav typeof="BreadcrumbList" vocab="https://schema.org/">
					<?php if( function_exists( 'bcn_display') ): ?>

						<?php bcn_display(); ?>

					<?php else: ?>

						<?php printf( __( 'Install <a href="%s">Breadcrumbs NavXT</a> plugin to display breadcrumbs', 'flex-box'), 'https://wordpress.org/plugins/breadcrumb-navxt/'); ?>

					<?php endif; ?>
				</nav>
			</div>
		</div>
	</div>
</div>
<?php endif; 