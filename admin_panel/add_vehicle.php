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
		if (is_array($val))
		{
			foreach ($val as $twoD)
				$newValue[] = $twoD;
		}
		else
		{
			$val = preg_replace("/^\r\n+/","",$val);
			$val = str_replace('\"','"',$val);
			$$key = str_replace("\'","'",$val);
		}
	}
	foreach ($_GET as $key => $val) 
	{
		$val = preg_replace("/^\r\n+/","",$val);
		$val = str_replace('\"','"',$val);
		$$key = str_replace("\'","'",$val);
	}

	$size = sizeof($newValue);	
	
	if(isset($addCar))
	{
		//print $name."<br>";
		if (!isset($catalogue))
		{
			$catalogue = 'no';
		}
		if (!isset($rating))
		{
			$rating = 'no';
		}
		if (!isset($has_abs))
			$has_abs = 'no';
		
		$today = date("Y-m-d");
		
		$query="INSERT INTO tbl_vehicle(make,brand,model,mfg_year, chassis_no,transmission,fuel_type,engine_cc,stock_location,entry_date,mem_id,mileage,color,price,drive_type,comment,show_catalogue, seat_capacity, doors, drive_option, has_abs, serial_key, is_sold) VALUES ('$Make','$Brand','$Model', '$myear', '$chasis', '$Transmission', '$Fuel_type', '$Engine_CC', '$stock', '$today', '$mem_id', '$Mileage_KM', '$Color', '$price', '$Drive_type', '$Comment', '$catalogue', '$seat', '$door', '$drive_option', '$has_abs','$serial_key', 'no')";
		$result=mysql_query($query);
		if($result)
		{
			print "<script language='javascript'>";
			print "alert('Database updated successfully.');";
			print "</script>";			
		}
		else
		{
			die(mysql_error());
		}
		
		$id = mysql_insert_id();
		$i = 0;
		while ($i < $size)
		{
			$accessory_id = $newValue[$i];
			$sql = "INSERT INTO tbl_vehicle_accessories (vehicle_id, accessory_id) VALUES ('$id','$accessory_id')";
			$result = mysql_query($sql)
				or die ("Could not execute the query");
			$i++;
		}

		if (isset($isImage1))
		{
			move_uploaded_file($_FILES['thumb']['tmp_name'],"../upload_images/small_pics/".$id.'_a.jpg') or print("Couldn't Upload Your Car File.");
			move_uploaded_file($_FILES['large_view']['tmp_name'],"../upload_images/large_pics/".$id.'a.jpg') or print("Couldn't Upload Your Large File.");
			
				move_uploaded_file($_FILES['thumb2']['tmp_name'],"../upload_images/small_pics/".$id.'_b.jpg') or print("Couldn't Upload Your Car File.");
				move_uploaded_file($_FILES['large_view2']['tmp_name'],"../upload_images/large_pics/".$id.'b.jpg') or print("Couldn't Upload Your Large File.");

			
				move_uploaded_file($_FILES['thumb3']['tmp_name'],"../upload_images/small_pics/".$id.'_c.jpg') or print("Couldn't Upload Your Car File.");
				move_uploaded_file($_FILES['large_view3']['tmp_name'],"../upload_images/large_pics/".$id.'c.jpg') or print("Couldn't Upload Your Large File.");
				move_uploaded_file($_FILES['thumb4']['tmp_name'],"../upload_images/small_pics/".$id.'_d.jpg') or print("Couldn't Upload Your Car File4.");
				move_uploaded_file($_FILES['large_view4']['tmp_name'],"../upload_images/large_pics/".$id.'d.jpg') or print("Couldn't Upload Your Large File.");
				move_uploaded_file($_FILES['thumb5']['tmp_name'],"../upload_images/small_pics/".$id.'_e.jpg') or print("Couldn't Upload Your Car File.");
				move_uploaded_file($_FILES['large_view5']['tmp_name'],"../upload_images/large_pics/".$id.'e.jpg') or print("Couldn't Upload Your Large File.");
				move_uploaded_file($_FILES['thumb6']['tmp_name'],"../upload_images/small_pics/".$id.'_f.jpg') or print("Couldn't Upload Your Car File.");
				move_uploaded_file($_FILES['large_view6']['tmp_name'],"../upload_images/large_pics/".$id.'f.jpg') or print("Couldn't Upload Your Large File.");
				move_uploaded_file($_FILES['thumb7']['tmp_name'],"../upload_images/small_pics/".$id.'_g.jpg') or print("Couldn't Upload Your Car File.");
				move_uploaded_file($_FILES['large_view7']['tmp_name'],"../upload_images/large_pics/".$id.'g.jpg') or print("Couldn't Upload Your Large File.");
				move_uploaded_file($_FILES['thumb8']['tmp_name'],"../upload_images/small_pics/".$id.'_h.jpg') or print("Couldn't Upload Your Car File.");
				move_uploaded_file($_FILES['large_view8']['tmp_name'],"../upload_images/large_pics/".$id.'h.jpg') or print("Couldn't Upload Your Large File.");
				move_uploaded_file($_FILES['thumb9']['tmp_name'],"../upload_images/small_pics/".$id.'_i.jpg') or print("Couldn't Upload Your Car File.");
				move_uploaded_file($_FILES['large_view9']['tmp_name'],"../upload_images/large_pics/".$id.'i.jpg') or print("Couldn't Upload Your Large File.");
				move_uploaded_file($_FILES['thumb10']['tmp_name'],"../upload_images/small_pics/".$id.'_j.jpg') or print("Couldn't Upload Your Car File.");
				move_uploaded_file($_FILES['large_view10']['tmp_name'],"../upload_images/large_pics/".$id.'j.jpg') or print("Couldn't Upload Your Large File.");
		}
	}
