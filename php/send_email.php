<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data from POST request
    $name = $_POST["name"];
    $subject = $_POST["subject"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Configure your SMTP settings (for Gmail)
    $smtpUsername = 'your_email@gmail.com';
    $smtpPassword = 'your_email_password';

    // Create a new PHPMailer instance
    require('PHPMailer/src/PHPMailer.php');
    require('PHPMailer/src/SMTP.php');
    require('PHPMailer/src/Exception.php');

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP();
    $mail->CharSet = 'UTF-8';
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPDebug = 2; // Enable verbose debugging
    $mail->Debugoutput = 'html'; // Display debug output as HTML
    $mail->Port = 587; // 465 or 587
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->IsHTML(true);

    // Sender (From) and Recipient (To) email addresses
    $mail->setFrom('your_email@gmail.com', 'Your Name'); // Use your email as the sender
    $mail->addAddress('company_email@example.com'); // Company email

    // Set the "Reply-To" header to the user's email
    $mail->addReplyTo($email, $name);

    // Email subject and content
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Send email and check for success
    if ($mail->send()) {
        echo json_encode(array("message" => "success"));
    } else {
        echo json_encode(array("message" => "error"));
    }
} else {
    echo json_encode(array("message" => "Invalid request method."));
}
?>
