 <section class="ftco-section">
     <div style="width:100%; top:-140px; position:relative; background-color:#F3BA3F; border: 3px solid #F3BA3F; z-index: 4"> </div>
 <div class="container">

<?PHP

$uname = "";
$email = "";
$pword = "";
$errorMessage = "";	
 function is_favorited($id)
	{
		$fav_array = unserialize($_COOKIE['fav']);
		foreach($fav_array as $f=>$v)
		{
			if ($f==$id)
				return true;
		}
		return false;
	}
 if($_SESSION['USER_ID'])
	 echo  "<script>document.location='index.php?do=page1'</script>"; 
 if (isset($_POST['Submit1']))
 {
	$sql = "SELECT * FROM login where email='$_POST[email]' AND `password`='".md5($_POST['password'])."'";
	$res = mysqli_query($conn,$sql);
	$user = mysqli_fetch_assoc($res);
	if($user['id'])
	{
		$_SESSION['USER_ID'] = $user['id'];	
		$fav_array = unserialize($_COOKIE['fav']);
		$favorite="select * from favorites WHERE user_id='$_SESSION[id]'";
		$res=mysqli_query($conn, $favorite);
		while ($fav=mysqli_fetch_assoc($res))
			
			{
				if (!is_favorited($fav['item_id']))
				{
					$fav_array[$fav['item_id']]=$fav['item_id'];
					setcookie('fav', serialize($fav_array), time()+99999999);
				}					
				
			}
		
		echo  "<script>document.location='index.php?do=page1'</script>"; 
	}
	else
	{
		$errorMessage = "<i class='fa fa-warning red-color'></i>"."<span style='color:red'> არასწორი პარამეტრებია შეყვანილი. სცადეთ თავიდან</span>";
	}
 }
 
 
 ?>



<html>
<head>
<title>Login Teachershub</title>
</head>
<body>

	
	 <style>
.blue-color {
color:blue;
}
.green-color {
color:#7B8836;
	font-size: 22px;
}
.teal-color {
color:teal;
}
.yellow-color {
color:yellow;
}
.red-color {
color:red;
	font-size: 22px;
}
</style>
		  	 
	
	
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <div class="container">    
        <div id="loginbox" style="margin-top:50px; " class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" style="border: 1px solid #F3BA3F" >
                    <div class="panel-heading" style="background-color: #F3BA3F; color: #FFFFFF">
                        <div class="panel-title"><a> ავტორიზაცია</a></div>
                        <div style="float:right; font-size: 80%; position: relative; top:-20px"><a href="<?=HTTP_HOST?>reset.php" style="color: #FFFFFF; font-size: 14px;">დაგავიწყდა პაროლი? </a></div>
                    </div>     

                    <div style="padding-top:30px; " class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    
                        <form NAME ="form1" METHOD ="POST" id="loginform" class="form-horizontal" role="form">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="	glyphicon glyphicon-envelope"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="email" value="<?PHP print $uname;?>" placeholder="მიუთითე ელფოსტა">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="myInput"  type="password" class="form-control" name="password" value="<?PHP print $pword;?>" placeholder="პაროლი">
								
                                    </div>
                                    

                                <span style="position:relative; padding-left:15px;"> <input type="checkbox" onclick="myFunction()"> Show Password </span>
<script type="text/javascript"> function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} </script>
 <br> <br>
                              


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
										
<INPUT TYPE = "Submit" id="btn-login" class="btn btn-success" Name="Submit1" style="background-color: #3D65AF; border: 1px solid #3D65AF; width: 100%; height: 50px;"  VALUE="შესვლა" >

 
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            <a> არ ხარ დარეგისტრირებული? </a>
                                        <a href="https://teachershub.ge/index.php?do=signup" >
                                            დარეგისტრირდი აქ
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     

<?PHP print $errorMessage;?>

                        </div>                     
                    </div>  
        </div>
         
    
	
	 



</div> </section>
