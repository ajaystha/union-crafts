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

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
<link href="../joras/landing.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#FFFFFF">
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  	<tr>
    	<td><?php include("header.inc.php");?></td>
	</tr>
	<tr>
		<td>
		<table width="100%"  border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td width="25%" valign="top" class="txtbox_1"><?php include("include_left.inc.php");?></td>
			<td valign="top" style="padding:2px"><?php
					if (!isset($alert))
					{
				?>
				<form action="<?php print $_SERVER['../cms/PHP_SELF'];?>" method="post" name="send_alert" id="send_alert" onSubmit="MM_validateForm('subject','','R','body','','R');return document.MM_returnValue">
		<table width="98%"  border="0" align="center" cellpadding="2" cellspacing="0" style="border:0px">
        <tr>
          <td colspan="2" valign="top" class="pophead">Send Alerts</td>
        </tr>
        <tr bgcolor="#990000">
          <td height="1" colspan="2" style="padding:0px"><spacer></spacer></td>
        </tr>
        <tr>
          <td colspan="2" valign="top" class="cellbgbl formText"><spacer></spacer></td>
          </tr>
        <tr>
          <td align="right" valign="top" class="cellbgbl formText">Send Alert to : </td>
          <td><input name="radio1" type="radio" value="all" checked onclick="HideStuff(1)" />
            All members
            <input name="radio1" type="radio" value="single" onclick="ShowStuff(1)" />
            Single Member <input name="txtShow1" type="text" id="txtShow1" style="display:none;" value="" size="40" />
			<script type="text/javascript">
			<!--
				function ShowStuff(controlToHide)
				{
					if (document.getElementById)
					{
						// Hide all regions
						document.getElementById('txtShow1').style.display = 'none';
						document.getElementById('txtShow1').disabled = 'disabled';
						// Display the requested region
						document.getElementById
							('txtShow' + controlToHide).style.display = 'block';
						document.getElementById
							('txtShow' + controlToHide).disabled = '';
					}
					else
					{
						alert('Sorry, your browser doesn\'t support this');
					}
				}
				function HideStuff(controlToHide)
				{
					if (document.getElementById)
					{
						// Hide all regions
						document.getElementById('txtShow1').style.display = 'block';
						document.getElementById('txtShow1').disabled = '';
						// Display the requested region
						document.getElementById
							('txtShow' + controlToHide).style.display = 'none';
						document.getElementById
							('txtShow' + controlToHide).disabled = 'none';
					}
					else
					{
						alert('Sorry, your browser doesn\'t support this');
					}
				}
			-->		
			</script></td>
        </tr>
        <tr>
          <td align="right" valign="top" class="cellbgbl formText">Send BCc to : </td>
          <td><input name="cc" type="text" id="cc" size="40"></td>
        </tr>
        <tr>
          <td align="right" valign="top" class="cellbgbl formText">Subject : </td>
          <td><input name="subject" type="text" id="subject" size="50"></td>
        </tr>
        <tr>
          <td align="right" valign="top" class="cellbgbl formText">Message Content   : </td>
          <td><textarea name="body" cols="50" rows="15" class="formField" id="body"></textarea>         
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
				    ['strikethrough','subscript','superscript','separator'],
					['justifyleft','justifycenter','justifyright','separator'],
					['OrderedList','UnOrderedList','Outdent','Indent','separator'],
					['forecolor','backcolor','separator'],
					['HorizontalRule','Createlink','InsertTable','htmlmode','separator'],
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
					
					editor_generate('body',config);
				</script></td>
        </tr>
        <tr>
          <td><input name="editorial_id" type="hidden" id="editorial_id" value="<?=$editorial_row[company_id]?>"></td>
          <td><input name="alert" type="submit" class="formField" id="alert" value="Send Alert &raquo;"></td>
        </tr>
      </table>
    </form>
	<?php
		}
		else
		{
			/*********************************************************************
			This displays email address from the alert list. Those members who 
			registered to be a part of this alert is listed below.
			*********************************************************************/
			if ($radio1 == 'all')
			{
				$m_sql = "select email from tbl_auto_alert where alert='on'";
				$m_result = mysql_query($m_sql) or die("Oops!!!");
				$email = "";

				while($m_row = mysql_fetch_array($m_result))
				{
					$email .= $m_row[email];
					/* recipients */
					$to  = $email;
					
					/* subject */
					$subject = $subject;
					
					/* message */
					$message = $body;
					$unsubscribe = "This email is not spam. You signed up for this auto alert email list at grishaauto.com.<br><br>If you would like to unsubscribe from the grishaauto.com update auto alert email list, just click the link below <a href='http://www.grishaauto.com/unsubscribe.php?email=".$m_row[email]."'>http://www.grishaauto.com/unsubscribe.php?email=".$m_row[email]."</a>.<br><br>If the link above does not show in your email program just cut and paste it to your browser.";
					
					$message .= "<br><br><p align='center'>************************************************************************</p><p>".$unsubscribe."</p>";
					
					/* To send HTML mail, you can set the Content-type header. */
					$headers  = "MIME-Version: 1.0\r\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
					
					/* additional headers */
					$headers .= "From: Auto Alert Section of GrishaAuto.com <info@grishaauto.com>\r\n";			
					
					/* and now mail it */
					print("Sending email to <strong>$to</strong>....");
					if (mail($to, $subject, $message, $headers))
					//if (false)
						print "<font color=green>SUCCESS</FONT><BR>";
					else
						print "<font color=red>FAILED</font><br>";					
					
					//print $message."<br>";
					$message = "";
					$email = "";
				}
				if (isset($cc))					
				{
					print("Sending email to <strong>$cc</strong>....");
					if (mail($cc, $subject, $message, $headers))
					//if (false)
						print "<font color=green>SUCCESS</FONT><BR>";
					else
						print "<font color=red>FAILED</font><br>";
				}
			}
			else
			if ($radio1 == 'single')
			{
				$to  = $txtShow1;
				
				/* subject */
				$subject = $subject;
				
				/* message */
				$message = $body;
				
				/* To send HTML mail, you can set the Content-type header. */
				$headers  = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
				
				/* additional headers */
				$headers .= "From: Auto Alert Section of GrishaAuto.com <info@grishaauto.com>\r\n";			
				
				/* and now mail it */
				print("Sending email to <strong>$to</strong>....");
				if (mail($to, $subject, $message, $headers))
				//if (false)
					print "<font color=green>SUCCESS</FONT><BR>";
				else
					print "<font color=red>FAILED</font><br>";
					
				if (isset($cc))					
				{
					print("Sending email to <strong>$cc</strong>....");
					if (mail($cc, $subject, $message, $headers))
					//if (false)
						print "<font color=green>SUCCESS</FONT><BR>";
					else
						print "<font color=red>FAILED</font><br>";
				}
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