<?
	session_save_path('../tmp');
	session_start();
	if (!session_is_registered("atijoras"))
		header("Location: index.php");
?>
<?php include("../include_connect_database.php.inc"); ?>
<?php
	foreach ($_POST as $key => $val) 
	{
		if (is_array($val))
		{
			foreach ($val as $twoD)
				$newValue[] = $twoD;
		}
		else
		{
			$val = preg_replace("/^\r\n+/","",$val);
			$val = str_replace('\"','"',$val);
			$$key = str_replace("\'","'",$val);
		}
	}
	foreach ($_GET as $key => $val) 
	{
		$val = preg_replace("/^\r\n+/","",$val);
		$val = str_replace('\"','"',$val);
		$$key = str_replace("\'","'",$val);
	}

	$size = sizeof($newValue);	
	
	if(isset($add))
	{
		$product_name = addslashes($product_name);
		$product_description = addslashes($product_description);
		$query="INSERT INTO tbl_product (category_id, product_name, prod_key, product_description, single_unit_price, bulk_unit_price, min_bulk_order, unit) VALUES ('$category_id','$product_name','$prod_key', '$product_description', '$single_unit_price', '$bulk_unit_price', '$min_bulk_order', '$unit')";
		// print $query."<br>";
		$result=mysql_query($query) or die(mysql_error());
		if($result)
		{
			$today = date("Y-m-d");
			$update_sql = "update tbl_last_updated set date='$today' where id=1";
			$update_result = mysql_query($update_sql);
			
			print "<script language='javascript'>";
			print "alert('Product Added successfully.');";
			print "</script>";			
		}
		else
		{
			die(mysql_error());
		}

		if (isset($isImage1))
		{
			move_uploaded_file($_FILES['thumb']['tmp_name'],"../library/thumbs/".$prod_key.'.jpg') or print("Couldn't Upload Your thumb File.");
			move_uploaded_file($_FILES['large_view']['tmp_name'],"../library/enlarge/".$prod_key.'.jpg') or print("Couldn't Upload Your Large File.");
		}
	}
?>
<html>
<head>
<title>Administration Section</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="Javascript1.2">
<!--