?>
<html>
<head>
<title>Administration Section</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../joras/landing.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
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
				if (isset($result))
				{
			?>
          <table width="95%"  border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td bgcolor="#CC0000">
                <table width="100%"  border="0" cellspacing="1" cellpadding="0">
                  <tr>
                    <td bgcolor="#FDE9E8"><table width="100%"  border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td align="center">The vehicle has been successfully added.</td>
                        </tr>
                    </table></td>
                  </tr>
              </table></td>
            </tr>
          </table>
          <?php }?>
		  <form action="<?php print $PHP_SELF; ?>" method="post" enctype="multipart/form-data" name="addform" id="addform">
								  <TABLE width="80%" border=0 align=center cellPadding=0 cellSpacing=0 class="txtbox_1" style="padding:0px">
                                      <TR>
                                        <TD><TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                                            
                                              <TR>
                                                <TD height=30 class="st" style="padding-left:2px"><STRONG class="smalllightblue">Add new vehicle</STRONG></TD>
                                              </TR>
                                              <TR>
                                                <TD height=25><TABLE width="100%" border=0 align="center" cellPadding=2 cellSpacing=0>
                                                    
                                                      <TR bgcolor="#DFDFDF">
                                                        <TD width="26%" bgcolor="#DFDFDF"><FONT class=smallblack>Make </FONT><span class="smenu">*</span> </TD>
                                                        <TD width="74%"><INPUT class=formField id=Make maxLength=100 name=Make>
                                                        <FONT 
class=smallblack>- (Eg: Car)</FONT> </TD>
                                                      </TR>
                                                      <TR>
                                                        <TD colspan="2"><spacer type="block" height="1"></TD>
                                                      </TR>
                                                      <TR bgcolor="#DFDFDF">
                                                        <TD bgcolor="#DFDFDF"><FONT class=smallblack>Serial Key </FONT><span class="smenu">*</span> </TD>
                                                        <TD><INPUT class=formField id=serial_key maxLength=100 name=serial_key></TD>
                                                      </TR>
                                                      <TR>
                                                        <TD colspan="2"><spacer type="block" height="1"></TD>
                                                  </TR>
                                                      <TR bgcolor="#DFDFDF">
                                                        <TD><FONT class=smallblack>Brand <span class="smenu">*</span> </FONT></TD>
                                                        <TD><INPUT class=formField id=Brand maxLength=100 name=Brand>
                                                        <FONT 
class=smallblack>- (Eg: Toyota) </FONT></TD>
                                                  </TR>
                                                      <TR>
                                                        <TD colspan="2"><spacer type="block" height="1"></TD>
                                                      </TR>
                                                      <TR bgcolor="#DFDFDF">
                                                        <TD><FONT class=smallblack>Model <span class="smenu">*</span> </FONT></TD>
                                                        <TD><INPUT class=formField id=Model maxLength=100 name=Model>
                                                        <FONT 
