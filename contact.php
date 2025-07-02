<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p class='text-danger'>Invalid email format.</p>";
        exit;
    }

    $to = "info@ssifactory.com"; // Your email address
    $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/html; charset=UTF-8";
    $body = "<p><strong>Name:</strong> $name</p>
             <p><strong>Email:</strong> $email</p>
             <p><strong>Subject:</strong> $subject</p>
             <p><strong>Message:</strong><br>$message</p>";

    if (mail($to, $subject, $body, $headers)) {
        echo "<p class='text-success'>Your message has been sent successfully!</p>";
    } else {
        echo "<p class='text-danger'>There was an error sending your message. Please try again later.</p>";
    }
}
?>
