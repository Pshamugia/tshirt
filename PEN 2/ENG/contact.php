<table style="position:relative; left:-120px; top:30px; margin-bottom:-35px;" width="1000px" align="center">
   <tr>
   <td valign="top"> 
   <h2 style="position:relative; top:-50px; left:55px; padding-bottom:15px;"> <div style="position:relative; margin-left:15px; height:20px; margin-top:1px; border-left:5px solid #2E3333; font-weight:100; font-size:20px;">  <k style="position:relative; padding-left:15px;"> Contact </k>  </b> </div> </h2> </td> <td valign="top"> </td>
   <tr> 
 
	<td valign="top" style="position:relative; left:83px; font-size:12px;" width="350px"> 
     <div class="row">
   <div  align="center">
          <div style="width:500px;" align="left">
            
  
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
		echo '<script>alert("Capcha is incorrect. Please, try again");</script>';
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
                $statusMsg = 'Your letter has been successfully sent. Thank you!';
                $msgClass = 'succdiv';
            }else{
                $statusMsg = 'An error was reported.';
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
         <input type="text" name="name" placeholder=" Your name" style="position:relative; width:282px; height:40px; margin-right:25px; border:1px solid rgba(184,184,184,1.00); background-color:#F1F1F1; border-radius:3px; margin-bottom:10px;" required="">
         <input type="email" name="email" placeholder=" Your E-mail" style="position:relative; width:282px; height:40px; margin-right:25px; border:1px solid rgba(184,184,184,1.00); background-color:#F1F1F1; border-radius:3px; margin-bottom:10px;" required="">
         <input type="text" name="subject" placeholder=" Topic" style="position:relative; width:606px; height:40px; margin-right:25px; border:1px solid rgba(184,184,184,1.00); background-color:#F1F1F1; border-radius:3px; margin-bottom:10px;" required="">
         <textarea name="message" placeholder="Message" style="position:relative; background-color:#F1F1F1; width:606px; height:120px; margin-right:25px; border:1px solid rgba(184,184,184,1.00); border-radius:3px; margin-bottom:10px;"  required> </textarea>
      
      
      <span style="height:20px; padding-bottom:10px;"> Enter the text</span>
       <img src="<?=HTTP_HOST?>captcha.php"> <input type="text" name="captcha" style="text-transform:uppercase; background-color:#FFDDDE; border:1px solid #ACACAC;"/> <br>

        <input type="submit" name="submit" value="send" style="border:1px solid #767575; height:40px; width:606px; top:20px; position:relative; border-radius:3px;">
        <div class="clear"> </div>
    </form> 
       
         
              
            </div>
            
           
          </div>
          
          
          
          </div>   </div> 
          </div></div> 
                       
                                 
                                 
   
   
</tr></table>