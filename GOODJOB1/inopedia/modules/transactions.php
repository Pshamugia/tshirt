<? if(!defined('PAATA_WEB')) { header('HTTP/1.0 404 Not Found'); exit(); } ?>
<table align="center" width="1000px" style="position:relative; background-color:#FFFFFF; top:50px; padding-bottom:150px;">
<tr>
<td style=" position:relative; " colspan="4" valign="top">
<?
$momx=mysqli_query($conn, "SELECT * FROM login WHERE id=$_GET[user_id] ORDER BY id DESC");
$rame=mysqli_fetch_assoc($momx);
 echo $rame['username']; ?> 
</td>
<tr>
<td style="background-color:#000000; color:#FFFFFF;">თანხა</td>
<td style="background-color:#000000; color:#FFFFFF;">ტრანზაქციის აიდი </td>
<td style="background-color:#000000; color:#FFFFFF;">თარიღი </td>
<td style="background-color:#000000; color:#FFFFFF;">სტატუსი </td>
</tr>
<?
$res=mysqli_query($conn, "SELECT * FROM transactions WHERE user_id=$_GET[user_id] ORDER BY id DESC");
while($user=mysqli_fetch_assoc($res))
{
?>

<style>
 .tabl 
 {
background-color:#F5F5F5; 
  
cursor:pointer; 
padding-left:3px;
padding-right:3px;
}


 .tabl:hover
 {
background-color:#AAAAAA; 
color:#FFFFFF; 
cursor:pointer;  
}


</style>
<tr class="tabl">
<td><?=$user['amount']?></td>
<td><?=$user['trans_id']?> </td>
<td><?=date("Y-m-d H:i:s", $user['date'])?> </td>
<td> 
<?
	if($user['status'] == 0) echo 'დაუსრულებელი';
	elseif($user['status'] = 1) echo 'გადახდილი';
	elseif($user['status'] == 2) echo 'დაფიქსირდა შეცდომა';
?>
 </td>
</tr>
<? } ?>
</table> 