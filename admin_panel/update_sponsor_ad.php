<?php
	session_save_path('../tmp');
	session_start();
	include("../check_session.php");
?>
<?php include("../include_connect_database.php"); ?>
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
	
	if (isset($submit))
	{
		$x = 0;
		$total_records_deleted = count($array);
		// print $total_records_deleted;
		while($x < $total_records_deleted)
		{
			$sql = "delete from tbl_ads where ad_id=$array[$x]";
			// print $sql;
			$result = mysql_query($sql) or die(mysql_error());
			if(!result)
			{
				mysql_error();
			}
			else
			{
				print "<font color=#FF0000><p class=arl9>blink ".$array[$x]." has been deleted successfully.<br>";
			}
			$x++;
		}
	}
	if (isset($update))
	{
		$name = addslashes($name);
		$caption = addslashes($caption);
		$update_sql = "update tbl_ads set ad_caption='$name', ad_refers='$url', ad_desc='$caption', ad_category='$category' where ad_id='$id'";
		//print $update_sql;
		$update_result = mysql_query($update_sql) or die(mysql_error());
		$num_of_rows = mysql_affected_rows();
	}
?>
<html>
<head>
<title>Administration Section of NepalYellowPage.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../admstyle.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include("../header.php");?>
<?php
	if ($action == 'update')
	{
?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25%" valign="top"><?php include("../include_left.php"); ?></td>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpblinkding="5" align="center" bordercolorlight="#C0C0C0">
      <form action="<?php print $_SERVER['../PHP_SELF']; ?>" method="post" name="update_blink" id="update_blink">
        <tr>
          <td colspan="2">                <font size="5"><b><font color="#AA0000" face="Arial, Helvetica ">Update </font></b><font color="#AA0000" size="5"><b><font color="#006600" size="5"><b><font face="Arial, Helvetica " color="#AA0000">Sponsor</font></b></font><font face="Arial, Helvetica "><b> ADs</b></font></b></font></font></td>
        </tr>
        <tr>
          <td colspan="2">
		  <?php 
			$id = $ad_id;
			// print $id."--";
			$ulink_sql = "select * from tbl_ads where ad_id='$id'";
			// print $ulink_sql;
			$ulink_result = mysql_query($ulink_sql) or die(mysql_error());
			$ulink_row = mysql_fetch_array($ulink_result);		
		?></td>
        </tr>
        <tr>
          <td width="170" align="right" class="arl9"><strong>Sponsor AD Caption : </strong></td>
          <td width="368"><input name="name" type="text" id="name" value="<?=$ulink_row['ad_caption']?>" size="40"></td>
        </tr>
        <tr>
          <td width="170" align="right" valign="top" class="arl9"><strong>Short Description  : </strong></td>
          <td><textarea name="caption" cols="40" rows="4" id="caption"><?=$ulink_row[ad_desc]?>
          </textarea></td>
        </tr>
        <tr>
          <td width="170" align="right"><span class="arl9"><strong>URL to be redirected : </strong></span></td>
          <td><input name="url" type="text" id="url" value="<?=$ulink_row[ad_refers]?>" size="50"></td>
        </tr>
        <tr>
          <td width="170" align="right"><span class="arl9"><strong>Re-Select Category  : </strong></span></td>
          <td><select name="category">
		  <?php
		  	$ssql = "select * from tbl_sub_category where scategory_id = '$ulink_row[ad_category]'";
			$sresult = mysql_query($ssql) or die(mysql_error());
			$srow = mysql_fetch_array($sresult);
			print "<option value=$srow[scategory_id] selected>$srow[s_name]</option>";
		  ?>
            <?php
		  	$sql = "select * from tbl_sub_category order by s_name";
			$result = mysql_query($sql) or die(mysql_error());
			while ($row = mysql_fetch_array($result))
			{
				print "<option value=$row[scategory_id]>$row[s_name]</option>";
			}
		  ?>
          </select></td>
        </tr>
        <tr>
          <td><input name="id" type="hidden" id="id" value="<?=$ulink_row[ad_id]?>"></td>
          <td><input name="update" type="submit" id="update" value="Update >>"></td>
        </tr>
      </form>
    </table></td>
  </tr>
</table>	
<?php
  }
  else
	if (isset($num_of_rows))
	{
?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="25%" valign="top"><?php include("../include_left.php"); ?></td>
      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="5" align="center" bordercolorlight="#C0C0C0">
        <tr>
          <td align="center"><DIV align="center">              <font color="#006600" size="5"><b><font color="#006600" size="5"><b><font color="#006600" size="5"><b><font face="Arial, Helvetica " color="#AA0000">Sponsor</font></b></font><FONT face="Arial, Helvetica " color="#AA0000"> Ads  Updated Successfully. </FONT></b></font></b></font></DIV>
          </td>
        </tr>
        <tr>
          <td align="center"><a href="update_sponsor_ad.php" class="arl9">Go Back to Update Panel</a></td>
        </tr>
      </table></td>
    </tr>
</table> 
<?php } else { ?> 
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
   <tr>
     <td width="25%" valign="top"><?php include("../include_left.php"); ?></td>
     <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="5" align="center" bordercolorlight="#C0C0C0">
       <tr>
         <td colspan="2"><font color="#006600" size="5"><b><font face="Arial, Helvetica " color="#AA0000">Update </font><font color="#006600" size="5"><b><font color="#006600" size="5"><b><font face="Arial, Helvetica " color="#AA0000">Sponsor</font></b></font><FONT face="Arial, Helvetica " color="#AA0000"> Ads </FONT></b></font></b></font></td>
       </tr>
       <tr>
         <td colspan="2"><?php
include("../include_connect_database.php");
?></td>
       </tr>
       <tr>
         <form action="../add_sponsor_ad.php" method="post" name="add_ad" id="add_ad">
           <td width="232"><font face="Arial, Helvetica " size="2">Add Useful Links :</font></td>
           <td width="368"><input name="add_ad" type="submit" id="add_ad" value="add  >>"></td>
         </form>
       </tr>
       <tr>
         <td colspan="2"><?php	
			$num_per_page=10; 
			if (!isset($page_number))
				$page_number = 1;
			else
				$page_number++;
			// print $page_number."->";
			
			$start_record=(($page_number * $num_per_page) - $num_per_page); 
			// print $start_record."->";
			$total_sql = "select * from tbl_ads";
			$total_result = mysql_query($total_sql);
			$total_rows = mysql_num_rows($total_result);
			
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
         <td colspan="2"><table width="100%"  border="1" cellspacing="0" cellpadding="2" style="border:1px solid green">
             <form action="<?php print $_SERVER['../PHP_SELF']; ?>" method="post" name="delete_selected" id="delete_selected">
               <?php
	  	$ulink_sql = "select * from tbl_ads limit $start_record,$num_per_page";
		$ulink_result = mysql_query($ulink_sql) or die(mysql_error());
		while($row = mysql_fetch_array($ulink_result))
		{
			$c_sql = "select s_name from tbl_sub_category where scategory_id='$row[ad_category]'";
			$c_result = mysql_query($c_sql) or die("Oops!!!");
			$c_row = mysql_fetch_array($c_result);
			
			print '<tr class=arl9>';
			print '<td width=9><img src="../pictures/but.gif" width="9" height="9"></td>';
			print '<td>'.$row[ad_caption].'</td>';
			print '<td><font color=blue>['.$c_row[s_name].']</font></td>';
			print '<td><a href="update_sponsor_ad.php?action=update&ad_id='.$row[ad_id].'">update &raquo;</a></td>';
			print '<td><input type=checkbox name=array[] value='.$row[ad_id].'></td>';
		  	print '</tr>';
		}
	?>
               <tr>
                 <td colspan="4" align="right" style="border:0px"><input name="submit" type="submit" id="submit" value="Delete Selected">
                 </td>
               </tr>
             </form>
         </table></td>
       </tr>
     </table></td>
   </tr>
</table>
 <?php } ?>
<table width="500" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
    <td> 
      <div align="right"> 
        <hr noshade color="#006600">
      </div>
    </td>
  </tr>
  <tr> 
    <td> 
      <div align="center">|| <a href="../logout.php"><font face="Arial, Helvetica " size="2"><b>LOGOUT</b></font></a> 
        || <a href="../index.php"><font face="Arial, Helvetica " size="2"><b>RE-LOGIN</b></font></a> 
        || <a href="../admin.php"><font face="Arial, Helvetica " size="2"><b>ADMIN PAGE </b></font></a><a href="../admin.php%3Cb%3E%3Cfont%20face="Arial, Helvetica" size="2"></font></b></a> ||</div>
    </td>
  </tr>
</table>
<hr noshade color="#006600">
<div align="center"><font face="Arial, Helvetica " size="2" >Copyright 
  © : 2001-2004 viewnepal.net<br>
  All rights reserved  </font> </div>
</body>
</html>