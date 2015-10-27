<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="100%"  border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td height="10" class="smallwhite"><spacer></spacer></td>
  </tr>
  <tr>
    <td height="22" bgcolor="#000000" class="smallwhite"><strong>Other Products</strong></td>
  </tr>
  <?php
				  	$list_sql = "select * from tbl_product order by product_name asc limit 5";
					$list_result = mysql_query($list_sql) or die(mysql_error());
					while ($list_rs = mysql_fetch_array($list_result))
					{
				  ?>
  <tr>
    <td align="center"><img src="library/thumbs/<?=$list_rs['prod_key']?>.jpg" alt="<?=$list_rs['product_name']?>" width="124" height="56"></td>
  </tr>
  <tr>
    <td class="smallblack" style="padding-left:5px"><img src="images/faq_arrow.gif">
        <?=$list_rs['product_name']?></td>
  </tr>
  <tr>
    <td class="smalldarkgrey">....................................</td>
  </tr>
  <tr>
    <td height=5><spacer></spacer></td>
  </tr>
  <?php } ?>
</table>
</body>
</html>
