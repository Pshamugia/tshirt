<?

include ('../config.php'); 
if (isset($_POST['login']))
				 {
$user = $_REQUEST['user'];
$passwords = $_REQUEST['passwords'];
$s=mysqli_query($conn, "select * from kultura_password where user='$user' and passwords='$passwords'");
$f=mysqli_num_rows($s); 
					
if ($f)
{
	$data = mysqli_fetch_object($s);
	$_SESSION['sesia']=$data->id;
	$_SESSION['user']=$data->user;
	$_SESSION['delete_status']=$data->delete_status;
	$_SESSION['hide_admins']=$data->hide_admins;
}
else 
{
	header('location:login.php');
	exit;
}
	             }			



 if (empty($_SESSION['sesia']) || $_SESSION['sesia']==0)
 {
 header('location:login.php');
		exit;
 }
	if(isset($_REQUEST["logoff"]))
	{
		$_SESSION['sesia']=0;
		header('location:login.php');
		exit;
	}
?> 

 <!--ეს არის ლოგაუთის სკრიპტი, რომელიც გარკვეული დროის მერე ავტომატურად ალოგაუთებს--> 
<script> var t;
    window.onload = resetTimer();
    // DOM Events
    document.onmousemove = resetTimer();
    document.onkeypress = resetTimer();
    console.log('loaded');

function logout() {
        alert("თქვენი სესიის ვადა გავიდა და უსაფრთხოების მიზნით თავიდან შემოდით.")
        location.href = 'login.php'
    }

    function resetTimer() {
		
        clearTimeout(t);
        t = setTimeout(logout, 500000) /*ეს არის წამები. 5000 არის 5 წამი, 50000 არის 5 წუთი და ა.შ.*/
        
    } </script>


