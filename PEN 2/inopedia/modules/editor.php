<?
$host = parse_url($_SERVER['HTTP_REFERER']);
if (@$_GET['op'] == "add")
{
	if (@$_POST['text'] && @$_POST['title'])
	{
		$title = strip_tags($_POST['title']);
		$title = htmlspecialchars($_POST['title']);
		$text = $_POST['text'];
		if (!get_magic_quotes_gpc())
		{
			$text = mysql_escape_string($text);
			$title = mysql_escape_string($title);
		}
		else
		{
			$text = str_replace("'","`", $text);
			$title = str_replace("'","`", $title);
		}
		
		if (mysql_query ("INSERT jb_page SET title = '".$title."', text = '".$text."', menu = '".$_POST['menu']."', date = NOW()"))
		echo "<center><strong>".$lang[224]."</strong></center><br /><br /><br />";
		else echo "<center><strong>".$lang[98]."</strong></center><br /><br /><br />";
	}
	else
	{
		include ('../../NEW_CMS/JBC/admin/editor/spaw.inc.php');
		echo "<center><strong>".$lang[435]."</strong><center><br /><br />";
		echo "<FORM name=form METHOD=POST>
		<table style=\"font-size:13px;\" cellspacing=10 cellpadding=10 border=0 width=70% align=center>";
		
		echo "<tr><td>".$lang[78].": </td><td><input type=text name=title size=100></td></tr>";
		
		echo "<tr><td>".$lang[436]." </td><td>
		".$lang[119]." - <input type=radio name=menu value=yes checked> &nbsp; 
		".$lang[120]." - <input type=radio name=menu value=no>
		</td></tr>";
		echo "<tr><td>".$lang[287]."</td><td align=center>";
		$spaw1 = new SPAW_Wysiwyg("text",""); $spaw1->show();
		echo "</td></tr>";
		echo "<tr><td colspan=2><br /><input style=\"width:100%\" type=submit value=".$lang[59]."></td></tr>";
		echo "</table>
		</form>";
	}
}
elseif (@$_GET['op'] == "edit" && is_numeric(@$_GET['id_page']))
{
	if (@$_POST['text'] && @$_POST['title'])
	{
		$title = strip_tags($_POST['title']);
		$title = htmlspecialchars($_POST['title']);
		$text = $_POST['text'];
		if (!get_magic_quotes_gpc())
		{
			$text = mysql_escape_string($text);
			$title = mysql_escape_string($title);
		}
		else
		{
			$text = str_replace("'","`", $text);
			$title = str_replace("'","`", $title);
		}
		
		if (mysql_query ("UPDATE jb_page SET title = '".$title."', text = '".$text."', menu = '".$_POST['menu']."' WHERE id = '".$_GET['id_page']."' LIMIT 1"))
		echo "<center><strong>".$lang[193]."</strong></center><br /><br /><br />";
		else echo "<center><strong>".$lang[98]."</strong></center><br /><br /><br />";
	}
	else
	{
		include ('editor/spaw.inc.php');
		$query = mysql_query("SELECT * FROM jb_page WHERE id = '".$_GET['id_page']."'");
		if ($query) $line = mysql_fetch_assoc ($query);
		echo "<center><strong>".$lang[437]." \"".htmlspecialchars($line['title'])."\"</strong><center><br /><br />";
		echo "<FORM name=form METHOD=POST>
		<table style=\"font-size:13px;\" cellspacing=10 cellpadding=10 border=0 width=70% align=center>";
		
		echo "<tr><td>".$lang[78].": </td><td><input type=text name=title size=100 value=\"".$line['title']."\"></td></tr>";
		
		echo "<tr><td>".$lang[436]." </td><td>
		".$lang[119]." - <input type=radio name=menu value=yes ".(($line['menu'] == "yes") ? " checked" : "")."> &nbsp; 
		".$lang[120]." - <input type=radio name=menu value=no ".(($line['menu'] == "no") ? " checked" : "").">
		</td></tr>";
		echo "<tr><td>".$lang[287]."</td><td align=center>";
		$data = $line['text'];
		$spaw1 = new SPAW_Wysiwyg("text","$data");
		$spaw1->show();
		echo "</td></tr>";
		echo "<tr><td colspan=2><br /><input style=\"width:100%\" type=submit value='ijnunm'></td></tr>";
		echo "</table>
		</form>";
	}
}
elseif (@$_GET['op'] == "drop" && is_numeric($_GET['id_page']))
{
	if (mysql_query ("DELETE FROM jb_page WHERE id = '".$_GET['id_page']."' LIMIT 1")) 
	echo "<center><strong>".$lang[239]."</strong></center><br /><br /><br />";
	else echo "<center><strong>".$lang[98]."</strong></center><br /><br /><br />";
}
echo "<br /><br /><br />";
$query = mysql_query("SELECT * FROM kultura_cxrili");
if (mysql_num_rows ($query))
{
echo "<center><strong><a href=\content/add/\">".$lang[435]."</a></strong></center><br /><br />";	echo "<table style=\"font-size:13px;\" cellspacing=10 cellpadding=10 border=0 width=70% align=center>";
	echo "<tr valign=top bgcolor=#FFFFCC>
	<td align=center width=40%><strong><br />".$lang[123]."<br /><br /></strong> </td>
	<td align=center width=20%><strong><br />".$lang[436]."</strong> </td>
	<td colspan=2 align=center width=10%><strong><br />".$lang[126]."</strong> </td>
	</tr>";
	while ($line = mysql_fetch_assoc ($query))
	{
		if ($line['menu'] == "yes") $menu = "<img src=\"".$im."/yes.gif\">"; else $menu = "<img src=\"".$im."/close.gif\">";
		echo "<tr>
		<td><a href=\"".$h."/pages/".$line['id']."/\">".htmlspecialchars($line['title'])."</a></td>
		<td align=center>".$menu."</td>
		<td align=center><a title=".$lang[12]." href=\"".$h."/admin/content/".$line['id']."/edit/\"><img src=\"".$im."/edit.gif\"></a></td>
		<td align=center><a onClick='return ConformDelete(this);' title=".$lang[300]." href=\"".$h."/admin/content/".$line['id']."/drop/\"><img src=\"".$im."/drop.gif\"></a></td>
		</tr>";
	}
} else echo "<center><strong>".$lang[438].".<br /><br /><a href=\"".$h."/admin/content/add/\">".$lang[121]."?</a></strong></center>";
?>