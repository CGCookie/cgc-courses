<?php

/**
*	Add a lesson to a course
*
*	@since 5.0
*/
function cgc_add_lesson( $course_id = 0, $lesson_id = 0 ) {

	if ( empty( $course_id ) || empty( $lesson_id ) )
		return;

	// add the love
	$db = new CGC_Courses_DB;
	$out =  $db->add_lesson( array( 'course_id' => $course_id, 'lesson_id' => $lesson_id ) );
}

/**
*	Get the course that the lesson is attached to
*
*	@since 5.0
*/
function cgc_get_lesson_parent( $lesson_id = 0 ){

	if ( empty( $lesson_id ) )
		$lesson_id = get_the_ID();

	$db = new CGC_Courses_DB;

	$result =  $db->find_parent( $lesson_id );

	return $result[0];
}