<?
include ('config.php');
	$client = new SoapClient('https://services.nbg.gov.ge/Rates/Service.asmx?wsdl');
	$currencies = "EUR,USD"; 
    $result = $client->GetCurrentRates(array('Currencies'=>$currencies));    
	foreach($result->GetCurrentRatesResult->CurrencyRate as $rate)
	{
		mysqli_query($conn, "UPDATE valuta SET rate='".$rate->Rate."' WHERE valuta='".$rate->Code."'");
		
	}		
?>