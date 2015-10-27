<?php
	foreach ($_POST as $key => $val) 
	{
		$val = preg_replace("/^\r\n+/","",$val);
		$val = str_replace('\"','"',$val);
		$$key = str_replace("\'","'",$val);
	}
	$image_dir = "../upload_images/newsletter";
	
	if (isset($Submit))
	{
		$file = $image_dir."/".$_FILES['test']['name'];
		print $file."--";
		if (move_uploaded_file($_FILES['test']['tmp_name'],$file))
			print "Success<br>";
		else
			print "Failed<br>";
	}
?>
<script language=javascript>
function SubmitReason() {
// alert(document.forms[0].test.value);
window.opener.SetReason(document.forms[0].test.value);
self.close();
}
function SetReason(reasonText) {
document.forms[0].test.value = reasonText;
document.forms[0].submit();
}
</script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script><title>Upload and select images - Nepal Tourism Directory.com</title>

<div id="Layer1" style="position:absolute; left:16px; top:81px; width:427px; height:197px; z-index:1; overflow: auto;">
  <table width="100%"  border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Image Name </font></strong></td>
      <td colspan="3"><strong><font size="2" face="Arial, Helvetica, sans-serif">Options</font></strong></td>
    </tr>
    <script language="javascript">
		function setFile(reasonText) {
			window.opener.SetReason(reasonText);
			self.close();
		}
		</script>
    <?php
	  	if ($dir = @opendir($image_dir)) 
		{
			while (($file = readdir($dir)) !== false) 
			{
				if ($file == "." || $file == "..")
				{
					continue;
				}
				else
				{
					// $file = $image_dir."/".$file;
					$file = $file;
					echo "<tr><td><font size=2 face='Arial, Helvetica, sans-serif'>$file</td><td><font size=2 face='Arial, Helvetica, sans-serif'><a href='#' onClick='setFile(\"$file\")'>Select</font></td><td><font size=2 face='Arial, Helvetica, sans-serif'>Delete</font></td><td><a href='$file' target='_blank'><font size=2 face='Arial, Helvetica, sans-serif'>View</font></a></td></tr>";
				}
			}  
			closedir($dir);
		}
	  ?>
  </table>
</div>
<form action="<?php print $_SERVER['../cms/PHP_SELF'];?>" method="post" enctype="multipart/form-data" name="form1">
  <table  border="0" cellspacing="2" cellpadding="2">
    <tr>
      <td><input name="test" type="file" id="test" size="60"></td>
    </tr>
    <tr>
      <td align="right"><input type="submit" name="Submit" value="Submit">
      <input type="submit" name="Submit2" value="Done" onClick="SubmitReason()"></td>
    </tr>
  </table>
</form>