 <html>

 <head>

 <title>Contact Us</title>

 <SCRIPT LANGUAGE = "JavaScript">

 function EmptyCheck(X,field_name)
	{
	if (document.forms[0].elements[X].value=="")
		{
		alert(field_name+" field must be filled in, please!")
		document.forms[0].elements[X].focus()
		return false
		}
	}
 function ValidEmail(X,inputStr)
	{
	mychar1=inputStr.indexOf("@")
	mychar2=inputStr.indexOf(".")
	if ((mychar1=="-1") || (mychar2=="-1"))
		
		{
		alert("E-mail must be in the form UserName@Domain.Whatever")
		document.forms[0].elements[X].focus() 
		return false
		}
		in1=(inputStr.substring(0,mychar1))
		out1=(inputStr.substring(mychar1+1,inputStr.length))
		in2=(inputStr.substring(0,mychar2))
		out2=(inputStr.substring(mychar2+1,inputStr.length))
				
		if((in1=="") || (out1=="") || (in2=="") || (out2==""))
			{
			alert("E-mail must be in the form UserName@Domain.Whatever")
			document.forms[0].elements[X].focus() 
			return false
			}
	}
 function Maybe(X,field_name)
	{
	if (document.forms[0].elements[X].value=="")
		{
		if (confirm
	("You have left the "+field_name+" empty! Would you like to fill in the information?"))
			{
			document.forms[0].elements[X].focus() 
			return false
			}
		  else
			{
			return true
			}
		}
	}

 function ValidData()
	{
	 if ((!document.forms[0].elements[0].checked)
		&&(!document.forms[0].elements[1].checked)
		&&(!document.forms[0].elements[2].checked)
		&&(!document.forms[0].elements[3].checked)
		&&(!document.forms[0].elements[4].checked))
	  {
	  alert("Please specify the CHEK service you are interested in!")
	  document.forms[0].elements[0].focus()
	  return false
	  }
	 {
	 if ((EmptyCheck(6,"First Name")==false)
		|| (EmptyCheck(7,"Last Name")==false)
		|| (EmptyCheck(11,"Company")==false)
		|| (ValidEmail(8,document.forms[0].elements[8].value)==false))
	return false
	 }
	 {
	 if ((Maybe(9,"Phone Number")==false)
		|| (Maybe(18,"Unique Users")==false)
		|| (Maybe(19,"First URL")==false))
	return false 
	 }
	}
	  
 </SCRIPT>
 </head>

   <body text="#18229E" link="#48339B" vlink="#48339B" alink="#48339B" bgcolor="#FFFFFF">

   <p align="center">
   <img src="http://chek.com/images/cheklogo.gif"> 
   </p>

   <p align="center"><strong><font size="5">Partner / Advertiser</font></strong><br>
   Information Request Form<br>
   <img src="/images/hline.gif" alt="-------------------------" width="450" height="3">
   </p>

   <p align="center"><strong>To help us best respond to your needs, please complete all of the 
   following fields. <br> (All fields marked with an asterisk (<font color=#990000>*</font>)
   are required.) </strong>

   <center><font size=2>
   This is not for <font color=#990000> CHEK customer support.</font>  If you are having trouble 
   logging in, forgot your password, or are experiencing other support difficulties, click here to 
   move to the <a href="mail/support.php3">CHEK support page.</a>  Thank you for your help, we will 
   address any problems as soon as possible.</font></center></p>

	<center>
	<table cellspacing=0 cellpadding=0 border=0>
	<tr><td>
	<form action="ch_contactus2.php3" 
	method="post" onSubmit="return ValidData()">
	 <strong><p>Please select the CHEK Service you are interested in: 
 	 <font color=#990000>*</font></strong>
	  <br>
	 <input type="radio" name="request_nature" value="Brand Mail">
		Partnering with CHEK to build your company's own customized Web E-mail Service.
	  <br>
	 <input type="radio" name="request_nature" value="Corporate Mail">
		Purchasing a Corporate Web E-mail Service for your Employees.
	  <br>
	 <input type="radio" name="request_nature" value="Advertising">
 	Targeted Advertising within the CHEK Network.
	  <br>
	 <input type="radio" name="request_nature" value="General">
		General Information about CHEK, Inc.
	  <br>
	 <input type="radio" name="request_nature" value="Other">
		Other&nbsp;:&nbsp;<input type="text" name="request_nature_other" size="25">
	  </p></td></tr></table></center><br>
 

	<table border="0" align="left">
	 <tr>
	  <td align="right">First Name:<font color=#990000>*</font></td>
	  <td align="left"><input type="text" size="19" name="fname">&nbsp;
	  Last Name:<font color=#990000>*</font>
	  <input type="text" size="19" name="lname"></td>
	 </tr>
	 <tr>
	  <td align="right">E-mail:<font color=#990000>*</font></td>
	  <td align="left"><input type="text" size="50" name="email"></td>
	 </tr>
	 <tr>
	  <td align="right">Phone Number:<font color=#990000>*</font></td>
	  <td align="left"><input type="text" size="50" name="phone"></td>
	 </tr>
	 <tr>
	  <td align="right">Title:</td>
	  <td align="left"><input type="text" size="50" name="title"></td>
	 </tr>
	 <tr>
	  <td align="right">Company:<font color=#990000>*</font></td>
	  <td align="left"><input type="text" size="50" name="company"></td>
	 </tr>
	 <tr>
	  <td align="right">Address:</td>
	  <td align="left"><input type="text" size="50" name="address"></td>
	 </tr>	 
	 <tr>
	  <td align="right">City:</td>
	  <td align="left"><input type="text" size="20" name="city">&nbsp;
	  State:&nbsp;<input type="text" size="5" name="state">&nbsp;
	  Zip:&nbsp;<input type="text" size="13" name="zip"></td>
	 </tr> 
	 <tr>
	  <td align="right">Country:</td>
	  <td align="left"><input type="text" size="50" name="country"></td>
	 </tr>
	 <tr>
	  <td align="right">Fax Number:</td>
	  <td align="left"><input type="text" size="50" name="fax"></td>
	 </tr>
	 <tr>
	  <td align="right">Number of UNIQUE</td>
	  <td align="left">Users per month:<font color=#990000>*</font>&nbsp;&nbsp;
	  <input type="text" size="35" name="unique"></td>
	 </tr> 
	 <tr>
	  <td align="right">Please enter the web</td>
	  <td align="left">sites(URL) that you are interested in using CHEK mail for:(At least one)<font color=#990000>*</font></td>
	 </tr> 
	 <tr>
	  <td align="right">1)</td>
	  <td align="left"><input type="text" size="50" name="url1"></tr>
	 </tr>
	 <tr>
	  <td align="right">2)</td>
	  <td align="left"><input type="text" size="50" name="url2"></tr>
	 </tr>
	 <tr>
	  <td align="right">3)</td>
	  <td align="left"><input type="text" size="50" name="url3"></tr>
	 </tr>
	 <tr>
	  <td align="right">Comments:</td>
	  <td align="left"><textarea name="comments" rows="6" cols="44" wrap="physical"></textarea></td>
	 </tr>	
	<tr><td align="left" colspan="2"><strong><p>When do you plan<br> on starting your campaign?</strong>
 	 <select name="start_date" size="1">
	  <option value="not set">  -  -  - </option>
	  <option value="1 month">In the next month</option>
	  <option value="3 months">Three months</option>
	  <option value="6 months">Six months</option>
	  <option value="more than 6 months">More than six months</option>
	 </select>
	 </p></td>
	</tr><tr><td align="left" colspan="2">
	<strong><p>How did you hear about CHEK, Inc.?</strong>
	 <select name="word" size="1">
	  <option value="not set"> - - -</option>
 	  <option value="Reseller/VAR">Reseller/VAR</option>
	  <option value="partner">Saw one of the Chek partner's web sites</option>
	  <option value="internet">Internet Search</option>
	  <option value="banner_ad">Banner Advertisment</option>
	  <option value="television">Television Advertisment</option>
	  <option value="radio">Radio Announcement</option>
	  <option value="article">News or Magazine Article</option>
	  <option value="event">Media Event</option>
	  <option value="reference">Reference/Referral</option>
	  <option value="other">Other</option>
	 </select>
	 <br></td></tr>
	<tr><td align="left" colspan="2">
  	<strong><p>Would you like to receive E-mail updates from<br> CHEK.com when we
	 announce new products or services?</strong>
	 <br>
	  <input type="radio" name="info" value="yes" checked>Yes
	  <input type="radio" name="info" value="no">No
	  </p>
	  <br>
	</td></tr><tr><td align="center" colspan="2">
	<input type="submit" value="SUBMIT REQUEST">
	<input type="reset" value="CLEAR REQUEST FORM">
	</center>
	
	</form>
