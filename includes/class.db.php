<?php

class CGC_Courses_DB {


	private $table;
	private $db_version;

	function __construct() {

		global $wpdb;

		$this->table   		= $wpdb->base_prefix . 'cgc_courses';
		$this->db_version = '1.0';

	}

	/**
	*	Relate a lesson to a course
	*
	*	@since 5.0
	*/
	public function add_lesson( $args = array() ) {

		global $wpdb;

		$defaults = array(
			'course_id'		=> '',
			'lesson_id'		=> ''
		);

		$args = wp_parse_args( $args, $defaults );

		$add = $wpdb->query(
			$wpdb->prepare(
				"INSERT INTO {$this->table} SET
					`course_id`  		= '%d',
					`lesson_id`  		= '%d'
				;",
				absint( $args['course_id'] ),
				absint( $args['lesson_id'] )
			)
		);

		if ( $add )
			return $wpdb->insert_id;

		return false;
	}

	public function remove_lesson( $lesson_id = 0 ) {}

	public function is_lesson_in_course( $lesson_id = 0 ) {}

}