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