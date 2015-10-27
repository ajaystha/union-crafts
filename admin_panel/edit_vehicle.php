<?
	session_save_path('../tmp');
	session_start();

	if (!session_is_registered("atijoras"))
	{
		header("Location: index.php");
	}	
?>
<?php include("../include_connect_database.php.inc");?>
<?php
	if (isset($_GET[vid]))
	{
		$vid = $_GET[vid];
		
		$v_sql = "select * from tbl_vehicle where vid='$vid'";
		$v_result = mysql_query($v_sql) or die("Error");
		$v_row = mysql_fetch_array($v_result);
	}
	foreach ($_POST as $key => $val) 
	{
		$val = preg_replace("/^\r\n+/","",$val);
		$val = str_replace('\"','"',$val);
		$$key = str_replace("\'","'",$val);
	}		
	if (isset($Submit))
	{
		$u_sql = "update tbl_vehicle set chassis_no='$chasis', make='$make', brand='$brand', model='$model', transmission='$transmission', fuel_type='$fuel', engine_cc='$engine_cc', mileage='$mileage', color='$color', seat_capacity='$seats', doors='$doors', mfg_year='$manufactured', price='$price', stock_location='$stock', freight='$freight', insurance='$insurance', drive_type='$drive_type', approve='$approve', show_new='$is_new', show_used='$is_used', show_sell='$is_sale', drive_option='$drive_option', has_abs='$has_abs', serial_key='$serial_key', is_sold='$is_sold' where vid='$vid'";
		// print $u_sql;
		$result = mysql_query($u_sql);
		
		if ($v_row[is_sold] == 'yes')
		{
			$update_sql = "update tbl_vehicle set show_catalogue='nos' where vid='$vid'";
			$update_result = mysql_query($update_sql) or print "Sorry the vehicle will still be listed in the catalogue. Please try again later.";
		}
		
		// Removing Thumb pictures...
		if (isset($simg1))
		{
			unlink("../upload_images/small_pics/".$vid."_a.jpg");
		}
		if (isset($simg2))
		{
			unlink("../upload_images/small_pics/".$vid."_b.jpg");
		}
		if (isset($simg3))
		{
			unlink("../upload_images/small_pics/".$vid."_c.jpg");
		}
		if (isset($simg4))
		{
			unlink("../upload_images/small_pics/".$vid."_d.jpg");
		}
		if (isset($simg5))
		{
			unlink("../upload_images/small_pics/".$vid."_e.jpg");
		}
		if (isset($simg6))
		{
			unlink("../upload_images/small_pics/".$vid."_f.jpg");
		}
		if (isset($simg7))
		{
			unlink("../upload_images/small_pics/".$vid."_g.jpg");
		}
		if (isset($simg8))
		{
			unlink("../upload_images/small_pics/".$vid."_h.jpg");
		}
		if (isset($simg9))
		{
			unlink("../upload_images/small_pics/".$vid."_i.jpg");
		}
		if (isset($simg10))
		{
			unlink("../upload_images/small_pics/".$vid."_j.jpg");
		}
		// Removing Enlarge pictures...
		if (isset($img1))
		{
			unlink("../upload_images/large_pics/".$vid."a.jpg");
		}
		if (isset($img2))
		{
			unlink("../upload_images/large_pics/".$vid."b.jpg");
		}
		if (isset($img3))
		{
			unlink("../upload_images/large_pics/".$vid."c.jpg");
		}
		if (isset($img4))
		{
			unlink("../upload_images/large_pics/".$vid."d.jpg");
		}
		if (isset($img5))
		{
			unlink("../upload_images/large_pics/".$vid."e.jpg");
		}
		if (isset($img6))
		{
			unlink("../upload_images/large_pics/".$vid."f.jpg");
		}
		if (isset($img7))
		{
			unlink("../upload_images/large_pics/".$vid."g.jpg");
		}
		if (isset($img8))
		{
			unlink("../upload_images/large_pics/".$vid."h.jpg");
		}
		if (isset($img9))
		{
			unlink("../upload_images/large_pics/".$vid."i.jpg");
		}
		if (isset($img10))
		{
			unlink("../upload_images/large_pics/".$vid."j.jpg");
		}
	}
