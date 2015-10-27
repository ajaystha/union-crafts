<table width="100%"  border="0" cellpadding="0" cellspacing="0">
<tr>
<td height="30" class="smenu">Antiques -</td>
</tr>
<tr>
<td><table width="100%" height="1"  border="0" cellpadding="0" cellspacing="0" bgcolor="#F89700">
<tr>
<td><spacer></spacer></td>
</tr>
</table></td>
</tr>
<tr>
<td><table width="100%"  border="0" cellspacing="2" cellpadding="0">
<tr>
<?php
	$showcase_sql = "select * from tbl_showcase order by product_id desc limit 3";
	$showcase_result = mysql_query($showcase_sql) or die(mysql_error());
	while ($showcase_rs = mysql_fetch_array($showcase_result))
	{
?>
<td width="33%" onmouseover="this.bgColor='#FFFFEA'" onmouseout="this.bgColor='#ffffff'">
<table width="100%"  border="0" cellspacing="0" cellpadding="2">
<tr>
<td height="20" class="smallblack"><strong>Code - <?=$showcase_rs['prod_key']?></strong></td>
</tr>
<tr>
<td><img src="library/showcase/<?=$showcase_rs['prod_key']?>.jpg" alt="<?=strtoupper($showcase_rs['product_name'])?>" width="120" height="52" class="txtbox_1"></td>
</tr>
<tr>
<td height="19"><a href="antiques.php?product_id=<?=$showcase_rs['prod_key']?>" class="smallblue"><?=strtoupper($showcase_rs['product_name'])?></a></td>
</tr>
<tr>
<td class="smallblack"><?=substr($showcase_rs['product_description'], 0, 50)?>.......</td>
</tr>
<tr>
<td height="18"><img src="images/faq_arrow.gif" width="5" height="5"> <a href="antiques.php?product_id=<?=$showcase_rs['prod_key']?>" class="smallred">View Features</a></td>
</tr>
</table></td>
<?php } ?>
</tr>
</table></td>
</tr>
</table>