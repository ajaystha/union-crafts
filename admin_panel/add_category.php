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
<link href="../joras/myStyle.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#E6D9A8">
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("header.inc.php");?>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="25%" valign="top" class="txtbox_1"><?php include("include_left.inc.php");?></td>
    <td valign="top"><?php
		if (!isset($Submit))
		{
	?>
	<form name="addform" method="post" action="<?php print $_SERVER['PHP_SELF'];?>">
        <table border="0" cellspacing="0" cellpadding="3" align="center">
          <tr class="smalltext">
            <td colspan="2" class="pophead"> <strong>Add Category</strong></td>
          </tr>
          <tr class="smalltext">
            <td align="right" class="cellbgbl formText">Category Name  :</td>
            <td><input name="name" type="text" class="smallblack" id="name" size="60"></td>
          </tr>
          <tr class="smalltext">
            <td align="right" valign="top" class="cellbgbl formText"> Short Description:</td>
            <td><textarea name='answer' cols='50' rows='15' class="smallblack"></textarea>
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
				
				editor_generate('answer',config);
			</script></td>
          </tr>
          <tr class="smalltext">
            <td><spacer></spacer></td>
            <td align="center"><input name='Submit' type='submit' class="formField" value='Add Now'></td>
          </tr>
        </table>
    </form><?php
		}
		else
		{
			$name = addslashes($name);
			$desc = addslashes($answer);
			// print $desc."==";
			$query="INSERT INTO tbl_category (cat_name, description) VALUES('$name', '$desc')";
			$result=mysql_query($query) or die(mysql_error());
			if ($result)
			{
				$today = date("Y-m-d");
				$update_sql = "update tbl_last_updated set date='$today' where id=1";
				$update_result = mysql_query($update_sql);
		?>
			<table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
				<tr>
					<td colspan="2" align="center" class="smalltext">Add Category</td>
				</tr>
				  <tr>
					<td colspan="2" align="center" class="smalltext"><font color="#FF0000" face="Arial, Helvetica, sans-serif"><b>Successfully added Category</b></font></td>
				  </tr>
				  <tr>
					<td colspan="2" align="center" class="smalltext"><a href="add_category.php" class="arl9">Go Back to another Category</a></td>
				  </tr>
			</table>
		<?php
				}
			}
	?></td>
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