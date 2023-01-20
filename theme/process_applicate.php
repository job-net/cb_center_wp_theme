<?php /* Template Name: Postulando */


 $applicant_name = $_POST['applicant_name'];
 $applicant_dpi = $_POST['applicant_dpi'];
 $applicant_email = $_POST['applicant_email'];
 $applicant_phone = $_POST['applicant_phone'];
//
 $applicant = array(
	 'post_title' => 'algo',
	 'post_content' => ' ',
	 'post_status' => 'publish',
	 'post_author' => 1,
	 'post_type' => 'applicant',
 );
//
 // Insert the post into the database
global $wp_filter;
echo '<pre>';
var_dump( $wp_filter['save_post'] );
echo '</pre>';
	 $applicant_id = wp_insert_post($applicant);
//
// // add custom fields
//
// add_post_meta($applicant_id, 'applicant_dpi', $applicant_dpi, true);
// add_post_meta($applicant_id, 'applicant_email', $applicant_email, true);
// add_post_meta($applicant_id, 'applicant_phone', $applicant_phone, true);

 echo $applicant_id;
 echo $applicant_name;
 echo $applicant_dpi;
 echo $applicant_email;
 echo $applicant_phone;

echo '<h1>Postulando</h1>';
