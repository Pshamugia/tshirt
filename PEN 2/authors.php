
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 


<div class="container" style="position: relative; left: 25px; padding-bottom: 100px;">

 
			
	<div style="font-size:22px; " > <div align="center" style="background-color: aliceblue"> <span>  ანბანური საძიებო </span> </div> 
			
		
		
		<div style="padding: 25px 0 25px 0; font-size: 14px;" align="center">			
		<span> 
<? $a=mysqli_query($conn, "SELECT COUNT(*) as num FROM avtorebi");

$b=mysqli_fetch_array($a); 
		echo $b['num'];	
			?>	
		ავტორი,  			
		
<? $sql=mysqli_query($conn, "SELECT COUNT(*) as statia FROM kultura_cxrili");

$article=mysqli_fetch_array($sql); 
		echo $article['statia'];	
			?>	
		ტექსტი </span>
		
		
		</div>	
		
		
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	if(mb_substr($avt, 0, 1 ) === "a" OR mb_substr($avt, 0, 1 ) === "d" OR mb_substr($avt, 0, 1 ) === "R" OR mb_substr($avt, 0, 1 ) === "T")
    {
      
  
?>
			
			
 <div class="col-md-2" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 <a href="index.php?do=fullavtor&id=<?=$b['id']?>"> <?=$b['avtori']?> </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 	
			
	 </div>
	
	
	
	
	
	
	
	<div style="font-size:22px; "> 
	<div align="center" style="background-color: aliceblue"> <b> ა </b>  </div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori DESC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ა") // მონახავს სიტყვა თუ იწყება ამ ასოთი
    {
      
  
?>
			
			
 <div class="col-md-2" style="margin-left:10px; margin-bottom:4px; display: inline-block; min-width:300px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' '); // დაბეჭდავს ცარიელის მერე რომელიცაა, იმას (მაგ: ლორთქიფანიძე)
		
    $gvari=substr($avt, 0, strpos($avt, " ")); // ცარიელ ცარიელ ადგილამდე შლის (მაგ: ალექსანდრე)
echo ' '.$gvari;
		 
		  ?>   </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	<div style="font-size:22px; position: relative; top: 25px;"> <div align="center" style="background-color: aliceblue"> <b> ბ </b> </div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ბ") // მონახავს სიტყვა თუ იწყება ამ ასოთი
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' '); // დაბეჭდავს ცარიელის მერე რომელიცაა, იმას (მაგ: ლორთქიფანიძე)
		
    $gvari=substr($avt, 0, strpos($avt, " ")); // ცარიელ ცარიელ ადგილამდე შლის (მაგ: ალექსანდრე)
echo ' '.$gvari;
		 
		  ?> </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	
	<div style="font-size:22px; position: relative; top: 45px;"> <div align="center" style="background-color: aliceblue"> <b> გ  </b></div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "გ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?> </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	<div style="font-size:22px; position: relative; top: 65px;"> <div align="center" style="background-color: aliceblue"> <b> დ  </b></div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "დ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	<div style="font-size:22px; position: relative; top: 85px;"> <div align="center" style="background-color: aliceblue"> <b> ე </b> </div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ე") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	<div style="font-size:22px; position: relative; top: 105px;"> <div align="center" style="background-color: aliceblue"> <b>  ვ  </b></div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ვ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	
	<div style="font-size:22px; position: relative; top: 125px;"> <div align="center" style="background-color: aliceblue"> <b>  ზ </b> </div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ზ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	
	<div style="font-size:22px; position: relative; top: 145px;"> <div align="center" style="background-color: aliceblue"> <b> თ </b> </div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "თ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	<div style="font-size:22px; position: relative; top: 145px;"> <div align="center" style="background-color: aliceblue"> <b> ი </b> </div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ი") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	

	
	<div style="font-size:22px; position: relative; top: 145px;"> <div align="center" style="background-color: aliceblue"> <b> კ  </b> </div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "კ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	<div style="font-size:22px; position: relative; top: 145px;"> <div align="center" style="background-color: aliceblue"> <b>  ლ </b> </div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ლ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	<div style="font-size:22px; position: relative; top: 145px;"> <div align="center" style="background-color: aliceblue"> <b>  მ </b> </div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "მ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	<div style="font-size:22px; position: relative; top: 145px;"> <div align="center" style="background-color: aliceblue"> <b>  ნ  </b></div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ნ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	<div style="font-size:22px; position: relative; top: 145px; padding-bottom: 50px;"> <div align="center" style="background-color: aliceblue"> <b>  ო </b> </div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ო") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	
	<div style="font-size:22px; position: relative; top: 145px; padding-bottom: 50px;"> <div align="center" style="background-color: aliceblue"> <b> პ  </b></div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "პ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	<div style="font-size:22px; position: relative; top: 145px; padding-bottom: 50px;"> <div align="center" style="background-color: aliceblue"> <b>  ჟ  </b></div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ჟ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	<div style="font-size:22px; position: relative; top: 145px; padding-bottom: 50px;"> <div align="center" style="background-color: aliceblue"> <b>  რ </b> </div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "რ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	<div style="font-size:22px; position: relative; top: 145px; padding-bottom: 50px;"> <div align="center" style="background-color: aliceblue"> <b> ს </b> </div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ს") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	<div style="font-size:22px; position: relative; top: 145px; padding-bottom: 50px;"> <div align="center" style="background-color: aliceblue"> <b>  ტ  </b></div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ტ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	
	<div style="font-size:22px; position: relative; top: 145px; padding-bottom: 50px;"> <div align="center" style="background-color: aliceblue"> <b>  უ </b> </div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "უ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	<div style="font-size:22px; position: relative; top: 145px; padding-bottom: 50px;"> <div align="center" style="background-color: aliceblue"> <b>  ფ  </b></div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ფ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	
	<div style="font-size:22px; position: relative; top: 145px; padding-bottom: 50px;"> <div align="center" style="background-color: aliceblue"> <b>  ქ </b> </div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ქ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	
	<div style="font-size:22px; position: relative; top: 145px; padding-bottom: 50px;"> <div align="center" style="background-color: aliceblue"> <b>  ღ  </b></div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ღ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	<div style="font-size:22px; position: relative; top: 145px; padding-bottom: 50px;"> <div align="center" style="background-color: aliceblue"> <b>  ყ  </b></div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ყ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	<div style="font-size:22px; position: relative; top: 145px; padding-bottom: 50px;"> <div align="center" style="background-color: aliceblue"> <b>  შ  </b></div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "შ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	
	<div style="font-size:22px; position: relative; top: 145px; padding-bottom: 50px;"> <div align="center" style="background-color: aliceblue"> <b>  ჩ  </b></div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ჩ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	
	<div style="font-size:22px; position: relative; top: 145px; padding-bottom: 50px;"> <div align="center" style="background-color: aliceblue"> <b>  ც  </b></div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ც") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	
	<div style="font-size:22px; position: relative; top: 145px; padding-bottom: 50px;"> <div align="center" style="background-color: aliceblue"> <b>  ძ </b> </div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ძ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	
	<div style="font-size:22px; position: relative; top: 145px; padding-bottom: 50px;"> <div align="center" style="background-color: aliceblue"> <b>  წ  </b></div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "წ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	<div style="font-size:22px; position: relative; top: 145px; padding-bottom: 50px;"> <div align="center" style="background-color: aliceblue"> <b>  ჭ  </b></div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ჭ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	<div style="font-size:22px; position: relative; top: 145px; padding-bottom: 50px;"> <div align="center" style="background-color: aliceblue"> <b>  ხ  </b></div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ხ")   
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?> </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	<div style="font-size:22px; position: relative; top: 145px; padding-bottom: 50px;"> <div align="center" style="background-color: aliceblue"> <b>  ჯ  </b></div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ჯ")  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	
	
	<div style="font-size:22px; position: relative; top: 145px; padding-bottom: 100px;"> <div align="center" style="background-color: aliceblue"> <b>  ჰ  </b></div> 
			
			<? 

$a=mysqli_query($conn, "SELECT * FROM avtorebi ORDER BY avtori ASC");

while ($b=mysqli_fetch_array($a))
{
	?>
	
	<? $avt=$b['avtori'];
	mb_internal_encoding("UTF-8");
	$bar=strstr($avt, ' ');
 	if(mb_substr($bar, 1, 1 ) === "ჰ") //  
    {
      
  
?>
			
			
 <div class="col-md-3" style="margin-left:10px; margin-bottom:4px; display: inline-block; width: 350px;" id="linkebi"> 
	 
	 
	   
	 <a href="index.php?do=fullavtor&id=<? echo $b['id']; ?>"> 		
		 <? 
		echo strstr($avt, ' ');  
		
    $gvari=substr($avt, 0, strpos($avt, " "));  
echo ' '.$gvari;
		 
		  ?>  </a>
			
			</div> 
			
			
			<? 
	} 
}  ?> 
			
	
	 </div>
	
	
	
	
	
	
	
	
	
	
 
	</div>  </td> <td valign="top">



  </td> </tr></table>


</td>
</tr></table>
