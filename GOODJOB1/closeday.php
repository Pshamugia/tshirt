<?
	$submit_url = 'https://ecommerce.ufc.ge:18443/ecomm2/MerchantHandler';
	$post_fields = "command=b";
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
	echo curl_exec($curl);
	exit(curl_error($curl));
?>