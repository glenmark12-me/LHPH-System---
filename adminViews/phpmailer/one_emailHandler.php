<?php
require('one_functions.php');

$message = $_POST['message'];
$email = $_POST['email'];
$subject = $_POST['subject'];

sendEmail($email, $subject, $message, );