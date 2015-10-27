<table width="95%"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F2F2F2">
<tr>
<td height="25" bgcolor="#000000"  style="padding-left:20"><font color="#FFFFFF"><strong class="smalllightyellow">&nbsp;&nbsp;FAQ's</strong></font></td>
</tr>
<tr>
<td style="padding-left:5"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="5" class="smallblack"><spacer></spacer></td>
</tr>
<tr>
<td>
<table width="100%"  border="0" cellspacing="2" cellpadding="2">
<?php
	$faqs_list_sql = "select * from tbl_faq order by faq_id desc limit 4";
	$faq_result = mysql_query($faqs_list_sql) or die(mysql_error());
	$count = 1;
	while ($faq_rs = mysql_fetch_array($faq_result))
	{
?>
<tr>
<td width="12%" align="center" valign="top" class="smallblack"><?=$count?>.</td>
<td width="88%" height="13"><a href="faqs.php#<?=$faq_rs['faq_id']?>" class="smallnavy"><?=substr($faq_rs['question'], 0, 48)?>.......</a></td>
</tr>
<?php
		$count++;
	}
?>
</table>
</td>
</tr>
</table></td>
</tr>
</table>
