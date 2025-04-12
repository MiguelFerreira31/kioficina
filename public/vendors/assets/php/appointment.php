
<?php
$to = 'mdakash.storerepublic@gmail.com';
$headers = 'From: "'.$email.'"';

// All form values
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$vehicle = $_POST['vehicle'];
$time = $_POST['time'];
$date = $_POST['date'];
$msg = $_POST['msg'];


// Construct email body
$body = "Name: $name\n";
$body .= "Email: $email\n";
$body .= "Phone: $phone\n";
$body .= "Vehicle: $vehicle\n";
$body .= "Time: $time\n";
$body .= "Date: $date\n";
$body .= "Subject: $name\n\n";
$body .= "Message: $msg";

// Send email
$send = mail($to, $name, $body, $headers);

// Check if email was sent successfully
if ($send) {
    echo "Email has been sent successfully.";
} else {
    echo "Failed to send email.";
}
?>