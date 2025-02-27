<?
include('config.php');
include('tbc/TBCCheckout.php');

	$uid = $_SESSION['USER_ID'];
	$type = $_GET['t'];
	$price = $type == 's_vip' ? 0.01 : 2;
	$date = time();
	$status = 0;

	$product_name = $type == 's_vip' ? 'SUPER VIP სტატუსის შეძენა' : 'VIP სტატუსის შეძენა';

	mysqli_query($conn, "INSERT INTO transactions (uid, type, price, date, status ) VALUES ('$uid', '$type', '$price', '$date', '$status')");
	$order_id = mysqli_insert_id($conn);

	$checkout = new TBCCheckout(TBC_CLIEND_ID,TBC_CLIENT_SECRET,TBC_APIKEY,false);
	
	$param= [
        'amount'=>[
	            /*
	             Transaction currency (3 digit ISO code). Note 1) 
	             payments in given currency should be enabled for the merchant by bank. 2) 
	             only "GEL" is available for payment methods 6 – Ertguli Points; 8 - Installment
	             The following values are allowed: GEL, USD, EUR
	            */
	            'currency'=>'GEL', 
	            
	            /*
	             Total amount of payment
	            */
	            'total'=>$price, 
                  ],
        
        /*
         Payment methods to be displayed for the user on the checkout screen: 
        4 - Web QR; 5 – Pan (Card) Payment 6 – Ertguli Points 
        7 – Internet Bank Login; 8 - Installment; 9 - Apple Pay.
        */
        'methods'=>[4,5,7], 
        
        
        /*
        List of installment products. mandatory if installment is selected as payment method. 
        Please note, sum of prices of installment products should be same as total amount.
        */
        'installmentProducts'=>[['name'=>$product_name,'price'=>$price,'quantity'=>1]],
        
        /*
        Callback url to redirect user after finishing payment
        */
        'returnurl'=> HTTP_HOST.'pay_result.php',
        
        /*
        Merchant callbackURL - when payment status changes
        */
        'callbackUrl'=>HTTP_HOST.'tbc/callbackUrl.php', 
        
        /*
        Specify if preauthorization is needed for the transaction. 
        if "true" is passed, amount will be blocked on the card and additional 
        request should be executed by merchant to complete payment. 
        To finalize authorization process, /v1/tpay/payments/:paymentId/completion endpoint should be used. 
        By default block is saved for 30 days, although some banks may have a different setting, 
        so this setting depends on the card issuing bank (Isuer Bank)
        */
        'preAuth'=>false,
        
        /*
        Default language for payment page
        The following values are allowed:
        KA, EN, RU
        */
        'language'=>'KA',
        
        /*
        Merchant-side payment identifier
        */
        'merchantPaymentId'=>$order_id
       ];
	$res = $checkout->RequestPayment($param);
	
	if($res['payId'])
	{
	    mysqli_query($conn, "UPDATE transactions SET trans_id = '$res[payId]' WHERE id = $order_id");
	
	//die($checkout->error);
	    header('Location: '.$res['links'][1]['uri']);
	}
	exit;
?>