<?
	session_save_path('../tmp');
	session_start();
	if (!session_is_registered("atijoras"))
		header("Location: index.php");
?>
<?php include("include_connect_database.php.inc");?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Advance Search - Grisha Auto</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../joras/myStyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("header.inc.php");?></td>
  </tr>
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="25%" valign="top" class="txtbox_1"><?php include("include_left.inc.php");?></td>
        <td valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="mediumorange"><strong>Advance Search</strong></td>
          </tr>
          <tr>
            <td height="1" bgcolor="#FF6500"><spacer></spacer></td>
          </tr>
          <tr>
            <td height="250"><FORM id="searchForm" name="searchForm" action="search_result.php" method="get">
              <!--
    <TABLE class=searchbox cellSpacing=0 cellPadding=5 width=273 border=0 style="background-color:#E7ECFE; border:1px solid #BBBBBB" onFocus="MM_showHideLayers('search','','show')" onLostFocus="MM_showHideLayers('search','','hide')">
	-->
              <TABLE width=273 border=0 align="center" cellPadding=5 cellSpacing=0 class=searchbox style="background-color:#E7ECFE; border:1px solid #BBBBBB" onFocus="handleClick('show it'); return false" onLostFocus="handleClick('hide it'); return false">
                <TR>
                  <TD height="204">
                    <TABLE cellSpacing=5 cellPadding=0 width=225 align=center border=0>
                      <TR>
                        <TD><SELECT id="makers" style="WIDTH: 200px" name="makers">
                            <OPTION value="0" selected>All Makes</OPTION>
                            <?php
							$mk_sql = "select distinct brand from tbl_vehicle where approve='1' order by brand asc";
							$mk_result = mysql_query($mk_sql) or die(mysql_error());
							while ($mk_row = mysql_fetch_array($mk_result))
							{
						?>
                            <OPTION value="<?=$mk_row[brand]?>">
                            <?=$mk_row[brand]?>
                            </OPTION>
                            <?php
							}
						?>
                          </SELECT></TD>
                      </TR>
                      <TR>
                        <TD><select name="models" id="models">
                            <option value="0" selected>All Models</option>
                            <?php
						$mk_sql = "select distinct model from tbl_vehicle where approve='1' order by model asc";
						$mk_result = mysql_query($mk_sql) or die(mysql_error());
						while ($mk_row = mysql_fetch_array($mk_result))
						{
					?>
                            <OPTION value="<?=$mk_row[model]?>">
                            <?=$mk_row[model]?>
                            </OPTION>
                            <?php
						}
					?>
                        </select>
                          <select name="color" id="color">
                            <option value="0" selected>All Color</option>
                            <?php
						$mk_sql = "select distinct color from tbl_vehicle where approve='1' order by color  asc";
						$mk_result = mysql_query($mk_sql) or die(mysql_error());
						while ($mk_row = mysql_fetch_array($mk_result))
						{
					?>
                            <OPTION value="<?=$mk_row[color]?>">
                            <?=ucfirst($mk_row[color])?>
                            </OPTION>
                            <?php
						}
					?>
                          </select></TD>
                      </TR>
                      <TR>
                        <TD><select name="location" id="location">
                            <option value="0" selected>All locations</option>
                            <?php
						$mk_sql = "select distinct stock_location from tbl_vehicle where approve='1' order by stock_location asc";
						$mk_result = mysql_query($mk_sql) or die(mysql_error());
						while ($mk_row = mysql_fetch_array($mk_result))
						{
							if (strlen(trim($mk_row[stock_location])) > 0)
							{
					?>
                            <OPTION value="<?=$mk_row[stock_location]?>">
                            <?=$mk_row[stock_location]?>
                            </OPTION>
                            <?php
							}
							else
								continue;
						}
						
					?>
                        </select></TD>
                      </TR>
                      <TR>
                        <TD class="smallblack"><select name="min_price" id="min_price">
                            <option value="0" selected>Min Price</option>
                            <?php
						$sql = "select min(price)as min_price, max(price) as max_price from tbl_vehicle";
						$mk_result = mysql_query($sql) or die(mysql_error());
						$mk_row = mysql_fetch_array($mk_result);

						for ($count = 1000; $count <= $mk_row[max_price]; $count+=1000)
						{
							//print $row[min_price];
							$newPrice = $row[min_price] + $count;							
					?>
                            <OPTION value="<?=$newPrice?>">US$
                            <?=$newPrice?>
                            </OPTION>
                            <?php
						}
					?>
                          </select>
              to
              <select name="max_price" id="max_price">
                <option value="0" selected>Max Price</option>
                <?php
						$mk_sql = "select min(price)as min_price, max(price) as max_price from tbl_vehicle";
						$mk_result = mysql_query($mk_sql) or die(mysql_error());
						$mk_row = mysql_fetch_array($mk_result);

						for ($count = 1000; $count <= $mk_row[max_price]; $count+=1000)
						{
							//print $row[min_price];
							$newPrice = $row[min_price] + $count;							
					?>
                <OPTION value="<?=$newPrice?>">US$
                <?=$newPrice?>
                </OPTION>
                <?php
						}
					?>
            </select></TD>
                      </TR>
                      <TR>
                        <TD class="smallblack"><SELECT id="min_year" style="WIDTH: 90px" name="min_year" rows="1">
                            <OPTION value="1970" selected>Year Min</OPTION>
                            <OPTION value=2005>2005</OPTION>
                            <OPTION value=2004>2004</OPTION>
                            <OPTION value=2003>2003</OPTION>
                            <OPTION value=2002>2002</OPTION>
                            <OPTION value=2001>2001</OPTION>
                            <OPTION value=2000>2000</OPTION>
                            <OPTION value=1999>1999</OPTION>
                            <OPTION value=1998>1998</OPTION>
                            <OPTION value=1997>1997</OPTION>
                            <OPTION value=1996>1996</OPTION>
                            <OPTION value=1995>1995</OPTION>
                            <OPTION value=1994>1994</OPTION>
                            <OPTION value=1993>1993</OPTION>
                            <OPTION value=1992>1992</OPTION>
                            <OPTION value=1991>1991</OPTION>
                            <OPTION value=1990>1990</OPTION>
                            <OPTION value=1989>1989</OPTION>
                            <OPTION value=1988>1988</OPTION>
                            <OPTION value=1987>1987</OPTION>
                            <OPTION value=1986>1986</OPTION>
                            <OPTION value=1985>1985</OPTION>
                            <OPTION value=1984>1984</OPTION>
                            <OPTION value=1983>1983</OPTION>
                            <OPTION value=1982>1982</OPTION>
                            <OPTION value=1981>1981</OPTION>
                            <OPTION value=1980>1980</OPTION>
                            <OPTION value=1979>1979</OPTION>
                            <OPTION value=1978>1978</OPTION>
                            <OPTION value=1977>1977</OPTION>
                            <OPTION value=1976>1976</OPTION>
                            <OPTION value=1975>1975</OPTION>
                            <OPTION value=1974>1974</OPTION>
                            <OPTION value=1973>1973</OPTION>
                            <OPTION value=1972>1972</OPTION>
                            <OPTION value=1972>1972</OPTION>
                            <OPTION value=1971>1971</OPTION>
                            <OPTION value=1970>1970</OPTION>
                          </SELECT>
              to
              <SELECT id="max_year" style="WIDTH: 90px" name="max_year" rows="1">
                <OPTION value="2005" selected>Year Max</OPTION>
                <OPTION value=2005>2005</OPTION>
                <OPTION value=2004>2004</OPTION>
                <OPTION value=2003>2003</OPTION>
                <OPTION value=2002>2002</OPTION>
                <OPTION value=2001>2001</OPTION>
                <OPTION value=2000>2000</OPTION>
                <OPTION value=1999>1999</OPTION>
                <OPTION value=1998>1998</OPTION>
                <OPTION value=1997>1997</OPTION>
                <OPTION value=1996>1996</OPTION>
                <OPTION value=1995>1995</OPTION>
                <OPTION value=1994>1994</OPTION>
                <OPTION value=1994>1993</OPTION>
                <OPTION value=1992>1992</OPTION>
                <OPTION value=1991>1991</OPTION>
                <OPTION value=1990>1990</OPTION>
                <OPTION value=1989>1989</OPTION>
                <OPTION value=1988>1988</OPTION>
                <OPTION value=1987>1987</OPTION>
                <OPTION value=1986>1986</OPTION>
                <OPTION value=1985>1985</OPTION>
                <OPTION value=1984>1984</OPTION>
                <OPTION value=1984>1983</OPTION>
                <OPTION value=1982>1982</OPTION>
                <OPTION value=1981>1981</OPTION>
                <OPTION value=1980>1980</OPTION>
                <OPTION value=1979>1979</OPTION>
                <OPTION value=1978>1978</OPTION>
                <OPTION value=1977>1977</OPTION>
                <OPTION value=1976>1976</OPTION>
                <OPTION value=1975>1975</OPTION>
                <OPTION value=1974>1974</OPTION>
                <OPTION value=1974>1973</OPTION>
                <OPTION value=1972>1972</OPTION>
                <OPTION value=1972>1972</OPTION>
                <OPTION value=1971>1971</OPTION>
                <OPTION value=1970>1970</OPTION>
            </SELECT></TD>
                      </TR>
                      <TR>
                        <TD></TD>
                      </TR>
                      <TR>
                        <TD class="smallblack">Sort Results By <BR>
                            <SELECT id="sort_order" size=1 name="sort_order">
                              <OPTION value=1 selected>Make A-Z</OPTION>
                              <OPTION value=2>Lowest Price</OPTION>
                              <option value="3">Most Recently Listed</option>
                              <OPTION value=5>Latest Year</OPTION>
                          </SELECT></TD>
                      </TR>
                      <TR vAlign=center>
                        <TD align="right"><INPUT name="search" type=image id="search" src="../pictures/searchbutton.gif" alt=Search align=middle width="64" height="16"></TD>
                      </TR>
                  </TABLE></TD>
                </TR>
              </TABLE>
            </FORM></td>
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
