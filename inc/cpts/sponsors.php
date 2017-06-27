<?php

namespace MGSP\cpts;

/**
 * Class Sponsor
 *
 * @author  Mauricio Gelves <mg@maugelves.com>
 * @since   1.0.1
 */
class Sponsor
{
	/**
	 * Personal constructor.
	 */
	public function __construct() {

		add_action( 'init', array( $this, 'create_cpt_sponsor' ), 10 );

		add_filter( 'enter_title_here', array( $this, 'change_title_placeholder' ) );

		add_filter( 'post_updated_messages', array($this, 'updated_messages_cb' ) );

	}

	/**
	 *  Change the Post Title placeholder
	 *  @param $title
	 *
	 *  @return string
	 */
	public function change_title_placeholder( $title ) {
		$screen = get_current_screen();

		if  ( 'sponsor' == $screen->post_type )
			$title = __('Introduce el nombre', 'mgsp' );


		return $title;
	}



	/**
	 * This function creates the CPT Sponsor
	 */
	public function create_cpt_sponsor() {

		$args = array(
			'label'                 => __( 'Sponsors', 'mgsp' ),
			'labels'                => array (

				// Labels values
				'name'                  => __( 'Sponsors', 'mgsp' ),
				'singular'              => __( 'Sponsor', 'mgsp' ),
				'add_new'               => __( 'Agregar un sponsor', 'mgsp' ),
				'add_new_item'          => __( 'Agregar un sponsor', 'mgsp' ),
				'edit_item'             => __( 'Editar sponsor', 'mgsp' ),
				'new_item'              => __( 'Nuevo sponsor', 'mgsp' ),
				'view_item'             => __( 'Ver sponsor', 'mgsp' ),
				'view_items'            => __( 'Ver sponsors', 'mgsp' ),
				'search_items'          => __( 'Buscar sponsors', 'mgsp' ),
				'not_found'             => __( 'No se encontraron sponsors', 'mgsp' ),
				'not_found_in_trash'    => __( 'No hay registros eliminados', 'mgsp' ),
				'all_items'             => __( 'Todos los sponsors', 'mgsp' ),
				'archives'              => __( 'Sponsors', 'mgsp ' ),
				'featured_image'        => __( 'Logo ', 'mgsp ' ),
				'set_featured_image'    => __( 'Establecer el logo', 'mgsp ' ),
				'remove_featured_image' => __( 'Quitar el logo', 'mgsp ' ),
				'use_featured_image'    => __( 'Usar este logo como principal', 'mgsp ' )

			),
			'public'                => true,
			'exclude_from_search'   => true,
			'show_ui'               => true,
			'menu_position'         => 19,
			'menu_icon'             => 'dashicons-thumbs-up',
			'supports'              => array( 'title', 'thumbnail' ),
			'has_archive'           => true
		);


		register_post_type( 'sponsor', $args );

	}




	/**
	 * Customized messages for Sponsor Custom Post Type
	 *
	 * @param   array $messages Default messages.
	 * @return  array 			Returns an array with the new messages
	 */
	public function updated_messages_cb( $messages ) {

		$messages['sponsor'] = array(
			0  => '', // Unused. Messages start at index 1.
			1 => __( 'Sponsor actualizado.', 'mgsp' ),
			4 => __( 'Sponsor actualizado.', 'mgsp' ),
			/* translators: %s: date and time of the revision */
			5 => isset( $_GET['revision']) ? sprintf( __( 'Sponsor recuperado de la revisión %s.', 'mgsp' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => __( 'Sponsor publicado.', 'mgsp' ),
			7 => __( 'Sponsor guardado.', 'mgsp' ),
			9 => __('Sponsor programador', 'mgsp' ),
			10 => __( 'Borrador de sponsor actualizado.', 'mgsp' ),
		);

		return $messages;
	}

}
$sponsor = new Sponsor();