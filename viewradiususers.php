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
Username: <input type="text" name="cuser" /><br>
Password: <input type="text" name="cpass" /><br><br>
<hr>
<input type="submit" /><br>
<hr>
</form>
</td>
<td width="700px" align=center>
<form action="addaccesspoint.php" method="post"><br>
<font size=+2><b>Add an Access Point</b></font><br><br>
<hr>
IP Address: <input type="text" name="aip" /><br>
Shared Secret: <input type="text" name="secret" /><br>
Short Name: <input type="text" name="shortname" /><br>
<hr>
<input type="submit" /><br>
<hr>
</form>
</td>
</tr>
</table>
<table width="74%">
<tr>
<td>
<center>The IP address can be a single IP such as 10.250.0.2/32 or you can do a whole range like 10.250.0.0/24<br>
<b>This shared secret must also be configured on the Access Point in order for the server and AP to communicate properly!</b><br>
Short Name is just an alias so the entry is easily identifiable<br><br></center>
</td>
</tr>
</table>
<table border="1" align="center">
<tr>
<td width="700px" align=center>
<form action="viewradiususers.php" method="post"><br>
<font size=+2><b>View RADIUS Users</b></font><br><br>
<input type="submit" /><br>
</td>
<td width="700px" align=center>
<form action="viewaccesspoints.php" method="post"><br>
<font size=+2><b>View Access Points</b></font><br><br>
<input type="submit" /><br>
</td>
</tr>
</table>
<br>
<br>
<br>
</center>
</body>
</html>

<?php
if($_POST) {
        $execute = mysql_connect("127.0.0.1", "root", "password") or die(mysql_error());
        if($execute == 0) {
                echo "Error connecting to database, please contact the database administrator.<br>";
                }
        $execute = mysql_select_db("wireless2") or die(mysql_error());
        if($execute == 0) {
                echo "Error selecting the database, it may not exist on this server, please contact the database administrator.<br>";
                }
        $query = "SELECT * FROM radcheck";
        $result = mysql_query($query) or die(mysql_error());
?><table border="1" align="center" width="100%"><tr><td width="50%" align="center"><font size=+2><u><b>Username</u></b></font></td><td width="50%" align="center"><font size=+2><u><b>Password</u></b></td></font></tr><?php
        while($row = mysql_fetch_array($result)) {
        echo "<tr><td width=\"50%\" align=\"center\">".$row['username']. "</td><td width=\"50%\" align=\"center\">". $row['value']."</td></tr>";
        }
?></table><?php
}
?>
