<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $service = htmlspecialchars($_POST['service']);
    $message = htmlspecialchars($_POST['message']);

    $to = "matrixipsolutions@gmail.com";   // 👈 apna Gmail yaha likho
    $subject = "New Quote Request From Website";

    $body = "
    Name: $name
    Email: $email
    Service: $service
    Message: $message
    ";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "<div class='alert alert-success'>Message Sent Successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Failed to Send Message.</div>";
    }
}
?>
