<?php 

// gravity form readonly
function gravity_form_readonly_fields($form){
	?>
	<script type="text/javascript">
	jQuery(document).ready(function($){
		$('li.emailreadonly input').attr('readonly', 'readonly');
		$('li.usernamereadonly input').attr('readonly', 'readonly');
		
	});
	
	</script>
	<?php
	return $form;
	
}
add_action('gform_pre_render_7', 'gravity_form_readonly_fields');

// gravity form auto populate input value 

function username_auto_populate($input, $field, $value, $lead_id, $form_id){
	
	
	if($field->cssClass == 'usernamereadonly'){
		
		$input = '<input name="input_9" id="input_7_9" type="text" value="'.wp_get_current_user()->user_login .'" class="medium" tabindex="1">';
	}
	return $input;
}

add_action('gform_field_input', 'username_auto_populate', 10, 5);