class=smallblack>- (Eg: Corolla)</FONT></TD>
                                                  </TR>
                                                      <TR>
                                                        <TD colspan="2"><spacer type="block" height="1"></TD>
                                                      </TR>
                                                      <TR bgcolor="#DFDFDF">
                                                        <TD colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="2">
                                                          <tr>
                                                            <td><table width="100%"  border="0" cellpadding="2" cellspacing="0" class="smallblack">
                                                              <tr>
                                                                <td width="6%">
												<script language=javascript>
											  function browseImage1()
											  {
												  if(document.addform.isImage1.checked)
												  {
													document.addform.thumb.disabled=false;
													document.addform.large_view.disabled=false;
													document.addform.thumb2.disabled=false;
													document.addform.large_view2.disabled=false;
													document.addform.thumb3.disabled=false;
													document.addform.large_view3.disabled=false;
													document.addform.thumb4.disabled=false;
													document.addform.large_view4.disabled=false;
													document.addform.thumb5.disabled=false;
													document.addform.large_view5.disabled=false;
													document.addform.thumb6.disabled=false;
													document.addform.large_view6.disabled=false;
													document.addform.thumb7.disabled=false;
													document.addform.large_view7.disabled=false;
													document.addform.thumb8.disabled=false;
													document.addform.large_view8.disabled=false;
													document.addform.thumb9.disabled=false;
													document.addform.large_view9.disabled=false;
													document.addform.thumb10.disabled=false;
													document.addform.large_view10.disabled=false;
												  }
												  else
												  {
													document.addform.thumb.disabled=true;
													document.addform.large_view.disabled=true;
													document.addform.thumb2.disabled=true;
													document.addform.large_view2.disabled=true;
													document.addform.thumb3.disabled=true;
													document.addform.large_view3.disabled=true;
													document.addform.thumb4.disabled=true;
													document.addform.large_view4.disabled=true;
													document.addform.thumb5.disabled=true;
													document.addform.large_view5.disabled=true;
													document.addform.thumb6.disabled=true;
													document.addform.large_view6.disabled=true;
													document.addform.thumb7.disabled=true;
													document.addform.large_view7.disabled=true;
													document.addform.thumb8.disabled=true;
													document.addform.large_view8.disabled=true;
													document.addform.thumb9.disabled=true;
													document.addform.large_view9.disabled=true;
													document.addform.thumb10.disabled=true;
													document.addform.large_view10.disabled=true;
													}
											 }
											  </script>
																<input name="isImage1" type="checkbox" class="MainMenuSelected" value="checkbox" onClick="browseImage1()"></td>
                                                                <td width="94%">Upload Images [ <a href="#" onClick="MM_openBrWindow('img_guide.php','img','width=450,height=250')">CLICK HERE FOR IMAGE UPLOAD GUIDE</a> ]</td>
                                                              </tr>
                                                            </table></td>
                                                          </tr>
                                                          <tr>
                                                            <td height="1" bgcolor="#FFFFFF"><spacer type="block" height="1"></td>
                                                          </tr>
                                                          <tr>
                                                            <td class="smallnavy"><strong>Picture 1 </strong></td>
                                                          </tr>
                                                          <tr>
                                                            <td><table width="100%"  border="0" cellpadding="2" cellspacing="0" class="smallblack">
                                                              <tr>
                                                                <td width="25%">Small Thumbnail (<span class="smallred">130 x 98 px</span>) </td>
                                                                <td width="75%">
																<input name="thumb" type="file" disabled class="formField" id="thumb" size="40"></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Large Picture</td>
                                                                <td><input name="large_view" type="file" disabled class="formField" id="large_view" size="40"></td>
                                                              </tr>
                                                            </table>                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td class="smallnavy"><strong>Picture 2 </strong></td>
                                                          </tr>
                                                          <tr>
                                                            <td><table width="100%"  border="0" cellpadding="2" cellspacing="0" class="smallblack">
                                                              <tr>
                                                                <td width="25%">Small Thumbnail (<span class="smallred">130 x 98 px</span>) </td>
                                                                <td width="75%">
                                                                  <input name="thumb2" type="file" disabled class="formField" id="thumb22" size="40"></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Large Picture<br></td>
                                                                <td><input name="large_view2" type="file" disabled class="formField" id="large_view22" size="40"></td>
                                                              </tr>
                                                            </table></td>
                                                          </tr>
                                                          <tr>
                                                            <td class="smallnavy"><strong>Picture 3 </strong></td>
                                                          </tr>
                                                          <tr>
                                                            <td><table width="100%"  border="0" cellpadding="2" cellspacing="0" class="smallblack">
                                                                <tr>
                                                                  <td width="25%">Small Thumbnail (<span class="smallred">130 x 98 px</span>) </td>
                                                                  <td width="75%">
                                                                    <input name="thumb3" type="file" disabled class="formField" id="thumb3" size="40"></td>
                                                                </tr>
                                                                <tr>
                                                                  <td>Large Picture<br></td>
                                                                  <td><input name="large_view3" type="file" disabled class="formField" id="large_view3" size="40"></td>
                                                                </tr>
                                                                                                                            </table>                                                              </td>
                                                          </tr>
                                                          <tr>
                                                            <td class="smallnavy"><strong>Picture 4 </strong></td>
                                                          </tr>
                                                          <tr>
                                                            <td><table width="100%"  border="0" cellpadding="2" cellspacing="0" class="smallblack">
                                                                <tr>
                                                                  <td width="25%">Small Thumbnail (<span class="smallred">130 x 98 px</span>) </td>
                                                                  <td width="75%">
                                                                    <input name="thumb4" type="file" disabled class="formField" id="thumb4" size="40"></td>
                                                                </tr>
                                                                <tr>
                                                                  <td>Large Picture<br></td>
                                                                  <td><input name="large_view4" type="file" disabled class="formField" id="large_view4" size="40"></td>
                                                                </tr>
                                                            </table></td>
                                                          </tr>
                                                          <tr>
                                                            <td class="smallnavy"><strong>Picture 5 </strong></td>
               