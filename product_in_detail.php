<?php include("include_connect_database.php.inc");?>
<?php include("return_date.php");?>
<?php
	foreach ($_POST as $key => $val) 
	{
		$val = preg_replace("/^\r\n+/","",$val);
		$val = str_replace('\"','"',$val);
		$$key = str_replace("\'","'",$val);
	}
	
	$product_id = $_GET['product_id'];
	if (isset($_POST['product_id']))
		$product_id = $_POST['product_id'];
	// print $product_id."--";
	if (!isset($product_id))
	{
		header("Location: index.php");
	}
	// print "here|";
	$p_sql = "select * from tbl_product where prod_key='$product_id'";
	// print $p_sql;
	$p_result = mysql_query($p_sql) or die(mysql_error());
	$p_num = mysql_num_rows($p_result);
	if ($p_num <=0)
		header("Location: index.php");
	$p_rs = mysql_fetch_array($p_result);
	
	$c_sql = "select cat_name from tbl_category where category_id='$p_rs[category_id]'";
	$c_result = mysql_query($c_sql) or die(mysql_error());
	$c_rs = mysql_fetch_array($c_result);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML><HEAD>
<TITLE>Union of Friends, Union of Knowledge, Union of Skills - UnionCrafts.com</TITLE>
<style type="text/css">
<!--
.style1 {color: #99FF00}
-->
</style>
<script language="javascript">
<!--

	function checkAddress()
	{
		if(document.quick_contact.is_billing.checked)
		{
			 document.quick_contact.shipping.value = document.quick_contact.billing.value;
		}
		return true;
	}
	
	function checkForm()
	{
		var name = trim(document.quick_contact.name.value);
		if(name.length == 0)
		{
		   alert("Please enter Name");
		   document.quick_contact.name.focus();
		   return false;
		}

		//Email		  
		var email = trim(document.quick_contact.email.value);
		if(email.length == 0)
		{
		   alert("Please enter Email");
		   document.quick_contact.email.focus();
		   return false;
		}
		if(isValidEmail(email) == 0)
		{		   
		   document.quick_contact.email.focus();
		   return false;		  
		}
		
		var quantity = trim(document.quick_contact.quantity.value);
		if(quantity.length == 0)
		{
		   alert("Please enter quantity");
		   document.quick_contact.quantity.focus();
		   return false;
		}
				
		//billing_address
		var billing = trim(document.quick_contact.billing.value);
		if(billing.length == 0)
		{
		   alert("Please enter billing address");
		   document.quick_contact.billing.focus();
		   return false;
		}
		
		//Shipping Address
		var shipping = trim(document.quick_contact.shipping.value);
		if(shipping.length == 0)
		{
		   alert("Please enter shipping address");
		   document.quick_contact.shipping.focus();
		   return false;
		}
		return true;
	}
	
	function trim (strVar) 
	{ 
		 if(strVar.length >0)
		 {
				while(strVar.charAt(0)==" ")  //Left Trim
				strVar=strVar.substring(1,strVar.length); 
				while(strVar.charAt(strVar.length-1)==" ")  //Right Trim
				strVar=strVar.substring(0,strVar.length-1); 			
		 } 
		 return strVar; 
	}
	
	function isValidEmail(emailid)
	{		
			var l=emailid.length;
			if(l==0)
			{
					return false;	
			}
			if(l!=0)
			{
					var a=emailid.indexOf('@');
					var d=emailid.lastIndexOf('.');
					var str1=emailid.substr(0,a);
					var str2=emailid.substr(a+1,d-a-1);
					var str3=emailid.substr(d+1,l);
					var len1=str1.length;
					var len2=str2.length;
					var len3=str3.length;
					if(a<0 || d<2)
					{
							alert ("Check for missing '@' or '.' ");
							return false;
					}
					else if (a>d)
					{
							alert ("Invalid email. Please enter correct email address");
							return false;
					}				
					if (len1<=1 || len2<=1 || len3 <=1)
					{
							alert ("Invalid email. Please enter correct email address");
							return false;
					}				
			}
			return true;
	}
-->
</script>
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
            <td valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td valign="top"><table width="98%"  border="0" align="center" cellpadding="2" cellspacing="0">
                  <tr>
                    <td align="right" class="smallgreen_a">your page location: <a href="index.php" class="smallgreen_a">home</a> &raquo; <a href="product_category.php?category_id=<?=$p_rs['category_id']?>" class="smallgreen_a"><?=$c_rs['cat_name']?></a>  &raquo; <?=$p_rs['product_name']?></td>
                  </tr>
                  <tr>
                    <td height="15"><spacer></spacer></td>
                  </tr>
                  <tr>
                    <td><table width="100%"  border="0" cellspacing="1" cellpadding="2">
                      <tr>
                        <td><img src="library/enlarge/<?=$p_rs['prod_key']?>.jpg" alt="<?=$p_rs['product_name']?>" class="txtbox_1"></td>
                        <td width="46%" valign="top"><table width="100%"  border="0" cellpadding="2" cellspacing="0">
                          <tr>
                            <td class="mediumdarkgrey"><strong>
                              <?=$p_rs['product_name']?>
                            </strong></td>
                          </tr>
                          <tr>
                            <td class="smalldarkgrey" style="padding-left:10px"><?=$p_rs['product_description']?></td>
                          </tr>
                          <tr>
                            <td height="10"><spacer></spacer></td>
                          </tr>
                          <tr>
                            <td><table width="100%"  border="0" cellspacing="1" cellpadding="5">
                              <tr bgcolor="#999999" class="mediumwhite">
                                <td width="49%" align="center"><strong>Units</strong></td>
                                <td width="51%" align="center"><div align="left"><strong>Price (US$)</strong></div></td>
                              </tr>
                              <tr class="smalldarkgrey">
                                <td align="center" bgcolor="#E9E9E9">Single</td>
                                <td bgcolor="#F5F5F5"><?=$p_rs['single_unit_price']?>
                                  <div align="left"></div></td>
                              </tr>
                              <tr class="smalldarkgrey">
                                <td align="center" bgcolor="#E9E9E9">Bulk</td>
                                <td bgcolor="#F5F5F5"><?=$p_rs['bulk_unit_price']?>
                                  <div align="left"></div></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td height="10"><spacer></spacer></td>
                          </tr>
                          <tr>
                            <td align="right" class="smalldarkgrey"><strong>Minimum Bulk Purchase Order:
                                  </strong>                              <?=$p_rs['min_bulk_order']?>                                  <?=$p_rs['unit']?>                            </td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>                      </td>
                  </tr>
                  <tr>
                    <td height="10"><spacer></spacer></td>
                  </tr>
                  <tr>
                    <td class="mediumred"><strong>Quick Contact for the above product</strong></td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#CC0000" style="padding:0px"><spacer></spacer></td>
                  </tr>
                  <tr>
                    <td height="10"><spacer></spacer></td>
                  </tr>
				  <?php
				  	if (isset($Submit))
					{
						/* recipients */
						$to  = "UnionCrafts <info@unioncrafts.com>"; //note the comma
						
						/* subject */
						$subject = "Product Detail Request from UnionCrafts.com";
						
						/* message */
						$message = '
						<html>
						<head>
						 <title>Product Detail Request from UnionCrafts.com</title>
						</head>
						<body>
						<p>Here are the details that were provided from the website!</p>
						<table width="100%"  border="0" cellspacing="1" cellpadding="5">
  <tr bgcolor="#FFFFFF">
    <td align="right" bgcolor="#E9E9E9" class="smalldarkgrey">Product Code</td>
    <td bgcolor="#F5F5F5" class="smalldarkgrey">'.$product_id.'</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="right" bgcolor="#E9E9E9" class="smalldarkgrey">Full Name</td>
    <td bgcolor="#F5F5F5" class="smalldarkgrey">'.$name.'</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="right" bgcolor="#E9E9E9" class="smalldarkgrey">Email</td>
    <td bgcolor="#F5F5F5" class="smalldarkgrey">'.$email.'</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="right" bgcolor="#E9E9E9" class="smalldarkgrey">Telephone</td>
    <td bgcolor="#F5F5F5" class="smalldarkgrey">'.$telephone.'</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="right" bgcolor="#E9E9E9" class="smalldarkgrey">Quantity</td>
    <td bgcolor="#F5F5F5" class="smalldarkgrey">'.$quantity.'</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="right" valign="top" bgcolor="#E9E9E9" class="smalldarkgrey">Billing Address</td>
    <td bgcolor="#F5F5F5" class="smalldarkgrey">'.$billing.'</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="right" valign="top" bgcolor="#E9E9E9" class="smalldarkgrey">Shipping Address</td>
    <td bgcolor="#F5F5F5" class="smalldarkgrey">'.$shipping.'</td>
  </tr>
</table></body></html>
						';
						
						/* To send HTML mail, you can set the Content-type header. */
						$headers  = "MIME-Version: 1.0\r\n";
						$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
						
						/* additional headers */
						$headers .= "From: Webmaster <webmaster@unioncrafts.com>\r\n";
						
						//print $message;
						/* and now mail it */
						mail($to, $subject, $message, $headers);
				  ?>
				  <tr>
				  	<td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td bgcolor="#FF6600"><table width="100%"  border="0" cellspacing="1" cellpadding="0">
                          <tr>
                            <td height="30" align="center" bgcolor="#FFE7D7" class="smallred">The request has been sent successfully. Our correspondant will contact you as soon as possible.</td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>
						
					</td>
				  </tr>
				  <tr>
                    <td height="10"><spacer></spacer></td>
                  </tr>
				  	<?php
				  		}
					?>
                  <tr>
                    <td><form action="<?php print $_SERVER['PHP_SELF'];?>" method="post" name="quick_contact" id="quick_contact" onSubmit="return checkForm()">
                      <table width="100%"  border="0" cellspacing="1" cellpadding="5">
                        <tr bgcolor="#FFFFFF">
                          <td align="right" bgcolor="#E9E9E9" class="smalldarkgrey">Product Code</td>
                          <td bgcolor="#F5F5F5" class="smalldarkgrey"><input name="product_code" type="text" id="product_code" value="<?=$p_rs['prod_key']?>" disabled><input name="product_id" type="hidden" id="product_id" value="<?=$p_rs['prod_key']?>"></td>
                        </tr>
                        <tr bgcolor="#FFFFFF">
                          <td align="right" bgcolor="#E9E9E9" class="smalldarkgrey">Full Name</td>
                          <td bgcolor="#F5F5F5"><input name="name" type="text" class="smalldarkgrey" id="name"></td>
                        </tr>
                        <tr bgcolor="#FFFFFF">
                          <td align="right" bgcolor="#E9E9E9" class="smalldarkgrey">Email</td>
                          <td bgcolor="#F5F5F5"><input name="email" type="text" class="smalldarkgrey" id="email" size="35"></td>
                        </tr>
                        <tr bgcolor="#FFFFFF">
                          <td align="right" bgcolor="#E9E9E9" class="smalldarkgrey">Telephone</td>
                          <td bgcolor="#F5F5F5"><input name="telephone" type="text" class="smalldarkgrey" id="telephone"></td>
                        </tr>
                        <tr bgcolor="#FFFFFF">
                          <td align="right" bgcolor="#E9E9E9" class="smalldarkgrey">Quantity</td>
                          <td bgcolor="#F5F5F5"><input name="quantity" type="text" class="smalldarkgrey" id="quantity" size="10"></td>
                        </tr>
                        <tr bgcolor="#FFFFFF">
                          <td align="right" valign="top" bgcolor="#E9E9E9" class="smalldarkgrey">Billing Address</td>
                          <td bgcolor="#F5F5F5"><textarea name="billing" rows="4" class="smalldarkgrey" id="billing"></textarea></td>
                        </tr>
                        <tr bgcolor="#FFFFFF">
                          <td align="right" bgcolor="#E9E9E9" class="smalldarkgrey">                            Same Address for Shipping </td>
                          <td bgcolor="#F5F5F5"><input name="is_billing" type="checkbox" class="smalldarkgrey" id="is_billing" onclick="return checkAddress();" value="checkbox"></td>
                        </tr>
                        <tr bgcolor="#FFFFFF">
                          <td align="right" valign="top" bgcolor="#E9E9E9" class="smalldarkgrey">Shipping Address</td>
                          <td bgcolor="#F5F5F5"><textarea name="shipping" rows="4" class="smalldarkgrey" id="shipping"></textarea></td>
                        </tr>
                        <tr align="center" bgcolor="#FFFFFF">
                          <td colspan="2" bgcolor="#E9E9E9" class="smalldarkgrey"><input name="Submit" type="submit" class="smallblue" value="Submit">&nbsp;&nbsp;                            <input name="Submit3" type="reset" class="smallblue" value="Reset"></td>
                          </tr>
                      </table>
                      </form></td>
                  </tr>
                </table></td>
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