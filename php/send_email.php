<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipient_email = "abdelrahmanamr2182003@gmail.com"; // Change to your recipient's email address

    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    if (mail($recipient_email, $subject, $message, $headers)) {
        // Email sent successfully, redirect with success status
        header("Location: ../contact/contact.html?status=success");
        exit(); // Stop script execution after redirect
    } else {
        // Email could not be sent, redirect with error status
        header("Location: ../contact/contact.html?status=error");
        exit(); // Stop script execution after redirect
    }
} else {
    // Redirect back to the contact form if accessed without POST data
    header("Location: ../contact/contact.html");
    exit(); // Stop script execution after redirect
}
?>
