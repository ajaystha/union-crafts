<?
	session_save_path('../tmp');
	session_start();
	if (!session_is_registered("atijoras"))
		header("Location: index.php");
?>
<?php include("../include_connect_database.php.inc"); ?>
<?php
	foreach ($_POST as $key => $val) 
	{
		$val = preg_replace("/^\r\n+/","",$val);
		$val = str_replace('\"','"',$val);
		$$key = str_replace("\'","'",$val);
	}
	if (isset($Submit))
	{
		$a_sql = "insert into tbl_accessories (name) values ('$accessory')";
		$a_result = mysql_query($a_sql) or die(mysql_error());		
	}
?>
<html>
<head>
<title>Administration Section</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../joras/landing.css" rel="stylesheet" type="text/css">
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
        <td><?php
				if (isset($a_result))
				{
			?>
          <table width="95%"  border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td bgcolor="#CC0000">
                <table width="100%"  border="0" cellspacing="1" cellpadding="0">
                  <tr>
                    <td bgcolor="#FDE9E8"><table width="100%"  border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td align="center">The accessory has been successfully added.</td>
                        </tr>
                    </table></td>
                  </tr>
              </table></td>
            </tr>
          </table>
          <?php } ?>          <form action="<?php print $_SERVER['../cms/PHP_SELF'];?>" method="post" name="add" id="add">
          <table  border="0" align="center" cellpadding="5" cellspacing="0">
            <tr>
              <td class="phone">Add New Accessory</td>
            </tr>
            <tr>
              <td align="center" valign="middle">Accessory 
                <input name="accessory" type="text" class="formField" id="accessory" size="30"></td>
            </tr>
            <tr>
              <td align="center"><input name="Submit" type="submit" class="formField" value="Add now"></td>
            </tr>
          </table>
        </form></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><?php include("footer.inc.php");?></td>
  </tr>
</table>
</body>
</html>