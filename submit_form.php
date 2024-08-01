<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Email details
    $to = "bossattu@gmail.com"; // Replace with the desired email address
    $subject = "New Contact Form Submission";
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Email content
    $email_content = "<html><body>";
    $email_content .= "<h2>Contact Form Submission</h2>";
    $email_content .= "<p><strong>Name:</strong> " . $name . "</p>";
    $email_content .= "<p><strong>Email:</strong> " . $email . "</p>";
    $email_content .= "<p><strong>Message:</strong> " . nl2br($message) . "</p>";
    $email_content .= "</body></html>";

    // Send email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Thank you, $name. Your message has been sent.";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
}
?>
