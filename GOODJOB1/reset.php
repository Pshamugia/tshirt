<?php /*?>
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);<?php */?>
<? 
include('config.php');
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}


require 'phpmailer/Exception.php';
	require 'phpmailer/PHPMailer.php';
	require 'phpmailer/SMTP.php';	


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use PHPMailer\PHPMailer\SMTP;
function sendEmail($email, $subject, $message)
{
	$mail = new PHPMailer(true);
	$mail->From = "info@teachershub.ge";
	$mail->FromName = "TEACHERSHUB.GE";
	$mail->addAddress($email);
	$mail->isHTML(true);

	$mail->Subject = $subject;
	$mail->Body = $message;
	$mail->AltBody = "This is the plain text version of the email content";
	try
	{
		$mail->send();
	}
	catch(Exception $ex)
	{
		exit($ex->getMessage() . " - $email");
		
	}
 
}



?>

<section class="ftco-section">
      <div class="container">
<?

	   
if(isset($_POST['reset']))
{
	$res=mysqli_query($conn, "SELECT * FROM login WHERE email='$_REQUEST[email]'");
	 
	$user=mysqli_fetch_assoc($res);
	if($user)
	{
		$new_pass = randomPassword();
		
		mysqli_query($conn, "UPDATE login SET password='".md5($new_pass)."' WHERE email='$_REQUEST[email]'");
		sendEmail($user['email'], "პაროლის შეცვლა", "თქვენი ახალი პაროლია:$new_pass");
		
		echo "პაროლის აღსადგენად შეამოწმეთ ელფოსტა.";
	}
	else
	{
		echo "ელფოსტა არასწორია. მიუთითეთ მოქმედი ელფოსტა";
	}
}
?>
<form action="" method="post">
<input type="email" name="email"> 
<input type="submit" name="reset" value="გაგზავნა">
	შეიყვანეთ ელფოსტა

</form>
		  
	</div>
</section>