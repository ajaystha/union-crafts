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
		
		if (isset($_GET[mem_id]))
		{
			$mem_id = $_GET[mem_id];			
		}
		else
		{
			//print "here";
			print '<script language="javascript"><!-- alert("There is no member selected to be approved.");--></script>';
		}
			
		//print $vid;
		if ($action == "del")
		{
			$ch_sql = "select * from tbl_member where mem_id='$mem_id'";
			$ch_result = mysql_query($ch_sql);
			
			if (mysql_num_rows($ch_result) <= 0)
				$error = 5;
			else
			{
				$delete_sql = "delete from tbl_member where mem_id='$mem_id'";
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
			$update_sql = "update tbl_member set approve='yes' where mem_id='$mem_id'";
			// print $update_sql;
			// exit();
			$update_result = mysql_query($update_sql);
			if ($update_result)
			{				
				$sql = "select * from tbl_member where mem_id='$mem_id'";
				$result = mysql_query($sql) or die("could not retrieve the member detail.");
				$recordset = mysql_fetch_array($result);
				
				$n_name = $recordset['fname']." ".$recordset['lname'];
				$password = decrypt($recordset['password']);
				$login = $recordset['login'];
				
				$msg = '<p>Thank you for registering with <a href="http://www.grishaauto.com">Grisha Auto</a>. Now that you are a member of the GrishaAuto.com, you have now the privilege to add, sell and view prices from other users. Vehicles regarding New and Second Hand are now available with the log in information.</p><p>To start using your account,<br><a href="http://www.grishaauto.com/login.php">Click here</a> to log in.</p>	<p> Your account name is ';
				$msg.= $login; 
				$msg.='<br>your password is ';
				$msg.= $password; 
				$msg.= '</p><p>With Regards,<br>The Grisha Auto Team.</p><p>PS. None of the information you have posted with Grishaauto.com will be provided to any of the parties.</p>';	
			
				$main_message = '<table width="100%"  border="0" cellpadding="0" cellspacing="0" class="txtbox_1">
			  <tr>
				<td class="smalldarkgrey">Dear '.$n_name.'</td>
			  </tr>
			  <tr>
				<td class="smalldarkgrey">'.$msg.'</td>
			  </tr>
			</table>';
				
				/* To send HTML mail, you can set the Content-type header. */
				$headers  = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
				
				/* additional headers */
				$to = $recordset[email];
				$subject = 'New member details from grishaauto.com';
				$headers .= "From: The GrishaAuto Team<info@grishaauto.com>\r\n";
				mail($to, $subject, $main_message, $headers);
				//print $to;
				
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
								case 1 : $nmsg = "The member has been successfully removed without being approved.";
									break;
								case 2 : $nsmg = "Sorry, the member could not be deleted. Please try again later.";
									break;
								case 3 : $nmsg = "The member has been approved.";
									break;
								case 4 : $nmsg = "Sorry, the member  could not be approved.";
									break;
								default : $nmsg = "It seems that the member doesn't exists.";
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
            <td class="phone">Vehicle Approval List</td>
          </tr>
          <tr>
            <td>
              <table width="100%"  border="0">
                <tr align="center" class="goldbg">
                  <td><span class="formText">S.No.</span></td>
                  <td><span class="formText">Name</span></td>
                  <td><span class="formText">Home Phone</span></td>
                  <td><span class="formText">Email</span></td>
                  <td><span class="formText">Country</span></td>
                  <td><span class="formText">Options</span></td>
                </tr>
                <?php
			  	$a_sql = "select * from tbl_member where approve='no' order by mem_id asc";
				$a_result = mysql_query($a_sql) or die(mysql_error());
				if (mysql_num_rows($a_result) <= 0)
				{
					print "<tr><td colspan=5 height=50><font color=red>No members to be approved.</font></td></tr>";
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
                  <td align="left"><a href="../member.php?mem_id=<?=$a_row[mem_id]?>" target="_blank">
                          <?=$a_row[fname]?>
                          <?=$a_row[lname]?>
                  </a></td>
                  <td align="center">
                    <?=$a_row[home_phone]?>
                  </td>
                  <td align="left"><?=$a_row[email]?></td>
                  <td align="center"><?=$a_row[country]?></td>
                  <td align="center"><table width="100%"  border="0" align="center" cellpadding="1" cellspacing="1">
                      <tr>
                        <td><a href="../cms/approve_member.php?mem_id=<?=$a_row[mem_id]?>&action=approve"><font color="#009900">Approve</font></a></td>
                        <td><a href="../cms/<?php print $_SERVER['PHP_SELF'];?>?mem_id=<?=$a_row[mem_id]?>&action=del"><font color="#FF0000">Delete</font></a></td>
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