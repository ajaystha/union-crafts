<?php include("include_connect_database.php.inc");?>
<link href="joras/myStyle.css" rel="stylesheet" type="text/css">
<table width="95%"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F2F2F2">
<tr>
<td height="25" bgcolor="#000000" class="smallwhite"  style="padding-left:20"><strong class="smallorange">&nbsp;&nbsp;<font color="#FFFFFF">News / Events</font></strong></td>
</tr>
<tr>
<td style="padding-left:10"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="5" class="smallblack"><spacer></spacer></td>
</tr>
<?php
	$news_list_sql = "select * from tbl_news order by news_posted_on desc limit 2";
	$news_result = mysql_query($news_list_sql) or die(mysql_error());
	$count = 0;
	while ($news_rs = mysql_fetch_array($news_result))
	{
?>
<tr>
<td class="smallblack"><em><?=return_date($news_rs['news_posted_on'])?></em></td>
</tr>
<tr>
<td><a href="news_in_detail.php?news_id=<?=$news_rs['news_id']?>" class="smalllightblue"><?=substr($news_rs['news_in_detail'], 0, 91);?>.......</a></td>
</tr>
<?php
	if ($count < 1)
	{
?>
<tr>
<td class="smallblack">...........................................</td>
</tr>
<?php } ?>
<tr>
<td height="5"><spacer></spacer></td>
</tr>
<?php 
		$count++;
	}
?>
</table></td>
</tr>
<tr>
<td height="1" bgcolor="#000000"><spacer></spacer></td>
</tr>
</table>
