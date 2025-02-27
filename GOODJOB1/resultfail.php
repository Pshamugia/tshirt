<?
include ('config.php');
	$trans_id = $_REQUEST["trans_id"];
	mysqli_query($conn, "UPDATE transactions SET status=2 WHERE trans_id='$trans_id'");
?>

<DIV style="height:500px;"> თქვენი გადახდა  არ შესრულდა</DIV>