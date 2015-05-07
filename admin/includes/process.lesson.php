<?php

/**
*	When a course is saved, add a relationship between each lesson and the course
*
*	@since 5.0
*/
add_action('save_post_cgc_courses',	'cgc_save_course_add_lesson');
function cgc_save_course_add_lesson( $post_id ){

    $courses = isset( $_POST['_course_lessons'] ) ? $_POST['_course_lessons'] : false;

    $ids = '';
    foreach ( $courses as $course ) {

    	$ids .= $course['ids'].',';

    }

    $ids = explode(',', rtrim( $ids,',' ));

    cgc_course_update_all_lessons( $post_id, $ids );

}