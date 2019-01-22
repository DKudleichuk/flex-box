<?php
	wp_link_pages( [
		'before'      => '<div class="page-links">' . __( 'Pages:', 'flex-box' ),
		'after'       => '</div>',
		'link_before' => '<span class="page-number">',
		'link_after'  => '</span>',
	]);
?>