?>
<html>
<head>
<title>Administration Section</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../joras/landing.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {color: #666666}
-->
</style>
<script language="javascript">
<!--
	function PopupPic(sPicURL) { 
		window.open("../pop_picture.php?"+sPicURL, "", "resizable=0,toolbar=1,HEIGHT=200,WIDTH=200");
	}
-->
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
        <td valign="top">
<table width="95%"  border="0" align="center" cellpadding="5" cellspacing="1">
          <tr>
            <td class="phone">Edit Vehicle</td>
          </tr>
          <tr>
            <td>
			<?php
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
                            <td align="center">The vehicle has been successfully edited.</td>
                          </tr>
                      </table></td>
                    </tr>
                </table></td>
              </tr>
            </table>
			<?php } ?>
			<?php
			if (!isset($Submit))
			{
			?>
              <form action="" method="post" name="edit" id="edit">
                <table width="95%"  border="0" align="center" cellpadding="2" cellspacing="0">
                  <tr>
                    <td class="formText">Chasis No.
                      <input name="vid" type="hidden" id="vid" value="<?=$v_row[vid]?>"></td>
                    <td><input name="chasis" type="text" class="formField" id="chasis" value="<?=$v_row[chassis_no]?>"></td>
                  </tr>
                  <tr>
                    <td class="formText">Vehicle Type</td>
                    <td><input name="make" type="text" class="formField" id="make" value="<?=$v_row[make]?>" size="20"></td>
                  </tr>
                  <tr>
                    <td class="formText">Brand</td>
                    <td><input name="brand" type="text" class="formField" id="brand" value="<?=$v_row[brand]?>"></td>
                  </tr>
                  <tr>
                    <td class="formText">Model</td>
                    <td><input name="model" type="text" class="formField" id="model" value="<?=$v_row[model]?>"></td>
                  </tr>
                  <tr>
                    <td class="formText">Serial Key</td>
                    <td><input name="serial_key" type="text" class="formField" id="serial_key" value="<?=$v_row[serial_key]?>" size="15" maxlength="15"></td>
                  </tr>
                  <tr>
                    <td class="formText">Transmission</td>
                    <td><select name="transmission" class="formField" id="transmission"><option value="Manual" <?php if ($v_row[transmission] == "Manual") print "selected"; ?>>Manual</option>
                      <option value="Automatic" <?php if ($v_row[transmission] == "Automatic") print "selected"; ?>>Automatic</option>
                    </select></td>
                  </tr>
                  <tr>
                    <td class="formText">Fuel Type</td>
                    <td><input name="fuel" type="text" class="formField" id="fuel" value="<?=$v_row[fuel_type]?>" size="20"></td>
                  </tr>
                  <tr>
                    <td class="formText">Engine in CC</td>
                    <td><input name="engine_cc" type="text" class="formField" id="engine_cc" value="<?=$v_row[engine_cc]?>" size="10"></td>
                  </tr>
                  <tr>
                    <td class="formText">Mileage per litre</td>
                    <td><input name="mileage" type="text" class="formField" id="mileage" value="<?=$v_row[mileage]?>" size="10"></td>
                  </tr>
                  <tr>
                    <td class="formText">Color</td>
                    <td><input name="color" type="text" class="formField" id="color" value="<?=$v_row[color]?>" size="10"></td>
                  </tr>
                  <tr>
                    <td class="formText">Seat Capacity</td>
                    <td><input name="seats" type="text" class="formField" id="seats" value="<?=$v_row[seat_capacity]?>" size="10"></td>
                  </tr>
                  <tr>
                    <td class="formText">Doors</td>
                    <td><input name="doors" type="text" class="formField" id="doors" value="<?=$v_row[doors]?>" size="10"></td>
                  </tr>
                  <tr>
                    <td class="formText">Manufactured year</td>
                    <td><input name="manufactured" type="text" class="formField" id="manufactured2" value="<?=$v_row[mfg_year]?>" size="10"></td>
                  </tr>
                  <tr>
                    <td class="formText">Price in USD</td>
                    <td><input name="price" type="text" class="formField" id="price" value="<?=$v_row[price]?>" size="15"></td>
                  </tr>
                  <tr>
                    <td class="formText">Stock Location</td>
                    <td><input name="stock" type="text" class="formField" id="stock" value="<?=$v_row[stock_location]?>"></td>
                  </tr>
                  <tr>
                    <td class="formText">Sold this vehicle</td>
                    <td><input name="is_sold" type="radio" value="yes" <?php if ($v_row[is_sold]=='yes') print "checked"; ?>> Yes <input name="is_sold" type="radio" value="no" <?php if ($v_row[is_sold] == 'no') print "checked"; ?>> No</td>
                  </tr>
                  <tr>
                    <td class="formText">Freight Service</td>
                    <td><input name="freight" type="radio" value="yes" <?php if ($v_row[freight]=='yes') print "checked"; ?>>
                      Yes
                        <input name="freight" type="radio" value="no" <?php if ($v_row[freight] == 'no') print "checked"; ?>>
                        No</td>
                  </tr>
                  <tr>
                    <td class="formText">Insurance Service</td>
                    <td><input name="insurance" type="radio" value="yes" <?php if ($v_row[insurance] == 'yes') print "checked"; ?>>
Yes
  <input name="insurance" type="radio" value="no" <?php if ($v_row[insurance] == 'no') print "checked"; ?>>
No</td>
                  </tr>
                  <tr>
                    <td class="formText">Drive Option</td>
                    <td><input name="drive_option" type="radio" value="4WD" checked <?php if ($v_row[drive_option] == '4WD') print "checked"; ?>>
  4WD
    <input name="drive_option" type="radio" value="2WD" <?php if ($v_row[drive_option] == '2WD') print "checked"; ?>>
  2WD 
  <input name="has_abs" type="checkbox" id="has_abs" value="yes" <?php if ($v_row[has_abs] == 'yes') print "checked"; ?>>
  ABS</td>
                  </tr>
                  <tr>
                    <td class="formText">Approve</td>
                    <td><input name="approve" type="radio" value="1" <?php if ($v_row[approve] == '1') print "checked"; ?>>
  Yes
    <input name="approve" type="radio" value="0" <?php if ($v_row[approve] == '0') print "checked"; ?>>
  No</td>
                  </tr>
                  <tr>
                    <td class="formText">SHOW AS</td>
                    <td><input name="is_new" type="checkbox" id="is_new" value="yes" <?php if ($v_row[show_new] == 'yes') print 'checked';?>>
                      NEW
                        <input name="is_used" type="checkbox" id="is_used" value="yes" <?php if ($v_row[show_used] == 'yes') print 'checked';?>>
                        USED
                        <input name="is_sale" type="checkbox" id="is_sale" value="yes" <?php if ($v_row[show_sell] == 'yes') print 'checked';?>>
                        SALE</td>
                  </tr>
                  <tr>
                    <td class="formText">Drive Type</td>
                    <td><select name="drive_type" class="formField" id="drive_type">
                      <option value="Rt. Hand" <?php if ($v_row[drive_type] == 'Rt. Hand') print 'selected';?>>Right Hand</option>
                      <option value="Lt. Hand" <?php if ($v_row[drive_type] == 'Lt. Hand') print 'selected';?>>Left Hand</option>
                    </select></td>
                  </tr>
                  <tr>
                    <td colspan="2">
					<table width="100%"  border="0" align="center" cellpadding="3" cellspacing="0" style="border:1px solid black">
                      <tr>
                        <td align="center"><?php
									  $image = "../upload_images/small_pics/".$vid."_a.jpg";
									  // print $image;
									  if (file_exists($image))
									  {
									  ?>
                            <img src="../upload_images/small_pics/<?=$vid?>_a.jpg" width="130" height="98" border="1" style="border:1px solid black">
                            <?php } ?></td>
                        <td align="center"><?php
									  $image_b = "../upload_images/small_pics/".$vid."_b.jpg";
									  // print $image;
									  if (file_exists($image_b))
									  {
									  ?>
                            <img src="../upload_images/small_pics/<?=$vid?>_b.jpg" width="130" height="98" border="1" style="border:1px solid black">
                            <?php } ?></td>
                        <td align="center"><?php
									  $image_c = "../upload_images/small_pics/".$vid."_c.jpg";
									  // print $image;
									  if (file_exists($image_c))
									  {
									  ?>
                            <img src="../upload_images/small_pics/<?=$vid?>_c.jpg" width="130" height="98" border="1" style="border:1px solid black">
                            <?php } ?></td>
                        <td align="center"><?php
									  $image_d = "../upload_images/small_pics/".$vid."_d.jpg";
									  // print $image;
									  if (file_exists($image_d))
									  {
									  ?>
                            <img src="../upload_images/small_pics/<?=$vid?>_d.jpg" width="130" height="98" border="1" style="border:1px solid black">
                            <?php } ?></td>
                      </tr>
                      <tr align="center" class="smallnavy">
                        <td><?php
									  $image_a = "../upload_images/large_pics/".$vid."a.jpg";
									  if (file_exists($image_a))
									  {
									  ?>
                          [ <a href="javascript:PopupPic('../upload_images/large_pics/<?=$vid?>a.jpg')" class="smallnavy">Enlarge View</a> ]
                          <?php } ?></td>
                        <td><?php
									  $image_b = "../upload_images/large_pics/".$vid."b.jpg";
									  if (file_exists($image_b))
									  {
									  ?>
      [ <a href="javascript:PopupPic('../upload_images/large_pics/<?=$vid?>b.jpg')" class="smallnavy">Enlarge View</a> ]
      <?php } ?></td>
                        <td><?php
									  $image_c = "../upload_images/large_pics/".$vid."c.jpg";
									  if (file_exists($image_c))
									  {
									  ?>
                          [ <a href="javascript:PopupPic('../upload_images/large_pics/<?=$vid?>c.jpg')" class="smallnavy">Enlarge View</a> ]
                          <?php } ?></td>
                        <td><?php
									  $image_d = "../upload_images/large_pics/".$vid."d.jpg";
									  if (file_exists($image_d))
									  {
									  ?>
  [ <a href="javascript:PopupPic('../upload_images/large_pics/<?=$vid?>d.jpg')" class="smallnavy">Enlarge View</a> ]
  <?php } ?></td>
                      </tr>
                      <tr align="center" class="smallnavy">
                        <td><?php
								  $image = "../upload_images/small_pics/".$vid."_a.jpg";
								  // print $image;
								  if (file_exists($image))
								  {
							?><input name="simg1" type="checkbox" id="simg1" value="yes">
                          Remove Small View<?php } ?></td>
                        <td><?php
								  $image = "../upload_images/small_pics/".$vid."_b.jpg";
								  // print $image;
								  if (file_exists($image))
								  {
							?><input name="simg2" type="checkbox" id="simg2" value="yes">
  Remove Small View<?php } ?></td>
                        <td><?php
								  $image = "../upload_images/small_pics/".$vid."_c.jpg";
								  // print $image;
								  if (file_exists($image))
								  {
							?><input name="simg3" type="checkbox" id="simg3" value="yes">
  Remove Small View<?php } ?></td>
                        <td><?php
								  $image_d = "../upload_images/small_pics/".$vid."_d.jpg";
								  // print $image;
								  if (file_exists($image_d))
								  {
							?>
                            <input name="simg4" type="checkbox" id="simg4" value="yes">
  Remove Small View
  <?php } ?></td>
                      </tr>
                      <tr align="center" class="smallnavy">
                        <td><?php
							  $image_c = "../upload_images/large_pics/".$vid."a.jpg";
							  if (file_exists($image_c))
							  {
							?><input name="img1" type="checkbox" id="img1" value="yes">
                          Remove large View<?php } ?></td>
                        <td><?php
							  $image_c = "../upload_images/large_pics/".$vid."b.jpg";
							  if (file_exists($image_c))
							  {
							?><input name="img2" type="checkbox" id="img2" value="yes">
  Remove large View<?php } ?></td>
                        <td><?php
							  $image_c = "../upload_images/large_pics/".$vid."c.jpg";
							  if (file_exists($image_c))
							  {
							?><input name="img3" type="checkbox" id="img3" value="yes">
  Remove large View<?php } ?></td>
                        <td><?php
							  $image_d = "../upload_images/large_pics/".$vid."d.jpg";
							  if (file_exists($image_d))
							  {
							?>
                            <input name="img4" type="checkbox" id="img4" value="yes">
  Remove large View
  <?php } ?></td>
                      </tr>
                    </table>					
					<table width="100%"  border="0" align="center" cellpadding="3" cellspacing="0" style="border:1px solid black">
                      <tr>
                        <td align="center"><?php
									  $image_e = "../upload_images/small_pics/".$vid."_e.jpg";
									  // print $image;
									  if (file_exists($image_e))
									  {
									  ?>
                            <img src="../upload_images/small_pics/<?=$vid?>_e.jpg" width="130" height="98" border="1" style="border:1px solid black">
                            <?php } ?></td>
                        <td align="center"><?php
									  $image_f = "../upload_images/small_pics/".$vid."_f.jpg";
									  // print $image;
									  if (file_exists($image_f))
									  {
									  ?>
                            <img src="../upload_images/small_pics/<?=$vid?>_f.jpg" width="130" height="98" border="1" style="border:1px solid black">
                            <?php } ?></td>
                        <td align="center"><?php
									  $image_g = "../upload_images/small_pics/".$vid."_g.jpg";
									  // print $image;
									  if (file_exists($image_g))
									  {
									  ?>
                            <img src="../upload_images/small_pics/<?=$vid?>_g.jpg" width="130" height="98" border="1" style="border:1px solid black">
                            <?php } ?></td>
                        <td align="center"><?php
									  $image_h = "../upload_images/small_pics/".$vid."_h.jpg";
									  // print $image;
									  if (file_exists($image_h))
									  {
									  ?>
                            <img src="../upload_images/small_pics/<?=$vid?>_h.jpg" width="130" height="98" border="1" style="border:1px solid black">
                            <?php } ?></td>
                      </tr>
                      <tr align="center" class="smallnavy">
                        <td><?php
									  $image_e = "../upload_images/large_pics/".$vid."e.jpg";
									  if (file_exists($image_e))
									  {
									  ?>
      [ <a href="javascript:PopupPic('../upload_images/large_pics/<?=$vid?>e.jpg')" class="smallnavy">Enlarge View</a> ]
      <?php } ?></td>
                        <td><?php
									  $image_f = "../upload_images/large_pics/".$vid."f.jpg";
									  if (file_exists($image_b))
									  {
									  ?>
      [ <a href="javascript:PopupPic('../upload_images/large_pics/<?=$vid?>b.jpg')" class="smallnavy">Enlarge View</a> ]
      <?php } ?></td>
                        <td><?php
									  $image_g = "../upload_images/large_pics/".$vid."g.jpg";
									  if (file_exists($image_g))
									  {
									  ?>
      [ <a href="javascript:PopupPic('../upload_images/large_pics/<?=$vid?>g.jpg')" class="smallnavy">Enlarge View</a> ]
      <?php } ?></td>
                        <td><?php
									  $image_h = "../upload_images/large_pics/".$vid."h.jpg";
									  if (file_exists($image_h))
									  {
									  ?>
      [ <a href="javascript:PopupPic('../upload_images/large_pics/<?=$vid?>h.jpg')" class="smallnavy">Enlarge View</a> ]
      <?php } ?></td>
                      </tr>
                      <tr align="center" class="smallnavy">
                        <td><?php
								  $image_e = "../upload_images/small_pics/".$vid."_e.jpg";
								  // print $image;
								  if (file_exists($image_e))
								  {
							?>
                            <input name="simg5" type="checkbox" id="simg5" value="yes">
      Remove Small View
      <?php } ?></td>
                        <td><?php
								  $image_f = "../upload_images/small_pics/".$vid."_f.jpg";
								  // print $image;
								  if (file_exists($image_f))
								  {
							?>
                            <input name="simg6" type="checkbox" id="simg6" value="yes">
      Remove Small View
      <?php } ?></td>
                        <td><?php
								  $image_g = "../upload_images/small_pics/".$vid."_g.jpg";
								  // print $image;
								  if (file_exists($image_g))
								  {
							?>
                            <input name="simg7" type="checkbox" id="simg7" value="yes">
      Remove Small View
      <?php } ?></td>
                        <td><?php
								  $image_h = "../upload_images/small_pics/".$vid."_h.jpg";
								  // print $image;
								  if (file_exists($image_h))
								  {
							?>
                            <input name="simg8" type="checkbox" id="simg8" value="yes">
      Remove Small View
      <?php } ?></td>
                      </tr>
                      <tr align="center" class="smallnavy">
                        <td><?php
							  $image_e = "../upload_images/large_pics/".$vid."e.jpg";
							  if (file_exists($image_e))
							  {
							?>
                            <input name="img5" type="checkbox" id="img5" value="yes">
      Remove large View
      <?php } ?></td>
                        <td><?php
							  $image_f = "../upload_images/large_pics/".$vid."f.jpg";
							  if (file_exists($image_f))
							  {
							?>
                            <input name="img6" type="checkbox" id="img6" value="yes">
      Remove large View
      <?php } ?></td>
                        <td><?php
							  $image_g = "../upload_images/large_pics/".$vid."g.jpg";
							  if (file_exists($image_g))
							  {
							?>
                            <input name="img7" type="checkbox" id="img7" value="yes">
      Remove large View
      <?php } ?></td>
                        <td><?php
							  $image_h = "../upload_images/large_pics/".$vid."h.jpg";
							  if (file_exists($image_h))
							  {
							?>
                            <input name="img8" type="checkbox" id="img8" value="yes">
      Remove large View
      <?php } ?></td>
                      </tr>
                    </table>
					<table width="100%"  border="0" align="center" cellpadding="3" cellspacing="0" style="border:1px solid black">
                      <tr>
                        <td align="center"><?php
									  $image_i = "../upload_images/small_pics/".$vid."_i.jpg";
									  // print $image;
									  if (file_exists($image_i))
									  {
									  ?>
                            <img src="../upload_images/small_pics/<?=$vid?>_i.jpg" width="130" height="98" border="1" style="border:1px solid black">
                            <?php } ?></td>
                        <td align="center"><?php
									  $image_j = "../upload_images/small_pics/".$vid."_j.jpg";
									  // print $image;
									  if (file_exists($image_j))
									  {
									  ?>
                            <img src="../upload_images/small_pics/<?=$vid?>_j.jpg" width="130" height="98" border="1" style="border:1px solid black">
                            <?php } ?></td>
                        </tr>
                      <tr align="center" class="smallnavy">
                        <td><?php
									  $image_e = "../upload_images/large_pics/".$vid."e.jpg";
									  if (file_exists($image_e))
									  {
									  ?>
      [ <a href="javascript:PopupPic('../upload_images/large_pics/<?=$vid?>e.jpg')" class="smallnavy">Enlarge View</a> ]
      <?php } ?></td>
                        <td><?php
									  $image_f = "../upload_images/large_pics/".$vid."f.jpg";
									  if (file_exists($image_b))
									  {
									  ?>
      [ <a href="javascript:PopupPic('../upload_images/large_pics/<?=$vid?>b.jpg')" class="smallnavy">Enlarge View</a> ]
      <?php } ?></td>
                        </tr>
                      <tr align="center" class="smallnavy">
                        <td><?php
								  $image_i = "../upload_images/small_pics/".$vid."_i.jpg";
								  // print $image;
								  if (file_exists($image_i))
								  {
							?>
                            <input name="simg9" type="checkbox" id="simg9" value="yes">
      Remove Small View
      <?php } ?></td>
                        <td><?php
								  $image_j = "../upload_images/small_pics/".$vid."_j.jpg";
								  // print $image;
								  if (file_exists($image_j))
								  {
							?>
                            <input name="simg10" type="checkbox" id="simg10" value="yes">
      Remove Small View
      <?php } ?></td>
                        </tr>
                      <tr align="center" class="smallnavy">
                        <td><?php
							  $image_i = "../upload_images/large_pics/".$vid."i.jpg";
							  if (file_exists($image_i))
							  {
							?>
                            <input name="img9" type="checkbox" id="img9" value="yes">
      Remove large View
      <?php } ?></td>
                        <td><?php
							  $image_j = "../upload_images/large_pics/".$vid."j.jpg";
							  if (file_exists($image_j))
							  {
							?>
                            <input name="img10" type="checkbox" id="img10" value="yes">
      Remove large View
      <?php } ?></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr align="center">
                    <td colspan="2"><input name="Submit" type="submit" class="formField" value="Edit Now"></td>
                    </tr>
                </table>
              </form><?php } ?></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><?php include("footer.inc.php");?></td>
  </tr>
</table>
</body>
</html>