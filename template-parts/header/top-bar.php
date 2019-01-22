<?php if( filter_var( get_theme_mod( 'header_display_top_bar'), FILTER_VALIDATE_BOOLEAN ) ): ?>
<header id="top-bar">
	<div class="container">
		<div class="row">
			<div class="col-12">

				<div class="top-bar-menu">
					<?php
						wp_nav_menu( [
							'menu'            => 'top_bar_menu',
							'theme_location'  => 'top_bar_menu',
							'container'       => 'nav',
							'menu_id'         => false,
							'depth'						=> 1
						]);
					?>
				</div>

				<div class="profiles">
					<?php foreach( FLEXBOX()->Config['social_icons'] as $key => $icon ): ?>

						<?php
							$url = get_theme_mod( $key . '_url' );
							if( $url <> '' ):
						?>
						<a href="<?php echo esc_attr( $url ); ?>"><i class="<?php echo esc_attr( $icon ); ?>"></i></a>
						<?php endif; ?>

					<?php endforeach; ?>

				</div>

			</div>
		</div>
	</div>
</header>
<?php endif; ?>