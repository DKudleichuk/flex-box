<article <?php post_class(); ?>>
	
	<?php if ( has_post_thumbnail() ): ?>
		<div class="thumb post-thumb">
			<a href="<?php the_permalink(); ?>" class="thumb-link">
				<?php the_post_thumbnail( 'full'); ?>
			</a>
			<a href="<?php the_permalink(); ?>" class="post-link"><i class="icon-link"></i></a>
		</div>
		<div class="clearfix"></div>
	<?php endif; ?>

	<?php get_template_part( '/template-parts/loop/post-data' ); ?>

	<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	
	<div class="excerpt">
		<?php the_excerpt(); ?>
	</div>
	
	<a href="<?php the_permalink(); ?>" class="button medium black"><?php esc_html_e( 'Read more', 'flex-box' ); ?></a>

</article>