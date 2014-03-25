<?php
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$formcontent=" From: $name \n Message: $message";
$recipient = "contact.abcschool@gmail.com";
$subject = "Contact Form: ".$subject;
$mailheader = "From: $email \r\n";
if (($name=="")||($email=="")||($message=="")) 
    { 
		echo "All fields are required, please fill <a href='contact_us.html'>the form</a> again."; 
    } 
else
	{
		mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
		echo "Thank You!" . " -" . "<a href='index.html' style='text-decoration:none;color:#ff0099;'> Return Home</a>";
	}
?>
