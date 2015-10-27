<?
	session_save_path('../tmp');
	session_start();

	if (!session_is_registered("atijoras"))
	{
		header("Location: index.php");
	}
	include("../algorithm.php");
?>
<?php include("../include_connect_database.php.inc");?>
<?php
	if (isset($_GET[action]))
	{
		$action = $_GET[action];
				
		//print $action;
		
		if (isset($_GET[guide_id]))
		{
			$guide_id = $_GET[guide_id];			
		}
		else
		{
			//print "here";
			print '<script language="javascript"><!-- alert("There is no member selected to be approved.");--></script>';
		}
			
		//print $vid;
		if ($action == "del")
		{
			$ch_sql = "select * from tbl_vehicle_guide where guide_id='$guide_id'";
			$ch_result = mysql_query($ch_sql);
			
			if (mysql_num_rows($ch_result) <= 0)
				$error = 5;
			else
			{
				$delete_sql = "delete from tbl_vehicle_guide where guide_id='$guide_id'";
				$delete_result = mysql_query($delete_sql);
				if ($delete_result)
					$error = 1;
				else
					$error = 2;
			}
		}
		else
		if ($action == "approve")
		{
			$update_sql = "update tbl_vehicle_guide set approve='yes' where guide_id='$guide_id'";
			// print $update_sql;
			// exit();
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
<script language="javascript">
	function goTo(loc)
	{
		newURL="reply_guide.php"+"?guide_id="+loc;
		//alert(newURL);
		window.open(newURL,"","width=350,height=250,status=1");
	}
</script>
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
								case 1 : $nmsg = "The vehicle query has been successfully removed without being approved.";
									break;
								case 2 : $nsmg = "Sorry, the vehicle query could not be deleted. Please try again later.";
									break;
								case 3 : $nmsg = "The vehicle query has been approved.";
									break;
								case 4 : $nmsg = "Sorry, the member  could not be approved.";
									break;
								default : $nmsg = "It seems that the vehicle query doesn't exists.";
									break;
							}
							print $nmsg;
						?></td>
                  </tr>
                </table></td>
              </tr>
            </table>
			</td>
          </tr>
        </table>
		<?php }?><table width="95%"  border="0" align="center" cellpadding="5" cellspacing="1">
          <tr>
            <td class="phone">Vehicle Guide Approval List</td>
          </tr>
          <tr>
            <td align="right">[ <a href="delete_guide.php">VIEW AND DELETE LIST OF  GUIDES</a> ]</td>
          </tr>
          <tr>
            <td>
              <table width="100%"  border="0" cellpadding="5">
                <tr align="center" class="goldbg">
                  <td><span class="formText">S.No.</span></td>
                  <td><span class="formText">Name</span></td>
                  <td><span class="formText">Email</span></td>
                  <td><span class="formText">Question</span></td>
                  <td><span class="formText">Options</span></td>
                </tr>
                <?php
			  	$a_sql = "select * from tbl_vehicle_guide where approve='no' order by guide_id asc";
				$a_result = mysql_query($a_sql) or die(mysql_error());
				if (mysql_num_rows($a_result) <= 0)
				{
					print "<tr><td colspan=5 height=50><font color=red>No vehicle guide to be approved and answered.</font></td></tr>";
				}
				$i = 1;
				while ($a_row = mysql_fetch_array($a_result))
				{
					if ($i%2 ==0)
						$bgColor="#FFFBF0";
					else
						$bgColor = "#F0F0F0";
			  ?>
				<tr align="center" valign="top" bgcolor="<?=$bgColor?>">
                  <td align="center"><?=$i?></td>
                  <td align="left"><?=$a_row[name]?></td>
                  <td align="center">
                    <?=$a_row[email]?></td>
                  <td align="left"><?=$a_row[query]?> <strong><font color="#FF0000">[ <a href="javascript:goTo(<?=$a_row[guide_id]?>)"><font color="#FF0000">reply</font></a> ]</font></strong></td>
                  <td align="center"><table width="100%"  border="0" align="center" cellpadding="2" cellspacing="1">
                      <tr>
                        <td><a href="../cms/update_guide.php?guide_id=<?=$a_row[guide_id]?>&action=approve"><font color="#009900">Approve</font></a></td>
                        <td><a href="../cms/<?php print $_SERVER['PHP_SELF'];?>?guide_id=<?=$a_row[guide_id]?>&action=del"><font color="#FF0000">Delete</font></a></td>
                      </tr>
                  </table></td>
                </tr>
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