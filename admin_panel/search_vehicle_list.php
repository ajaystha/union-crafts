<?
	session_save_path('../tmp');
	session_start();
	if (!session_is_registered("atijoras"))
		header("Location: index.php");
?>
<?php include("include_connect_database.php.inc");?>
<?php
	$serial_key = $_POST['serial_key'];
	//print $serial_key."==";
	$sql = "select * from tbl_vehicle where serial_key='$serial_key'";
	$result = mysql_query($sql) or die(mysql_error());	
	$num = mysql_num_rows($result);
	if ($num <=0)
	{
		header("Location: search_vehicle.php?error=on");
	}
?>
<html>
<head>
<title>Administration Section</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../joras/myStyle.css" rel="stylesheet" type="text/css">
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
			$row = mysql_fetch_array($result);
			
		?>
		<TABLE cellSpacing=0 cellPadding=2 width="100%" border=0>
          <tr>
            <td colspan="2"><TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                <TR>
                  <TD height=25 colspan=""><STRONG><FONT class=smallblack>
                    <?php 
			print $row['brand'];
			print ' ';
			print $row['model'];
			print ' - ';
			print $row['mfg_year'];
			print ' ['.$row['make'].']';
			?>
                  </FONT></STRONG> </TD>
                  <TD align=right class="smallblack">Price -
                      <?php print $row['price']." US$";?>
                  </TD>
                </TR>
            </TABLE></td>
          </tr>
          <tr>
            <td height="10"><spacer type="block" height="1"></td>
          </tr>
          <TR>
            <TD align=center width=135><A href="../cms/search_detail_info.php?vid=<?php print $row['vid'];?>">
              <?php
				/*
				$img1="upload_images/small_pics/".$row['vid']."_a.jpg";
				if(file_exists($img1))
					$imgText1="<img src='$img1' alt=\"Click here to view details\" border=1 width=130 height=98 style='border:1px solid #FFFFFF'>";
				else
					$imgText1="<img src='upload_images/small_pics/no_pic_small.jpg' alt=\"Click here to view details\" border=1 style='border:1px solid #FFFFFF'>";		
				print $imgText1;
				*/
				$img1="../upload_images/small_pics/".$row['vid']."_a.jpg";
				if(file_exists($img1))
				{
					if ($row[is_sold] == 'yes')
						$imgText1="<img src='../img.php?imgfile=".$img1."&text=SOLD' alt=\"Click here to view details\" border=1 width=130 height=98 style='border:1px solid #FFFFFF'>";
					else
						$imgText1="<img src='$img1' alt=\"Click here to view details\" border=1 width=130 height=98 style='border:1px solid #FFFFFF'>";
				}
				else
				{
					$img="../upload_images/small_pics/no_pic_small.jpg";
					if ($row[is_sold] == 'yes')
						$imgText1="<img src='../img.php?imgfile=".$img."&text=SOLD' alt=\"Click here to view details\" border=1 width=130 height=98 style='border:1px solid #FFFFFF'>";
					else
						$imgText1="<img src='$img' alt=\"Click here to view details\" border=1 width=130 height=98 style='border:1px solid #FFFFFF'>";
				}
				print $imgText1;
			?>
            </A></TD>
            <TD vAlign=top>
              <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                <TR>
                  <TD height="80" vAlign=top>
                    <TABLE cellSpacing=1 cellPadding=1 width="100%" border=0>
                      <TR>
                        <TD width="45%"><TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                            <TR>
                              <TD width=90><FONT class=smallblack>Stock Location</FONT></TD>
                              <TD width=10><FONT class=smallblack>:</FONT></TD>
                              <TD><FONT class=smallorange>
                                <?php
			print $row['stock_location'];
			?>
                              </FONT></TD>
                            </TR>
                        </TABLE></TD>
                        <TD><TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                            <TR>
                              <TD width=80><FONT class=smallblack>Chassis #</FONT></TD>
                              <TD width=10><FONT class=smallblack>:</FONT></TD>
                              <TD><FONT class=smallorange>
                                <?php
			print $row['chassis_no'];
			?>
                              </FONT></TD>
                            </TR>
                        </TABLE></TD>
                      </TR>
                      <TR>
                        <TD width="40%"><TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                            <TR>
                              <TD width=90><FONT class=smallblack>Mfg. Year</FONT></TD>
                              <TD width=10><FONT class=smallblack>:</FONT></TD>
                              <TD><FONT class=smallorange>
                                <?php
			print $row['mfg_year'];
			?>
                              </FONT></TD>
                            </TR>
                        </TABLE></TD>
                        <TD><TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                            <TR>
                              <TD width=80><FONT class=smallblack>Transmission</FONT></TD>
                              <TD width=10><FONT class=smallblack>:</FONT></TD>
                              <TD><FONT class=smallorange>
                                <?php
			print $row['transmission'];
			?>
                              </FONT></TD>
                            </TR>
                        </TABLE></TD>
                      </TR>
                      <TR>
                        <TD><TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                            <TR>
                              <TD width=90><FONT class=smallblack>Color</FONT></TD>
                              <TD width=10><FONT class=smallblack>:</FONT></TD>
                              <TD><FONT class=smallorange>
                                <?php
			print $row['color'];
			?>
                              </FONT></TD>
                            </TR>
                        </TABLE></TD>
                        <TD><TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                            <TR>
                              <TD width=80><FONT class=smallblack>Fuel Type</FONT></TD>
                              <TD width=10><FONT class=smallblack>:</FONT></TD>
                              <TD><FONT class=smallorange>
                                <?php
			print $row['fuel_type'];
			?>
                              </FONT></TD>
                            </TR>
                        </TABLE></TD>
                      </TR>
                      <TR>
                        <TD><TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                            <TR>
                              <TD width=90><FONT class=smallblack>Mileage (KM)</FONT></TD>
                              <TD width=10><FONT class=smallblack>:</FONT></TD>
                              <TD><FONT class=smallorange>
                                <?php
			print $row['mileage'];
			?>
                              </FONT></TD>
                            </TR>
                        </TABLE></TD>
                        <TD><TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                            <TR>
                              <TD width=80><FONT class=smallblack>Engine CC</FONT></TD>
                              <TD width=10><FONT class=smallblack>:</FONT></TD>
                              <TD><FONT class=smallorange>
                                <?php
			print $row['engine_cc'];
			?>
                              </FONT></TD>
                            </TR>
                        </TABLE></TD>
                      </TR>
                  </TABLE></TD>
                </TR>
                <TR>
                  <TD height=20><TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                      <TR>
                        <TD><A href="../search_detail_info.php?vid=<?php print $row['vid'];?>" target="_blank"> <IMG src="../pictures/more.gif" alt="Click to View Details" width="73" height="17" border=0></A></TD>
                        <TD align=right><FONT class=mediumnavy><b>S.No.:</B></font> <font class="mediumnavy">
                          <?=$row[serial_key]?>
                        </FONT></TD>
                      </TR>
                  </TABLE></TD>
                </TR>
            </TABLE></TD>
          </TR>
        </TABLE></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><?php include("footer.inc.php");?></td>
  </tr>
</table>
</body>
</html>
