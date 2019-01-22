<div class="post-data">
	<div class="data-author">
		<?php _e( 'By', 'flex-box'); ?> <?php the_author_link(); ?>
	</div>
	<div class="data-date">
	<?php _e( 'Posted on', 'flex-box'); ?> <?php the_time( 'j. F Y' ); ?>
	</div>
	<div class="data-comments">
		<a href="<?php echo get_comments_link(); ?>">
			<?php comments_number( __( '0 comments', 'flex-box'), __( '1 comment', 'flex-box'), __( '% comments', 'flex-box') ); ?>
		</a>
	</div>
	<?php if( get_post_type() == 'post' ): ?>
		<div class="data-categories">
			<?php _e( 'In', 'flex-box'); ?>: <?php echo get_the_category_list( ', '); ?>
		</div>
		<div class="data-tags">
			<?php echo get_the_tag_list( __( 'Tags: ', 'flex-box'), ', ', '' ); ?>
		</div>
	<?php endif; ?>
</div>