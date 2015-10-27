<?php include("include_connect_database.php.inc");?>
<html>
<head>
<title>Give back feedback to us, Union of Friends, Union of Knowledge, Union of Skills -  UnionCrafts.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="joras/myStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="780"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("header.php");?></td>
  </tr>
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="187" valign="top" bgcolor="#E7DAAD" style="border-bottom:1px solid #BB9D37"><?php include("union_search.php");?></td>
        <td valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td bgcolor="#E7DAAD"><span class="style8">&nbsp;&nbsp;<span class="style16">Welcome to Union Crafts -</span></span></td>
          </tr>
          <tr>
            <td bgcolor="#F5F0DD"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td bgcolor="#E7DAAD">you are here: <a href="index.php">home</a> &gt;&gt; <strong>feedback</strong></td>
                  <td width="25%" height="25" align="center" bgcolor="#BB9D37" class="style7">- Product Categories -</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="75%" valign="top" class="style15" style="border-bottom:1px solid #E7DAAD">
				  <FORM name="" method="post">
                    <TABLE width=98% border=0 align="center" cellPadding=3 cellSpacing=0>
                          <TBODY>
                          <TR>
                            <TD colspan="2" class=style8>Provide us feedback.</TD>
                            </TR>
                          <TR>
                            <TD class=error width=85>First Name</TD>
                            <TD noWrap><INPUT maxLength=49 size=25 
                              name=txtFirstName> </TD></TR>
                          <TR>
                            <TD class=error width=85>Last Name</TD>
                            <TD noWrap><INPUT maxLength=49 size=25 
                              name=txtLastName> </TD></TR>
                          <TR>
                            <TD class=error width=85>Company Name</TD>
                            <TD noWrap><INPUT maxLength=49 size=35 
                              name=txtCompanyName> </TD></TR>
                          <TR>
                            <TD class=error width=85>Country</TD>
                            <TD noWrap><SELECT name=cmbCountry> <OPTION 
                                value="">Select Country</OPTION> <OPTION 
                                value=India>India</OPTION>
                              <option value="Nepal" selected>Nepal</option>
                              <option value="USofA">United States of America</option>
                              <option value="UK">United Kingdom</option>
                              <option value="Other">Others</option>
                            </SELECT></TD></TR>
                          <TR>
                            <TD class=error width=85>Phone</TD>
                            <TD noWrap><INPUT maxLength=29 size=12 
                              name=txtPhone></TD></TR>
                          <TR>
                            <TD width=85>Fax</TD>
                            <TD noWrap><INPUT maxLength=29 size=12 
                              name=txtFax></TD></TR>
                          <TR>
                            <TD class=error width=85>E-mail</TD>
                          <TD noWrap><INPUT maxLength=47 size=30 
                              name=txtEmail></TD></TR></TBODY></TABLE>
                        <TABLE width=98% border=0 align="center" cellPadding=3 cellSpacing=0>
                          <TBODY>
                          <TBODY>
                          <TR>
                            <TD class=error vAlign=bottom noWrap colSpan=2 
                            height=27>Which product are you most interested 
                            in?</TD></TR>
                          <TR>
                            <TD align=left width=210><SELECT name=cmbProduct> 
                                <OPTION value="" selected>-- Select --</OPTION> 
                                <OPTION>Phonewalared IP Phone</OPTION> 

                                <OPTION>Phonewalared Yap Jack Plus</OPTION> 
                                <OPTION>Phonewalared Max 4</OPTION> 
                                <OPTION>Phonewalared Internet Telephony 
                                Kit</OPTION> <OPTION>Phonewalared Yap Phone 
                                Kit</OPTION></SELECT></TD>
                            <TD><spacer></spacer></TD></TR>
                          <TR>
                            <TD noWrap align=left colSpan=2>Comments or Questions:</TD></TR>
                          <TR>
                            <TD align=left colSpan=2><TEXTAREA name=txaComments rows=4 cols=35></TEXTAREA></TD></TR>
                          <TR>
                            <TD colSpan=2><INPUT type=submit value=Submit name=cmbSubmit> 
<INPUT type=reset value=Reset name=cmbReset></TD></TR></TBODY></TABLE>
                  </FORM></td>
                  <td width="25%" valign="top"><?php include("include_right.php");?></td>
                </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><?php include("footer.php");?></td>
  </tr>
</table>
</body>
</html>