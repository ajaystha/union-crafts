<?php
	foreach ($_POST as $key => $val) 
	{
		$val = preg_replace("/^\r\n+/","",$val);
		$val = str_replace('\"','"',$val);
		$$key = str_replace("\'","'",$val);
	}
	session_save_path('../tmp');
	session_start();
	if (!session_is_registered("atijoras"))
		header("Location: index.php");
?>
<?php include("../include_connect_database.php.inc"); ?>
<?php
	if (isset($update))
	{
		$answer=addslashes($answer);
		// $answer=str_replace('"',"|",$answer);		
		$update_sql = "update tbl_company set company_text ='$answer' where company_id='$editorial_id'";
		// print $update_sql;
		$update_result = mysql_query($update_sql) or die(mysql_error());
		$num_of_rows = mysql_affected_rows();
	}
?>
<html>
<head>
<title>Administration Section</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
<link href="../joras/landing.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#FFFFFF">
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("header.inc.php");?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25%" valign="top" class="txtbox_1"><?php include("include_left.inc.php");?></td>
    <td valign="top"><?php
			if (!isset($update))
			{
		?>
		<form action="<?php print $_SERVER['../cms/PHP_SELF'];?>" method="post" name="update_company" id="update_company">
      <?php 
				$id = $editorial_id;
				// print $id."--";
				$editorial_sql = "select * from tbl_company";
				// print $editorial_sql;
				$editorial_result = mysql_query($editorial_sql) or die(mysql_error());
				$editorial_row = mysql_fetch_array($editorial_result);
			?>
      <table width="100%"  border="0" cellspacing="0" cellpadding="2" style="border:0px">
        <tr>
          <td align="right" valign="top" class="cellbgbl formText">Company Profile  : </td>
          <td><textarea name="answer" cols="50" rows="15" class="formField" id="answer"><?=$editorial_row[company_text]?></textarea>
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
					['HorizontalRule','Createlink','InsertTable','InsertImage','htmlmode','separator'],
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
				</script></td>
        </tr>
        <tr>
          <td><input name="editorial_id" type="hidden" id="editorial_id" value="<?=$editorial_row[company_id]?>"></td>
          <td><input name="update" type="submit" class="formField" id="update" value="Update >>"></td>
        </tr>
      </table>
    </form>
	<?php
		}
		else
		{
			if (isset($num_of_rows))
			{
	?>
    <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" bordercolorlight="#C0C0C0">
      <tr>
        <td align="center" class="phone"> Company Profile Updated Successfully.</td>
      </tr>
    </table>
	<?php				
			}
	?>
	<?php }?></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td><?php include("footer.inc.php");?></td>
  </tr>
</table>
</body>
</html>