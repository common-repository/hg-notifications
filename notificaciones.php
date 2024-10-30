<?php
/*
Plugin Name: Notificaciones
Plugin URI: http://www.hectorgarrofe.com
Description: Plugin to add a simple notification system to Wordpress.
Version: 1.1
Author: Hector Garrofe
Author URI: http://www.hectorgarrofe.com
License: DWYW
*/

function notifications_init() {
  load_plugin_textdomain( 'notificaciones', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/'); 
}
add_action('init', 'notifications_init');

//ayuda
include 'help.php';

//mostrar notificacion por pantalla
include 'display.php';

//panel de opciones
include 'options_panel.php';

//iconos admin
if ( $wp_version >= 3.8 ) { // Wordpress 3.8 and above
	include_once 'mp6.php';
}

//registramos la hoja de estilos
add_action( 'wp_enqueue_scripts', 'register_notification_styles' );

function register_notification_styles() {
	$estilos_notificacion = plugins_url( 'css/style.css', __FILE__ );
	wp_register_style( 'estilo-notificaciones', $estilos_notificacion, false, false, 'all' );
	wp_enqueue_style( 'estilo-notificaciones', $estilos_notificacion, false, false, 'all' );
}
?>