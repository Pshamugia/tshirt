<?
include ('config.php');
	$submit_url = 'https://ecommerce.ufc.ge:18443/ecomm2/MerchantHandler';
	$trans_id = $_REQUEST["trans_id"];
	$Ip_Address = $_SERVER['REMOTE_ADDR'];
	$post_fields = "command=c&trans_id=$trans_id&client_ip_addr=$Ip_Address";
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_SSLVERSION, 1); //0 
	curl_setopt($curl, CURLOPT_POSTFIELDS, $post_fields);
    curl_setopt($curl, CURLOPT_VERBOSE, '1');
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, '0');
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, '0');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_TIMEOUT, 120);
    curl_setopt($curl, CURLOPT_SSLCERT, getcwd().'/ssl/sert.pem');
	curl_setopt($curl, CURLOPT_SSLKEY, getcwd().'/ssl/sert_key.pem');	
	curl_setopt($curl, CURLOPT_SSLCERTPASSWD, 'M5LSbK8oyiLeXiPe');
	curl_setopt($curl, CURLOPT_SSLKEYPASSWD, 'M5LSbK8oyiLeXiPe');
    curl_setopt($curl, CURLOPT_URL, $submit_url);	
	$resp = curl_exec($curl);	
	preg_match("/RESULT\s*:\s*([^\n]+)/", $resp, $m);
	$result = trim($m[1]);
	curl_close($curl);
	if($result == 'OK')
	{
		mysqli_query($conn, "UPDATE transactions SET status=1 WHERE trans_id='$trans_id'");
		$trans=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from transactions  WHERE trans_id='$trans_id'"));
		mysqli_query($conn, "UPDATE login SET balance=balance+$trans[amount] WHERE id = $trans[user_id]");
	}
	else
	{
		mysqli_query($conn, "UPDATE transactions SET status=2 WHERE trans_id='$trans_id'");
	}

	if($result == 'OK')
	{
		echo "OK";
	}
	else
	{
		echo "FAILED";
	}
?>