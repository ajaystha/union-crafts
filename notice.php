<?php
	session_save_path("cxpanel/tmp");
	session_start();
	//print "here";
	
	if (!session_is_registered("user_group"))
		header("Location: authenticate.php?location=".urlencode($_SERVER['REQUEST_URI']));
		
	if ($_SESSION["user_group"] != "teacher")
		header("Location: authenticate.php?location=".urlencode($_SERVER['REQUEST_URI']));
?>
<?php include("include_connect_database.inc");?>
<?php
	$sql = "select * from tbl_teacher_notice order by notice_id desc";
	$result = mysql_query($sql) or die("Error");
	$row = mysql_fetch_array($result);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>For Teachers - Montessori Kinderworld</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style/myStyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("top_banner.php");?></td>
  </tr>
  <tr>
    <td><?php include("teachers_menu.php");?></td>
  </tr>
  <tr>
    <td><table width="100%"  border="0" cellspacing="1" cellpadding="5">
      <tr>
        <td class="title_header">Notice for Teachers &raquo;</td>
      </tr>
      <tr>
        <td align="right"><a href="logout.php"><span class="news_title">logout</span></a></td>
      </tr>
      <tr>
        <td class="small_title"><?=$row[notice_title]?></td>
      </tr>
      <tr>
        <td><?=$row[notice_text]?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><?php include("footer.php");?></td>
  </tr>
</table>
</body>
</html>