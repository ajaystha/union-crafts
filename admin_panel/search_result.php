<?
	session_save_path('../tmp');
	session_start();
	if (!session_is_registered("atijoras"))
		header("Location: index.php");
?>
<?php
	$myParam="";
	foreach ($_POST as $key => $val) 
	{
		$val = preg_replace("/^\r\n+/","",$val);
		$val = str_replace('\"','"',$val);
		$$key = str_replace("\'","'",$val);
		$myParam.=$key."=".$val."&";
	}
	foreach ($_GET as $key => $val) 
	{
		$val = preg_replace("/^\r\n+/","",$val);
		$val = str_replace('\"','"',$val);
		$$key = str_replace("\'","'",$val);
		$myParam.=$key."=".$val."&";
	}

	include("include_connect_database.php.inc");
	$str ="Saroj";
	$str .=" Shrestha";
	//print $str;
	
	$sql = "select * from tbl_vehicle where approve=1 AND ";
	
	if ($makers != "0")
	{
		$sql .="brand='$makers' AND ";
	}
	
	if ($models != "0")
	{
		$sql .="model='$models' AND ";
	}
	
	if ($color != "0")
		$sql .= "color='$color' AND ";
	
	if ($location != "0")
	{
		$sql .="stock_location='$location' AND ";
	}

	if ($min_price == "0")
		$min_price = 0;
		
	if ($max_price == 0)
		$max_price = 1000000;
		
	$sql .= "price BETWEEN $min_price AND $max_price AND ";
	
	if ($min_year == 0)
		$min_year  = "1920";
		
	if ($max_year == 0)
		$max_year  = "2005";
	
	$t_sql = $sql."mfg_year BETWEEN $min_year AND $max_year";
	
	if ($sort_order == 1)
		$sort_order = " order by brand asc";
	else
	if ($sort_order == 2)
		$sort_order = " order by price asc";
	else
	if ($sort_order == 3)
		$sort_order = " order by vid desc";
	else
	if ($sort_order == 3)
		$sort_order = " order by entry_date desc";
		
	$t_sql .=$sort_order;
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Search Vehicle List</title>
<link href="../cms/joras/myStyle.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("header.inc.php"); ?></td>
  </tr>
  <tr>
    <td>
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="200" valign="top"><?php 
			if(!session_is_registered("joras"))
				include("include_left.inc.php"); 
			else
				include("../cms/member_include_left.inc.php");
		?></td>
          <td valign="top">
            <table width="98%"  border="0" align="center" cellpadding="5" cellspacing="0">
              <tr>
                <td class="mediumblue">
				  <strong>
				  <?php
				$num_rec_show=10;
				if(!isset($offset))
					$offset=1;
				else
					$offset++;
				//$t_sql = "select vid from tbl_vehicle where make='$makers' AND model='$models' AND stock_location='$location' AND price BETWEEN $min_price AND $max_price AND mfg_year BETWEEN $min_year AND $max_year AND approve='1' and show_catalogue='yes' $sort_order";
				//print $t_sql;
				$t_result = mysql_query($t_sql) or die ("Could not execute the query.");
				$total_rows = mysql_num_rows($t_result);
				
				$first_offset=($offset-1)*$num_rec_show;
				$last_offset=$num_rec_show;
				$sql=$t_sql." LIMIT $first_offset, $last_offset";
				$sql_result = mysql_query($sql)
					or die("Could not execute the query to list the make.");
				
				if($total_rows==0)
					$show_first_offset=$first_offset;
				else
					$show_first_offset=$first_offset + 1;
					
				if($first_offset + $num_rec_show <= $total_rows)
					$show_last_offset=$first_offset + $num_rec_show;
				else
					$show_last_offset = $total_rows;
				$show_last_offset=
				print "Showing Vehicle(s): " . $show_first_offset . " - " .  $show_last_offset . " of " . $total_rows;
			?></strong></td>
              </tr>
            </table>			
            <TABLE width="98%" border=0 align="center" cellPadding="1" cellSpacing="3">
             <?php
			 	$i = 1;
			 	while ($row = mysql_fetch_array($sql_result))
				{
					if (($i%2)==0)
					{
						print '<TR bgColor="#D1D1D1">';
					}
					else
					{
						print '<TR bgColor="#F3F3F3">';
					}
					$i++;
			 ?>
			<TD width="100%" height=50>
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
                <TD align=right class="smallblack">Price -                    <?php print $row['price']." US$";?></TD>
              </TR>
            </TABLE></td>
			</tr>
			<tr><td height="10"><spacer type="block" height="1"></td></tr>
			<TR>
			  <TD align=center width=135><A href="../cms/search_detail_info.php?vid=<?php print $row['vid'];?>">
			    <?php
				$img1="upload_images/small_pics/".$row['vid']."_a.jpg";
				if(file_exists($img1))
				{
					if ($row[is_sold] == 'yes')
						$imgText1="<img src='../img.php?imgfile=".$img1."&text=SOLD' alt=\"Click here to view details\" border=1 width=130 height=98 style='border:1px solid #FFFFFF'>";
					else
						$imgText1="<img src='$img1' alt=\"Click here to view details\" border=1 width=130 height=98 style='border:1px solid #FFFFFF'>";
				}
				else
				{
					$img="upload_images/small_pics/no_pic_small.jpg";
					if ($row[is_sold] == 'yes')
						$imgText1="<img src='../img.php?imgfile=".$img."&text=SOLD' alt=\"Click here to view details\" border=1 width=130 height=98 style='border:1px solid #FFFFFF'>";
					else
						$imgText1="<img src='../upload_images/small_pics/no_pic_small.jpg' alt=\"Click here to view details\" border=1 width=130 height=98 style='border:1px solid #FFFFFF'>";
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
			?></FONT></TD>
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
			<TD><A href="../search_detail_info.php?vid=<?php print $row['vid'];?>" target="_blank">
			<IMG src="../pictures/more.gif" alt="Click to View Details" width="73" height="17" border=0></A></TD>
			<TD align=right><FONT class=mediumnavy><b>S.No.:</B></font> <font class="mediumnavy"><?=$row[serial_key]?></FONT></TD>
			</TR>
			</TABLE></TD>
			</TR>
			</TABLE></TD>
			</TR>
			</TABLE>
			</TD>
			</tr>
			<?php } ?>
			</TABLE>
			<table width="98%"  border="0" align="center" cellpadding="5" cellspacing="0">
              <tr>
                <td align="right" class="smallnavy">
				<?php
					// print $offset."-->";;
					if($offset>1)
					{
						$previous_offset=$offset-2;		
						print "<a href='search_result.php?".$myParam."offset=$previous_offset' class='nav'>&laquo; Previous </a>";
					}
					
					/////////////////////////////////////////////
					if($total_rows>$num_rec_show)
					{
						for($i=1;$i<=ceil($total_rows/$num_rec_show);$i++)
						{
							if($i==$offset)
							{
								$show_i=$i-1;
								print " | <a href='search_result.php?".$myParam."offset=$show_i' class='nav'><font color='#FF0000'>$i</font></a>"; 
							}
							else
							{	
								$show_i=$i-1;
								print " | <a href='search_result.php?".$myParam."offset=$show_i' class='nav'>$i</a>"; 
							}
						}
					}
					/////////////////////////////////////////////
					
					$first_offset=$offset * $num_rec_show;
					$last_offset = $num_rec_show;
					if ($offset*$num_rec_show<$total_rows)
						print " | <a href='search_result.php?".$myParam."offset=$offset' class='nav'>Next &raquo;</a>";
?></td>
              </tr>
            </table>
          </td>
       	</tr>
          </table>
    </td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td><?php include("footer.inc.php"); ?></td>
  </tr>
</table>
</body>
</html>