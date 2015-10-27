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
    <td><?php include("header.inc.php");?></td></tr>
	<tr><td>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="25%" valign="top" class="txtbox_1"><?php include("include_left.inc.php");?></td>
    <td valign="top"><?php
		if (!isset($Submit) && !isset($category_id))
		{
	?>
	<table  border="1" align="center" cellpadding="2" cellspacing="0">
	  <tr class="smallblack">
		<td width="100" class="formText"><strong>Category No.</strong></td>
		<td class="formText"><strong>Name</strong></td>
		<td class="formText"><strong>Option</strong></td>
	  </tr>
	  	<?php
			$faq_sql = "select * from tbl_category";
			$faq_result = mysql_query($faq_sql) or die("Oops!!!");
			$count  = 1;
			while ($row = mysql_fetch_array($faq_result))
			{				
		?>
		<tr valign="top" class="smallblack">
		<td align="center"><?=$count?>.</td>
		<td><?=$row[cat_name]?></td>
		<td width="100"><a href="modify_category.php?category_id=<?=$row[category_id]?>" class="smallred">Modify this &raquo;</a></td>
	  </tr><?php 
	  		$count++;
		}
	?>
	</table>
	<?php
		}
		else
		if (isset($category_id))
		{
			$m_sql = "select * from tbl_category where category_id='$category_id'";
			$m_result = mysql_query($m_sql) or die("Oops!!! Error retrieving the Category.");
			$m_row = mysql_fetch_array($m_result);
	?>
<form action="<?php print $_SERVER['PHP_SELF'];?>" method="post" name="modifyForm" id="modifyForm">
<table border="0" cellspacing="0" cellpadding="3" align="center">
        <tr class="smallblack">
          <td colspan="2" class="pophead"><strong>Modify Category
            <input name="id" type="hidden" id="id" value="<?=$m_row[category_id]?>">
          </strong></td>
        </tr>
        <tr class="smallblack">
          <td align="right" class="cellbgbl formText">Category Name :</td>
          <td><input name="question" type="text" class="smallblack" value="<?=$m_row[cat_name]?>" size="60"></td>
        </tr>
        <tr class="smallblack">
          <td align="right" valign="top" class="cellbgbl formText"> Category Description :</td>
          <td><textarea name='answer' cols='50' rows='15' class="smallblack"><?=$m_row[description]?>
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
        <tr>
          <td><spacer></spacer></td>
          <td align="center"><input name='Submit' type='submit' class="formField" value='Modify Now &raquo;'></td>
        </tr>
      </table>
	  </form>
	  <?php
	  	}
		else
		if (isset($Submit))
		{
			$name = addslashes($question);
			$desc = addslashes($answer);
			$u_sql = "update tbl_category set cat_name='$name', description='$desc' where category_id='$id'";
			// print $u_sql;
			$u_result = mysql_query($u_sql) or die("Sorry could not update the Category.");
			if ($u_result)
			{
				$today = date("Y-m-d");
				$update_sql = "update tbl_last_updated set date='$today' where id=1";
				$update_result = mysql_query($update_sql);
	?>
	  <table width="95%"  border="0" align="center" cellpadding="5" cellspacing="0">
        <tr>
          <td><span class="mediumred">You request to change a Category has been successfully completed. Please <a href="modify_category.php" class="mediumred">click here</a> to go to modify Category section.</span></td>
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