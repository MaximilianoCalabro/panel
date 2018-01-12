<?php

	$name = @trim(stripslashes($_POST['name'])); 
	$email = @trim(stripslashes($_POST['email']));
	$subject = @trim(stripslashes($_POST['subject']));
	$lastname = @trim(stripslashes($_POST['apellido']));
	$message = @trim(stripslashes($_POST['message'])); 

	$email_from = $email;
	$email_to = 'email@yourdomain.com';//replace with your email

	$body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Apellido: ' . $lastname . "\n\n" . 'Message: ' . $message;

	$success = @mail($email_to, $body, 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Apellido: ' . $lastname . "\n\n" . 'Message: ' . $message);
	
?>

<!DOCTYPE HTML>
<html lang="es-ES">
<head>
	<script>alert("Gracias por su consulta. Tan pronto sea posible nos pondremos en contacto con usted.");</script>
	<meta HTTP-EQUIV="REFRESH" content="0; url=../index.html"> 
</head>