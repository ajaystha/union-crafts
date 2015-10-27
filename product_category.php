<?php include("include_connect_database.php.inc");?>
<?php include("return_date.php");?>
<?php
	$category_id = $_GET['category_id'];
	
	foreach ($_GET as $key => $val) 
	{
		$val = preg_replace("/^\r\n+/","",$val);
		$val = str_replace('\"','"',$val);
		$$key = str_replace("\'","'",$val);
	}
	
	$cat_sql = "select * from tbl_category where category_id='$category_id'";
	// print $cat_sql;
	$cat_result = mysql_query($cat_sql) or die(mysql_error());
	$category_rs = mysql_fetch_array($cat_result);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML><HEAD>
<TITLE><?=$category_rs['cat_name']?>, Products List - <?=$category_rs['cat_name']?>, UnionCrafts - Find Nepalese Handicrafts; collection of Silver, Metal, Paper &amp;  Wooden Crafts</TITLE>

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
                <td height="30"><span class="smenu"><?=$category_rs['cat_name']?></span></td>
              </tr>
              <tr>
                <td height="1" bgcolor="#000000"><spacer></spacer></td>
              </tr>
              <tr>
                <td class="smallblack"><?=$category_rs['description']?></td>
              </tr>
              <tr>
                <td height="10"><spacer></spacer></td>
              </tr>
              <tr>
                <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="30" class="smenu">Product Lists - <?=$category_rs['cat_name']?></td>
                  </tr>
                  <tr>
                    <td>
                      <table width="100%" height="1"  border="0" cellpadding="0" cellspacing="0" bgcolor="#F89700">
                        <tr>
                          <td><spacer></spacer></td>
                        </tr>
                    </table></td>
                  </tr>
				  <tr><td height="20" align="right" class="smallblack">
				  <?php
			$num_per_page=12;
			if (!isset($page_number))
				$page_number = 1;
			else
				$page_number++;
			
			$start_record=(($page_number * $num_per_page) - $num_per_page);			
			$total_sql = "select * from tbl_product where category_id=$category_id";
			$total_result = mysql_query($total_sql);
			$total_rows = mysql_num_rows($total_result);			
			
			if($page_number > 1)
			{
				$previous_page_number=$page_number-2;		
				print "<a class=smallblack href='".$_SERVER['PHP_SELF']."?category_id=$category_id&page_number=".$previous_page_number."'>&laquo; Previous</a>";
			}
							
			/////////////////////////////////////////////
			if($total_rows>$num_per_page)
			{
				for($i=1;$i<=ceil($total_rows/$num_per_page);$i++)
				{
					if($i==$page_number)
					{
						$show_i=$i-1;
						print " [ <a class=smallblack href='".$_SERVER['PHP_SELF']."?category_id=$category_id&page_number=$show_i'><strong><font color='maroon'>$i</font></strong></a> ]"; 
					}
					else
					{	
						$show_i=$i-1;
						print " [ <a class=smallblack  href='".$_SERVER['PHP_SELF']."?category_id=$category_id&page_number=$show_i'>$i</a> ]"; 
					}
				}
			}
			/////////////////////////////////////////////
			
			$first_page_number=$page_number * $num_per_page;
			$last_page_number = $num_per_page;
			if ($page_number*$num_per_page<$total_rows)
				print " <a class=smallblack  href='".$_SERVER['PHP_SELF']."?category_id=$category_id&page_number=$page_number'>Next &raquo;</a>";
		?></td>
				  </tr>
                  <tr>
                    <td><table width="100%"  border="0" cellspacing="2" cellpadding="0">
                        <tr><?php
	/*
	$max_sql = "select max(product_id) as largest from tbl_product";
	$max_result = mysql_query($max_sql) or die(mysql_error());
	$max_rs = mysql_fetch_array($max_result);
	$max_num = $max_rs['largest'];
	*/
	$featured_sql = "select * from tbl_product where category_id=$category_id order by product_id desc limit $start_record,$num_per_page";
	//print $featured_sql;
	$featured_result = mysql_query($featured_sql) or die(mysql_error());
	$i = 0;
	while ($featured_row = mysql_fetch_array($featured_result))
	{
?>
                          <td width="33%" class="smallblack" onmouseover="this.bgColor='#F4F4F4'" onmouseout="this.bgColor='#ffffff'">
                            <table width="100%"  border="0" cellspacing="0" cellpadding="2">
                              <tr>
                                <td height="20" class="smallblack"><strong>Code-
                                      <?=$featured_row['prod_key']?>
                                </strong></td>
                              </tr>
                              <tr>
                                <td><img src="library/thumbs/<?=$featured_row['prod_key']?>.jpg" alt="<?=strtoupper($featured_row['product_name'])?>" width="120" height="52" class="txtbox_1"></td>
                              </tr>
                              <tr>
                                <td height="19"><a href="product_in_detail.php?product_id=<?=$featured_row['prod_key']?>" class="smallblue">
                                  <?=strtoupper($featured_row['product_name'])?>
                                </a></td>
                              </tr>
                              <tr>
                                <td class="smallblack"><?=substr($featured_row['product_description'], 0, 50)?>
                                  .......</td>
                              </tr>
                              <tr>
                                <td height="18"><img src="images/faq_arrow.gif" width="5" height="5"> <a href="product_in_detail.php?product_id=<?=$featured_row['prod_key']?>" class="smallred">View Features</a></td>
                              </tr>
                            </table>
                            <?php
		$i++;
		if ($i%3 == 0)
		{
?>                          </td>
                        </tr>
                        <tr>
                          <td height="10"><spacer></spacer></td>
                        </tr>
                        <tr>
                          <?php
		}
		else
		{
			print "</td>";
		}
	}
?>
                                </table></td>
                  </tr>
                </table></td>
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