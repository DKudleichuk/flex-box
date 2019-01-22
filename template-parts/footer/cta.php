<?php if( filter_var( get_theme_mod('footer_cta_display'), FILTER_VALIDATE_BOOLEAN )): ?>
<div class="footer-cta">
	<div class="container">
		<div class="row">
			<div class="offset-md-2 col-md-8">

				<?php
					$title = get_theme_mod('footer_cta_title');
					if( $title <> '' ):
				?>
				<h2><?php echo wp_kses_post( $title ); ?></h2>
				<?php endif; ?>

				<?php
					$text = get_theme_mod('footer_cta_text');
					if( $text <> '' ):
				?>
				<p><?php echo wp_kses_post( $text ); ?></p>
				<?php endif; ?>

				<?php
					$btn1_title = get_theme_mod('footer_cta_btn1_text');
					if( $btn1_title <> '' ):
				?>
				<a href="<?php echo get_theme_mod('footer_cta_btn1_link'); ?>" class="button black"><?php echo wp_kses_post( $btn1_title ); ?></a> 
				<?php endif; ?>

				<?php
					$btn2_title = get_theme_mod('footer_cta_btn2_text');
					if( $btn2_title <> '' ):
				?>
				<a href="<?php echo get_theme_mod('footer_cta_btn2_link'); ?>" class="button outline"><?php echo wp_kses_post( $btn2_title ); ?></a>
				<?php endif; ?>

			</div>
		</div>
	</div>
</div>
<?php endif; ?>