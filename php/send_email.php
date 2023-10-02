<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipient_email = "test_mail@gmail.com";
    $from_email = $_POST["Email"];
    $subject = $_POST["subject"];
    $message = $_POST["Message"];
    
    $headers = "From: $from_email";

    if (mail($recipient_email, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Email sending failed.";
    }
} else {
    echo "Invalid request method.";
}
?>
