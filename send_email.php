<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form fields
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Email address where you want to receive the messages
    $to = 'paulax40454599@gmail.com';

    // Email subject
    $subject = 'New Message From Contact Form';

    // Email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Message:\n$message";

    // Email headers
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";

    // Send email
    if (mail($to, $subject, $email_message, $headers)) {
        echo '<script>alert("Your message has been sent."); window.location.href="contact.php";</script>';
    } else {
        echo '<script>alert("Unable to send email. Please try again."); window.location.href="contact.php";</script>';
    }
} else {
    // Redirect back to the contact form if accessed directly
    header("Location: contact.php");
    exit;
}
?>
