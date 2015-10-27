<?
	session_save_path('../tmp');
	session_start();

	if (!session_is_registered("atijoras"))
	{
		header("Location: index.php");
	}
	$guide_id = $_GET[guide_id];
?>
<?php include("../include_connect_database.php.inc");?>
<?php
	foreach ($_POST as $key => $val) 
	{
		$val = preg_replace("/^\r\n+/","",$val);
		$val = str_replace('\"','"',$val);
		$$key = str_replace("\'","'",$val);
	}
?>
<link href="../joras/myStyle.css" rel="stylesheet" type="text/css">
<?php
	if (!isset($Submit))
	{
?>
<form action="<?php print $_SERVER['../cms/PHP_SELF'];?>" method="post" name="reply" id="reply">
  <table width="100%"  border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td class="BaseBarLinks"><strong>Reply to vehicle query</strong></td>
    </tr>
    <tr>
      <td class="smalldarkgrey"><strong>Question</strong></td>
    </tr>
	<?php
		$sql = "select query, answer from tbl_vehicle_guide where guide_id='$guide_id'";
		$result = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_array($result);
	?>
    <tr>
      <td class="smalldarkgrey"><?=$row[query]?>
      <input name="guide_id" type="hidden" id="guide_id" value="<?=$guide_id?>"></td>
    </tr>
    <tr>
      <td class="smalldarkgrey"><strong>Answer</strong></td>
    </tr>
    <tr>
      <td class="smalldarkgrey"><textarea name="answer" cols="50" rows="6" class="smalldarkgrey" id="answer"><?=$row[answer]?>
      </textarea></td>
    </tr>
    <tr>
      <td class="smalldarkgrey"><input name="Submit" type="submit" class="smalldarkgrey" value="Reply"></td>
    </tr>
  </table>
</form>
<?php
	}
	else
	{
		$answer = addslashes($answer);
		$i_sql = "update tbl_vehicle_guide set answer='$answer' where guide_id='$guide_id'";
		//print $i_sql;
		$i_result = mysql_query($i_sql) or die(mysql_error());
?>
<table width="100%"  border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td class="BaseBarLinks"><strong>Reply to vehicle query</strong></td>
  </tr>
  <tr>
    <td height="150" class="mediumdarkgrey">The question has been replied. Please close this window and refresh the page (Vehicle Guide Approval List ). </td>
  </tr>
  <tr>
    <td align="center" class="mediumdarkgrey"><a href="javascript: window.close()">Close</a></td>
  </tr>
</table>
<?php } ?>