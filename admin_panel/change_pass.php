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
<html>
<head>
<title>Administration Section</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../joras/myStyle.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#E6D9A8">
<script language="javascript">
<!--
function goTo(loc)
{
	newURL=loc+"?mySession=<?php print $mySession ?>";
	
	window.location=newURL;
}
//-->
</script>
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("header.inc.php");?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25%" valign="top" class="txtbox_1"><?php include("include_left.inc.php");?></td>
    <td valign="top"><form enctype="multipart/form-data" name="update" method="post" action="<?php print $PHP_SELF?>">
      <table width="95%" border="0" cellspacing="0" cellpadding="2" align="center">
        <tr>
          <td colspan="2" class="linktext"><strong> Update UserName &amp; Password</strong></td>
        </tr>
        <tr class="smalltext">
          <td colspan="2"><span class="style1"><font face="Arial, Helvetica " size="2">* <?php
$isChange=false;
if(isset($oldname))
{	
	$file="../cgi-bin/session/user.txt";
	$opfile=fopen($file,"r") or die ("Couldn't open $file");
	$line=fgets($opfile,1024);
	fclose($opfile);
	list($Username,$Userpass)=split("<!s!>",$line);
	if($Username==md5($oldname) && $Userpass==md5($oldpass))
	{
		if($newpass==$vnewpass)
		{
			if($newname!="")
			{
				if($newpass!="")
				{
					$opfile=fopen($file,"w") or die ("Couldn't open $file");
					$newdata=md5($newname)."<!s!>".md5($newpass);
					fwrite($opfile,$newdata);
					fclose($opfile);
					$isChange=true;	
				}
				else
				{
					print "New password should be fillup";
				}							
			}
			else
			{
				print "User name should be fillup";
			}			
		}
		else
		{	
			print "New password & Verify password don't match.";
		}
	}
	else		
	{
		print "Old UserName or Password don't match.";
	}
}
if($isChange)
{
print "New Username & Password had been successfully change.";
}
?></font></span></td>
        </tr>
        <?php
if(!$isChange)
{
?>
        <tr class="smalltext">
          <td width="214" class="cellbgbl">Old User Name :</td>
          <td width="366"><input name="oldname" type="text" class="formField"></td>
        </tr>
        <tr class="smalltext">
          <td width="214" class="cellbgbl">Old Password :</td>
          <td width="366"><input name="oldpass" type="text" class="formField"></td>
        </tr>
        <tr class="smalltext">
          <td width="214" class="cellbgbl">New User Name :</td>
          <td width="366"><input name="newname" type="text" class="formField"></td>
        </tr>
        <tr class="smalltext">
          <td width="214" class="cellbgbl">New Password :</td>
          <td width="366"><input name="newpass" type="password" class="formField"></td>
        </tr>
        <tr class="smalltext">
          <td width="214" class="cellbgbl">Verify New Password :</td>
          <td width="366"><input name="vnewpass" type="password" class="formField"></td>
        </tr>
        <tr class="smalltext">
          <td width="214"><spacer></spacer></td>
          <td width="366"><input type="submit" name="Submit2" value="Update"></td>
        </tr>
        <?php
}
?>
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