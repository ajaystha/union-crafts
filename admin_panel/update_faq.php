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
	
	if (isset($submit))
	{
		$x = 0;
		$total_records_deleted = count($array);
		// print $total_records_deleted;
		while($x < $total_records_deleted)
		{
			$sql = "delete from tbl_faq where faq_id=$array[$x]";
			// print $sql;
			$result = mysql_query($sql) or die(mysql_error());
			if(!result)
			{
				mysql_error();
			}
			else
			{
				print "<font color=#FF0000><p class=arl9>FAQ ".$array[$x]." has been deleted successfully.<br>";
			}
			$x++;
		}
	}
	if (isset($update))
	{
		$answer = addslashes($answer);
		$question = addslashes($question);
		$update_sql = "update tbl_faq set faq_quest='$question', faq_ans='$answer' where faq_id='$id'";
		// print $update_sql;
		$update_result = mysql_query($update_sql);
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
	if ($action == 'update')
	{
?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25%" valign="top"><?php include("../cms/include_left.php"); ?></td>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="5" align="center" bordercolorlight="#C0C0C0">
      <form action="<?php print $_SERVER['../cms/PHP_SELF']; ?>" method="post" name="update_faq" id="update_faq">
        <tr>
          <td colspan="2">                <font color="#006600" size="5"><b><font face="Arial, Helvetica " color="#AA0000">Update </font><font color="#006600" size="5"><b><FONT face="Arial, Helvetica " color="#AA0000">FAQ</FONT></b></font></b></font></td>
        </tr>
        <tr>
          <td colspan="2"><?php 
	  		include("../cms/include_connect_database.php");
			$id = $faq_id;
			// print $id."--";
			$faq_sql = "select * from tbl_faq where faq_id='$id'";
			// print $faq_sql;
			$faq_result = mysql_query($faq_sql) or die(mysql_error());
			$faq_row = mysql_fetch_array($faq_result);		
		?>
          </td>
        </tr>
        <tr>
          <td width="232" class="arl9"><strong>Question : </strong></td>
          <td width="368"><input name="question" type="text" id="question" value="<?=$faq_row[faq_quest]?>" size="100"></td>
        </tr>
        <tr>
          <td class="arl9"><strong>Answers : </strong></td>
          <td><textarea name="answer" cols="70" rows="10" id="answer"><?=$faq_row[faq_ans]?>
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
			</script>
          </td>
        </tr>
        <tr>
          <td><input name="id" type="hidden" id="id" value="<?=$faq_row[faq_id]?>"></td>
          <td><input name="update" type="submit" id="update" value="Update >>"></td>
        </tr>
      </form>
    </table></td>
  </tr>
</table>	
<?php
  }
  else
	if (isset($num_of_rows))
	{
?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="25%" valign="top"><?php include("../cms/include_left.php"); ?></td>
      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="5" align="center" bordercolorlight="#C0C0C0">
        <tr>
          <td align="center"><DIV align="center">              <font color="#006600" size="5"><b><font color="#006600" size="5"><b><FONT face="Arial, Helvetica " color="#AA0000">FAQ Updated Successfully. </FONT></b></font></b></font></DIV>
          </td>
        </tr>
        <tr>
          <td align="center"><a href="update_faq.php" class="arl9">Go Back to FAQ Update Panel</a></td>
        </tr>
      </table></td>
    </tr>
</table> 
<?php } else { ?> 
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
   <tr>
     <td width="25%" valign="top"><?php include("../cms/include_left.php"); ?></td>
     <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="5" align="center" bordercolorlight="#C0C0C0">
       <tr>
         <td colspan="2">
             <font color="#006600" size="5"><b><font face="Arial, Helvetica " color="#AA0000">Update </font><font color="#006600" size="5"><b><FONT face="Arial, Helvetica " color="#AA0000">FAQ</FONT></b></font></b></font></td>
       </tr>
       <tr>
         <td colspan="2"><?php include("../cms/include_connect_database.php"); ?></td>
       </tr>
       <tr>
         <form action="add_faq.php" method="post" name="add_faq" id="add_faq">
           <td width="232"><font face="Arial, Helvetica " size="2">Add FAQ:</font></td>
           <td width="368"><input name="add_faq" type="submit" id="add_faq" value="add  >>"></td>
         </form>
       </tr>
       <tr>
         <td colspan="2"><?php	
			$num_per_page=10; 
			if (!isset($page_number))
				$page_number = 1;
			else
				$page_number++;
			// print $page_number."->";
			
			$start_record=(($page_number * $num_per_page) - $num_per_page); 
			// print $start_record."->";
			$total_sql = "select * from tbl_faq";
			$total_result = mysql_query($total_sql);
			$total_rows = mysql_num_rows($total_result);
			
			/*
			$sql="select * from tbl_subcat limit $start_record,$num_per_page";
			$result = mysql_query($sql);
			while ($row = mysql_fetch_array($result))
				print $row[id]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row[name]."<br>";
			*/
			
			if($page_number > 1)
			{
				// print $page_number;
				$previous_page_number=$page_number-2;		
				print "<a href='".$_SERVER['PHP_SELF']."?page_number=".$previous_page_number."'>&laquo; Previous </a>";
			}
							
			/////////////////////////////////////////////
			if($total_rows>$num_per_page)
			{
				for($i=1;$i<=ceil($total_rows/$num_per_page);$i++)
				{
					if($i==$page_number)
					{
						$show_i=$i-1;
						print " | <a href='".$_SERVER['PHP_SELF']."?page_number=$show_i'><strong><font color='maroon'>$i</font></strong></a>"; 
					}
					else
					{	
						$show_i=$i-1;
						print " | <a href='".$_SERVER['PHP_SELF']."?page_number=$show_i'>$i</a>"; 
					}
				}
			}
			/////////////////////////////////////////////
			
			$first_page_number=$page_number * $num_per_page;
			$last_page_number = $num_per_page;
			if ($page_number*$num_per_page<$total_rows)
				print " | <a href='".$_SERVER['PHP_SELF']."?page_number=$page_number'>Next &raquo;</a>";
		?></td>
       </tr>
       <tr>
         <td colspan="2"><table width="100%"  border="1" cellspacing="0" cellpadding="2" style="border:1px solid green">
             <form action="<?php print $_SERVER['../cms/PHP_SELF']; ?>" method="post" name="delete_selected" id="delete_selected">
               <?php
	  	$faq_sql = "select * from tbl_faq limit $start_record,$num_per_page";
		$faq_result = mysql_query($faq_sql) or die(mysql_error());
		while($row = mysql_fetch_array($faq_result))
		{
			print '<tr class=arl9>';
				print '<td width=9><img src="../pictures/but.gif" width="9" height="9"></td>';
				print '<td>'.$row[faq_quest].'</td>';
				print '<td><a href="update_faq.php?action=update&faq_id='.$row[faq_id].'">update &raquo;</a></td>';
				print '<td><input type=checkbox name=array[] value='.$row[faq_id].'></td>';
		  	print '</tr>';
		}
	?>
               <tr>
                 <td colspan="4" align="right" style="border:0px"><input name="submit" type="submit" id="submit" value="Delete Selected">
                 </td>
               </tr>
             </form>
         </table></td>
       </tr>
     </table></td>
   </tr>
</table>
 <?php } ?>
<table width="500" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
    <td> 
      <div align="right"> 
        <hr noshade color="#006600">
      </div>
    </td>
  </tr>
  <tr> 
    <td> 
      <div align="center">|| <a href="logout.php"><font face="Arial, Helvetica " size="2"><b>LOGOUT</b></font></a> 
        || <a href="index.php"><font face="Arial, Helvetica " size="2"><b>RE-LOGIN</b></font></a> 
        || <a href="admin.php"><font face="Arial, Helvetica " size="2"><b>ADMIN PAGE </b></font></a><a href="../cms/admin.php%3Cb%3E%3Cfont%20face="Arial, Helvetica" size="2"></font></b></a> ||</div>
    </td>
  </tr>
</table>
<hr noshade color="#006600">
<div align="center"><font face="Arial, Helvetica " size="2" >Copyright 
  © : 2001-2004 viewnepal.net<br>
  All rights reserved  </font> </div>
</body>
</html>