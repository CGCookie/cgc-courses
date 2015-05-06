<?php

/**
*	When a course is saved, add a relationship between each lesson and the course
*
*/
add_action('save_post',	'cgc_save_course_add_lesson', 10, 3);
function cgc_save_course_add_lesson( $post_id, $post, $update ){

    if ( 'cgc_courses' != $post->post_type ) {
        return $post_id;
    }

    $courses = isset( $_POST['_course_lessons'] ) ? $_POST['_course_lessons'] : false;

    foreach ($courses as $course) {

    	$ids = $course['ids'];
    	$ids = explode(',', $ids);

    	foreach ($ids as $id) {
    		cgc_add_lesson( $post_id, $id );
    	}
    }

}