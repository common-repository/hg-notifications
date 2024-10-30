<?php
function register_my_custom_submenu_page() {

	//guardamos la url de la imagen en una variable
	$imagen_notificacion = plugins_url( 'img/notificaciones.png', __FILE__ );

	add_menu_page( __('Notification', 'notificaciones'), __('Notification', 'notificaciones'), 'edit_others_pages', 'notifications', 'pinta_pagina_configuracion_notificaciones',$imagen_notificacion);
}
add_action('admin_menu', 'register_my_custom_submenu_page');

function pinta_pagina_configuracion_notificaciones() {
	include('notificaciones_admin.php');
}
?>