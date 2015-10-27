<?php include("include_connect_database.php.inc");?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<SCRIPT language="javascript">
	function checkSearch()
	{
		rateValue=document.search.product_type.options[document.search.product_type.selectedIndex].value;
		desc = document.search.description.value;
		product_code = document.search.product_code.value;
		
		if ((rateValue =="") && (desc == "") && (product_code == ""))
		{
			window.alert("Please provide atleast one search parameters.");
			document.search.description.focus();
			return false;
		}
	}
</SCRIPT>
<TABLE width="100%" border=0 cellPadding=0 cellSpacing=0>
    <TR>
      <TD height="60" align=middle bgColor=#e6d9a8><TABLE width="780" border=0 align="center" cellPadding=0 cellSpacing=0>
            <TR>
              <TD width=187 height="60" align=middle bgColor=#e6d9a8><a href="http://www.unioncrafts.com"><img height=90 alt="union crafts.com" src="images/logo.gif" width=86 border=0></a></TD>
              <TD valign="bottom" bgcolor="#E6D9A8">
			  <TABLE border=0 align="center" cellPadding=2 cellSpacing=0>
			  <form action="search.php" method="post" name="search" id="search" onSubmit="return checkSearch();">
                    <TR>
                      <TD class="smalltext">Search by description :</TD>
                      <TD class="smalltext">Product Code:</TD>
                      <TD align="center" class="smalltext">Product Type:</TD>
                      <TD><spacer></spacer></TD>
                    </TR>
                    <TR>
                      <TD><INPUT id=description size=26 name=description></TD>
                      <TD><input id=product_code size=12 name=product_code></TD>
                      <TD><select id=select6 style="WIDTH: 160px" name=product_type>
                          <option value="" selected>Please select one</option>
                          <?php
						  	$cat_mast_sql = "select * from tbl_category order by cat_name asc";
							$cat_result = mysql_query($cat_mast_sql) or die(mysql_error());
							while ($cat_rs = mysql_fetch_array($cat_result))
							{
						  ?>
                          <option value="<?=$cat_rs['category_id']?>">
                          <?=$cat_rs['cat_name']?>
                          </option>
                          <?php } ?>
                      </select></TD>
                      <TD class="smallblack"><input name=Submit2 type=submit class="smallblack" value=Search>
      [ <a 
                  href="#" class="smallblack" 
                  onClick="MM_openBrWindow('search_tips.php','pop','status=yes,width=400,height=300')"> Search Tips</a> ]</TD>
                </TR></form>
                </TABLE>
	          </TD>
            </TR>
      </TABLE></TD>
    </TR>
    <TR>
      <TD height="1" align=middle bgcolor="#000000"><spacer></spacer></TD>
    </TR>
</TABLE>
