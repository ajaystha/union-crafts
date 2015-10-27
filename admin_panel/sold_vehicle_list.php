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
	if (isset($_GET[action]) || isset($_POST[action]))
	{
		$action = $_GET[action];
		
		if (isset($_POST[action]))
			$action = $_POST[action];
		
		//print $action;
		
		if (isset($_GET[vid]))
		{
			$vid = $_GET[vid];			
		}
		if (isset($_POST[vid]))
		{
			$vid = $_POST[vid];
			print "The new vehicle id is $vid.";
		}
		else
		{
			//print "here";
			print '<script language="javascript"><!-- alert("There is no vehicle selected to be approved.");--></script>';
		}
			
		//print $vid;
		if ($action == "del")
		{
			$ch_sql = "select * from tbl_vehicle where vid='$vid'";
			$ch_result = mysql_query($ch_sql);
			
			if (mysql_num_rows($ch_result) <= 0)
				$error = 5;
			else
			{
				$delete_sql = "delete from tbl_vehicle where vid='$vid'";
				$delete_result = mysql_query($delete_sql);
				if ($delete_result)
				{				
					$error = 1;
					/*****************************************************
					The uploaded images will be deleted as soon as the 
					vehicle is disapproved by the administrator.
					*****************************************************/
					
					if (file_exists("../upload_images/small_pics/".$vid."_a.jpg"))
					{
						unlink("../upload_images/small_pics/".$vid."_a.jpg");
					}
					if (file_exists("../upload_images/small_pics/".$vid."_b.jpg"))
					{
						unlink("../upload_images/small_pics/".$vid."_b.jpg");
					}
					if (file_exists("../upload_images/small_pics/".$vid."_c.jpg"))
					{
						unlink("../upload_images/small_pics/".$vid."_c.jpg");
					}
					/**********************************************************************/
					if (file_exists("../upload_images/large_pics/".$vid."a.jpg"))
					{
						unlink("../upload_images/large_pics/".$vid."a.jpg");
					}
					if (file_exists("../upload_images/large_pics/".$vid."b.jpg"))
					{
						unlink("../upload_images/large_pics/".$vid."b.jpg");
					}
					if (file_exists("../upload_images/large_pics/".$vid."c.jpg"))
					{
						unlink("../upload_images/large_pics/".$vid."c.jpg");
					}
					/*************************************************************************/
					if (file_exists("../upload_images/rate_pics/".$vid.".jpg"))
					{
						unlink("../upload_images/rate_pics/".$vid.".jpg");
					}
				}
				else
				{				
					$error = 2;
				}
			}
		}
		else
		if ($action == "approve")
		{			
			$new = $_POST[show_new];
			$used = $_POST[used];
			$sale = $_POST[sale];
			
			if (!isset($new))
				$new = 'no';
			if (!isset($used))
				$used = 'no';
			if (!isset($sale))
				$sale = 'no';
			
			$update_sql = "update tbl_vehicle set approve='1', show_used='$used', show_new='$new', show_sell='$sale' where vid='$vid'";
			//print $update_sql;
			//exit();
			$update_result = mysql_query($update_sql);
			if ($update_result)
			{
				$error = 3;
			}
			else
			{
				$error = 4;
			}
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
		<?php
			if (isset($error))
			{
		?>
		<table width="95%"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#CC0000">
			<table width="100%"  border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#FDE9E8"><table width="100%"  border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td align="center">
						<?php
							switch($error)
							{
								case 1 : $nmsg = "The vehicle has been successfully removed without being approved.";
									break;
								case 2 : $nsmg = "Sorry, the vehicle could not be deleted. Please try again later.";
									break;
								case 3 : $nmsg = "The vehicle has been approved.";
									break;
								case 4 : $nmsg = "Sorry, the vehicle  could not be approved.";
									break;
								default : $nmsg = "It seems that the vehicle doesn't exists.";
									break;
							}
							print $nmsg;
						?>					</td>
                  </tr>
                </table></td>
              </tr>
            </table>
			</td>
          </tr>
        </table>
		<?php }?><table width="95%"  border="0" align="center" cellpadding="5" cellspacing="1">
          <tr>
            <td class="phone">Sold Vehicle List</td>
          </tr>
          <tr>
            <td>
              <table width="100%"  border="0">
                <tr align="center" class="goldbg">
                  <td><span class="formText">S.No.</span></td>
                  <td><span class="formText">Vehicle Model</span></td>
                  <td><span class="formText">Posted by</span></td>
                  <td><span class="formText">Posted on </span></td>
                  </tr>
                <?php
			  	$a_sql = "select * from tbl_vehicle where is_sold='yes' and approve=1";
				$a_result = mysql_query($a_sql) or die(mysql_error());
				if (mysql_num_rows($a_result) <= 0)
				{
					print "<tr><td colspan=5><font color=red>No vehicles are sold.</font></td></tr>";
				}
				$i = 1;
				while ($a_row = mysql_fetch_array($a_result))
				{
					if ($i%2 ==0)
						$bgColor="#FFFBF0";
					else
						$bgColor = "#F0F0F0";
			  ?>
                <form action="" method="post" name="approve<?=$i?>" class="style1" id="approve<?=$i?>" onSubmit="goTo('approve_vehicle.php?vid=<?=$a_row[vid]?>');">				
				<tr align="center" valign="top" bgcolor="<?=$bgColor?>">
                  <td align="center"><?=$a_row[serial_key]?></td>
                  <td align="left"><p><a href="../search_detail_info.php?vid=<?=$a_row[vid]?>" target="_blank">
                      <?=$a_row[brand]?>
                      <?=$a_row[model]?>
        [
        <?=$a_row[make]?>
        ]</a></p>
                    </td>
                  <td align="center">
                    <?php
						$mem_id = $a_row[mem_id];
						$mem_sql = "select fname, lname from tbl_member where mem_id='$mem_id'";
						$mem_result = mysql_query($mem_sql) or die(mysql_error());
						$mem_row = mysql_fetch_array($mem_result);
						if ($mem_id == 0)
							print "Administrator";
						else
							print $mem_row[fname]." ".$mem_row[lname];
					?>
                  </td>
                  <td align="center">
                    <?php
						$date = $a_row[entry_date];
						list ($year, $month, $day) = explode("-", $date);
						// print $month."-->";print $day."-->";print $year."-->";
						echo date ("F d, Y", mktime(0,0,0,$month,$day,$year));						
					?></td>
                  </tr>
				<SCRIPT language="JavaScript">
					function submitform<?=$i?>() {
						//alert('here');
						document.approve<?=$i?>.submit();
					}
					function goTo(loc)
					{
						newURL="edit_vehicle.php"+"?vid="+loc;
						alert(newURL);
						window.location = newURL;
					}
				</SCRIPT>                
				</form>
				<?php
			  	$i++;
			  	}
			  ?>
              </table>
           </td>
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