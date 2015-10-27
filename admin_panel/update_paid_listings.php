<?php
	session_save_path('../tmp');
	session_start();
	include("../cms/check_session.php");
?>
<?php include("../cms/include_connect_database.php"); ?>
<?php
	foreach ($_POST as $key => $val) 
	{
		$val = preg_replace("/^\r\n+/","",$val);
		$val = str_replace('\"','"',$val);
		$$key = str_replace("\'","'",$val);
	}
	foreach ($_GET as $key => $val) 
	{
		$val = preg_replace("/^\r\n+/","",$val);
		$val = str_replace('\"','"',$val);
		$$key = str_replace("\'","'",$val);
	}
	
	if (isset($update))
	{
		$answer = addslashes($answer);

		$update_sql = "update tbl_paid_listing set paid_text ='$answer' where paid_listing_id='$editorial_id'";
		// print $update_sql;
		$update_result = mysql_query($update_sql) or die(mysql_error());
		$num_of_rows = mysql_affected_rows();
	}
?>
<html>
<head>
<title>Administration Section of NepalYellowPage.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../cms/admstyle.css" type="text/css">
<script language="Javascript1.2"><!-- // load htmlarea
_editor_url = "";                     // URL to htmlarea files
var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);
if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
if (win_ie_ver >= 5.5) {
  document.write('<scr' + 'ipt src="' +_editor_url+ 'editor.js"');
  document.write(' language="Javascript1.2"></scr' + 'ipt>');  
} else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
// --></script>
</head>
<body bgcolor="#FFFFFF">
<?php include("../cms/header.php");?>
<?php
	if (!isset($update))
	{
?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25%" valign="top"><?php include("../cms/include_left.php"); ?></td>
    <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>          <font color="#006600" size="5"><b><font face="Arial, Helvetica " color="#AA0000">Update <b>Paid Listings </b></font></b></font></td>
      </tr>
      <tr>
        <td><form action="<?php print $_SERVER['../cms/PHP_SELF'];?>" method="post" name="update_editorial" id="update_editorial">
            <?php 
				include("../cms/include_connect_database.php");
				$id = $editorial_id;
				// print $id."--";
				$editorial_sql = "select * from tbl_paid_listing";
				// print $editorial_sql;
				$editorial_result = mysql_query($editorial_sql) or die(mysql_error());
				$editorial_row = mysql_fetch_array($editorial_result);
			?>
            <table width="100%"  border="0" cellspacing="0" cellpadding="2" style="border:0px">
              <tr>
                <td width="150" align="right"><span class="arl9"><strong>Paid Listings Text : </strong></span></td>
                <td width="75%"><textarea name="answer" cols="90" id="answer"><?=$editorial_row[paid_text]?>
		  </textarea>
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
					['HorizontalRule','Createlink','InsertImage','htmlmode','separator'],
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
					
					editor_generate('answer',config);
				</script>
                    <span class="arl9"> </span></td>
              </tr>
              <tr>
                <td width="150"><input name="editorial_id" type="hidden" id="editorial_id" value="<?=$editorial_row[paid_listing_id]?>"></td>
                <td><input name="update" type="submit" id="update" value="Update >>"></td>
              </tr>
            </table>
        </form></td>
      </tr>
    </table></td>
  </tr>
</table>	
<?php
	}
?>
    <?php
	if (isset($num_of_rows))
	{
?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="25%" valign="top"><?php include("../cms/include_left.php"); ?></td>
        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="5" align="center" bordercolorlight="#C0C0C0">
          <tr>
            <td align="center"><DIV align="center">              <font color="#006600" size="5"><b><font color="#006600" size="5"><b><FONT face="Arial, Helvetica " color="#AA0000">Paid Listings Updated Successfully. </FONT></b></font></b></font></DIV>
            </td>
          </tr>
        </table></td>
      </tr>
</table>    
    <?php }?>
<table width="500" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
        <td>
          <div align="right">
            <hr noshade color="#006600">
        </div></td>
      </tr>
      <tr>
        <td>
          <div align="center">|| <a href="logout.php"><font face="Arial, Helvetica " size="2"><b>LOGOUT</b></font></a> || <a href="index.php"><font face="Arial, Helvetica " size="2"><b>RE-LOGIN</b></font></a> || <a href="admin.php"><font face="Arial, Helvetica " size="2"><b>ADMIN PAGE </b></font></a><a href="../cms/admin.php%3Cb%3E%3Cfont%20face="Arial, Helvetica" size="2"></font></b></a> ||</div></td>
      </tr>
</table>
    <hr noshade color="#006600">
    <div align="center"><font face="Arial, Helvetica " size="2" >Copyright © : 2001-2004 viewnepal.net<br>
  All rights reserved </font> </div>
</body>
</html>