<?php
	$today = date("Y-n-j");
	// print $today;
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
<link href="../joras/landing.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#FFFFFF">
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
	<form name="addform" method="post" action="<?php print $_SERVER['../cms/PHP_SELF'];?>">
        <table border="0" cellspacing="0" cellpadding="3" align="center">
          <tr>
            <td colspan="2" class="pophead"> Add AD</td>
          </tr>
          <tr>
            <td class="cellbgbl formText">AD Title : </td>
            <td><input name="title" type="text" class="formField" id="title" size="50"></td>
          </tr>
          <tr>
            <td valign="top" class="cellbgbl formText">AD Description  : <br>
              (25 words )</td>
            <td><textarea name="desc" cols="50" rows="3" class="formField" id="desc"></textarea></td>
          </tr>
          <tr>
            <td valign="top" class="cellbgbl formText"> URL : </td>
            <td><input name="url" type="text" class="formField" id="url" value="" size="50"></td>
          </tr>
          <tr>
            <td><spacer></spacer></td>
            <td align="center"><input name='Submit' type='submit' class="formField" value='Add Now'></td>
          </tr>
        </table>
    </form><?php
		}
		else
		{
			$title = addslashes($title);
			$desc = addslashes($desc);
			
			$query="INSERT INTO tbl_ads (ad_caption, ad_desc, ad_refers) VALUES('$title',  '$desc', '$url')";
			$result=mysql_query($query) or die(mysql_error());
			if ($result)
			{
		?>
			<table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
				<tr>
					<td colspan="2" align="center" class="phone">Add AD</td>
				</tr>
				  <tr>
					<td colspan="2" align="center"><font color="#FF0000" face="Arial, Helvetica, sans-serif"><b>Successfully added AD </b></font></td>
				  </tr>
				  <tr>
					<td colspan="2" align="center"><a href="add_ad.php" class="arl9">Go Back to another AD. </a></td>
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