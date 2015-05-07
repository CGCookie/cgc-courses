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
	*	Add a lesson to a course
	*
	*	@since 5.0
	*	@todo account for updating or removing the lesson
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

	/**
	 * Remove all lessons from a course
	 *
	 * @param int $flow_id
	 *
	 * @return bool
	 *
	 * @since 5.0
	 */
	public function remove_all_lessons( $course_id = 0 ) {

		global $wpdb;

		if ( empty( $course_id ) ) {
			return;
		}

 		$remove = $wpdb->query( $wpdb->prepare( "DELETE FROM {$this->table} WHERE `course_id` = '%d' ;", absint( $course_id ) ) );

		return $remove;

	}

	/**
	*	Find the course that the lesson is attached to
	*	@since 5.0
	*/
	public function find_parent( $lesson_id = 0 ) {

		global $wpdb;

		$result = $wpdb->get_col( $wpdb->prepare( "SELECT course_id FROM {$this->table} WHERE `lesson_id` = '%d'; ", absint( $lesson_id ) ) );

		return $result;

	}


	public function remove_lesson( $lesson_id = 0 ) {}


}