<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $to = "matrixipsolutions@gmail.com";  // 👈 apna Gmail yaha daalo

    $email_subject = "Website Contact: " . $subject;

    $body = "
    You have received a new message:

    Name: $name
    Email: $email
    Subject: $subject
    Message: $message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    echo "Prepared email with subject: $email_subject and body: $body"; // Debugging line
    if (mail($to, $email_subject, $body, $headers)) {
        echo "<div class='alert alert-success'>Message Sent Successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Failed to Send Message.</div>";
    }
}
?>
