<?php

namespace MGSPP\Service;

use MGSPP\Models\Sponsor;
use MGSPP\Singleton;

class Sponsors extends Singleton {


	/**
	 * Create a Sponsor entity from a WP_Post instance
	 *
	 * @author  Mauricio Gelves <mg@maugeles.com>
	 * @param   \WP_Post $post
	 * @return  Sponsor
	 * @since   1.0
	 */
	public function get_equipo_from_post( \WP_Post $post ) {

		// Variable
		$sponsor       = new Sponsor();
		$sponsor_meta  = get_fields( $post->ID );

		// Set Values
		$sponsor->set_ID( $post->ID );
		$sponsor->set_name( $post->post_title );
		if( isset( $sponsor_meta['mgsp_sponsor_website'] ) ) $sponsor->set_link( $sponsor_meta['mgsp_sponsor_website'] );


		return $sponsor;

	}



	/**
	 * Get a Sponsor by its id
	 *
	 * @author  Mauricio Gelves <mg@maugelves.com>
	 * @param   $sponsor_id int
	 * @return  false|Sponsor
	 */
	public function get_by_id( $sponsor_id ) {

		$sponsor = false;

		$args = array(
			'post_status'   => 'publish',
			'post_type'     => 'sponsor',
			'p'             => $sponsor_id
		);

		$query = new \WP_Query( $args );

		// Check query is not empty
		if( ! $query->have_posts() ) return $sponsor;

		// Get the object from the post
		$sponsor = self::get_equipo_from_post( $query->posts[0] );

		return $sponsor;

	}

}