<?
	session_save_path('../tmp');
	session_start();
	if (!session_is_registered("atijoras"))
		header("Location: index.php");
?>
<?php include("include_connect_database.php.inc");?>
<html>
<head>
<title>Administration Section</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../joras/myStyle.css" rel="stylesheet" type="text/css">
</head>

<body onResize="if (navigator.family == 'nn4') window.location.reload()">
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("header.inc.php");?></td>
  </tr>
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="25%" valign="top" class="txtbox_1"><?php include("include_left.inc.php");?></td>
        <td valign="top">
		<?php
			if ($error == 'on')
			{
				print "You have input invalide serial key.";
			}
		?>
		<table border="0" align="center" cellpadding="5" cellspacing="0">
          <tr>
            <td><form action="search_vehicle_list.php" method="post" name="search" id="search">
              Enter the serial Key of the vehicle 
              <input name="serial_key" type="text" id="serial_key">
              <input type="submit" name="Submit" value="go">
            </form></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><?php include("footer.inc.php");?></td>
  </tr>
</table>
</body>
</html>
