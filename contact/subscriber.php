<?php
//Script written for use with Hostgator Linux shared server and Nicepage Contact forms
//Use and FTP like FileZilla to put this public_html/cgi-bin/ folder or directory on server 
//Point to this file in Nicpage with the Form, Send To, URL text box and it will be executed
//in HTML with the Form Action command.
//A different named "contact.php" will be needed for each new email where the form info goes 
//$field_name = $_POST['name'];
$field_email = $_POST['Email'];
//$field_message = $_POST['Message'];
//Comment out either or both of the following two if not in form
$field_subject = 'Subscriber';
//$field_address = $_POST['address'];

//Mail_to below sends the email to the person's email designated on next line
$mail_to = 'cortex.innovations@gmail.com';
$mail_from = 'contact@cortex-innovations.org';
$subject = $field_subject;

//The email content:
$body_message = 'From: '.$field_email."\n";
$body_message .= 'E-mail: '.$field_email."\n";
//Comment out either or both of the following two if not in form
//$body_message .= 'Phone: '.$field_phone."\n";
//$body_message .= 'Address: '.$field_address."\n";
$body_message .= 'Message:  ';
$headers = 'From: '.$mail_from."\r\n";
$headers .= 'Reply-To: '.$field_email."\r\n";
$mail_status = mail($mail_to, $subject, $body_message, $headers);

//Show a json message about the successful or unsuccessful sending a message
if ($mail_status) {
	header('Location: ../coming_soon.html?success=1');
   
} else {
   header('Location: ../coming_soon.html?success=0');
}
?>