<!-- // load htmlarea
_editor_url = "";                     // URL to htmlarea files
var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);
if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
if (win_ie_ver >= 5.5) {
  document.write('<scr' + 'ipt src="' +_editor_url+ 'editor.js"');
  document.write(' language="Javascript1.2"></scr' + 'ipt>');  
} else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
// -->
//-->
</script>
<link href="../joras/myStyle.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#E6D9A8" onResize="if (navigator.family == 'nn4') window.location.reload()">
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("header.inc.php");?></td>
  </tr>
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="25%" valign="top" class="txtbox_1"><?php include("include_left.inc.php");?></td>
        <td><?php
				if (isset($result))
				{
			?>
          <table width="95%"  border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td bgcolor="#CC0000">
                <table width="100%"  border="0" cellspacing="1" cellpadding="0">
                  <tr>
                    <td bgcolor="#FDE9E8"><table width="100%"  border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td align="center" class="mainmenu1">The product has been successfully added.</td>
                        </tr>
                    </table></td>
                  </tr>
              </table></td>
            </tr>
          </table>
          <?php }?>
		  <form action="<?php print $PHP_SELF; ?>" method="post" enctype="multipart/form-data" name="addform" id="addform">
		    <table width="98%"  border="0" align="center" cellpadding="2" cellspacing="1">
              <tr>
                <td class="smallblack">Product Name</td>
                <td><INPUT class=smalldarkgrey id=name2 name=product_name></td>
              </tr>
              <tr>
                <td class="smallblack">Add product in</td>
                <td><select name="category_id" id="category_id">
				<?php
					$cat_sql = "select * from tbl_category order by category_id asc";
					$cat_result = mysql_query($cat_sql) or die(mysql_error());
					while ($cat_row = mysql_fetch_array($cat_result))
					{					
				?>
				<option value="<?=$cat_row['category_id']?>"><?=$cat_row['cat_name']?></option>
				<?php } ?>
                </select></td>
              </tr>
              <tr>
                <td class="smallblack">Serial Key</td>
                <td><INPUT class=smalldarkgrey id=serial_key2 maxLength=100 name=prod_key></td>
              </tr>
              <tr>
                <td valign="top" class="smallblack">Product Description</td>
                <td class="smalltext"><textarea name='product_description' cols='50' rows='15' class="smallblack" id="textarea"></textarea>
                    <script language="javascript1.2">
			var config = new Object();    // create new config object
			config.width = "90%";
			config.height = "200px";
			config.bodyStyle = 'background-color: white; font-family: "Verdana"; font-size: x-small;';
			config.debug = 0;

			// NOTE:  You can remove any of these blocks and use the default config!

			config.toolbar = [
			    ['fontname'],
			    ['fontsize'],
			    ['fontstyle'],
			    ['linebreak'],
			    ['bold','italic','underline','separator'],
			//  ['strikethrough','subscript','superscript','separator'],
			    ['justifyleft','justifycenter','justifyright','separator'],
			    ['OrderedList','UnOrderedList','Outdent','Indent','separator'],
				['forecolor','backcolor','separator'],
				['HorizontalRule','Createlink','htmlmode','separator'],
				['about','popupeditor'],
			];

			config.fontnames = {
				"Arial":           "arial, helvetica, sans-serif",
				"Courier New":     "courier new, courier, mono",
				"Georgia":         "Georgia, Times New Roman, Times, Serif",
				"Tahoma":          "Tahoma, Arial, Helvetica, sans-serif",
				"Times New Roman": "times new roman, times, serif",
				"Verdana":         "Verdana, Arial, Helvetica, sans-serif",
				"impact":          "impact",
				"WingDings":       "WingDings"
			};
			config.fontsizes = {
				"1 (8 pt)":  "1",
				"2 (10 pt)": "2",
				"3 (12 pt)": "3",
				"4 (14 pt)": "4",
				"5 (18 pt)": "5",
				"6 (24 pt)": "6",
				"7 (36 pt)": "7"
			  };

				//config.stylesheet = "http://www.domain.com/sample.css";
				  
				config.fontstyles = [   // make sure classNames are defined in the page the content is being display as well in or they won't work!
				  { name: "headline",     className: "headline",  classStyle: "font-family: arial black, arial; font-size: 28px; letter-spacing: -2px;" },
				  { name: "arial red",    className: "headline2", classStyle: "font-family: arial black, arial; font-size: 12px; letter-spacing: -2px; color:red" },
				  { name: "verdana blue", className: "headline4", classStyle: "font-family: verdana; font-size: 18px; letter-spacing: -2px; color:blue" }
				
				// leave classStyle blank if it's defined in config.stylesheet (above), like this:
				//  { name: "verdana blue", className: "headline4", classStyle: "" }  
				];
				
				editor_generate('product_description',config);
			                                              </script></td>
              </tr>
              <TR>
                <TD><FONT class=smallblack>Single Unit Price</FONT></TD>
                <TD class="smallblack">US$
                    <INPUT name=single_unit_price class=smalldarkgrey id=Model2 size="12" maxLength=100></TD>
              </TR>
              <TR>
                <TD class="smallblack">Bulk Unit Price</TD>
                <TD class="smallblack">US$
                    <input name="bulk_unit_price" type="text" class="smalldarkgrey" id="door2" size="12"></TD>
              </TR>
              <TR>
                <TD class="smallblack">Minimum Bulk No.</TD>
                <TD><input name="min_bulk_order" type="text" class="smalldarkgrey" id="seat2" size="10"></TD>
              </TR>
              <TR>
                <TD><FONT class=smallblack>Unit of the product</FONT></TD>
                <TD><INPUT class=smalldarkgrey id=Color3 maxLength=50 name=unit></TD>
              </TR>
              <TR>
                <TD colspan="2"><spacer type="block" height="1"></TD>
              </TR>
              <TR>
                <TD colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="2">
                    <tr>
                      <td><table width="100%"  border="0" cellpadding="2" cellspacing="0" class="smallblack">
                          <tr>
                            <td width="6%">
                              <script language=javascript>
											  function browseImage1()
											  {
												  if(document.addform.isImage1.checked)
												  {
													document.addform.thumb.disabled=false;
													document.addform.large_view.disabled=false;
												  }
												  else
												  {
													document.addform.thumb.disabled=true;
													document.addform.large_view.disabled=true;
													}
											 }
											      </script>
                              <input name="isImage1" type="checkbox" class="MainMenuSelected" value="checkbox" onClick="browseImage1()"></td>
                            <td width="94%">Upload Images</td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="1" bgcolor="#FFFFFF"><spacer type="block" height="1"></td>
                    </tr>
                    <tr>
                      <td class="smallnavy"><strong>Picture 1 </strong></td>
                    </tr>
                    <tr>
                      <td><table width="100%"  border="0" cellpadding="2" cellspacing="0" class="smallblack">
                          <tr>
                            <td width="25%">Small Thumbnail<br>
                              (<span class="smallred">124 x 56 px</span>) </td>
                            <td width="75%">
                              <input name="thumb" type="file" disabled class="formField" id="thumb2" size="40"></td>
                          </tr>
                          <tr>
                            <td>Large Picture</td>
                            <td><input name="large_view" type="file" disabled class="formField" id="large_view2" size="40"></td>
                          </tr>
                      </table></td>
                    </tr>
                </table></TD>
              </TR>
              <TR>
                <TD colspan="2"><spacer type="block" height="1"></TD>
              </TR>
              <TR>
                <TD colspan=2><table width="40%"  border="0" cellspacing="0" cellpadding="2">
                    <tr>
                      <td align="right">
                        <input name="add" type="submit" class="formField" id="add" value="Add the product &raquo;"></td>
                    </tr>
                </table></TD>
              </TR>
            </table>                                      
              </form></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><?php include("footer.inc.php");?></td>
  </tr>
</table>
</body>
</html>
<?php mysql_close();?>