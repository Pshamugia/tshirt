<?
	$title="";
	$content="";
	$update="";
	$id="";
	$align="";
	switch($_REQUEST["op"])
	{
		case "add" :
		{
			if($_REQUEST["op"]=="add")
			{
				if($_REQUEST["title"]!="")
				if(isset($_REQUEST["update"]))
				{
					mysql_query("UPDATE blocks_geo SET align='".$_REQUEST["align"]."',content='".$_REQUEST["content"]."',title='".$_REQUEST["title"]."' WHERE id='".$_REQUEST["id"]."'");
				}
				else
				{
					$res=mysql_query("SELECT pos FROM blocks_geo ORDER BY pos");
					while($data=mysql_fetch_array($res))
					$pos=$data["pos"];
					$pos++;
					mysql_query("INSERT INTO blocks_geo (align,pos,content,title) VALUES ('".$_REQUEST["align"]."','$pos','".$_REQUEST["content"]."','".$_REQUEST["title"]."')");
				}
			}
		}
		case "move_up" :
		{
			if($_REQUEST["op"]=="move_up")
			{
				$res=mysql_query("SELECT * FROM blocks_geo WHERE id='".$_REQUEST["id"]."' ORDER BY pos");
				$data=mysql_fetch_array($res);
				$align=$data["align"];
				$pos=$data["pos"];
				$id=$data["id"];
				$res=mysql_query("SELECT * FROM blocks_geo WHERE align='$align' AND pos<'$pos' ORDER BY pos");
				while($data=mysql_fetch_array($res)) { $pos2=$data["pos"]; $id2=$data["id"]; }
				mysql_query("UPDATE blocks_geo SET pos='$pos2' WHERE id='$id'");
				mysql_query("UPDATE blocks_geo SET pos='$pos' WHERE id='$id2'");
			}
		}
		case "move_doun" :
		{
			if($_REQUEST["op"]=="move_doun")
			{
				$res=mysql_query("SELECT * FROM blocks_geo WHERE id='".$_REQUEST["id"]."' ORDER BY pos");
				$data=mysql_fetch_array($res);
				$align=$data["align"];
				$pos=$data["pos"];
				$id=$data["id"];
				$res=mysql_query("SELECT * FROM blocks_geo WHERE align='$align' AND pos>'$pos' ORDER BY pos");
				$data=mysql_fetch_array($res);
				$pos2=$data["pos"]; 
				$id2=$data["id"];
				mysql_query("UPDATE blocks_geo SET pos='$pos2' WHERE id='$id'");
				mysql_query("UPDATE blocks_geo SET pos='$pos' WHERE id='$id2'");
			}
		}
		case "edit" :
		{
			if($_REQUEST["op"]=="edit")	
			{
				$res=mysql_query("SELECT * FROM blocks_geo WHERE id='".$_REQUEST["id"]."'");
				$data=mysql_fetch_array($res);
				$title=$data["title"];
				$content=$data["content"];
				$update="update";
				$id=$_REQUEST["id"];
				$align=$data["align"];
			}
		}
		case "delete" :
		{
			if($_REQUEST["op"]=="delete")
			{
				mysql_query("DELETE FROM blocks_geo WHERE id='".$_REQUEST["id"]."'");
			}
		}
		case "status" :
		{
			if($_REQUEST["op"]=="status")
			{
				$res=mysql_query("SELECT * FROM blocks_geo WHERE id='".$_REQUEST["id"]."'");
				$data=mysql_fetch_array($res);
				$stat=!$data["active"];
				mysql_query("UPDATE blocks_geo SET active='$stat' WHERE id='".$_REQUEST["id"]."'");	
			}
		}
		default :
		{
			$res=mysql_query("SELECT * FROM blocks_geo WHERE align='top' ORDER BY pos");
			while($data=mysql_fetch_array($res))
			{
				if($data["active"]) $status="images/active.gif";
				else $status="images/inactive.gif";
				$top_blocks.="
				<table width='700' height='22' border='1' bordercolor='#2175bc' cellpadding='0' cellspacing='0'>
  				<tr>
    				<td width='485' align='left'>$data[title]</td>
    				<td width='20' align='center'><a href='index.php?do=blocks_geo&op=move_up&id=$data[id]'><img border='0' src='images/up.gif'></a></td>
    				<td width='20' align='center'><a href='index.php?do=blocks_geo&op=move_doun&id=$data[id]'><img border='0' src='images/down.gif'></a></td>
    				<td width='20' align='center'><a href='index.php?do=blocks_geo&op=status&id=$data[id]'><img border='0' src='$status'></a></td>
    				<td width='20' align='center'><a href='index.php?do=blocks_geo&op=edit&id=$data[id]'><img border='0' src='images/edit.png'></a></td>
    				<td width='20' align='center'><a href='index.php?do=blocks_geo&op=delete&id=$data[id]'><img border='0' src='images/delete.png'></a></td>
  				</tr>
				</table>
				";
			}
			$res=mysql_query("SELECT * FROM blocks_geo WHERE align='buttom' ORDER BY pos");
			while($data=mysql_fetch_array($res))
			{
				if($data["active"]) $status="images/active.gif";
				else $status="images/inactive.gif";
				$buttom_blocks.="
				<table width='700' height='22' border='1' bordercolor='#2175bc' cellpadding='0' cellspacing='0'>
  				<tr>
    				<td width='485' align='left'>$data[title]</td>
    				<td width='20' align='center'><a href='index.php?do=blocks_geo&op=move_up&id=$data[id]'><img border='0' src='images/up.gif'></a></td>
    				<td width='20' align='center'><a href='index.php?do=blocks_geo&op=move_doun&id=$data[id]'><img border='0' src='images/down.gif'></a></td>
    				<td width='20' align='center'><a href='index.php?do=blocks_geo&op=status&id=$data[id]'><img border='0' src='$status'></a></td>
    				<td width='20' align='center'><a href='index.php?do=blocks_geo&op=edit&id=$data[id]'><img border='0' src='images/edit.png'></a></td>
    				<td width='20' align='center'><a href='index.php?do=blocks_geo&op=delete&id=$data[id]'><img border='0' src='images/delete.png'></a></td>
  				</tr>
				</table>
				";
			}
			$res=mysql_query("SELECT * FROM blocks_geo WHERE align='left' ORDER BY pos");
			while($data=mysql_fetch_array($res))
			{
				if($data["active"]) $status="images/active.gif";
				else $status="images/inactive.gif";
				$left_blocks.="
				<table width='700' height='22' border='1' bordercolor='#2175bc' cellpadding='0' cellspacing='0'>
  				<tr>
    				<td width='485' align='left'>$data[title]</td>
    				<td width='20' align='center'><a href='index.php?do=blocks_geo&op=move_up&id=$data[id]'><img border='0' src='images/up.gif'></a></td>
    				<td width='20' align='center'><a href='index.php?do=blocks_geo&op=move_doun&id=$data[id]'><img border='0' src='images/down.gif'></a></td>
    				<td width='20' align='center'><a href='index.php?do=blocks_geo&op=status&id=$data[id]'><img border='0' src='$status'></a></td>
    				<td width='20' align='center'><a href='index.php?do=blocks_geo&op=edit&id=$data[id]'><img border='0' src='images/edit.png'></a></td>
    				<td width='20' align='center'><a href='index.php?do=blocks_geo&op=delete&id=$data[id]'><img border='0' src='images/delete.png'></a></td>
  				</tr>
				</table>
				";
			}
			$res=mysql_query("SELECT * FROM blocks_geo WHERE align='right' ORDER BY pos");
			while($data=mysql_fetch_array($res))
			{
				if($data["active"]) $status="images/active.gif";
				else $status="images/inactive.gif";
				$right_blocks.="
				<table width='700' height='22' border='1' bordercolor='#2175bc' cellpadding='0' cellspacing='0'>
  				<tr>
    				<td width='485' align='left'>$data[title]</td>
    				<td width='20' align='center'><a href='index.php?do=blocks_geo&op=move_up&id=$data[id]'><img border='0' src='images/up.gif'></a></td>
    				<td width='20' align='center'><a href='index.php?do=blocks_geo&op=move_doun&id=$data[id]'><img border='0' src='images/down.gif'></a></td>
    				<td width='20' align='center'><a href='index.php?do=blocks_geo&op=status&id=$data[id]'><img border='0' src='$status'></a></td>
    				<td width='20' align='center'><a href='index.php?do=blocks_geo&op=edit&id=$data[id]'><img border='0' src='images/edit.png'></a></td>
    				<td width='20' align='center'><a href='index.php?do=blocks_geo&op=delete&id=$data[id]'><img border='0' src='images/delete.png'></a></td>
  				</tr>
				</table>
				";
			}		
		}
	}