<br>
<br>
   <p align="center">
   <img src="images/hline.gif" alt="-------------------------" width="450" height="3">
   </p>

   <p align="center"> <IMG SRC="images/ch_butnbar.gif" USEMAP="#ch_butnbar" BORDER=0>
   <MAP NAME="ch_butnbar">
	<AREA SHAPE=RECT COORDS="1,0,70,16" HREF="ch_aboutus.php3" ALT="ABOUT CHEK!"  
	 OnMouseOut="window.status=''; return true"
	 OnMouseOver="window.status='ABOUT CHEK!'; return true">
	<AREA SHAPE=RECT COORDS="73,0,142,15" HREF="ch_services.php3" ALT="OUR SERVICES"  
	 OnMouseOut="window.status=''; return true"
	 OnMouseOver="window.status='OUR SERVICES'; return true">
	<AREA SHAPE=RECT COORDS="145,0,215,17" HREF="ch_partners2.php3" ALT="SEE WHO OUR PARTNERS ARE!"  
	 OnMouseOut="window.status=''; return true"
 	 OnMouseOver="window.status='SEE WHO OUR PARTNERS ARE!'; return true">
	<AREA SHAPE=RECT COORDS="218,1,286,15" HREF="ch_advertise.php3" ALT="ADVERTISE WITH US!"  
	 OnMouseOut="window.status=''; return true"
	 OnMouseOver="window.status='ADVERTISE WITH US!'; return true">
	<AREA SHAPE=RECT COORDS="291,1,358,15" HREF="ch_whatsnew.php3" ALT="WHATS NEW WITH CHEK?"  
 	 OnMouseOut="window.status=''; return true"
	 OnMouseOver="window.status='WHATS NEW WITH CHEK?'; return true">
	<AREA SHAPE=RECT COORDS="362,0,432,16" HREF="ch_contactus.php3"	ALT="CONTACT US FOR MORE INFORMATION"
	 OnMouseOut="window.status=''; return true"
	 OnMouseOver="window.status='CONTACT US FOR MORE INFORMATION'; return true">
   </MAP>
   </p>

   <p align="center"><font size="1"><strong><a href="ch_aboutus.php3">ABOUT US</a> 
	|| <a href="ch_services.php3">SERVICES</a> || <a href="ch_partners2.php3">PARTNERS</a> 
	|| <a href="ch_advertise.php3">ADVERTISE</a> || <a href="ch_whatsnew.php3">WHATS NEW</a>
	|| CONTACT US
	</strong></font></p></td></tr></table>

   </body>
</html>






















