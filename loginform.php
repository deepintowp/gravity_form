<?php 
// In your theme functios.php
// gravity login form

function loginby_gravity_form($entry, $form){
	$usermane = $entry[1];
	$pass = $entry[2];
	$creads = array();
	$creads['user_login'] = $usermane;
	$creads['user_password'] = $pass;
	$sign = wp_signon($creads);
	wp_set_current_user($sign->ID);
	
}
add_action('gform_after_submission_9', 'loginby_gravity_form', 10, 2);

function our_login_form_validation($result, $value, $form, $field){
	global $user;
	 if($field['cssClass'] == 'login_username'){
		 $user = get_user_by('login', $value);
		 if(empty($user->user_login)){
			 $result['is_valid'] = false;
			 $result['message'] = 'Invalid Username.';
		 }
		 
	 }
	
	if($field['cssClass'] == 'login_pass'){
		 if(!$user || !wp_check_password($value, $user->data->user_pass,  $user->ID  )){
			 $result['is_valid'] = false;
			  $result['message'] = 'Invalid password.';
		 }
		 
	 }
	return $result;
	
	
}

add_action('gform_field_validation_9','our_login_form_validation', 10, 4);






