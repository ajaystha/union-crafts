<?php include("include_connect_database.php.inc");?>
<?php include("return_date.php");?>
<?php

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML><HEAD>
<TITLE>UnionCrafts - Find Nepalese Handicrafts; collection of Silver, Metal, Paper &amp;  Wooden Crafts</TITLE>
<meta name="keywords" content="union, union crafts, Silver products, Metal Crafts, Paper Crafts, Nepalese Antiques, handicrafts, handmade crafts, Beads, Wooden Masks. wholsaler, exporter of handicrafts, nepalese handmade crafts, nepalese handicrafts market, online crafts catalog, handicrafts online, online handicraft exporter, Nepal, Kathmandu, Thamel, silver jewellery, ornaments, handicraft business, trade, wholesale suppliers, bulk purchasing, wooden incense holders, wooden pipes, glass pipes, necklaces, bangles, singing bowls, Nepali handmade goods, handicraft collections, gallery, Trade leads, Trade opportunities, handicraft information, exhibitions, export nepalese handicrafts,  online antiques items, handicraft manufacturer, customers demand designs, trade fairs information">

<meta name="description" content="UnionCrafts.com; it all began during a union of friends � each with a background related to tourism industry and eager to venture into a fresh endeavor">

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
            <td valign="top"><table width="99%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="30" class="smenu">Frequently Asked Questions</td>
              </tr>
              <tr>
                <td><table width="100%" height="1"  border="0" cellpadding="0" cellspacing="0" bgcolor="#F89700">
                    <tr>
                      <td><spacer></spacer></td>
                    </tr>
                </table></td>
              </tr>
			  <?php
			  	$faq_sql = "select * from tbl_faq order by faq_id asc";
				$faq_result = mysql_query($faq_sql) or die(mysql_error());
				$count = 1;
				while ($faq_rs = mysql_fetch_array($faq_result))
				{
			  ?>
              <tr>
                <td height="10"><spacer></spacer></td>
              </tr>
			  <tr>
                <td height="25" class="smalldarkgrey"><a name="<?=$faq_rs['faq_id']?>"></a><strong>Q. <?=$count?>. <?=$faq_rs['question']?></strong></td>
              </tr>
              <tr>
                <td class="smalltext"><p align="justify"><u>Ans.</u> <?=$faq_rs['answer']?></p></td>
              </tr>
              <tr>
                <td height="10"><spacer></spacer></td>
              </tr>
              <tr>
                <td><hr width="98%" size="1" noshade></td>
              </tr>
			  	<?php
						$count++;
			  		} 
				?>
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