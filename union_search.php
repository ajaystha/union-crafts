<SCRIPT language="javascript">
	function checkSearch()
	{
		var description = trim(document.search.description.value);
		var product_id = trim(document.search.product_id.value);
		
		if((description.length == 0) && (product_id.length == 0))
		{
			category = document.search.category.options[document.search.category.selectedIndex].value;
			if (category =="")
			{
				window.alert("You haven't specified any search fields. Please provide any one of them.");
				document.search.category.focus();
				return false;
			}
		}
		
		function trim (strVar) 
		{ 
			 if(strVar.length >0)
			 {
					while(strVar.charAt(0)==" ")  //Left Trim
					strVar=strVar.substring(1,strVar.length); 
					while(strVar.charAt(strVar.length-1)==" ")  //Right Trim
					strVar=strVar.substring(0,strVar.length-1); 			
			 } 
			 return strVar; 
		}
	}
</SCRIPT>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<form action="search_result.php" method="post" name="search" id="search" onSubmit="return checkSearch();">
  <table width="100%"  border="0" cellspacing="2" cellpadding="2">
    <tr>
      <td><em><a name="unionsearchtips"></a>Search by description:</em></td>
    </tr>
    <tr>
      <td><input name="description" type="text" id="description" size="26"></td>
    </tr>
    <tr>
      <td><em>&amp; / Or Product ID: </em></td>
    </tr>
    <tr>
      <td><input name="product_id" type="text" id="product_id" size="25"></td>
    </tr>
    <tr>
      <td><em>&amp; / Or Product Type: </em></td>
    </tr>
    <tr>
      <td><select name="category" id="category" style="width:160px">
        <option selected value="">Please select one</option>        
          <?php
	  	$opt_sql = "select category_id, cat_name from tbl_category order by cat_name asc";
		$opt_result = mysql_query($opt_sql) or die(mysql_error());
		while ($opt_row = mysql_fetch_array($opt_result))
		{
	  ?><option value="<?=$opt_row['cat_name']?>"><?=$opt_row['cat_name']?></option>
          <?php } ?>
            </select></td>
    </tr>
    <tr>
      <td height="30"><input type="submit" name="Submit" value="Search">
      [ <a href="#unionsearchtips" onClick="MM_openBrWindow('search_tips.php','pop','status=yes,width=400,height=300')">Union Search Tips</a> ]</td>
    </tr>
    <tr>
      <td><spacer></spacer></td>
    </tr>
  </table>
</form>
