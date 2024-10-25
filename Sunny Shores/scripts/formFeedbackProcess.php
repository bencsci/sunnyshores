<?php
//formFeedbackProcess.php
// Ben Le
// A00454115

session_start();

$secure = $_SESSION['SECURE'];

if ($secure != "!@#^%FDSSFDWQR@")
{
     die('SECURE test failed.');
}

$origin = $_SESSION['ORIGIN'];

if ($origin != "/~u29/submissions/submission6/pages/formFeedback.php")
{
    die('ORIGIN test failed.');
}

$salutation = $firstName = $lastName = "";
$email = $phoneNumber = "";
$subject = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $salutation = sanitized_input($_POST["salutation"]);
    $firstName = sanitized_input($_POST["firstName"]);
    if (!preg_match("/^[A-Z][A-Za-z-]*$/", $firstName))
        die("Bad first name!");
    $lastName = sanitized_input($_POST["lastName"]);
    if (!preg_match("/^[A-Z][A-Za-z-]*$/",$lastName))
        die("Bad last name!");
    $email = sanitized_input($_POST["email"]);
    if (!preg_match("/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})$/", $email))
        die("Bad e-mail!");
    $phoneNumber = sanitized_input($_POST["phone"]);
    $phoneNumber = !empty($_POST['phone']) ? $_POST['phone'] : "Not given";
    if (!empty($_POST['phone']) &&
        !preg_match("/^(\d{3}-)?\d{3}-\d{4}$/", $phoneNumber)) 
        die("Bad phone number!");
    $subject = sanitized_input($_POST["subject"]);
    $message = sanitized_input($_POST["message"]);
}

function sanitized_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$messageToBusiness = "From: $salutation $firstName $lastName\r\n".
    "Email address: $email\r\n".
    "Phone number: $phoneNumber\r\n".
    "----------------------------\r\n".
    "Subject: $subject\r\n".
    "----------------------------\r\n".
    "$message\r\n".
    "============================\r\n";

$headerToBusiness = "From: $email\r\n";
mail("u50@mail.cs.smu.ca", $subject, $messageToBusiness, $headerToBusiness);

$messageToClient = 
    "Dear $salutation $lastName:\r\n".
    "The following message was received from you by Sunny Shores:\r\n".
    "============================\r\n".
    $messageToBusiness.
    "Thank you for your interest and your feedback.\r\n".
    "From the staff of Sunny Shores\r\n".
    "============================\r\n";

if (isset($_POST['reply'])) $messageToClient.=
    "P.S We will contact you shortly with more information.";

$headerToClient = "From: u29@ps.cs.smu.ca\r\n";
mail($email, "Re: $subject", 
    $messageToClient, $headerToClient);

$display = str_replace("\r\n", "\r\n<br>", $messageToClient);
$display = "<!DOCTYPE html>
        <html lang='en'>
        <head><meta charset='utf-8'><title>Your Message</title></head>
        <body><code>$display</code><body>
        </html>";
echo $display;

$fileVar = fopen("../data/feedback.txt", "a") 
    or die("Error: Could not open the log file.");
fwrite($fileVar, "\n------------------------------------\n") 
    or die("Error: Could not write divider to the log file.");
fwrite($fileVar, "Date received: ".date("jS \of F, Y \a\\t H:i:s\n"))
    or die("Error: Could not write date to the log file.");
fwrite($fileVar, $messageToBusiness) 
    or die("Error: Could not write message to the log file.");
?>