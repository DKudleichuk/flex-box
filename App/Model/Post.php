<?php

namespace Flexbox\Model;

/**
 * Post model
 **/
class Post {
	
	/**
	 * Get posts by params
	 **/
	function get_posts( $args ) {
		
		$defaults = [
			'post_type'      				=> 'post',
			'post_status'    				=> 'publish',
			'posts_per_page' 				=> get_option( 'posts_per_page' ),
			'paged'          				=> 1,
			'order'          				=> 'DESC',
			'orderby'        				=> 'date',
			'ignore_sticky_posts' 	=> true
		];
		
		$args = wp_parse_args( $args, $defaults );
		
		if ( isset( $args['tax_query_type'] ) ) {
			
			$_taxonomy_slug  = $args['taxonomy_slug'];
			$_taxonomy_terms = explode( ',', $args['taxonomy_terms'] );
			
			if ( $args['tax_query_type'] == 'only' ) {
				
				$args['tax_query'] = [
					[
						'taxonomy' => $_taxonomy_slug,
						'field'    => 'slug',
						'terms'    => $_taxonomy_terms,
					]
				];
				
			} else if ( $args['tax_query_type'] == 'except' ) {
				
				$args['tax_query'] = [
					[
						'taxonomy' => $_taxonomy_slug,
						'field'    => 'slug',
						'terms'    => $_taxonomy_terms,
						'operator' => 'NOT IN',
					]
				];
				
			}
			
		}
		
		return new \WP_Query( $args );
	}
	
	/**
	 * Get popular posts
	 **/
	function get_popular_posts( $post_type, $limit ) {
		$args = [
			'post_type'           => $post_type,
			'post_status'         => 'publish',
			'posts_per_page'      => $limit,
			'order'               => 'DESC',
			'ignore_sticky_posts' => true,
			'orderby'             => 'comment_count'
		];
		
		return new \WP_Query( $args );
	}
	
	/**
	 * Get recent posts
	 **/
	function get_recent_posts( $post_type, $limit ) {
		$args = [
			'post_type'           => $post_type,
			'post_status'         => 'publish',
			'posts_per_page'      => $limit,
			'order'               => 'DESC',
			'ignore_sticky_posts' => true
		];
		
		return new \WP_Query( $args );
	}
	
	/**
	 * Get related posts
	 **/
	function get_related_posts( $primary_post_id, $limit, $taxonomy = 'category', $with_thumbnail_only = false ) {
		
		$terms = wp_get_post_terms( $primary_post_id, $taxonomy );
		
		$response = false;
		
		if ( count( $terms ) > 0 ) {
			
			$post_type      = get_post_type( $primary_post_id );
			$post_terms_ids = [];
			
			foreach ( $terms as $term ) {
				$post_terms_ids[] = $term->term_id;
			}
			
			$args = [
				'post_type'           => $post_type,
				'post_status'         => 'publish',
				'posts_per_page'      => $limit,
				'order'               => 'DESC',
				'orderby'             => 'rand',
				'ignore_sticky_posts' => true,
				'post__not_in'        => [ $primary_post_id ],
				'tax_query'           => [
					'relation' => 'OR',
					[
						'taxonomy' => $taxonomy,
						'field'    => 'id',
						'terms'    => $post_terms_ids
					]
				]
			];
			
			if ( $with_thumbnail_only ) {
				$args['meta_query'][] = [
					'key' => '_thumbnail_id'
				];
			}
			
			$response = new \WP_Query( $args );
			
		}
		
		return $response;
	}
	
	/**
	 * Get random posts
	 **/
	function get_random_posts( $post_type, $limit, $with_thumbnail_only = false ) {
		$args = [
			'post_type'           => $post_type,
			'post_status'         => 'publish',
			'posts_per_page'      => $limit,
			'ignore_sticky_posts' => true,
			'orderby'             => 'rand'
		];
		
		if ( $with_thumbnail_only ) {
			$args['meta_query'][] = [
				'key' => '_thumbnail_id'
			];
		}
		
		return new \WP_Query( $args );
	}
	
}
