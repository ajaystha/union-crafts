<?php include("include_connect_database.php.inc");?>
<table width="95%"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F2F2F2">
<tr>
<td height="25" bgcolor="#000000" class="smallwhite"  style="padding-left:20"><strong>&nbsp;&nbsp;Product Catalogue</strong></td>
</tr>
<tr>
<td style="padding-left:8">
<table width="100%"  border="0" cellspacing="2" cellpadding="0">
<?php
	$cat_sql = "select * from tbl_category order by cat_name asc";
	$cat_result = mysql_query($cat_sql) or die(mysql_error());
	while ($cat_row = mysql_fetch_array($cat_result))
	{
		$count_sql = "select count(category_id) as count from tbl_product where category_id = '$cat_row[category_id]'";
		$count_result = mysql_query($count_sql) or die(mysql_error());
		$count_row = mysql_fetch_array($count_result);
?>
<tr>
  <td width="6%" align="center"><img src="images/arrow.gif" width="4" height="6"></td>
  <td width="80%" height="15"><a href="product_category.php?category_id=<?=$cat_row['category_id']?>" class="smallblue"><strong><?=$cat_row['cat_name']?></strong></a></td>
<td width="14%" class="smallblack"><em><?=$count_row['count']?></em></td>
<?php } ?>
</tr>
</table></td>
</tr>
<tr>
<td height="1" bgcolor="#000000"><spacer></spacer></td>
</tr>
</table>