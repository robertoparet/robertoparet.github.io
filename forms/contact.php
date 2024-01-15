<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Reemplaza 'contact@example.com' con tu direcci�n de correo electr�nico real
  $receiving_email_address = 'robertopp170800@gmail.com';

  if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
  } else {
    die('Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Descomenta el c�digo siguiente si deseas usar SMTP para enviar correos electr�nicos.
  // Necesitar�s ingresar tus credenciales SMTP correctas.

  
  $contact->smtp = array(
    'host' => 'tu_servidor_smtp.com',
    'username' => 'tu_nombre_de_usuario_smtp',
    'password' => 'tu_contrase�a_smtp',
    'port' => '587'
  );


  // A�ade mensajes al formulario de contacto
  $contact->add_message($_POST['name'], 'From');
  $contact->add_message($_POST['email'], 'Email');
  $contact->add_message($_POST['message'], 'Message', 10);

  // Env�a el formulario y devuelve la respuesta
  echo $contact->send();
?>
