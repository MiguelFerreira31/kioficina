
<?php
$to = 'mdakash.storerepublic@gmail.com';
$headers = 'From: "'.$footerEmail.'"';

// All form values
$footerEmail = $_POST['footerEmail'];
$subject ="New Subscription";


// Construct email body
$body .= "Subject: $subject\n";
$body .= "Message: $footerEmail";

// Send email
$send = mail($to, $subject, $body, $headers);

// Check if email was sent successfully
if ($send) {
    echo "Email has been sent successfully.";
} else {
    echo "Failed to send email.";
}
?>