<?php
require_once 'sanitize.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$email = sanitize($_POST['email']);

if(empty($email)) {
  echo "<h1>Please enter email</h1>";
}

require_once 'mysql_conn.php';

$dbconn = new_connection('phpWebEngine');

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$query = "SELECT Email FROM UserAcct WHERE Email='$email'";
// $code_query = "UPDATE UserAcct SET passreset='$code' WHERE email='$email'";

if($_POST) {
	$email = $_POST['email'];

	$forgot = mysqli_query($dbconn, $query);
	$count = mysqli_num_rows($forgot);
	$row = mysqli_fetch_array($forgot);

	if($count > 0) {
		$code = rand(10000,1000000);

		$link="<a href='http://localhost:8888/display_reset.php?code=$code&email=$email'>Click On This Link</a>";

		$mail = new PHPMailer(true);

		try{
			//server settings
			// $mail->SMTPDebug = 1; // Enable verbose debug output
		  $mail->IsSMTP();
			$mail->SMTPAuth = true;
			$mail->Host = 'tls://smtp.gmail.com';
			$mail->Username = 'y.hornets@gmail.com';
			$mail->Password = 'randompass123';
			$mail->SMTPSecure ='tls';
			$mail->Port = 587;

			//recipients
			$mail->setFrom('y.hornets@gmail.com', 'Yellow Hornets Soccer Team');
			$mail->addAddress($email);

			//content

			$mail->isHTML(true); // Set email format to HTML
			$mail->Subject = "Reset Password";
			$mail->Body = "<br/>Recently a request was submitted to reset a password. If did not sumbit a request, ignore this email and nothing will happen. <br/>$link to Reset Password.";
			$mail->AltBody = "<br/>Recently a request was submitted to reset a password. If did not sumbit a request, ignore this email and nothing will happen. <br/>$link to Reset Password.";


			// mysqli_query($dbconn, $code_query);

			$mail->send();
				echo 'Your reset link was sent to the email provided. You will be automatically redirected in 3 seconds';


		}
		catch (Exception $e) {
			echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
	}
	else {
		echo 'Email not found, please enter another one or visit contact page';
	}
}


$dbconn->close();

header("refresh:3;url=index.php");

?>
