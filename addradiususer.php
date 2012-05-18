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
Short Name is just an alias so the entry is easily identifiable<br><br><hr></center>
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
include 'config.php.inc'; 

if($_POST) {
        $user = trim($_POST["cuser"]);
        $pass = trim($_POST["cpass"]);
        $time = date("Y-m-d H:i:s");

        $radcheck_query = "INSERT INTO `radcheck` (`username`, `attribute`, `op`, `value`) VALUES
('$user', 'Cleartext-Password', ':=', '$pass')";

        $userinfo_query = "INSERT INTO `userinfo` (`username`, `firstname`, `lastname`, `email`, `department`, `company`, `workphone`, `homephone`, `mobilephone`, `address`, `city`, `state`, `country`, `zip`, `notes`, `changeuserinfo`, `portalloginpassword`, `enableportallogin`, `creationdate`, `creationby`, `updatedate`, `updateby`) VALUES
('$user', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', 0, '$time', 'administrator', NULL, NULL)";
 
        $userbillinfo_query = "INSERT INTO `userbillinfo` (`username`, `planName`, `hotspot_id`, `hotspotlocation`, `contactperson`, `company`, `email`, `phone`, `address`, `city`, `state`, `country`, `zip`, `paymentmethod`, `cash`, `creditcardname`, `creditcardnumber`, `creditcardverification`, `creditcardtype`, `creditcardexp`, `notes`, `changeuserbillinfo`, `lead`, `coupon`, `ordertaker`, `billstatus`, `lastbill`, `nextbill`, `nextinvoicedue`, `billdue`, `postalinvoice`, `faxinvoice`, `emailinvoice`, `batch_id`, `creationdate`, `creationby`, `updatedate`, `updateby`) VALUES
('$user', NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, '', '', '', NULL, '$time', 'administrator', NULL, NULL)";
        
        $execute = mysql_connect($mysql_host, $mysql_user, $mysql_pass) or die(mysql_error());
        if($execute == 0) {
                echo "Error connecting to database, please contact the database administrator.<br>";
                }
        $execute = mysql_select_db($database) or die(mysql_error());
        if($execute == 0) {
                echo "Error selecting the database, it may not exist on this server, please contact the database administrator.<br>";
                }
        $execute = mysql_query($radcheck_query);
        if($execute == 1) {
                echo "Success!  Added $user with password $pass.<br>";
                } else {
                echo "Error inserting the customer in to the 'radcheck' table.  Please contact the database administrator.<br>";
                }
        $execute = mysql_query($userinfo_query);
        if($execute == 0) {
                echo "Error inserting the customer in to the 'userinfo' table.  Please contact the database administrator.<br>";
                }
        $exeucte = mysql_query($userbillinfo_query);
        if($execute == 0) {
                echo "Error inserting the customer in to the 'userbillinfo' table.  Please contact the database administrator.<br>";
                }
        $execute = exec($restartcommand);
        if($execute == 0) {
                echo "Error refreshing the database.  This must be done manually.<br>";
                }
}
?>