?>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<table width="700" height="52" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" style="border-bottom:1px solid #2175bc;"><h3>ბანერი</h3></td>
  </tr>
  <tr>
    <td align="center" style="border-left:1px solid #2175bc;border-bottom:1px solid #2175bc;border-right:1px solid #2175bc">
      <form name="form1" method="post" action="index.php">
        <label></label>
&#4321;&#4304;&#4311;&#4304;&#4323;&#4320;&#4312;<br>
        <input name="title" type="text" id="title" value="<? echo $title;?>">
        <br>
        <label>
        <label>&#4318;&#4317;&#4310;&#4312;&#4330;&#4312;&#4304;<br>
        <select name="align" id="align" style="width:155px">
       <? 
		  if($align=="top") echo "<option selected value='top'>ზედა</option>";
		  else echo "<option value='top'>ზედა</option>";
		  
		  if($align=="buttom") echo "<option selected value='buttom'>ქვედა</option>";
		  else echo "<option value='buttom'>ქვედა</option>";
		 
		  if($align=="left") echo "<option selected value='left'>მარცხენა</option>";
		  else echo "<option value='left'>მარცხენა</option>";

       ?>
        </select>
        </label>
<br>
</label>&#4305;&#4314;&#4317;&#4313;&#4312;<br>
      <label>
      <textarea name="content" id="fckeditor" cols="70" rows="20"><? echo $content?></textarea>
      <br>
      <input type="hidden" name="do" value="blocks_geo">
      <input type="hidden" name="op" value="add">
      <input name="<? echo $update;?>" type="hidden" id="<? echo $update;?>" value="1" />
      <input type="hidden" name="id" value="<? echo $id?>" />
      <input type="submit" name="save" id="save" value="save">
</label>
      <br>
      </form>    </td>
  </tr>
  <tr>
    <td align="center" style="border-bottom:1px solid #2175bc">&nbsp;</td>
  </tr>
  

  <tr>
    <td align="center"><span style="border-bottom:1px solid #2175bc">TOP<br>
    <? echo $top_blocks;?></span></td>
  </tr>
  <tr>
    <td align="center" style="border-bottom:1px solid #2175bc">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" style="border-bottom:1px solid #2175bc">BOTTOM<br>
    <? echo $buttom_blocks;?></td>
  </tr>
  <tr>
    <td align="center" style="border-bottom:1px solid #2175bc">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" style="border-bottom:1px solid #2175bc">LEFT<br>
    <? echo $left_blocks;?></td>
  </tr>

    <td align="center"><br />
    <br /></td>
  </tr>
</table>
