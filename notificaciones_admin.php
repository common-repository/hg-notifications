<?php	if($_POST['oscimp_hidden'] == 'Y') {		//Form data sent				//notification title		$notification_title = $_POST['notification_title'];		update_option('notification_title', $notification_title);				//notification content		$notification_content = $_POST['notification_content'];		$notification_content = stripslashes($notification_content); // to fix the slashes in the img of TinyMCE		update_option('notification_content', $notification_content);		//notification activation		$notification_activation = $_POST['notification_activation'];		update_option('notification_activation', $notification_activation);		//show notification in front-page.php		$show_notification_frontpage = $_POST['show_notification_frontpage'];		update_option('show_notification_frontpage', $show_notification_frontpage);		//show notification in home.php		$show_notification_home = $_POST['show_notification_home'];		update_option('show_notification_home', $show_notification_home);		//notification testing		$notification_testing = $_POST['notification_testing'];		update_option('notification_testing', $notification_testing);?>				<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div><?php	} else {         $notification_content = get_option('notification_content');          $notification_title = get_option('notification_title');          $notification_testing = get_option('notification_testing');          $notification_activation = get_option('notification_activation');          $show_notification_frontpage = get_option('show_notification_frontpage');          $show_notification_home = get_option('show_notification_home');  	}?><div class="wrap">		<style>		#contextual-help-columns{			background: url('<?php echo plugins_url(); ?>/notificaciones/img/hg_logo.png') no-repeat bottom right;		}	</style>	<div id="icon-options-general" class="icon32"></div>	<?php echo "<h2>" . __( 'Notification', 'notificaciones' ) . "</h2>"; ?>	<?php echo "<h3>".__( 'Notification configuration', 'notificaciones' )."</h3>"; ?>		<?php	if ($notification_testing){		echo '<div style="padding: 5px;" class="error below-h2">'.__('Remember you\'re in Testing mode. Only administrators and editors can see the notification', 'notificaciones' ).'</div>';	}	?>			<form name="oscimp_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">		<table class="form-table">			<tbody>				<?php				/* utilizamos un campo oculto para determinar si la pagina actual está siendo mostrada al				usuario antes o después de apretar el botón de guardar los cambios. Cuando la página recibe los				datos del formulario este valor se cambia a Y. */				?>				<input type="hidden" name="oscimp_hidden" value="Y">				<tr valign="top">					<th scope="row"><?php _e('Display notification: ', 'notificaciones' ); ?></th>					<td>						<input type="checkbox" name="notification_activation" value="active" <?php if($notification_activation){echo 'checked';}?>>						<p class="description"><?php _e('Check to show the notification, uncheck to hide it', 'notificaciones' ); ?></p>					</td>				</tr>				<tr valign="top">					<th scope="row"><?php _e('Notification position: ', 'notificaciones' ); ?></th>					<td>						<input type="checkbox" name="show_notification_frontpage" value="active" <?php if($show_notification_frontpage){echo 'checked';}?>> Frontpage<br />						<p class="description"><?php _e('Show it in the frontpage of your webiste', 'notificaciones' ); ?></p><br />						<input type="checkbox" name="show_notification_home" value="active" <?php if($show_notification_home){echo 'checked';}?>> Home						<p class="description"><?php _e('Show it in the home of your webiste\'s blog', 'notificaciones' ); ?></p>					</td>				</tr>								<tr valign="top">					<th scope="row"><?php _e('Title: ', 'notificaciones' ); ?></th>					<td>						<input type="text" name="notification_title" value="<?php echo $notification_title; ?>" size="50">						<p class="description"><?php _e('The title of the notification', 'notificaciones' ); ?></p>					</td>				</tr>								<tr valign="top">					<th scope="row"><?php _e('Content :', 'notificaciones' ); ?></th>					<td>						<?php						$settings = array(							'quicktags' => array(								'buttons' => 'em,strong,link',							),							'quicktags' => true,							'tinymce' => true,							'media_buttons' => true,							'textarea_rows' => 8						);												wp_editor(stripslashes($notification_content), 'notification_content', $settings);						?>						<p class="description"><?php _e('The content of the notification', 'notificaciones' ); ?></p>					</td>				</tr>				<tr valign="top">					<th scope="row"><?php _e('Testing mode: ', 'notificaciones' ); ?></th>					<td>						<input type="checkbox" name="notification_testing" value="testing" <?php if($notification_testing){echo 'checked';}?>>						<p class="description"><?php _e('If this mode is activated, only administrators and editors can see the notification. Good for testing propouses.', 'notificaciones' ); ?></p>					</td>				</tr>				<tr>					<th scope="row"><input class="button-primary" type="submit" name="Submit" value="<?php _e('Update Options', 'notificaciones' ) ?>" /></th>				</tr>			</tbody>		</table>	</form></div>