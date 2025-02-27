 

 <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col"> <i class="fas fa-user"></i> ნიუსლეთერის ელფოსტები</th>      
    </tr>
  </thead>
  <tbody>
<?
$res=mysqli_query($conn, "SELECT * FROM emails  ORDER BY ID DESC");
while($data=mysqli_fetch_array($res))
{
 
 
	?> 
 



    <tr>
      <th scope="row">
		
			
		  
		  
<a href="index.php?do=userpage&id=<? echo $data['id']; ?> "> <? echo $data['email'];  ?> </a> 
		  
		<?php /*?><a href="index.php?do=users&delete=<? echo $data['id'];?>" onclick="return confirm('ნამდვილად გსურთ წაშლა?')"> <i class="fas fa-minus-circle"></i> </a>  <?php */?>
		</th>
     
    </tr> <? }  ?>
	 




 

<table>
<tr>
	<td> 
		 
	</td>
	</tr>
</table>