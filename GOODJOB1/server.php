<? include ('config.php'); ?>monacemebi
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="modeli" class="frame1" style="width:135px">
<option value="all" style="width:135px">ყველა</option>
<?
$data=mysqli_query($conn,"select * from models where '$_GET[otaxi]'='ubanis_id'");
while ($cikli=mysqli_fetch_array($data))
{
?>
<option value="<? echo $cikli['id']; ?>"><? echo $cikli['name']; ?></option>
<? }?></select>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table style="margin:12px">
<tr>
<div style="margin:12px">
<div align="left" id="axali" style="width:415px">
 
<a href="damateba.php" id="linkebi"> დაამატე განცხადება </a> </div> <br />
 

 


<br /><br />
 


 

 
 

<?
$a=mysqli_query($conn,"select * from cxrili where '$_GET[otaxi]'='$_GET[ubani]'");
$b=mysqli_fetch_array($a);
?>
 

<td bgcolor="#CCCCCC"> 
<img src="<? echo $b['surati'];?>" width="500" height="400"  id="pic" /></td> <tr>
 
<td bgcolor="#CCCCCC">
<img src="<? echo $b['surati'];?>" width="121" height="100"  onmouseover="pic.src=this.src" />  
 <img src="<? echo $b['surati2'];?>" width="121" height="100" onmouseover="pic.src=this.src" /> 
 <img src="<? echo $b['surati3'];?>" width="121" height="100" onmouseover="pic.src=this.src" /> 
 <img src="<? echo $b['surati4'];?>" width="121" height="100" onmouseover="pic.src=this.src" />
 
 </td> 

  <tr> <td>  <br />
   <? echo $b['kidva']."&nbsp;".$b['kategory']; ?> <br />  
 
 
 <? echo $b['mdebareoba']; ?> <br />
 <? echo $b['ubani']; ?> <br />
 <? echo $b['misamarti']; ?> <br />
 <? echo "ოტახების რაოდენობა:"."&nbsp;".$b['otaxi']; ?> <br />
  <? echo "ფასი:"."&nbsp;".$b['fasi']; ?> <? echo $b['valuta']; ?> <br />
   <? echo "ფართი:"."&nbsp;"?> <? echo $b['kvadrat']."&nbsp;"."კვ.მ" ; ?> <br />
 <? echo "TEL:"."&nbsp;".$b['telefoni'];?>  <br />
 <? echo "მობილური:"."&nbsp;".$b['mobiluri'];?> <br />
 <? echo "საკონტაქტო პირი:"."&nbsp;".$b['sakontaqto_piri']; ?> <br />
 <? echo "სართული:"."&nbsp;".$b['sartuli']; ?> <br />
 <? echo "პროექტი:"."&nbsp;".$b['tipi']; ?>
 <br />  <br /> <br /> 
 <span class="style2"> დამატებითი ინფორმაცია </span> <span class="style2"><br />
 </span>   <hr />
 <? echo $b['agwera']; ?> </td>
  </tr>
  </table>	 