<table class="container">
<tr>
<td valign="top" width="450px"> 
<h2 style="position:relative; top:25px; left:10px;"> <div style="position:relative; margin-left:13px; height:20px; margin-top:1px; font-weight:100;"> <a style="position:relative; font-size:18px;  top:-3px;">  <ch><i class="fa fa-envelope" aria-hidden="true" style="position: relative; top: 3px;"></i>
<?=$LANG['contact'];?> </ch> </a> </b> </div> </h2>
<div class="contactFrm" style="position:relative; padding-top:50px; padding-left:25px;">
     <?php if(empty($statusMsg)){ ?>
        <p class="statusMsg <?php echo !empty($msgClass)?$msgClass:''; ?>"><?php echo $statusMsg; ?></p>
    <?php } ?>
  
    
    <?php
$statusMsg = '';
$msgClass = '';
if(isset($_POST['submit']))
{
	if(md5(strtoupper($_POST["captcha"]))==$_SESSION["captcha_text"])
	{
		// Get the submitted form data
		$email = htmlspecialchars($_POST['email']);
		$name = htmlspecialchars($_POST['name']);
		$subject = htmlspecialchars($_POST['subject']);
		$message = htmlspecialchars($_POST['message']);
	}
	else
	{
		echo '<script>alert("დამცავი კოდი არასწორია");</script>';
	} 


    // Check whether submitted data is not empty
    if(!empty($email) && !empty($name) && !empty($subject) && !empty($message)){
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $statusMsg = 'Please enter your valid email.';
            $msgClass = 'errordiv';
        }else{
            // Recipient email
            $toEmail = 'info@pencenter.ge';
            $emailSubject = 'Contact Request Submitted by '.$name;
            $htmlContent = '<h2>Contact Request Submitted</h2>
                <h4>Name</h4><p>'.$name.'</p>
                <h4>Email</h4><p>'.$email.'</p>
                <h4>Subject</h4><p>'.$subject.'</p>
                <h4>Message</h4><p>'.$message.'</p>';
            // Send email
            if(sendEmail($email, $toEmail, $emailSubject, $htmlContent)){
                $statusMsg = 'თქვენი წერილი წარმატებით გაიგზავნა. გმადლობთ!';
                $msgClass = 'succdiv';
            }else{
                $statusMsg = 'დაფიქსირდა შეცდომა.';
                $msgClass = 'errordiv';
            }
        }
    }else{
        $statusMsg = 'Please, fill the fields.';
        $msgClass = 'errordiv';
    }
	echo '<script>alert("'.$statusMsg.'");</script>';
}



?>


    
    <form action="" method="post">
         <input type="text" name="name" placeholder=" <?=$LANG['name']?>" style="position:relative; height:40px; margin-right:25px; border:1px solid rgba(184,184,184,1.00); background-color:#F1F1F1; border-radius:3px; margin-bottom:10px;" required="" class="col-md-6">
         <input type="email" name="email" placeholder=" <?=$LANG['email']?>" style="position:relative; height:40px; margin-right:25px; border:1px solid rgba(184,184,184,1.00); background-color:#F1F1F1; border-radius:3px; margin-bottom:10px;" required="" class="col-md-6">
         <input type="text" name="subject" placeholder=" <?=$LANG['subject']?>" style="position:relative;height:40px; margin-right:25px; border:1px solid rgba(184,184,184,1.00); background-color:#F1F1F1; border-radius:3px; margin-bottom:10px;" required="" class="col-md-6">
         <textarea name="message" placeholder="ტექსტი" style="position:relative; background-color:#F1F1F1;height:120px; margin-right:25px; border:1px solid rgba(184,184,184,1.00); border-radius:3px; margin-bottom:10px;"  required class="col-md-6"> </textarea>
      
      <br>
      <span style="height:20px; padding-bottom:10px;"> <?=$LANG['captcha']?> </span> 
       <img src="<?=HTTP_HOST?>captcha.php"> <input type="text" name="captcha" style="text-transform:uppercase; background-color:#FFDDDE; border:1px solid #ACACAC;"/> <br>

		<style>
			.submito
			{				
			}
			.submito:hover
			{
				background-color:#939191; 
			}
			
		</style>
        <input type="submit" name="submit" class="submito col-md-6" value="<?=$LANG['sendmail']?>" style="border:1px solid #767575; height:40px;  top:20px; position:relative; border-radius:3px;"  >
        <div class="clear"> </div>
    </form> 
    <br><br>
</div> </td> </tr> </table>