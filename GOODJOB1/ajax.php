<?php
	include ('config.php');
	if(isset($_GET['fb_auth']))
	{
		$id = $_GET['id'];
		$firstname= $_GET['first_name'];
		$lastname= $_GET['last_name'];
		$email= $_GET['email'];		
		$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from login where fb_id='$id'"));	
		if(empty($user['id']))
		{
			$uname=$firstname.' '.$lastname;
			mysqli_query($conn,"INSERT INTO login (`username`, `fb_id`, `email`) VALUES ('$uname', '$id', '$email')");
		}
		$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from login where fb_id=$id"));	
		if(!empty($user['id']))
		{
			$_SESSION['USER_ID'] = $user['id'];	
			exit('{"success":true}');
		}
		else
			exit('{"success":true,"error":"'.mysqli_error($conn).'"}');
	}
	if(isset($_GET['fav']))
	{
		$id = $_GET['id'];
			if ($_SESSION['USER_ID'])
			{
				$sql="select COUNT(id) AS cnt FROM favorites where user_id='$_SESSION[USER_ID]' AND item_id='$id'";
				$n = intval(mysqli_fetch_assoc(mysqli_query($conn, $sql))['cnt']);
				echo mysqli_error($conn);
				if ($n>0)
					
					{
						
					mysqli_query($conn, "DELETE from favorites where user_id='$_SESSION[USER_ID]' AND item_id='$id'");
					$cnt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM favorites WHERE user_id='$_SESSION[USER_ID]'"));
				    	exit('{"added":false,"total":'.intval($cnt['cnt']).'}');
					}
					
					else
					{
						mysqli_query($conn, "INSERT into favorites (`user_id`, `item_id`) VALUES ('$_SESSION[USER_ID]', '$id')");
						$cnt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM favorites WHERE user_id='$_SESSION[USER_ID]'"));
						exit('{"added":true,"total":'.intval($cnt['cnt']).'}');
					}
			}
			else
			{
				if(!isset($_COOKIE['fav']))	
				{
					setcookie('fav', serialize(array()), time()+99999999);		
				}
				$fav_array = unserialize($_COOKIE['fav']);
				$found = false;
				foreach($fav_array as $f=>$v)
				{
					if ($f==$id)
					{
						$found = true;
						break;
					}
				}
				if($found)
				{
					unset($fav_array[$id]);
					setcookie('fav', serialize($fav_array), time()+99999999);
					exit('{"added":false,"total":'.count($fav_array).'}');
				}
				else
				{
					
					$fav_array[$id]=$id;
					setcookie('fav', serialize($fav_array), time()+99999999);
					exit('{"added":true,"total":'.count($fav_array).'}');
				}
			}
			exit;
	}
?>
[<?	
	$res=mysqli_query($conn, "SELECT * from ubani WHERE kalakis_id=".intval($_GET['id']));
	$is_first = true;
	while ($ubani=mysqli_fetch_assoc($res))
	{
		if($is_first)
		{
			echo '{"id":"'.$ubani['id'].'", "name":"'.$ubani['name'].'"}';
			$is_first = false;
		}
		else
			echo ',{"id":"'.$ubani['id'].'", "name":"'.$ubani['name'].'"}';
	}
?>]