<html>
<body>
<title>Ubiquiti Wireless RADIUS Add</title>
<span style="font-family: arial, geneva, helvetica, sans-serif;">
<center><table>
<tr>
<td width="700px" align=center>
<form action="addradiususer.php" method="post"><br>
<font size=+2><b>Add a New Radius User</b></font><br><br>
<hr>
<br>
Username: <input type="text" name="cuser" /><br>
Password: <input type="text" name="cpass" /><br><br>
<input type="submit" value="Add User" /><br>
<hr>
</form>
</td>
<td width="700px" align=center>
<form action="addaccesspoint.php" method="post"><br>
<font size=+2><b>Add an Access Point</b></font><br><br>
<hr>
IP Address: <input type="text" name="aip" /><br>
Shared Secret: <input type="text" name="secret" /><br>
Short Name: <input type="text" name="shortname" /><br><br>
<input type="submit" value="Add Access Point" /><br>
<hr>
</form>
</td>
</tr>
</table>
<table width="1400px">
<tr>
<td>
<center>The IP address can be a single IP such as 10.250.0.2/32 or you can do a whole range like 10.250.0.0/24<br>
<b>This shared secret must also be configured on the Access Point in order for the server and AP to communicate properly!</b><br>
Short Name is just an alias so the entry is easily identifiable<br><br><hr></center>
</td>
</tr>
</table>
<table align=center>
<tr>
<td width="700px" align=center>
<form action="viewradiususers.php" method="post"><br>
<font size=+2><b>View RADIUS Users</b></font><br><br>
<input type="submit" value="View" /><br>
</form>
</td>
<td width="700px" align=center>
<form action="viewaccesspoints.php" method="post"><br>
<font size=+2><b>View Access Points</b></font><br><br>
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
<input type="text" name="csearch" /><br><br>
<input type="submit" value="Search" /><br>
</form>
</td>
<td width="700px" align=center>
<form action="queryaccesspoints.php" method="post"><br>
<font size=+2><b>Search Access Points</b></font><br><br>
<input type="text" name="apsearch" /><br><br>
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

<?php
include 'config.php.inc'; 

        $search = trim($_POST["apsearch"]);
        
        $ap_search = "SELECT * FROM `wireless2`.`nas` WHERE (CONVERT( `nasname` USING utf8 ) LIKE '%$search%' OR CONVERT( `shortname` USING utf8 ) LIKE '%$search%') LIMIT 0 , 30";

        $execute = mysql_connect($mysql_host, $mysql_user, $mysql_pass) or die(mysql_error());
        if($execute == 0) {
                echo "Error connecting to database, please contact the database administrator.<br>";
                }
				
        $execute = mysql_select_db($database) or die(mysql_error());
        if($execute == 0) {
                echo "Error selecting the database, it may not exist on this server, please contact the database administrator.<br>";
                }
        
		$execute = mysql_query($ap_search);
        if($execute == 0) {
                echo "Error searching the database for $search.  Please contact the database administrator.<br>";
                }
        
        $result = mysql_query($ap_search) or die(mysql_error());
?><table border="1" bordercolor=GREEN align="center" width="1000px"><tr><td width="33%" align="center"><font size=+2><u><b>Access Point IP</u></b></font></td><td width="34%" align="center"><font size=+2><u><b>Shortname</u></b></font></td><td width="33%" align="center"><font size=+2><u><b>Secret</u></b></font></td></tr><?php
        while($row = mysql_fetch_array($result)) {
        echo "<tr><td width=\"20%\" align=\"center\">".$row['nasname']. "</td><td width=\"20%\" align=\"center\">". $row['shortname']."</td><td width=\"20%\" align=\"center\">". $row['secret']."</td></tr>";
        }
?></table><?php

?>
