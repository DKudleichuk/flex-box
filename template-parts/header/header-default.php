<header id="header" class="<?php echo has_header_video() ? 'video-header' : ''; ?>">

	<div id="custom-header-wrapper">
		<?php the_custom_header_markup(); ?>
	</div>

	<div class="container">
		<div class="row align-items-center">
			
			<div class="col-lg-3 header-logo-container">

				<a class="logo" href="<?php echo site_url( '/' ); ?>">

					<?php
						/**
						 * Custom image logo
						 */
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
						if ( has_custom_logo() ):
					?>
						<img src="<?php echo esc_url( $logo[0] ); ?>" alt="<?php bloginfo( 'name'); ?>">
					<?php endif; if( display_header_text() ): ?>

						<?php
							/**
							 * Fallback: Display Text logo if any logo image was not uploaded
							 */
							$site_title = get_bloginfo( 'name' );
							$site_tagline = get_bloginfo( 'description' );
						?>

						<?php if( $site_title <> '' ): ?>
						<h2 class="text-logo"><?php echo wp_kses_post( $site_title ); ?></h2>
						<?php endif; ?>

						<?php if( $site_tagline <> '' ): ?>
						<p class="text-logo-tagline"><?php echo wp_kses_post( $site_tagline ); ?></p>
						<?php endif; ?>

					<?php endif; ?>

				</a>

				<!--
					Mobile Menu Hamburger Link
				-->
				<a href="javascript:;" id="mobile-menu-toggler" class="hamburger">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</a>

			</div>
			
			<div class="col-lg-9 header-menu-container">
				
				<?php
				
					wp_nav_menu( [
						'menu'            => 'header_menu',
						'theme_location'  => 'header_menu',
						'container'       => 'div',
						'menu_id'         => false,
						'fallback_cb'			=> false,
					]);
				
				?>

			</div>
		
		</div>
	</div>

</header>