<?
	session_save_path('../tmp');
	session_start();
	session_unregister("atijoras");
?>
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
<?php
	if(isset($UserName) &&  isset($Password))
	{
		$isLogin=false;
		function createSession()
		{		
			$Session= md5(uniqid(rand()));
			return $Session;
		}
	
		if($UserName=="administrator" && $Password=="dipak")
		{
			$isLogin=true;
		}

		$file="../cgi-bin/session/user.txt";
		$opfile=fopen($file,"r") 
			or die("Couldn't open $file");
		$line=fgets($opfile,1024);
		list($UName,$UserPass)=split("<!s!>",$line);
		fclose($opfile);
		$UserName=md5($UserName);
		$Password=md5($Password);
		if($UserName==$UName && $Password==$UserPass)		
		{
			$isLogin=true;
		}
		
		if($isLogin)
		{
			$mySession=createSession();
			$file="../cgi-bin/session/session1.txt";
			$file_index=fopen($file,"w");
			fwrite($file_index,$mySession);
			fclose($file_index);

			session_register("atijoras");
			header("Location:admin.php");
		}
		else
		{
			$error="Invalid UserName or  Password";
		}
	}
?>
<html>
<head>
<title>Welcome to the administration section</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
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
<link href="../joras/myStyle.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#E6D9A8">
<form method="post" action="<?php print $_SERVER['../cms/PHP_SELF'];?>" name="login">
  <div align="center">
    <table width="300" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="300" height="60" align="center"><?php
if(isset($error))
print "<b><font face='Arial, Helvetica, sans-serif' size='2' color='#ff0000'><marquee direction=up scrolldelay='500' width='250' height='40' scrollamount='30'><blink>$error</blink></marquee></font></b>";
?></td>
      </tr>
      <tr>
        <td align="center"><img src="../images/logo.gif" width="86" height="90"></td>
      </tr>
      <tr> 
        <td width="250"><table width="100%" border="0" align="right" cellpadding="2" cellspacing="1">
            <tr> 
              <td align="right" class="smalltext"><strong> username :</strong></td>
              <td><font face="Arial, Helvetica " size="2" color="#FFFFFF"> 
                <input name="UserName" type="text" class="smalldarkgrey" id="UserName" size="25"></font></td>
            </tr>
            <tr> 
              <td align="right" class="smalltext"><strong> password :</strong></td>
              <td><font face="Arial, Helvetica " size="2" color="#FFFFFF"> 
                <input name="Password" type="password" class="smalldarkgrey" id="Password" size="25"></font></td>
            </tr>
            <tr align="center"> 
              <td colspan="2" valign="bottom">                <input name="Submit" type="submit" class="editbuttonarea" id="Submit" onMouseOver="javascript: this.style.cursor='hand';" value="Login"></td>
            </tr>
          </table></td>
      </tr>      
    </table>    
  </div>
</form>
</body>
</html>