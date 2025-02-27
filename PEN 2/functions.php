<?
	function favorited($id)
	{
		global $conn;
		if($_SESSION['USER_ID'])
		{
			$cnt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM favorites WHERE user_id='$_SESSION[USER_ID]' AND item_id='$id'"));
			if(intval($cnt['cnt']))
				return true;
		}
		else
		{
			$fav_array = unserialize($_COOKIE['fav']);
			foreach($fav_array as $f=>$v)
			{
				if ($f==$id)
					return true;
			}
			return false;
		}
	}
	
	
	
	
	
	
	function resizeImage($src_file, $dst_file, $max_width=1900, $max_height=1800)
	{
		// error_reporting(-1);
		
		if (empty($src_file)) return false;		
		$type = image_type_to_mime_type(exif_imagetype($src_file));
		list($orig_width, $orig_height) = getimagesize($src_file);

		$width = $orig_width;
		$height = $orig_height;

		# taller
		if ($height > $max_height) {
			$width = ($max_height / $height) * $width;
			$height = $max_height;
		}

		# wider
		if ($width > $max_width) {
			$height = ($max_width / $width) * $height;
			$width = $max_width;
		}
	
 
		$image_p = imagecreatetruecolor($width, $height);
		
		switch($type)
		{
			case 'image/png' : $image = imagecreatefrompng($src_file); break;
			case 'image/jpg' :
			case 'image/jpeg' : $image = imagecreatefromjpeg($src_file); break;
			case 'image/gif' : $image = imagecreatefromgif($src_file); break;
			default : return false;
		}
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);
	
		switch($type)
		{
			case 'image/png' : return imagepng($image_p, $dst_file); 
			case 'image/jpg' :
			case 'image/jpeg' : return imagejpeg($image_p, $dst_file); 
			case 'image/gif' : return imagegif($image_p, $dst_file); 
			default : return false;
		}
	}
	
	
	
	function sendEmail($from, $to, $subject, $message)
	{
		include_once ('phpmailer/Exception.php');
		include_once ('phpmailer/SMTP.php');
		include_once ('phpmailer/PHPMailer.php');
		$mail = new PHPMailer\PHPMailer\PHPMailer;
		$mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_CLIENT;
		//$mail->isSMTP();
		$mail->Mailer = 'mail';
		$mail->SMTPSecure = '';
		$mail->Host = "mail.pencenter.ge";
		$mail->Port = 587;
		$mail->SMTPAuth = true;
		$mail->Username = "test@pencenter.ge";
		$mail->Password = 'pencentri';
		$mail->setFrom($from, '');
		$mail->addAddress($to, '');
		$mail->Subject = $subject;
		$mail->msgHTML($message);
		$mail->AltBody = 'This is a plain-text message body';
		return $mail->send();
	}



 
?>