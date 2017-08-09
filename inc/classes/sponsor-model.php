<?php


namespace MGSPP\Models;

class Sponsor {

	/* =================================
     * PRIVATE VARIABLES
     * ================================*/

	private $ID             = 0;
	private $link           = "";
	private $name           = "";




	/* =================================
     * GETTERS AND SETTERS
     * ================================*/
	/**
	 * @return int
	 */
	public function get_ID() {
		return $this->ID;
	}

	/**
	 * @param int $ID
	 */
	public function set_ID( $ID ) {
		$this->ID = $ID;
	}

	/**
	 * @return string
	 */
	public function get_link() {
		return $this->link;
	}

	/**
	 * @param string $link
	 */
	public function set_link( $link ) {
		$this->link = $link;
	}

	/**
	 * @return string
	 */
	public function get_name() {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function set_name( $name ) {
		$this->name = $name;
	}




}