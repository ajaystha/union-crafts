<table width="100%"  border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="30" class="smenu">Product Lists - all</td>
</tr>
<tr>
<td>
<table width="100%" height="1"  border="0" cellpadding="0" cellspacing="0" bgcolor="#F89700">
<tr>
<td><spacer></spacer></td>
</tr>
</table></td>
</tr>
<tr>
<td><table width="100%"  border="0" cellspacing="2" cellpadding="0">
<tr>
<?php
	/*
	$max_sql = "select max(product_id) as largest from tbl_product";
	$max_result = mysql_query($max_sql) or die(mysql_error());
	$max_rs = mysql_fetch_array($max_result);
	$max_num = $max_rs['largest'];
	*/
	$featured_sql = "select * from tbl_product order by product_id desc limit 6";
	//print $featured_sql;
	$featured_result = mysql_query($featured_sql) or die(mysql_error());
	$i = 0;
	while ($featured_row = mysql_fetch_array($featured_result))
	{
?>
<td onmouseover="this.bgColor='#F4F4F4'" onmouseout="this.bgColor='#ffffff'" width="33%">
<table width="100%"  border="0" cellspacing="0" cellpadding="2">
<tr>
<td height="20" class="smallblack"><strong>Code-<?=$featured_row['prod_key']?></strong></td>
</tr>
<tr>
<td><img src="library/thumbs/<?=$featured_row['prod_key']?>.jpg" alt="<?=strtoupper($featured_row['product_name'])?>" width="120" height="52" class="txtbox_1"></td>
</tr>
<tr>
<td height="19"><a href="product_in_detail.php?product_id=<?=$featured_row['prod_key']?>" class="smallblue"><?=strtoupper($featured_row['product_name'])?></a></td>
</tr>
<tr>
<td class="smallblack"><?=substr($featured_row['product_description'], 0, 50)?>.......</td>
</tr>
<tr>
<td height="18"><img src="images/faq_arrow.gif" width="5" height="5"> <a href="product_in_detail.php?product_id=<?=$featured_row['prod_key']?>" class="smallred">View Features</a></td>
</tr>
</table>
<?php
		$i++;
		if ($i%3 == 0)
		{
?>
</td></tr><tr><td height="10"><spacer></spacer></td></tr><tr>
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
</table>