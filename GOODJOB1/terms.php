<style>
* {box-sizing: border-box}
body { 
font-family: bpg_algeti_compact; 
src:url(<?=HTTP_HOST?>fonts/bpg_algeti_compact.ttf);

  }

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 30%;
 

}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 14px;
    border-bottom:solid 1px #C7C5C5;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  height: 300px;
}
</style>

<section class="ftco-section">
      <div class="container">   
      
      
<div class="tab" style="position:relative; height:100%;">    
                    
  <button class="tablinks" onclick="openCity(event, 'wesebi')" <?php if (!isset($_GET['id'])) echo 'id="defaultOpen"'; ?>> 
  განცხადების განთავსების წესი</button>
  
  <button class="tablinks" onclick="openCity(event, 'register')" <?php if ($_GET['id']==2) echo 'id="defaultOpen"'; ?>>
  როგორ დავრეგისტრირდეთ 
 </button>
  
 <button class="tablinks" onclick="openCity(event, 'fasiani')" <?php if ($_GET['id']==3) echo 'id="defaultOpen"'; ?>> 
ფასიანი განცხადების დადება
</button>
 
   <button class="tablinks" onclick="openCity(event, 'gaaqtiureba')" <?php if ($_GET['id']==4) echo 'id="defaultOpen"'; ?>> 
განცხადების გააქტიურების სერვისი
</button> 


<button class="tablinks" onclick="openCity(event, 'dadeba')" <?php if ($_GET['id']==5) echo 'id="defaultOpen"'; ?>> 
ზოგადი წესები
</button> 
  
</div>
 

<div id="wesebi" class="tabcontent" style="position:relative; height:100%;">
 <p><strong>განცხადების განთავსების წესი</strong> </p> 
	
    <?   
 $aa=mysqli_query($conn,"select * from menu WHERE (title_ka = 'განცხადების განთავსების წესი')"); 
$where='';
while($rame=mysqli_fetch_array($aa))
{
	$where .= !empty($where) ? ' OR ' : '';
	$where.="kategory LIKE '%|$rame[id]|%'";
}

$a=mysqli_query($conn, "select * from login where ($where) order by news_date desc limit 1");
while ($b=mysqli_fetch_array($a))

{
 ?>
	
	<? echo $b['full']; } ?>
	
 

</div>



<div id="register" class="tabcontent" style="position:relative; height:100%;">
  <p> <strong>როგორ დავრეგისტრირდეთ</strong> </p>
<?   
 $aa=mysqli_query($conn,"select * from menu WHERE (title_ka = 'როგორ დავრეგისტრირდეთ')"); 
$where='';
while($rame=mysqli_fetch_array($aa))
{
	$where .= !empty($where) ? ' OR ' : '';
	$where.="kategory LIKE '%|$rame[id]|%'";
}

$a=mysqli_query($conn, "select * from login where ($where) order by news_date desc limit 1");
while ($b=mysqli_fetch_array($a))

{
 ?>
	
	<? echo $b['full']; } ?>

</div>
  
   
 
<div id="fasiani" class="tabcontent" style="position:relative; height:100%;">
  <p> <strong>ფასიანი განცხადებები</strong> </p>
 
<?   
 $aa=mysqli_query($conn,"select * from menu WHERE (title_ka = 'ფასიანი განცხადებების დადება')"); 
$where='';
while($rame=mysqli_fetch_array($aa))
{
	$where .= !empty($where) ? ' OR ' : '';
	$where.="kategory LIKE '%|$rame[id]|%'";
}

$a=mysqli_query($conn, "select * from login where ($where) order by news_date desc limit 1");
while ($b=mysqli_fetch_array($a))

{
 ?>
	
	<? echo $b['full']; } ?>
  
</div>
  
  <div id="gaaqtiureba" class="tabcontent" style="position:relative; height:100%;">
  <p> <strong>როგორ გავააქტიურო ვადაგასული განცხადება</strong> </p> 
  
<?   
 $aa=mysqli_query($conn,"select * from menu WHERE (title_ka = 'განცხადების გააქტიურების წესი')"); 
$where='';
while($rame=mysqli_fetch_array($aa))
{
	$where .= !empty($where) ? ' OR ' : '';
	$where.="kategory LIKE '%|$rame[id]|%'";
}

$a=mysqli_query($conn, "select * from login where ($where) order by news_date desc limit 1");
while ($b=mysqli_fetch_array($a))

{
 ?>
	
	<? echo $b['full']; } ?>
  
</div>
  
  
   <div id="dadeba" class="tabcontent" style="position:relative; height:100%;">
<p> <strong>ზოგადი წესები</strong> </p>
  
<?   
 $aa=mysqli_query($conn,"select * from menu WHERE (title_ka = 'ზოგადი წესები')"); 
$where='';
while($rame=mysqli_fetch_array($aa))
{
	$where .= !empty($where) ? ' OR ' : '';
	$where.="kategory LIKE '%|$rame[id]|%'";
}

$a=mysqli_query($conn, "select * from login where ($where) order by news_date desc limit 1");
while ($b=mysqli_fetch_array($a))

{
 ?>
	
	<? echo $b['full']; } ?>
  
</div>
  
    	</div>  
    </section>




<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
 
                         
			        
		
    