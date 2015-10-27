<?php
	foreach ($_POST as $key => $val) 
	{
		$val = preg_replace("/^\r\n+/","",$val);
		$val = str_replace('\"','"',$val);
		$$key = str_replace("\'","'",$val);
	}
	
	$searchStr = "";
	if (isset($description))
		$searchStr = $description;
	
	if (isset($product_id))
		$searchStr .= " ".$product_id;
	
	if (isset($category))
		$searchStr .= " ".$category;
	//print $searchStr;
	$searchStr = strtolower($searchStr);
?>
<?php include("include_connect_database.php.inc");?>
<html>
<head>
<title>Union of Friends, Union of Knowledge, Union of Skills -  UnionCrafts.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="joras/myStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="780"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("header.php");?></td>
  </tr>
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="187" valign="top" bgcolor="#E7DAAD" style="border-bottom:1px solid #BB9D37"><?php include("union_search.php");?></td>
        <td valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td bgcolor="#E7DAAD"><span class="style8">&nbsp;&nbsp;<span class="style16">Welcome to Union Crafts -</span></span></td>
          </tr>
          <tr>
            <td bgcolor="#F5F0DD"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td bgcolor="#E7DAAD"><div align="center"><a href="are">Are you interested in Antique Wooden Crafts and Metal Statues ?</a></div></td>
                  <td width="25%" height="25" align="center" bgcolor="#BB9D37" class="style7">- Product Categories -</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="75%" valign="top" class="style15"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table width="99%"  border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#BB9D37">
                          <tr>
                            <td bgcolor="#F5F0DD"><span class="style17">Search Result for '<?=$searchStr?>' <br>
                            </span>Total Search result found </td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="10"><spacer></spacer></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                  </table></td>
                  <td width="25%" height="20" valign="top" class="style12">
				  <table width="100%"  border="0" align="right" cellpadding="0" cellspacing="0" bgcolor="#E7DAAD">
                      <tr>
                        <td bgcolor="#CBAE4E">
						<table width="100%"  border="0" cellpadding="2" cellspacing="1">
                            <tr>
                              <td bgcolor="#FFFFFF">
							  <table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
							  <?php
					  	$cat_sql = "select * from tbl_category order by cat_name asc";
						$cat_result = mysql_query($cat_sql) or die(mysql_error());
						while ($cat_row = mysql_fetch_array($cat_result))
						{
							$count_sql = "select count(category_id) as count from tbl_product where category_id='$cat_row[category_id]'";
							$count_result = mysql_query($count_sql) or die(mysql_error());
							$count_row = mysql_fetch_array($count_result);
					  ?>
                                  <tr onMouseOver="this.bgColor='#F5F0DD'" onMouseOut="this.bgColor='#ffffff'" bgcolor=#ffffff>
                                    <td width="7" align="center" class="style19">&#8250;</td>
                                    <td height="21" style="padding-left:3px"><a href="product_category.php?category_id=<?=$cat_row['category_id']?>">
                                      <?=$cat_row['cat_name']?>
                                      <span class="style19">[ <?=$count_row['count']?> ]</span></a></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2"><spacer></td>
                                  </tr>
                                  <?php } ?>
                              </table></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="13" bgcolor="#FFFFFF"><spacer></spacer></td>
                      </tr>
                      <tr>
                        <td height="25" align="center" bgcolor="#BB9D37"><span class="style7">- Just added -</span></td>
                      </tr>
                      <tr>
                        <td bgcolor="#CBAE4E"><table width="100%"  border="0" cellpadding="0" cellspacing="1">
                            <tr>
                              <td bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="2">
                                  <tr>
								  <?php
								  	$just_sql = "select * from tbl_product order by product_id desc limit 1";
									$just_result = mysql_query($just_sql) or die(mysql_error());
									$just_row = mysql_fetch_array($just_result);
								  ?>
                                    <td align="center"><img src="uploaded_images/thumbs/<?=$just_row['prod_key']?>.jpg" alt="<?=$just_row['product_name']?>" height="70" border="1"></td>
                                  </tr>
                                  <tr>
                                    <td><strong><?=$just_row['product_name']?></strong></td>
                                  </tr>
								  <tr>
                                    <td>US$ <?=$just_row['single_unit_price']?> per <?=$just_row['unit']?></td>
                                  </tr>
                                  <tr>
                                    <td align="right"><a href="buy_product.php?product_id=<?=$just_row['product_id']?>"><strong>Buy from UnionCrafts &gt;&gt;</strong></a></td>
                                  </tr>
                              </table></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="13" bgcolor="#FFFFFF"><spacer></spacer></td>
                      </tr>
                      <tr>
                        <td height="24" align="center" bgcolor="#BB9D37"><span class="style7">- Showcase -</span></td>
                      </tr>
                      <tr>
                        <td bgcolor="#CBAE4E"><table width="100%"  border="0" cellpadding="0" cellspacing="1">
                            <tr>
                              <td bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="5">
                                  <tr>
                                    <td align="center"><img src="images/misc.jpg" width="83" height="70" border="1"></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                  </tr>
                              </table></td>
                            </tr>
                        </table></td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><?php include("footer.php");?></td>
  </tr>
</table>
</body>
</html>