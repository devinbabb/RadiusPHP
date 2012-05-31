<html>
<head>
<style type="text/css">
body {
background-color:#DDDDDD;
background-image:url('radius.png');
background-size:200px 200px;
background-repeat:no-repeat;
background-attachment:fixed;
background-position:left center;
}
</style>
</head>
<body>
<title>Ubiquiti Wireless RADIUS Add</title>
<span style="font-family: arial, geneva, helvetica, sans-serif;">
<center>
<table>
<tr>
<td width="700px" align=center>
<form action="addradiususer.php" method="post"><br>
<font size=+2><b>Add a New Radius User</b></font><br><br>
Username <a href="javascript:alert('This is the username that will need to be entered in to the customer\'s CPE.' + '\n' + '       The customer will not need to and should not know this username' + '\n' + '                                           Format Example: JohnDoe')"><font size=-2>[?]</font></a> :	 <input type="text" name="cuser" /><br>
<a href="http://www.pctools.com/guides/password/?length=8&phonetic=on&alpha=on&mixedcase=on&numeric=on&punctuation=on&nosimilar=on&quantity=1&generate=true#password_generator" target="_blank">Password</a> <a href="javascript:alert('This is the password that will need to be entered in to the customer\'s CPE.' + '\n' + '                   As with the username, the customer does not need this')"><font size=-2>[?]</font></a> :	 <input type="text" name="cpass" /><br><br><br>
<input type="submit" value="Add User" /><br>
</form>
</td>
<td width="700px" align=center>
<form action="addaccesspoint.php" method="post"><br>
<font size=+2><b>Add an Access Point</b></font><br><br>
IP Address <a href="javascript:alert('The IP address can be a single IP such as 10.250.0.2/32 or you can do a whole range like 10.250.0.0/24')"><font size=-2>[?]</font></a> : <input type="text" name="aip" /><br>
<a href="http://www.pctools.com/guides/password/?length=32&phonetic=on&alpha=on&mixedcase=on&numeric=on&punctuation=on&nosimilar=on&quantity=1&generate=true#password_generator" target="_blank">Shared Secret</a>  <a href="javascript:alert('This shared secret must also be configured on the Access Point in order for the server and AP to communicate properly!')"><font size=-2>[?]</font></a> : <input type="text" name="secret" /><br>
Short Name <a href="javascript:alert('Short Name is just an alias so the entry is easily identifiable')"><font size=-2>[?]</font></a> : <input type="text" name="shortname" /><br><br>
<input type="submit" value="Add Access Point" /><br>
</form>
</td>
</tr>
</table>
<table width="1400px">
<tr>
<td>
<hr>
</td>
</tr>
</table>
<table align=center>
<tr>
<td width="700px" align=center>
<form action="viewradiususers.php" method="post"><br>
<font size=+2><b>View RADIUS Users</b></font><br><br>
<font size=-1><b>Sort By:</b></font><br><br>
<table>
<tr><td><input type="radio" name="sortusers" value="none" checked /></td><td> None</td></tr>
<tr><td><input type="radio" name="sortusers" value="uname" /></td><td> Username</td></tr>
</table><br>
<input type="submit" value="View" /><br>
</form>
</td>
<td width="700px" align=center>
<form action="viewaccesspoints.php" method="post"><br>
<font size=+2><b>View Access Points</b></font><br><br>
<font size=-1><b>Sort By:</b></font><br>
<table>
<tr><td><input type="radio" name="sortaps" value="none" checked /></td><td> None</td></tr>
<tr><td><input type="radio" name="sortaps" value="shortname" /></td><td> Shortname</td></tr>
<tr><td><input type="radio" name="sortaps" value="ipaddress" /></td><td> IP Address</td></tr>
</table><br>
<input type="submit" value="View" /><br>
</form>
</td>
</tr>
</table>
<table width="1400px">
<tr>
<td>
<hr>
</td>
</tr>
</table>
<table align=center>
<tr>
<td width="700px" align=center>
<form action="queryradiususers.php" method="post"><br>
<font size=+2><b>Search RADIUS Users</b></font><br><br>
<input type="text" name="csearch" /> <a href="javascript:alert('You may search a whole username, or you may search by a portion.  You could just search for all usernames containing the letter `A`.')"><font size=-2>[?]</font></a><br><br>
<font size=-1><b>Sort By:</b></font><br><br>
<table>
<tr><td><input type="radio" name="sortusers" value="none" checked /></td><td> None</td></tr>
<tr><td><input type="radio" name="sortusers" value="uname" /></td><td> Username</td></tr>
</table><br>
<input type="submit" value="Search" /><br>
</form>
</td>
<td width="700px" align=center>
<form action="queryaccesspoints.php" method="post"><br>
<font size=+2><b>Search Access Points</b></font><br><br>
<input type="text" name="apsearch" /> <a href="javascript:alert('You may search for an Alias, by IP address, or you may search by a portion of either.  You could just search for all entries containing the letter `A` or the string `10.`')"><font size=-2>[?]</font></a><br><br>
<font size=-1><b>Sort By:</b></font><br>
<table>
<tr><td><input type="radio" name="sortaps" value="none" checked /></td><td> None</td></tr>
<tr><td><input type="radio" name="sortaps" value="shortname" /></td><td> Shortname</td></tr>
<tr><td><input type="radio" name="sortaps" value="ipaddress" /></td><td> IP Address</td></tr>
</table><br>
<input type="submit" value="Search" /><br>
</form>
</td>
</tr>
</table>
<table width="1400px">
<tr>
<td>
<hr>
</td>
</tr>
</table>
</center>
</body>
</html>