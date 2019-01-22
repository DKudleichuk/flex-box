<?php
	$footer_has_widgets = is_active_sidebar( 'sidebar-footer-1' ) || is_active_sidebar( 'sidebar-footer-2' ) || is_active_sidebar( 'sidebar-footer-3' ) || is_active_sidebar( 'sidebar-footer-4' );
?>
<footer id="footer" class="<?php echo filter_var( $footer_has_widgets, FILTER_VALIDATE_BOOLEAN ) ? 'has-widgets' : 'no-widgets'; ?>">
	<div class="container">
		<div class="row">
			
			<?php if ( is_active_sidebar( 'sidebar-footer-1' )): ?>
			<div class="col-lg-3 col-md-6">
				<?php dynamic_sidebar( 'sidebar-footer-1' ); ?>
			</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'sidebar-footer-2' )): ?>
			<div class="col-lg-3 col-md-6">
				<?php dynamic_sidebar( 'sidebar-footer-2' ); ?>
			</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'sidebar-footer-3' )): ?>
			<div class="col-lg-3 col-md-6">
				<?php dynamic_sidebar( 'sidebar-footer-3' ); ?>
			</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'sidebar-footer-4' )): ?>
			<div class="col-lg-3 col-md-6">
				<?php dynamic_sidebar( 'sidebar-footer-4' ); ?>
			</div>
			<?php endif; ?>
			
		</div>

	</div>
</footer>