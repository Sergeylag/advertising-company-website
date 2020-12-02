<?php
		// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer();

    //Server settings

    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.yandex.ru';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'Username';                     // SMTP username
    $mail->Password   = 'Password';                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('Username');
    $mail->FromName = 'ЗАЯВКА!!!!ADZET!!!ЗАЯВКА';
    $mail->addAddress('a1@adzet.ru', 'Joe User');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('Username');
   //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Заказ!';
    $mail->Body    = "Имя: $_POST[name] \nemail: $_POST[email] \nmassage: $_POST[massage]";
    $mail->AltBody = 'Это Альтернативное письмо';

    if ($mail->send()){
    	header('Refresh: 1; URL='.$_SERVER['HTTP_REFERER']);

    }else{
    	echo 'Ошибка'. $mail->ErrorInfo;
    }


		/*$dannyi=$_POST;
		if(isset($_POST["submit"])){
				print_r($dannyi);
		}
		$headers = "Content-type: text/plain; Charset=utf-8";
		mail('test@mail.ru', 'test', "Имя: $_POST[name] \nemail: $_POST[email] \nmassage: $_POST[massage]", $headers);*/
?>