<?php
include ('smtp/PHPMailerAutoload.php');
// echo smtp_mailer('amankrsinha07@gmail.com', "subject","password");

function smtp_mailer($to, $subject, $msg)
{
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587;
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	// $mail->SMTPDebug = 2;  // uncomment this to see error messages
	$mail->Username = "your email id here"; // username
	$mail->Password = "16 digit password here"; // password
	$mail->SetFrom("your email id here"); // (From: )
	$mail->Subject = $subject;
	$mail->Body = $msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => false
		)
	);
	if (!$mail->Send()) {
		echo $mail->ErrorInfo;
	} else {
		return 'Sent';
	}
}
