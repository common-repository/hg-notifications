<?php

// check if the show notification is checked
$notification_activation = get_option('notification_activation');


// if the show notification is checked, add the fucntion to wp_head
if ($notification_activation){
		add_action('wp_head', 'pintar_notificacion');
}

// function to filter testing mode
function pintar_notificacion(){
	
	$notification_testing = get_option('notification_testing');
	
	if ($notification_testing){
		if ( current_user_can('edit_others_posts') ) {
			mostrar_notificacion();
		}
	} else {
		mostrar_notificacion();
	}
}

// function to show the notification on the homepage
function mostrar_notificacion(){

	// check if the notification has to be shown in the HOME
	$show_notification_home = get_option('show_notification_home');

	if ($show_notification_home){
		if(is_home()){
			notification_print_code();
		}
	}
	
	// check if the notification has to be shown in the FRONTPAGE
	$show_notification_frontpage = get_option('show_notification_frontpage');
	
	if ($show_notification_frontpage){
		if(is_front_page()){
			notification_print_code();
		}
	}
}

function notification_print_code(){
	echo "
	<script>
	jQuery(document).ready(function() {
		jQuery('#notificacion-container').fadeIn('slow');
		jQuery('#cerrar').click(function() {
			jQuery('#notificacion-container').fadeOut('hide', function() {
			});
		});
	});
	</script>";
	?>
	<div id="notificacion-container">
		<div class="notificacion">
			<div id="cerrar">X</div>
					<?php
						$notification_title = get_option('notification_title');
						$notification_content = get_option('notification_content');
						$notification_content_filtered = apply_filters('the_content',$notification_content);
					?>
					<h1><?php echo $notification_title; ?></h1>
					<p><?php echo $notification_content_filtered; ?></p>
		</div>
	</div>
	<?php
}
?>