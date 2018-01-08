<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Spanish
*
* Author: Wilfrido Garc�a Espinosa
* 		  contacto@wilfridogarcia.com
*         @wilfridogarcia
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  05.04.2010
*
* Description:  Spanish language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful'] 	  	 = 'Cuenta creada con éxito';
$lang['account_creation_unsuccessful'] 	 	 = 'No se ha podido crear la cuenta';
$lang['account_creation_duplicate_email'] 	 = 'Email en uso o inválido';
$lang['account_creation_duplicate_identity'] = 'Nombre de usuario en uso o inválido';

// TODO Please Translate
$lang['account_creation_missing_default_group'] = 'Default group is not set';
$lang['account_creation_invalid_default_group'] = 'Invalid default group name set';


// Password
$lang['password_change_successful'] 	 	 = 'Contraseña renovada con éxito';
$lang['password_change_unsuccessful'] 	  	 = 'No se ha podido cambiar la contraseña';
$lang['forgot_password_successful'] 	 	 = 'Nueva contraseña enviada por email';
$lang['forgot_password_unsuccessful'] 	 	 = 'No se ha podido crear una nueva contraseña';

// Activation
$lang['activate_successful'] 		  	     = 'Cuenta activada con éxito';
$lang['activate_unsuccessful'] 		 	     = 'No se ha podido activar la cuenta';
$lang['deactivate_successful'] 		  	     = 'Cuenta desactivada con éxito';
$lang['deactivate_unsuccessful'] 	  	     = 'No se ha podido desactivar la cuenta';
$lang['activation_email_successful'] 	  	 = 'Email de activación enviado';
$lang['activation_email_unsuccessful']   	 = 'No se ha podido enviar el email de activación';

// Login / Logout
$lang['login_successful'] 		      	     = 'Sesión iniciada con éxito';
$lang['login_unsuccessful'] 		  	     = 'No se ha podido iniciar sesión';
$lang['login_unsuccessful_not_active'] 		 = 'Account is inactive';
$lang['login_timeout']                       = 'Temporarily Locked Out. Try again later.';
$lang['logout_successful'] 		 	         = 'Sesión finalizada con éxito';

// Account Changes
$lang['update_successful'] 		 	         = 'Información de la cuenta actualizada con éxito';
$lang['update_unsuccessful'] 		 	     = 'No se ha podido actualizar la información de la cuenta';
$lang['delete_successful'] 		 	         = 'Usuario eliminado';
$lang['delete_unsuccessful'] 		 	     = 'No se ha podido Eliminar el usuario';

// Groups
$lang['group_creation_successful']  = 'Grupo creado exitosamente';
$lang['group_already_exists']       = 'Nombre de grupo ya existente';
$lang['group_update_successful']    = 'Detalles del grupo actualizados';
$lang['group_delete_successful']    = 'Grupo borrado';
$lang['group_delete_unsuccessful'] 	= 'Imposible borrar grupo';
$lang['group_delete_notallowed']    = 'Imposible borrar el grupo de administradores';
$lang['group_name_required'] 		= 'Nombre de Grupo es un campo obligatorio';
$lang['group_name_admin_not_alter'] = 'Admin group name can not be changed';

// Activation Email
$lang['email_activation_subject']  = 'Activación de la cuenta';
$lang['email_activate_heading']    = 'Activación de la cuenta para %s';
$lang['email_activate_subheading'] = 'Por favor presione este link para %s.';
$lang['email_activate_link']       = 'Activar su cuenta';
// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'Verificación de contraseña olvidada';
$lang['email_forgot_password_heading']    = 'Resetear Password para %s';
$lang['email_forgot_password_subheading'] = 'Por favor presione este link para %s.';
$lang['email_forgot_password_link']       = 'Resetear tu Password';
// New Password Email
$lang['email_new_password_subject']          = 'Nueva Contraseña';
$lang['email_new_password_heading']    = 'Nuevo Password para %s';
$lang['email_new_password_subheading'] = 'Tu Password ha sido reseteado a: %s';
