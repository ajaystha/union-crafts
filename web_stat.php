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
?>
<html>
<head>
<title>View Web Page Hit Statistics of CafeDeWheels.com.np</title>
<style type="text/css">
<!--
.arl9 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9pt;
}
-->
</style>
</head>

<body>
<p><strong><font size="3" face="Arial, Helvetica, sans-serif">Statistics of <a href="http://www.unioncrafts.com">www.unioncrafts.com</a></font></strong></p>
<table width="300" border="0" cellpadding="2" cellspacing="1" bgcolor="#EAF4FF" style="border: #0066CC 1pt solid">
  <tr class="arl9"> 
    <td width="92"><strong>Since Date</strong></td>
    <td width="195">
		<?
			$file="cgi-bin/since_date.txt";
			$opfile=fopen($file, "r") or die("Couldn't open $file");
			print fgets($opfile,1024);
			fclose($opfile);
		?>
	</td>
  </tr>
  <tr class="arl9"> 
    <td><strong>Visitor Counter</strong></td>
    <td>
      <?
		$file="cgi-bin/visitor_counter.txt";
		$opfile=fopen($file, "r") or die("Couldn't open $file");
		print fgets($opfile,1024);
		fclose($opfile);
	?>
    </td>
  </tr>
  <tr class="arl9"> 
    <td><strong>Hits Counter</strong></td>
    <td>
      <?
$file="cgi-bin/hit_counter.txt";
$opfile=fopen($file, "r") or die("Couldn't open $file");
print fgets($opfile,1024);
fclose($opfile);
	?>
    </td>
  </tr>
</table>
<br>
<table width="100%" border="0" cellspacing="1" cellpadding="2">
  <tr bgcolor="#0066CC"> 
    <td class="arl9"><font color="#FFFFFF"><strong>Visitor ID</strong></font></td>
    <td bgcolor="#0066CC" class="arl9"> <p><font color="#FFFFFF"><strong>Visitor 
        IP / Country</strong></font></p></td>
    <td bgcolor="#0066CC" class="arl9"><font color="#FFFFFF"><strong>Date</strong></font></td>
    <td class="arl9"><font color="#FFFFFF"><strong>Referer URL</strong></font></td>
    <td class="arl9"><font color="#FFFFFF"><strong>Request URL</strong></font></td>
  </tr>
  <?
$file="cgi-bin/visitor_log.txt";
$opfile=fopen($file, "r") or die("Couldn't open $file");
$id=0;
while(!feof($opfile))
{
	$line=fgets($opfile, 1024);
	list($visitorID, $visitorIP, $date, $referreURL, $requestURL)=split( "<!s!>", $line);
?>
  <tr> 
    <td class="arl9" <?
	if($id%2)
		print "bgcolor='#EAF4FF'";
	?>> 
      <?=$visitorID?>
    </td>
    <td class="arl9" <?
	if($id%2)
		print "bgcolor='#EAF4FF'";
	?>> 
      <?=$visitorIP?>
    </td>
    <td class="arl9" <?
	if($id%2)
		print "bgcolor='#EAF4FF'";
	?>> 
      <?=$date?>
    </td>
    <td class="arl9" 
	<?
		if($id%2)
			print "bgcolor='#EAF4FF'";
	?>> 
      <?=$referreURL?>
    </td>
    <td class="arl9" <?
	if($id%2)
		print "bgcolor='#EAF4FF'";
	?>> 
      <?=$requestURL?>
    </td>
  </tr>
  <?
	$id++;
}
?>
  <tr bgcolor="#0066CC"> 
    <td colspan="5" class="arl9"><spacer type=block height=1></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td align="center" class="arl9"><strong>&copy; 2005 Programmed for <a href="http://www.lins.com.np" target="_blank">LiNS</a> </strong></td>
  </tr>
</table>
</body>
</html>