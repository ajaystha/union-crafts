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
		if (!isset($Submit) && !isset($id))
		{
	?>
	<table width="95%"  border="1" align="center" cellpadding="2" cellspacing="0">
	  <tr bgcolor="#D5BF6A" class="smallblack">
		<td width="45" class="formText"><strong>S. No.</strong></td>
		<td class="formText"><strong>Title</strong></td>
		<td class="formText"><strong>Option</strong></td>
	  </tr>
	  	<?php
			$faq_sql = "select * from tbl_news";
			$faq_result = mysql_query($faq_sql) or die("Oops!!!");
			$count  = 1;
			while ($row = mysql_fetch_array($faq_result))
			{
		?>
		<tr valign="top" class="smallblack">
		<td align="center"><?=$count?>.</td>
		<td><?=substr($row[news_in_detail], 0,91)?>.....</td>
		<td width="80" class="smallblack"><a href="modify_news.php?id=<?=$row[news_id]?>" class="smallblue">Modify this &raquo;</a></td>
	  </tr><?php 
	  		$count++;
		}
	?>
	</table>
	<?php
		}
		else
		if (isset($id))
		{
			$m_sql = "select * from tbl_news where news_id='$id'";
			$m_result = mysql_query($m_sql) or die("Oops!!! Error retrieving the news.");
			$m_row = mysql_fetch_array($m_result);
	?>
	<form action="<?php print $_SERVER['PHP_SELF'];?>" method="post" name="modifyForm" id="modifyForm">
      <table border="0" cellspacing="0" cellpadding="3" align="center">
        <tr>
          <td colspan="2" class="mediumtext"><strong>Modify NEWS
            <input name="news_id" type="hidden" id="news_id" value="<?=$m_row[news_id]?>">
          </strong></td>
        </tr>
        <tr class="smallblack">
          <td align="right" valign="top" class="cellbgbl formText">News posted on :</td>
          <td><input name="date" type="text" class="smallblack" id="date" value="<?=$m_row[news_posted_on]?>" size="30"></td>
        </tr>
        <tr class="smallblack">
          <td align="right" valign="top" class="cellbgbl formText"> NEWS in detail :</td>
          <td class="smalltext"><textarea name='news' cols='50' rows='15' class="smallblack" id="news"><?=$m_row[news_in_detail]?>
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
				
				editor_generate('news',config);
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
			$news = addslashes($news);
			
			$u_sql = "update tbl_news set news_in_detail='$news', news_posted_on='$date' where news_id='$news_id'";
			// print $u_sql;
			$u_result = mysql_query($u_sql) or die("Sorry could not update the NEWS.");
			if ($u_result)
			{
				$today = date("Y-m-d");
				$update_sql = "update tbl_last_updated set date='$today' where id=1";
				$update_result = mysql_query($update_sql);
	?>
	  <table width="95%"  border="0" align="center" cellpadding="5" cellspacing="0">
        <tr>
          <td><span class="mediumred">You request to change a NEWS has been successfully completed. Please <a href="modify_news.php" class="mediumred">click here</a> to go to modify NEWS section.</span></td>
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