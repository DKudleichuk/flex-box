<?php if( function_exists( 'is_shop') && is_shop() ): ?>

	<?php if ( is_active_sidebar( 'sidebar-shop')): ?>
		<aside id="sidebar" class="col-lg-3">
			<?php dynamic_sidebar( 'sidebar-shop' ); ?>
		</aside>
	<?php endif; ?>

<?php else: ?>

	<?php if ( is_active_sidebar( 'sidebar')): ?>
		<aside id="sidebar" class="col-lg-3">
			<?php dynamic_sidebar( 'sidebar' ); ?>
		</aside>
	<?php endif; ?>

<?php endif; 