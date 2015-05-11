<?php

/**
*	Add a lesson to a course
*
*	@param $course_id int id of the course that the lessons are being added to
*	@param $lesson_id int id of the lesson to add to the course
*	@since 5.0
*/
function cgc_course_add_lesson( $course_id = 0, $lesson_id = 0 ) {

	if ( empty( $course_id ) || empty( $lesson_id ) )
		return;

	// add the love
	$db = new CGC_Courses_DB;
	$out =  $db->add_lesson( array( 'course_id' => $course_id, 'lesson_id' => $lesson_id ) );
}

/**
*	Get the course that the lesson/quiz/exercise is attached to
*
*	@param $lesson_id int id of the post that is attached to the course
*					      this can be a lesson, quiz, or exercise
*	@since 5.0
*/
function cgc_course_get_object_parent( $lesson_id = 0 ){

	if ( empty( $lesson_id ) )
		$lesson_id = get_the_ID();

	$db = new CGC_Courses_DB;

	$result =  $db->find_parent( $lesson_id );

	return $result ? $result[0] : false;
}

/**
*	Loop through an array of lessons and attach them to a course
*
*	@param $course_id int id of the course that the lessons are being added to
*	@param $lessons array array of lesson ids
*	@since 5.0
*/
function cgc_course_update_all_lessons( $course_id = 0 , $lessons = array() ) {

	if ( empty( $course_id ) || empty( $lessons ) )
		return;

	// add the love
	$db = new CGC_Courses_DB;

	$db->remove_all_lessons( $course_id );

	foreach( $lessons as $lesson ) {

		$db->add_lesson( array( 'course_id' => $course_id, 'lesson_id' => $lesson ) );
	}
}

/**
*	Get the flow that a course is attached to
*
*	@since 5.0
*	@subpackage cgc-flows/public/includes
*/
function cgc_course_get_parent_flow( $course_id = 0 ) {

	if ( empty( $course_id ) )
		$course_id = get_the_ID();


	$db = new CGC5_Flows_DB;

	$out = $db->get_flow_of_course( $course_id );

	return $out ? $out[0] : false;

}