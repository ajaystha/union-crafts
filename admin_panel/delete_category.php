<?php
	foreach ($_POST as $key => $val) 
	{
		$val = preg_replace("/^\r\n+/","",$val);
		$val = str_replace('\"','"',$val);
		$$key = str_replace("\'","'",$val);
	}
	foreach ($_GET as $key => $val) 
	{
		$val = preg_replace("/^\r\n+/","",$val);
		$val = str_replace('\"','"',$val);
		$$key = str_replace("\'","'",$val);
	}
	session_save_path('../tmp');
	session_start();
	if (!session_is_registered("atijoras"))
		header("Location: index.php");
?>
<?php include("../include_connect_database.php.inc"); ?>
<?php
	if (isset($submit))
	{
		$x = 0;
		$total_records_deleted = count($array);
		// print $total_records_deleted;
		while($x < $total_records_deleted)
		{
			$sql = "delete from tbl_category where category_id=$array[$x]";
			// print $sql;
			$result = mysql_query($sql) or die(mysql_error());
			if(!result)
			{
				mysql_error();
			}
			else
			{
				$today = date("Y-m-d");
				$update_sql = "update tbl_last_updated set date='$today' where id=1";
				$update_result = mysql_query($update_sql);
				print "<font color=#FF0000><p>Category ".$array[$x]." has been deleted successfully.<br>";
			}
			$x++;
		}
	}
?>
<html>
<head>
<title>Administration Section</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="Javascript1.2"><!-- // load htmlarea
_editor_url = "";                     // URL to htmlarea files
var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);
if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
if (win_ie_ver >= 5.5) {
  document.write('<scr' + 'ipt src="' +_editor_url+ 'editor.js"');
  document.write(' language="Javascript1.2"></scr' + 'ipt>');  
} else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
// --></script>
<link href="../joras/myStyle.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#E6D9A8">
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("header.inc.php");?>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="25%" valign="top" class="txtbox_1"><?php include("include_left.inc.php");?></td>
    <td valign="top">
	<table width="98%" border="0" cellspacing="0" cellpadding="2" align="center">
       <tr>
         <td class="linktext"><strong>Delete Categories</strong></td>
       </tr>         
       <tr>
         <td align="right" class="smallblack">
		 <?php
			$num_per_page=10;
			if (!isset($page_number))
				$page_number = 1;
			else
				$page_number++;
			
			$start_record=(($page_number * $num_per_page) - $num_per_page);			
			$total_sql = "select * from tbl_category";
			$total_result = mysql_query($total_sql);
			$total_rows = mysql_num_rows($total_result);			
			
			if($page_number > 1)
			{
				$previous_page_number=$page_number-2;		
				print "<a href='".$_SERVER['PHP_SELF']."?page_number=".$previous_page_number."'>&laquo; Previous</a>";
			}
							
			/////////////////////////////////////////////
			if($total_rows>$num_per_page)
			{
				for($i=1;$i<=ceil($total_rows/$num_per_page);$i++)
				{
					if($i==$page_number)
					{
						$show_i=$i-1;
						print " [ <a href='".$_SERVER['PHP_SELF']."?page_number=$show_i'><strong><font color='maroon'>$i</font></strong></a> ]"; 
					}
					else
					{	
						$show_i=$i-1;
						print " [ <a href='".$_SERVER['PHP_SELF']."?page_number=$show_i'>$i</a> ]"; 
					}
				}
			}
			/////////////////////////////////////////////
			
			$first_page_number=$page_number * $num_per_page;
			$last_page_number = $num_per_page;
			if ($page_number*$num_per_page<$total_rows)
				print " <a href='".$_SERVER['PHP_SELF']."?page_number=$page_number'>Next &raquo;</a>";
		?></td>
	</tr>
    <tr>
		<td class="smallblack">
			<table border="1" align="center" cellpadding="2" cellspacing="0">
            <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post" name="deleteCategory" id="deleteCategory">
			<?php
				$faq_sql = "select * from tbl_category limit $start_record,$num_per_page";
				$faq_result = mysql_query($faq_sql) or die(mysql_error());
				$i = 1;
				while($row = mysql_fetch_array($faq_result))
				{
					print '<tr>';
					print '<td width=10 valign=top class=smallblack>'.$i.'</td>';
					print '<td class=smallblack valign=top>'.$row[cat_name].'</td>';				
					print '<td width=10><input type=checkbox name=array[] value='.$row[category_id].'></td>';
					print '</tr>';
					$i++;
				}
			?>
               <tr>
                 <td colspan="3" align="right" style="border:0px"><input name="submit" type="submit" id="submit" value="Delete Selected">
                 </td>
               </tr>
             </form>
         </table></td>
  </tr>
</table></td></tr></table></td>
  </tr>
  <tr>
    <td><?php include("footer.inc.php");?></td>
  </tr>
</table>
</body>
</html>
<?php mysql_close();?>