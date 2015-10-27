<?php include("include_connect_database.php.inc");?>
<?php include("return_date.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML><HEAD>
<TITLE>UnionCrafts - Find Nepalese Handicrafts; collection of Silver, Metal, Paper &amp;  Wooden Crafts</TITLE>
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
                <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="30" class="smenu">Shipping Information</td>
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
                    <td>&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="25" valign="bottom" class="mediumtext"><strong>Air Cargo : </strong></td>
              </tr>
              <tr bgcolor="#F89700">
                <td bgcolor="#000000"><spacer></spacer></td>
              </tr>
              <tr bgcolor="#F89700">
                <td height="20" bgcolor="#F8F8F8"><table width="95%"  border="0" align="center" cellpadding="2" cellspacing="2">
                  <tr class="smallblack">
                    <td width="29%"><div align="right"><strong>Service - </strong></div></td>
                    <td width="71%">To nearrest destination Airport </td>
                  </tr>
                  <tr class="smallblack">
                    <td><div align="right"><strong>Shipment Time - </strong></div></td>
                    <td>4 to 10 days </td>
                  </tr>
                  <tr class="smallblack">
                    <td><div align="right"><strong>Carrier / Airlines - </strong></div></td>
                    <td>whichever available </td>
                  </tr>
                  <tr class="smallblack">
                    <td><div align="right"><strong>Insurance - </strong></div></td>
                    <td>Insurance covered by Airlines</td>
                  </tr>
                  <tr class="smallblack">
                    <td valign="top"><div align="right"><strong>Charge</strong></div></td>
                    <td>Different rates applicable as per the weight of the shipment and destination </td>
                  </tr>
                </table></td>
              </tr>
              <tr bgcolor="#F89700">
                <td height="20" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr>
                <td height="25" valign="bottom" class="mediumtext"><strong>Sea Cargo : </strong></td>
              </tr>
              <tr bgcolor="#F89700">
                <td bgcolor="#000000"><spacer></spacer></td>
              </tr>
              <tr bgcolor="#F89700">
                <td height="20" bgcolor="#F8F8F8"><table width="95%"  border="0" align="center" cellpadding="2" cellspacing="2">
                    <tr class="smallblack">
                      <td width="29%"><div align="right"><strong>Service - </strong></div></td>
                      <td width="71%">To nearrest Sea Port </td>
                    </tr>
                    <tr class="smallblack">
                      <td><div align="right"><strong>Shipment Time - </strong></div></td>
                      <td>45 to 60 days </td>
                    </tr>
                    <tr class="smallblack">
                      <td valign="top"><div align="right"><strong>Carrier  - </strong></div></td>
                      <td>by land to th Haldia sea port and to the destination by International shipping liner. </td>
                    </tr>
                    <tr class="smallblack">
                      <td><div align="right"><strong>Insurance - </strong></div></td>
                      <td>recommended to purchase insurance</td>
                    </tr>
                    <tr class="smallblack">
                      <td valign="top"><div align="right"><strong>Weight/Volume</strong></div></td>
                      <td>FCL-full container (20 Footer, 40 Footer, 40 footer high cube) , LCL-loose container Minimum 2 Cubic Meter needed. </td>
                    </tr>
                    <tr class="smallblack">
                      <td valign="top"><div align="right"><strong>Charge</strong></div></td>
                      <td>Different rates applicable as per the weight of the shipment and destination</td>
                    </tr>
                </table></td>
              </tr>
              <tr bgcolor="#F89700">
                <td height="20" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr>
                <td height="25" valign="bottom" class="mediumtext"><strong>Courier Service : </strong></td>
              </tr>
              <tr bgcolor="#F89700">
                <td bgcolor="#000000"><spacer></spacer></td>
              </tr>
              <tr bgcolor="#F89700">
                <td height="20" bgcolor="#F8F8F8"><table width="95%"  border="0" align="center" cellpadding="2" cellspacing="2">
                    <tr class="smallblack">
                      <td width="29%"><div align="right"><strong>Service - </strong></div></td>
                      <td width="71%">door to door deliver </td>
                    </tr>
                    <tr class="smallblack">
                      <td><div align="right"><strong>Shipment Time - </strong></div></td>
                      <td>4 to 6 days (depending upon the destination) </td>
                    </tr>
                    <tr class="smallblack">
                      <td valign="top"><div align="right"><strong>Carrier - </strong></div></td>
                      <td>DHL / UPS / TNT / FEDEX </td>
                    </tr>
                    <tr class="smallblack">
                      <td><div align="right"><strong>Insurance - </strong></div></td>
                      <td>Insured by courier service </td>
                    </tr>
                    <tr class="smallblack">
                      <td valign="top"><div align="right"><strong>Weight/Volume</strong></div></td>
                      <td>no limit </td>
                    </tr>
                    <tr class="smallblack">
                      <td valign="top"><div align="right"><strong>Charge</strong></div></td>
                      <td>depending upon destination and volume of the shippment </td>
                    </tr>
                </table></td>
              </tr>
            </table>
			</td>
          </tr>
          <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" valign="top"><div align="center"><a href="http://www.cargocapital.com/"><img src="images/banners/banner.jpg" alt="http://www.cargocapital.com/" width="750" height="90" border="0"></a></div></td>
            </tr>
          <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
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