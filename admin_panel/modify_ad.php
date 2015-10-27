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
<link href="../joras/landing.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#FFFFFF">
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
	<table width="100%"  border="0" cellspacing="0" cellpadding="2">
	  <tr>
		<td width="45" class="formText">S. No.</td>
		<td class="formText">Title</td>
		<td class="formText">Option</td>
	  </tr>
	  	<?php
			$faq_sql = "select * from tbl_ads";
			$faq_result = mysql_query($faq_sql) or die("Oops!!!");
			$count  = 1;
			while ($row = mysql_fetch_array($faq_result))
			{
		?>
		<tr valign="top">
		<td align="center"><?=$count?>.</td>
		<td><?=$row[ad_caption]?></td>
		<td class="cellbgbl"><a href="../cms/modify_ad.php?id=<?=$row[ad_id]?>">Modify this &raquo;</a></td>
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
			$m_sql = "select * from tbl_ads where ad_id='$id'";
			$m_result = mysql_query($m_sql) or die("Oops!!! Error retrieving the ad.");
			$m_row = mysql_fetch_array($m_result);
	?>
	<form action="<?php print $_SERVER['../cms/PHP_SELF'];?>" method="post" name="modifyForm" id="modifyForm">
      <table border="0" cellspacing="0" cellpadding="3" align="center">
        <tr>
          <td colspan="2" class="pophead">Modify AD 
            <input name="ad_id" type="hidden" id="ad_id" value="<?=$m_row[ad_id]?>"></td>
        </tr>
        <tr>
          <td class="cellbgbl formText">Title : </td>
          <td><input name="title" type="text" class="formField" id="title" value="<?=$m_row[ad_caption]?>" size="50"></td>
        </tr>
        <tr>
          <td valign="top" class="cellbgbl formText">Short Description : </td>
          <td><textarea name="short" cols="50" rows="3" class="formField" id="short"><?=$m_row[ad_desc]?>
          </textarea></td>
        </tr>
        <tr>
          <td valign="top" class="cellbgbl formText"> URL : </td>
          <td><input name="url" type="text" class="formField" id="url" value="<?=$m_row[ad_refers]?>
          " size="50"></td>
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
			$title = addslashes($title);
			$short = addslashes($short);
			
			$u_sql = "update tbl_ads set ad_caption='$title', ad_desc='$short', ad_refers='$url' where ad_id='$ad_id'";
			// print $u_sql;
			$u_result = mysql_query($u_sql) or die("Sorry could not update the faq.");
			if ($u_result)
			{
	?>
	  <span class="subiti">You request to change a AD has been successfully completed. Please <a href="modify_ad.php">click here</a> to go to modify AD section.</span><?php
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