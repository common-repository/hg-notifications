<?php
//AYUDA - Solo aparece al editar una notifiación

add_action('admin_head', 'ayuda_notificaciones');
function ayuda_notificaciones() {
	$id_notificaciones = 'toplevel_page_notifications';
	$screen = get_current_screen();
	if($screen->id != $id_notificaciones)
		return;
		
	$screen->set_help_sidebar( __('<p>For more information visit the plugin\'s website: <a href="http://www.hectorgarrofe.com" target="_blank">Notifications</a></p>','notificaciones'));
		
	$screen->add_help_tab(array(
		'id' => 'general-info',
		'title' => __('What are notifications?', 'notificaciones'),
		'content' => '
			<h2>'.__('What are notifications?','notificaciones').'</h2>
			<p>'.__('Notifications is a very simple plugin that lets you add a message in the homepage of yourwebsite','notificaciones').'</p>
			<h2>'.__('What are the differences between FRONTPAGE and HOME?','notificaciones').'</h2>
			<p>'.__('If you use Wordpress as it\'s meant to be, FRONTPAGE is the homepage of your website, like: www.example.com.','notificaciones').'</p>
			<p>'.__('HOME is the homepage of your website\'s blog, like: www.example.com/blog.','notificaciones').'</p>
			<p></p>
			'
	));

/*	
	$screen->add_help_tab(array(
		'id' => 'pippins-settings',
		'title' => __('¿Como se usan?', 'notificaciones'),
		'content' => '<h2>hello</h2><p>This is the tab content dos</p>'
	));
	
	$screen->add_help_tab(array(
		'id' => 'pippins-css',
		'title' => __('Texto tres', 'notificaciones'),
		'content' => 'This is the tab content tres'
	));
*/

}
?>