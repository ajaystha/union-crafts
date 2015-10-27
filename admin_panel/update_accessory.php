<?
	session_save_path('../tmp');
	session_start();
	if (!session_is_registered("atijoras"))
		header("Location: index.php");
	
	include("../include_connect_database.php.inc");
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
	
	if (isset($submit))
	{
		$x = 0;
		$total_records_deleted = count($array);
		// print $total_records_deleted;
		while($x < $total_records_deleted)
		{
			$sql = "delete from tbl_accessories where accessory_id=$array[$x]";
			//print $sql;
			$result = mysql_query($sql) or die(mysql_error());
			if(!result)
			{
				mysql_error();
			}
			else
			{
				print "<font color=#FF0000><p class=arl9>Accessory ".$array[$x]." has been deleted successfully.<br>";
			}
			$x++;
		}
	}
?>
<html>
<head>
<title>Administration Section</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../joras/landing.css" rel="stylesheet" type="text/css">
</head>

<body onResize="if (navigator.family == 'nn4') window.location.reload()">
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("header.inc.php");?></td>
  </tr>
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="25%" valign="top" class="txtbox_1"><?php include("include_left.inc.php");?></td>
        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="5" align="center" bordercolorlight="#C0C0C0">
          <tr>
            <td colspan="2" class="phone"> Update Accessories</td>
          </tr>
          <tr>
            <td colspan="2"><spacer></spacer></td>
          </tr>
          <tr>
            <form action="add_accessory.php" method="post" name="add_faq" id="add_faq">
              <td width="232">Add Accessory:</td>
              <td width="368"><input name="add_faq" type="submit" class="formField" id="add_faq" value="add  >>"></td>
            </form>
          </tr>
          <tr>
            <td colspan="2"><?php	
			$num_per_page=30; 
			if (!isset($page_number))
				$page_number = 1;
			else
				$page_number++;
			// print $page_number."->";
			
			$start_record=(($page_number * $num_per_page) - $num_per_page); 
			// print $start_record."->";
			$total_sql = "select * from tbl_accessories";
			$total_result = mysql_query($total_sql);
			$total_rows = mysql_num_rows($total_result);
			
			/*
			$sql="select * from tbl_subcat limit $start_record,$num_per_page";
			$result = mysql_query($sql);
			while ($row = mysql_fetch_array($result))
				print $row[id]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row[name]."<br>";
			*/
			
			if($page_number > 1)
			{
				// print $page_number;
				$previous_page_number=$page_number-2;		
				print "<a href='".$_SERVER['PHP_SELF']."?page_number=".$previous_page_number."'>&laquo; Previous </a>";
			}
							
			/////////////////////////////////////////////
			if($total_rows>$num_per_page)
			{
				for($i=1;$i<=ceil($total_rows/$num_per_page);$i++)
				{
					if($i==$page_number)
					{
						$show_i=$i-1;
						print " | <a href='".$_SERVER['PHP_SELF']."?page_number=$show_i'><strong><font color='maroon'>$i</font></strong></a>"; 
					}
					else
					{	
						$show_i=$i-1;
						print " | <a href='".$_SERVER['PHP_SELF']."?page_number=$show_i'>$i</a>"; 
					}
				}
			}
			/////////////////////////////////////////////
			
			$first_page_number=$page_number * $num_per_page;
			$last_page_number = $num_per_page;
			if ($page_number*$num_per_page<$total_rows)
				print " | <a href='".$_SERVER['PHP_SELF']."?page_number=$page_number'>Next &raquo;</a>";
		?></td>
          </tr>
          <tr>
            <td colspan="2" style="padding:2px">
			<table width="95%"  border="1" align="center" cellpadding="2" cellspacing="0">
                <form action="<?php print $_SERVER['../cms/PHP_SELF']; ?>" method="post" name="delete_selected" id="delete_selected">
                  <?php
	  	$faq_sql = "select * from tbl_accessories limit $start_record,$num_per_page";
		$faq_result = mysql_query($faq_sql) or die(mysql_error());
		while($row = mysql_fetch_array($faq_result))
		{
			print '<tr class=arl9>';
			print '<td width=9><img src="../pictures/but.gif" width="9" height="9"></td>';
			print '<td>'.$row[name].'</td>';
			print '<td><input type=checkbox name=array[] value='.$row[accessory_id].'></td>';
		  	print '</tr>';
		}
	?>
                  <tr>
                    <td colspan="3" align="right" style="border:0px"><input name="submit" type="submit" class="formField" id="submit" value="Delete Selected">
                    </td>
                  </tr>
                </form>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><?php include("footer.inc.php");?></td>
  </tr>
</table>
</body>
</html>
