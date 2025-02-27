<?	session_start();
	session_register("isadmin");
	if(isset($_REQUEST["login"]))
	{
		$res=mysqli_query($conn,"SELECT * FROM besoword WHERE user='$_REQUEST[user]' AND password=$_REQUEST[password]");
		if(mysql_num_rows($res)) $_SESSION["isadmin"]=true;
		$config=mysqli_fetch_assoc($res);
	}
	if(isset($_REQUEST["logoff"])) $_SESSION["isadmin"]=false;
	
	if(!$_SESSION["isadmin"]) header("location:login.php");

?>