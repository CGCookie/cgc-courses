<?php

/**
*	When a course is saved, add a relationship between each lesson and the course
*
*/
add_action('save_post_cgc_courses',	'cgc_save_course_add_lesson');
function cgc_save_course_add_lesson( $post_id ){

    $courses = isset( $_POST['_course_lessons'] ) ? $_POST['_course_lessons'] : false;

    foreach ( $courses as $course ) {

    	$ids = $course['ids'];
    	$ids = explode(',', $ids);

    	cgc_course_update_lessons( $post_id, $ids );

    }

}