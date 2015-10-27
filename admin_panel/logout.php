<?php
	foreach ($_POST as $key => $val) 
	{
		$val = preg_replace("/^\r\n+/","",$val);
		$val = str_replace('\"','"',$val);
		$$key = str_replace("\'","'",$val);
	}

	session_save_path('../tmp');
	session_start();
	session_unregister("atijoras");
	session_unset();
	session_destroy();
	header("Location: http://www.unioncrafts.com");
?>
<html>
<head><title>Successfully logout</title>
<link href="../joras/myStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%"  border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td align="center">
		<?php
			$sessionFile="../cgi-bin/session/index.txt";
			$opFile=fopen($sessionFile,"w");
			fwrite($opFile,"Logout");
			fclose($opFile);
		?>
		<p><font face='arial,verdana' size=4 color='#ff5555' style=bold>Successfully Logged out from </font><FONT color="#647715"><FONT face="Arial, Helvetica " size="5"><a href="index.php">UnionCrafts.com</a></FONT></FONT><font face='arial,verdana' size=4 color='#ff5555' style=bold> administration section</font> </p>        
        <p><font face='arial,verdana' size=3 color='#ff5555'><a href=index.php><< Re-Login >></a></font></p>
<p><spacer height="1"></spacer></p>
<Hr align=left width=90% size="1" noshade color=green></td>
  </tr>
</table>
</body>
</html>