<?php
$host = "localhost"; // Host name
$username = "root"; // MySQL username
$password = "temp_pass"; // MySQL password
$db_name = "universitydb"; // Database name
$tbl_name = "faculty"; // Table name
mysql_connect("$host", "$username", "$password");

mysql_select_db("$db_name");

$query = "SELECT * FROM faculty";
$result = mysql_query($query);
?>

<html>
<head>
<title> Instructors </title>
</head>
<body>
<h2> Instructors </h2>
<table border="2" cellspacing="2" cellpadding="2">
 <tr>
 <th><font face="Arial, Helvetica, sans-serif"> Faculty ID </font></th>
 <th><font face="Arial, Helvetica, sans-serif"> Name </font></th>
 <th><font face="Arial, Helvetica, sans-serif"> Room ID </font></th>
 <th><font face="Arial, Helvetica, sans-serif"> Phone # Ext. </font></th>
 <th><font face="Arial, Helvetica, sans-serif"> Department ID </font></th>
 </tr>

<?php
while ($row = mysql_fetch_array($result))
{
	echo "<tr>";
	echo "<td>" . $row['faculty_id'] . "</td>";
	echo "<td>" . $row['name'] . "</td>";
	echo "<td>" . $row['room_id'] . "</td>";
	echo "<td>" . $row['phone'] . "</td>";
	echo "<td>" . $row['department_id'] . "</td>";
	echo "</tr>";
}

mysql_free_result($result);
mysql_close();
?>

</table>

<p class = "footer"> <a href = "navMenu.html"> Return to Navigation Menu </a> </p>

</body>
</html>
