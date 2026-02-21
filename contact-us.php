<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo phpinfo();
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
    // Debugging line
    try{
        $mail_result = mail($to, $email_subject, $body, $headers);
        echo $mail_result;
        if ($mail_result) {
            echo "<div class='alert alert-success'>Message Sent Successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Failed to Send Message.</div>";
        }
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Error occurred: " . $e->getMessage() . "</div>";
    }
}
?>
