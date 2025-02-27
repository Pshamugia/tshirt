<? if(!defined('PAATA_WEB')) { header('HTTP/1.0 404 Not Found'); exit(); } ?><link href="../../logo.css" rel="stylesheet" type="text/css">
<tr><style>
 .shopping 
 {
background-color:#fe5f55; 
color:#FFFFFF;  
cursor:pointer; 
border-radius:2px;
padding-left:3px;
padding-right:3px;
}


 .shopping:hover
 {
background-color:#797B7B; 
color:#FFFFFF; 
border-radius:2px;
cursor:pointer;  

}




 .tabl 
 {
background-color:#F5F5F5; 
  
cursor:default; 
padding-left:3px;
padding-right:3px;
}


 .tabl:hover
 {
background-color:#AAAAAA; 
color:#FFFFFF; 
cursor:default;  
transition: color 0.5s, background 0.5s;
    -webkit-transition: color 0.5s, background 0.5s;
}





#kosmo a:link {

color:#B11316;
text-decoration:none;
 
}

#kosmo a:visited {

color:#000000;
text-decoration:none;
}


#kosmo a:active {

color:#2D4157;
text-decoration:none;
 
 
 
}

#kosmo a:hover{

color:#0033CC;
text-decoration:none;
 
}

 
 </style>
<div align="right">
	<input type="button" onClick="window.open('<?=HTTP_HOST?>export.php');" value="ექსპორტი"/>	
</div>
<table align="center" id="kosmo" style="position:relative; margin-top:50px; width:1000px;" cols="0">
<tr>
<td style=" position:relative;" >
<tr>
<td style="background-color:#B9B9B9;">გადახდის ID</td>
<td style="background-color:#B9B9B9;">ტრანზაქციის ID</td>
<td style="background-color:#B9B9B9;">სახელი</td>
<td style="background-color:#B9B9B9;">ელფოსტა </td>
<td style="background-color:#B9B9B9;">მობილური </td>
<td style="background-color:#B9B9B9;">პროდუქტი</td>
<td style="background-color:#B9B9B9;">ფასი</td>
<td style="background-color:#B9B9B9;">სტატუსი</td>
<td style="background-color:#B9B9B9;">თარიღი</td>
</tr>

<?         


$res=mysqli_query($conn, "SELECT * FROM transactions ORDER BY id DESC");
while($trans=mysqli_fetch_assoc($res))
{ 
	$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM login WHERE id='$trans[uid]' LIMIT 1"));
?>


<tr class="tabl">

<td style="padding-bottom:15px;"><?=$trans['id']?></td>
<td style="padding-bottom:15px;"><?=$trans['trans_id']?></td>
<td style=""><?=$user['username']?> </td>
<td style=""> <?=$user['email']?> </td>
<td style=""><?=$user['phone']?> </td>
<td style=" "><?=$trans['type']?></td>
<td><?=$trans['price']?></td>
<td> 
	<?
		switch($trans['status'])
		{
				case 0: echo 'დამუშავების პროცესში';break;
				case 1: echo 'ტრანზაქცია შეიქმნა';break;
				case 2: echo 'გადახდილი';break;
				case 3: echo 'წარუმატებელი';break;
				case 4: echo 'თანხის უკან დაბრუნება';break;
				case 5: echo 'ტრანზაქციის დროის ამოწურვა';break;
				
		}
		
	?>
	
	</td>
	<td><?=date("Y-m-d H:i:s", $trans['date'])?></td>
</tr> </li> </ul>
<? }  ?>
</table> 