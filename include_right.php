<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="25%" height="20" valign="top" class="style12"><table width="100%"  border="0" align="right" cellpadding="0" cellspacing="0" bgcolor="#E7DAAD">
        <tr>
          <td bgcolor="#CBAE4E"><table width="100%"  border="0" cellpadding="2" cellspacing="1">
              <tr>
                <td bgcolor="#FFFFFF"><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
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
                        <span class="style19">[
                        <?=$count_row['count']?>
                        ]</span></a></td>
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
                <td bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                    <tr>
                      <?php
								  	$just_sql = "select * from tbl_product order by product_id desc limit 1";
									$just_result = mysql_query($just_sql) or die(mysql_error());
									$just_row = mysql_fetch_array($just_result);
								  ?>
                      <td align="center"><img src="library/thumbs/<?=$just_row['prod_key']?>.jpg" alt="<?=$just_row['product_name']?>" height="70" border="1"></td>
                    </tr>
                    <tr>
                      <td><strong>
                        <?=$just_row['product_name']?>
                      </strong></td>
                    </tr>
                    <tr>
                      <td>US$
                          <?=$just_row['single_unit_price']?>
                        per
                        <?=$just_row['unit']?></td>
                    </tr>
                    <tr>
                      <td><a href="buy_product.php?product_id=<?=$just_row['product_id']?>"><strong>Buy from UnionCrafts &gt;&gt;</strong></a></td>
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
                <td bgcolor="#FFFFFF"><?php
							  	$showcase_sql = "select * from tbl_showcase order by product_id desc";
								$showcase_result = mysql_query($showcase_sql) or die(mysql_error());
								$showcase_rs = mysql_fetch_array($showcase_result);
							  ?>
                    <table width="100%"  border="0" cellspacing="0" cellpadding="5">
                      <tr>
                        <td align="center"><img src="library/showcase/<?=$showcase_rs['prod_key']?>.jpg" alt="<?=$showcase_rs['product_name']?>" height="70" border="1"></td>
                      </tr>
                      <tr>
                        <td><a href="product_showcase.php?product_id=<?=$showcase_rs['product_id']?>" class="style12">Find out more about
                              <?=$showcase_rs['product_name']?>
                        </a></td>
                      </tr>
                  </table></td>
              </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>
