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
			<table width="98%"  border="0" align="center" cellpadding="1" cellspacing="0">
              <tr>
                <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="30" class="smenu">Something that you may want to hear from us. </td>
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
                    <td><div align="center"></div></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="20" class="mediumblack"><strong>How did we start ? </strong></td>
              </tr>
              <tr bgcolor="#F89700">
                <td bgcolor="#000000"><spacer></spacer></td>
              </tr>
              <tr bgcolor="#F89700">
                <td bgcolor="#FFFFFF" style="padding-left:10px"><p align="justify" class="smallblack">It all began during a union of friends – each with a background related to tourism industry and eager to venture into a fresh endeavor.<br>
                  <br>
                  Nepal has lots to offer to the world – spectacular natural beauty, amazing culture, beautiful art, and most significantly, its people – famous worldwide for their warm hospitality. Likewise, Nepal has been able to establish itself as a source of handmade goods – from rare antiques to cultural products to modern accessories.<br>
                  <br>
                  Hence, we thought of initializing a website covering the field of Nepalese art and culture with the premier objective of further promoting its image to the world through the modern medium of communication – the Internet. Thus, with consultation from <a href="http://www.lins.com.np" target="_blank">LiNS Pvt. Ltd</a>, our Hosting Service Partner and Web Systems Architecturer, <a href="http://www.unioncrafts.com/">Unioncrafts.com </a> came about. </p>                  </td>
              </tr>
              <tr bgcolor="#F89700">
                <td bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr>
                <td height="20" class="mediumblack"><p><strong>How do we work ? </strong></p></td>
              </tr>
              <tr bgcolor="#F89700">
                <td bgcolor="#000000"><spacer></spacer></td>
              </tr>
              <tr bgcolor="#F89700">
                <td bgcolor="#FFFFFF" style="padding-left:10px"><p align="justify" class="smallblack">The people involved in <a href="http://www.unioncrafts.com/">Unioncrafts.com </a> know the value of service along with the knowledge of the diverse range of products. We initiated this new website to not only promote Nepalese handmade products worldwide, but also to provide you, our customers, a convenient channel to obtain those products anywhere in the world and benefiting from them.<br>
                  <br>
                  The regular update of information on the website, instant response to inquiries, smooth handling of the purchase orders, secure payment system and safe shipment procedures – that is a general overview of our policies and standard operating procedures. </p>                  </td>
              </tr>
              <tr bgcolor="#F89700">
                <td bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr>
                <td height="20" class="mediumblack"><p><strong>Our target group(s)</strong></p></td>
              </tr>
              <tr bgcolor="#F89700">
                <td bgcolor="#000000"><spacer></spacer></td>
              </tr>
              <tr bgcolor="#F89700">
                <td bgcolor="#FFFFFF" style="padding-left:10px"><p align="justify" class="smallblack">We represent the hardworking artists of Nepal through their variety of handmade products. Hence our potential customers would include those who appreciate the value of art, diligence and craftsmanship; those who can promote our products with their appropriate value/price. </p></td>
              </tr>
              <tr bgcolor="#F89700">
                <td bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr>
                <td height="20" class="mediumblack"><p><strong>How can you, as our customer, benefit from <a href="http://www.unioncrafts.com/">Unioncrafts.com </a>? </strong></p></td>
              </tr>
              <tr bgcolor="#F89700">
                <td bgcolor="#000000"><spacer></spacer></td>
              </tr>
              <tr bgcolor="#F89700">
                <td height="20" bgcolor="#FFFFFF" style="padding-left:10px" ><p align="justify" class="smallblack">As we have mentioned at the beginning, we value the service our customer should receive. We work to meet your expectations for our mutual benefit. Keeping this in mind, we have put into practice certain terms of operation, which also act as our guarantee terms: -<br>
                  <br>
                  Regarding the information available on our website, we have put photographs and short descriptions about the products. We can provide you with further information about them as well as other products not listed on the website upon request – from the making of any item to its packaging for shipment. Hence we request you to frequently visit our website for updates.<br>
                    <br>
                    We have provided information on the registration of our organization in the related government and tax offices along with the details of our bank account so that our customers can enquire about us. We also follow a secure payment system through bank/wire transfer.<br>
                    <br>
                    We use safe packaging according to fragility of the products. For example, we wrap glass items with bubble sheets and pack them into Nepali handmade paper boxes.<br>
                    <br>
                    During the shipment of the goods, we will inform you about the shipment details via fax/email.<br>
                    <br>
                    With all the above-mentioned particulars and facts, we believe that we can earn the trust of our customers; trust being the basis of a good business relationship. </p>                  </td>
              </tr>
              <tr bgcolor="#F89700">
                <td height="20" bgcolor="#FFFFFF" class="mediumdarkgrey" style="padding-left:10px" >- Happy Surfing &amp; Shopping.</td>
              </tr>
              <tr bgcolor="#F89700">
                <td height="20" bgcolor="#FFFFFF" class="mediumdarkgrey" style="padding-left:10px" >&nbsp;</td>
              </tr>
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