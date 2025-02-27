<section id="maincontent" style="position: relative; padding-bottom: 50px; margin-top: 155px;">
          <div style="width:100%; top:-95px; position:relative; background-color:#F3BA3F; border: 3px solid #F3BA3F; z-index: 4"> </div>
 <div class="container">
       
			
			<div class="col-md-8" style="display: inline-block; position: relative; top: 7px;">
				
          <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1pc4r9v5uHnLOeapMcVi1yhwtPw8Ya8D6" width="100%" height="440"></iframe>
</div>
            <div class="col-md-4" style="position: relative; ">
            
    <?php if(empty($statusMsg)){ ?>
        <p class="statusMsg <?php echo !empty($msgClass)?$msgClass:''; ?>"><?php echo $statusMsg; ?></p>
    <?php } ?>
  
    
    <?php
$statusMsg = '';
$msgClass = '';
if(isset($_POST['submit']))
{
	// if(md5(strtoupper($_POST["captcha"]))==$_SESSION["captcha_text"])
	if(true)
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
            $toEmail = 'info@teachershub.ge';
            $emailSubject = 'Contact Request Submitted by '.$name;
            $htmlContent = '<h2>Contact Request Submitted</h2>
                <h4>Name</h4><p>'.$name.'</p>
                <h4>Email</h4><p>'.$email.'</p>
                <h4>Subject</h4><p>'.$subject.'</p>
                <h4>Message</h4><p>'.$message.'</p>';
            // Send email
            if(sendEmail($email, $toEmail, $emailSubject, $htmlContent)){
                $statusMsg = 'თქვენი წერილი გაიგზავნა. გმადლობთ!';
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





<style> .contactFrm h4 {
    font-size: 1em;
    color: #252525;
    margin-bottom: 0.5em;
    font-weight: 300;
    letter-spacing: 5px;
}
.contactFrm input[type="text"], .contactFrm input[type="email"] {
    width: 100%;
    color: #252525;
    background: #fff;
    outline: none;
    font-size: 0.9em;
    padding: .7em 1em;
    border: 1px solid #848282;
    -webkit-appearance: none;
    display: block;
    margin-bottom: 1.2em;
}
.contactFrm textarea {
    resize: none;
  width: 100%;
    background: #fff;
    color: #9370DB;
    font-size: 0.9em;
    outline: none;
    padding: .6em 1em;
    border: 1px solid #848282;
    min-height: 10em;
    -webkit-appearance: none;
}
.contactFrm input[type="submit"] {
    outline: none;
    color: #FFFFFF;
    padding: 0.5em 0;
    font-size: 1em;
    margin: 1em 0 0 0;
    -webkit-appearance: none;
    background: #252525;
    transition: 0.5s all;
     -webkit-transition: 0.5s all;
    transition: 0.5s all;
    -moz-transition: 0.5s all;
    width: 525px;
    cursor: pointer;
}
.contactFrm input[type="submit"]:hover {
    background: none;
    color: #9370DB;
}
p.statusMsg{font-size:18px;}
p.succdiv{color: #008000;}
p.errordiv{color:#E80000;} </style>
				
				
<style>
 .contact 
 {
border:1px solid #767575; 
background-color: #3D65AF;
	 color: #FFFFFF;
position:relative; 
}


 .contact:hover
 {
border:1px solid #3ec1d5; 
background-color: #F3BA3F;
color:#000000;
position:relative; 

}


 
 </style>				
				
    
    <form action="" method="post">
         <input type="text" name="name" placeholder="სახელი" style="position:relative; margin-right:25px; width: 330px; height: 40px;" required="">
         <input type="email" name="email" placeholder="ელფოსტა" style="position:relative; width: 330px; margin-top: 15px; height: 40px;" required="">
         <input type="text" name="subject" placeholder="თემა" style="position:relative;  margin-top:15px; width: 330px; height: 40px;" required="">
         <textarea name="message" placeholder="ტექსტი..." style="color:#000000;   position:relative; margin-top:15px; margin-bottom:25px; width: 330px; height:200px;"  required> </textarea>
      
      
      <?php /*?><span style="height:20px; padding-bottom:10px;"> <?=$LANG['captcha']?> </span>
       <img src="<?=HTTP_HOST?>captcha.php"> <input type="text" name="captcha" style="text-transform:uppercase;"/> <br><?php */?>

      <div> <input type="submit" class="contact" name="submit" value="გაგზავნა" style="border:1px solid #767575; height:40px; width:333px; position:relative;"> 
       </div>  
		
		
		<div class="clear"> </div>
    </form>
          </div>
        </div>
      </div>
    </section>