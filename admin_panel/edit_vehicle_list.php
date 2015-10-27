<?
	session_save_path('../tmp');
	session_start();

	if (!session_is_registered("atijoras"))
	{
		header("Location: index.php");
	}	
?>
<?php include("../include_connect_database.php.inc");?>
<?php
	if (isset($_GET[vid]))
	{
		$vid = $_GET[vid];
		
		$v_sql = "select * from tbl_vehicle where vid='$vid'";
		$v_result = mysql_query($v_sql) or die("Error");
		$v_row = mysql_fetch_array($v_result);
	}
	foreach ($_POST as $key => $val) 
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
			
			$vid = $array[$x];
			//print $vid."--";
			
			$sql = "delete from tbl_vehicle where vid=$vid";
			//print $sql;
			$result = mysql_query($sql) or die(mysql_error());
			
			if(!result)
			{
				mysql_error();
			}
			else
			{
				print "<font color=#FF0000><p>Guide ".$array[$x]." has been deleted successfully.<br>";
				
				if (file_exists("../upload_images/large_pics/".$vid."a.jpg"))
					unlink("../upload_images/large_pics/".$vid."a.jpg");
				if (file_exists("../upload_images/large_pics/".$vid."b.jpg"))
					unlink("../upload_images/large_pics/".$vid."b.jpg");
				if (file_exists("../upload_images/large_pics/".$vid."c.jpg"))
					unlink("../upload_images/large_pics/".$vid."c.jpg");
					
				if (file_exists("../upload_images/small_pics/".$vid."_a.jpg"))
					unlink("../upload_images/small_pics/".$vid."_a.jpg");
				if (file_exists("../upload_images/small_pics/".$vid."_b.jpg"))
					unlink("../upload_images/small_pics/".$vid."_b.jpg");
				if (file_exists("../upload_images/small_pics/".$vid."_c.jpg"))
					unlink("../upload_images/small_pics/".$vid."_c.jpg");
					
				if (file_exists("../upload_images/rate_pics/".$vid.".jpg"))
					unlink("../upload_images/rate_pics/".$vid.".jpg");
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
<style type="text/css">
<!--
.style1 {color: #666666}
-->
</style>
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
        <td valign="top">
<table width="95%"  border="0" align="center" cellpadding="5" cellspacing="1">
          <tr>
            <td class="phone">Available Vehicle List</td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="5" align="center" bordercolorlight="#C0C0C0">
              <tr>
                <td width="600"><?php	
			$num_per_page=10; 
			if (!isset($page_number))
				$page_number = 1;
			else
				$page_number++;
			// print $page_number."->";
			
			$start_record=(($page_number * $num_per_page) - $num_per_page); 
			// print $start_record."->";
			$total_sql = "select * from tbl_vehicle";
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
                <td><table width="100%"  border="1" cellspacing="0" cellpadding="2" style="border:1px solid green"><form action="<?php print $_SERVER['../cms/PHP_SELF']; ?>" method="post" name="delete_selected" id="delete_selected">
                      <?php
	  	$faq_sql = "select * from tbl_vehicle limit $start_record,$num_per_page";
		$faq_result = mysql_query($faq_sql) or die(mysql_error());
		while($row = mysql_fetch_array($faq_result))
		{
			$mem_id = $row[mem_id];
			$m_sql = "select * from tbl_member where mem_id=$mem_id";
			$m_result = mysql_query($m_sql) or die(mysql_error());
			$m_row = mysql_fetch_array($m_result);

			
			print '<tr class=arl9 bgColor="#DFDFDF">';
			print '<td width=9> &raquo; </td>';
			print '<td>'.$row[brand].' '.$row[model].' [ '.$row[make].' ]';
			print "<td>".$row[mfg_year]."</td>";
			print '</td><td align=center>';
			if ($row[approve] == 1) 
				print "<img src='../pictures/approved.jpg'>";
			else
				print "<img src='../pictures/napproved.jpg'>";
			print '</td><td align=center><a href="edit_vehicle.php?vid='.$row[vid].'">edit &raquo;</a></td>';
			if (isset($m_row[mem_id]))
				print '<td>'.$m_row[fname].' '.$m_row[lname].'</td>';
			else
				print "<td>Administrator</td>";
			print '<td>'.$row[entry_date].'</td>';
			print '<td><input type=checkbox name=array[] value='.$row[vid].'></td>';
		  	print '</tr>';
		}
	?>
                      <tr>
                        <td colspan="5" align="right" style="border:0px"><input name="submit" type="submit" class="formField" id="submit" value="Delete Selected"></td>
                      </tr>
                    </form>
                </table></td>
              </tr>
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