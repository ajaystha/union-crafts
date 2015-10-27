<?php include("include_connect_database.php.inc");?>
<?php include("return_date.php");?>
<?php
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
	
	$description = ereg_replace (" ", "%", $description);
	$sql = "select * from tbl_product where ";
	
	if ($description != "" && $product_code == "")
	{
		$sql .="product_description like '%$description%' OR product_name like '%$description%'";
	}
	else
	if ($description != "")
	{
		$sql .="product_description like '%$description%' OR product_name like '%$description%' AND ";
	}
	
	if ($product_code != "" && $description == "" && $product_type == "")
	{
		$sql .="prod_key='$product_code'";
	}
	else
	if ($product_code != "" && $description == "" && $product_type != "")
	{
		$sql .="prod_key='$product_code' AND ";
	}
	
	if ($product_type != "")
		$sql .= "category_id='$product_type'";
		
	// print $sql;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML><HEAD>
<TITLE>UnionCrafts - Find Nepalese Handicrafts; collection of Silver, Metal, Paper &amp;  Wooden Crafts</TITLE>
<meta name="keywords" content="union, union crafts, Silver products, Metal Crafts, Paper Crafts, Nepalese Antiques, handicrafts, handmade crafts, Beads, Wooden Masks. wholsaler, exporter of handicrafts, nepalese handmade crafts, nepalese handicrafts market, online crafts catalog, handicrafts online, online handicraft exporter, Nepal, Kathmandu, Thamel, silver jewellery, ornaments, handicraft business, trade, wholesale suppliers, bulk purchasing, wooden incense holders, wooden pipes, glass pipes, necklaces, bangles, singing bowls, Nepali handmade goods, handicraft collections, gallery, Trade leads, Trade opportunities, handicraft information, exhibitions, export nepalese handicrafts,  online antiques items, handicraft manufacturer, customers demand designs, trade fairs information">

<meta name="description" content="UnionCrafts.com; it all began during a union of friends – each with a background related to tourism industry and eager to venture into a fresh endeavor">

<style type="text/css">
<!--
.style1 {color: #99FF00}
-->
</style>
<link href="joras/myStyle.css" rel="stylesheet" type="text/css">
</HEAD>
<body>
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("mast_head.php");?></td>
  </tr>
  <tr>
    <td><table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><?php include("header.php");?></td>
      </tr>
      <tr>
        <td><table width="780"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="200" valign="top"><table width="95%"  border="0" align="center" cellpadding="0" cellspacing="0">
			<?php
				$date_sql = "select * from tbl_last_updated";
				$date_result = mysql_query($date_sql) or die(mysql_error());
				$date_rs = mysql_fetch_array($date_result);
			?>
              <tr>
                <td height="30" align="center" bgcolor="#FFFFFF" class="smalldarkgrey"><em>last updated - <?=return_date($date_rs['date'])?></em></td>
              </tr>
              <tr>
                <td><?php include("product_category_list.php");?></td>
              </tr>
              <tr bgcolor="#F2F2F2">
                <td height="20" bgcolor="#FFFFFF"><spacer></spacer></td>
              </tr>
              <tr>
                <td><?php include("news_and_events_list.php");?></td>
              </tr>
              <tr bgcolor="#F2F2F2">
                <td height="20" bgcolor="#FFFFFF"><spacer></spacer></td>
              </tr>
              <tr>
                <td><?php include("faqs_list.php");?></td>
              </tr>
              <tr bgcolor="#F2F2F2">
                <td height="10" bgcolor="#FFFFFF"><spacer></spacer></td>
              </tr>
            </table>
              </td>
            <td valign="top">
			<table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="30"><span class="smenu">Search Results</span></td>
              </tr>
              <tr>
                <td class="smalltext"><?php
						$num_rec_show=20;
						
						if(!isset($offset))
							$offset=1;
						else
							$offset++;						
						
						// print $sql;
						$t_result = mysql_query($sql) or die(mysql_error());//("Could not execute the query.");
						$total_rows = mysql_num_rows($t_result);
						
						$first_offset=($offset-1)*$num_rec_show;
						$last_offset=$num_rec_show;
						$sql=$sql." LIMIT $first_offset, $last_offset";
						// print $sql;
						$sql_result = mysql_query($sql)
							or die(mysql_error());//"Could not execute the query to list the make.");
						
						if($total_rows==0)
							$show_first_offset=$first_offset;
						else
							$show_first_offset=$first_offset + 1;
							
						if($first_offset + $num_rec_show <= $total_rows)
							$show_last_offset=$first_offset + $num_rec_show;
						else
							$show_last_offset = $total_rows;
						$show_last_offset=
						print "Showing Search result(s): " . $show_first_offset . " - " .  $show_last_offset . " of " . $total_rows;
			?></td>
              </tr>
              <tr>
                <td class="smalltext"><table width="100%"  border="0" cellspacing="2" cellpadding="0">
                  <tr>
                    <?php
						$i = 1;
						while ($featured_row = mysql_fetch_array($sql_result))
						{
							$description = ereg_replace ("%", " ", $description);
				?>
                    <td width="33%" bgcolor="#FFFFE8" onmouseover="this.bgColor='#F4F4F4'" onmouseout="this.bgColor='#FFFFE8'">
                      <table width="100%"  border="0" cellspacing="0" cellpadding="2">
                        <tr>
                          <td height="19" class="smallblue"><strong><?php echo $i; ?></strong> <a href="product_in_detail.php?product_id=<?=$featured_row['prod_key']?>" class="smallblue"><?=ereg_replace(ucfirst($description), "<span class=highlight>".ucfirst($description)."</span>", ucfirst($featured_row['product_name']))?></a></td>
                        </tr>
                        <tr>
                          <td class="smallblack"><?=ereg_replace(strtolower($description), "<span class=highlight>".strtolower($description)."</span>", strtolower($featured_row['product_description']))?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td height="10"><spacer></spacer></td>
                  </tr>
                  <tr>
                    <?php 
						$i++;
					}?>
					</table></td>
              </tr>
              <tr>
                <td class="smallred"><?php
					// print $offset."-->";;
					if($offset>1)
					{
						$previous_offset=$offset-2;		
						print "<a href='search.php?".$myParam."offset=$previous_offset' class='smallred'>&laquo; Previous</a> ";
					}
					
					/////////////////////////////////////////////
					if($total_rows>$num_rec_show)
					{
						for($i=1;$i<=ceil($total_rows/$num_rec_show);$i++)
						{
							if($i==$offset)
							{
								$show_i=$i-1;
								print " | <a href='search.php?".$myParam."offset=$show_i' class='smallred'><font color='#FF0000'>$i</font></a>"; 
							}
							else
							{	
								$show_i=$i-1;
								print " | <a href='search.php?".$myParam."offset=$show_i' class='smallred'>$i</a>"; 
							}
						}
					}
					/////////////////////////////////////////////
					
					$first_offset=$offset * $num_rec_show;
					$last_offset = $num_rec_show;
					if ($offset*$num_rec_show<$total_rows)
						print " | <a href='search.php?".$myParam."offset=$offset' class='smallred'>Next &raquo;</a>";
?></td>
              </tr>
              <tr bgcolor="#F2F2F2">
                <td height="10" bgcolor="#FFFFFF"><spacer></spacer></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><?php include("footer.php");?></td>
  </tr>
  <tr>
    <td><?php include("footer_mast.php");?></td>
  </tr>
</table>
</BODY></HTML>