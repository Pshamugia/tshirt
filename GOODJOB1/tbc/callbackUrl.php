<?php

include('../config.php');
require 'TBCCheckout.php';
/*
* This file is part of the TBC-Checkout project.
*
* Detailed instructions can be found in README.md or online
* @link https://github.com/Geopaysoft/TBC-Checkout
*
* @author geopaysoft.com  <info@geopaysoft.com>
* @license   https://opensource.org/licenses/MIT
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

$postdata = file_get_contents("php://input");


//file_put_contents('blog.txt', $postdata, FILE_APPEND);

$data=json_decode($postdata,true);


if (isset($data['PaymentId'])){

$checkout = new TBCCheckout(TBC_CLIEND_ID,TBC_CLIENT_SECRET,TBC_APIKEY,false);
$res = $checkout->GetPaymentInfo($data['PaymentId']);
 

 
 if ($res['status']=='Created'){
    mysqli_query($conn, "UPDATE transactions SET status=1 WHERE trans_id='$data[PaymentId]'");
    header("HTTP/1.1 200 OK"); 
    exit;
 }

 if ($res['status']=='Succeeded'){
    mysqli_query($conn, "UPDATE transactions SET status=2 WHERE trans_id='$data[PaymentId]'");
	$res = mysqli_query($conn, "SELECT * FROM transactions WHERE trans_id='$data[PaymentId]'");
	if($trans = mysqli_fetch_assoc($res))
	{
		$end_date = strtotime("+7 days");
		if($trans['type'] == 's_vip')
			mysqli_query($conn, "UPDATE login SET s_vip='$end_date' WHERE id='$trans[uid]'");
		else
			mysqli_query($conn, "UPDATE login SET vip='$end_date' WHERE id='$trans[uid]'");
	}
	 
	
    header("HTTP/1.1 200 OK"); 
    exit;
 }

 if ($res['status']=='Failed'){
mysqli_query($conn, "UPDATE transactions SET status=3 WHERE trans_id='$data[PaymentId]'");
    header("HTTP/1.1 200 OK"); 
    exit;
 }

 if ($res['status']=='Returned'){
mysqli_query($conn, "UPDATE transactions SET status=4 WHERE trans_id='$data[PaymentId]'");
    header("HTTP/1.1 200 OK"); 
    exit;    
 }


 if ($res['status']=='Expired'){
mysqli_query($conn, "UPDATE transactions SET status=5 WHERE trans_id='$data[PaymentId]'");
    header("HTTP/1.1 200 OK"); 
    exit;
 }
}


header("HTTP/1.1 404 Not Found"); 


?>