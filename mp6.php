<?php
// ICONOS
add_action( 'admin_head', 'notificaciones_cpt_icons' );
function notificaciones_cpt_icons() { 
?>
    <style type="text/css" media="screen">
		#toplevel_page_notifications .wp-menu-image img{
			display: none;
		}
		#toplevel_page_notifications .wp-menu-image:before{
			content: '\f154' !important;
		}
    </style>
<?php } ?>