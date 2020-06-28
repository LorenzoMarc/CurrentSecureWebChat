<?php	

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
/* Exception class. */
require 'PHPMailer/src/Exception.php';

/* The main PHPMailer class. */
require 'PHPMailer/src/PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
require 'PHPMailer/src/SMTP.php';

	function sendOTP($email,$otp) {
		/*
		include_once('PHPMailer/src/PHPMailer.php');
  		include_once('PHPMailer/src/SMTP.php');*/
		
		$message_body = "Grazie per esserti registrato! </br> Inseririsci il codice OTP seguente per poter accedere al sito:<br/><br/>" . $otp;
		$mail = new PHPMailer();
			$mail->SetFrom("Progetto.CS.2020@gmail.com", "ChatAdmin");

			/*recipient*/
			$mail->AddAddress($email);
			$mail->Subject = "OTP SecureWebChat";
			$mail->MsgHTML($message_body);
			$mail->IsHTML(true);
			

			/*STMP parameteres*/
			$mail->isSMTP();
			$mail->Host = "smtp.gmail.com";
			$mail->SMTPDebug = 0;
			$mail->SMTPAuth = TRUE;
			$mail->SMTPSecure = 'ssl'; // tls or ssl
			$mail->Port     = 465;
			$mail->Username = "Progetto.CS.2020@gmail.com";
			$mail->Password = "owudljlaysiausnt";		
			$result = $mail->Send();	
			return $result;
	}
?>