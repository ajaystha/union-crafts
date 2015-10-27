<?php
	$location = $_GET[location];
	
	print $location."--";
	//$error = $_SERVER['QUERY_STRING'];
	$error = $_GET[error];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Authenticate yourself - Montessori Kinderworld</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style/myStyle.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
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

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>

<body>
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("top_banner.php");?></td>
  </tr>
  <tr>
    <td>
		<?php
			if ($location == "http://www.nepalmontessori.net/notice.php" || $location == "http://nepalmontessori.net/notice.php")
				include("teachers_menu.php");
			else
				include("parents_menu.php");
		?></td>
  </tr>
  <tr>
    <td><table width="100%"  border="0" cellspacing="1" cellpadding="5">
      <tr>
        <td class="title_header">Authenticate yourself &raquo;</td>
      </tr>
	  <?php
  	if($error == "true")
		print "<tr><td height=20 align=center><strong><font color=\"#FF0000\">You are temporarily blocked. Please contact our webmaster.</font></strong></td></tr>";
  ?>
      <tr>	  
        <td><form action="check_login.php" method="post" name="login" id="login" onSubmit="MM_validateForm('login','','R','password','','R');return document.MM_returnValue">
          <table width="30%"  border="0" align="center" cellpadding="2" cellspacing="2" class="gray_border">
            <tr>
              <td class="small_title">Login Name</td>
              <td><input name="login" type="text" class="flat_input" id="login"></td>
            </tr>
            <tr>
              <td class="small_title">Password</td>
              <td><input name="password" type="password" class="flat_input" id="password"></td>
            </tr>
            <tr>
              <td><input name="Submit" type="submit" class="login_btn" value="login &raquo;"></td>
              <td><a href="#" onClick="MM_openBrWindow('forgot_password.php','pop','width=450,height=150')">Forgot Password</a>
                <input name="location" type="hidden" id="location" value="<?=$location?>">
				<?php
					if ($location == "http://www.nepalmontessori.net/notice.php" || $location == "http://nepalmontessori.net/notice.php")
					{
				?>
                <input name="user_group" type="hidden" id="user_group" value="teacher">
				<?php
					}
					else
					{
				?><input name="user_group" type="hidden" id="user_group" value="parent"><?php } ?></td>
            </tr>
          </table>
        </form></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><?php include("footer.php");?></td>
  </tr>
</table>
</body>
</html>