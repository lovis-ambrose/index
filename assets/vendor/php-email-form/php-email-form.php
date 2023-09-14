<?php
// php_email_form.php

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace contact@example.com with your real receiving email address
    $receiving_email_address = 'mutungiambrozio212@gmail.com';

    // Check if the required fields are set
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject'])) {
        $from_name = $_POST['name'];
        $from_email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = isset($_POST['message']) ? $_POST['message'] : '';

        // Construct the email headers
        $headers = "From: $from_name <$from_email>" . "\r\n";
        $headers .= "Reply-To: $from_email" . "\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // Compose the email message
        $email_message = "<html><body>";
        $email_message .= "<h1>New Contact Form Submission</h1>";
        $email_message .= "<p><strong>Name:</strong> $from_name</p>";
        $email_message .= "<p><strong>Email:</strong> $from_email</p>";
        $email_message .= "<p><strong>Subject:</strong> $subject</p>";
        $email_message .= "<p><strong>Message:</strong> $message</p>";
        $email_message .= "</body></html>";

        // Send the email
        if (mail($receiving_email_address, $subject, $email_message, $headers)) {
            echo 'OK';
        } else {
            echo 'Error sending email.';
        }
    } else {
        echo 'Missing required fields.';
    }
} else {
    echo 'Invalid request.';
}
?>
