<?php
$host = "localhost"; // Host name
$username = "root"; // MySQL username
$password = "temp_pass"; // MySQL password
$db_name = "universitydb"; // Database name
$tbl_name = "student"; // Table name
mysql_connect("$host", "$username", "$password");

mysql_select_db("$db_name");

$query = "SELECT * FROM student";
$result = mysql_query($query);
?>

<html>
<head>
<title> Students </title>
</head>
<body>
<h2> Students </h2>
<table border="2" cellspacing="2" cellpadding="2">
 <tr>
 <th><font face="Arial, Helvetica, sans-serif"> Student ID </font></th>
 <th><font face="Arial, Helvetica, sans-serif"> Last Name </font></th>
 <th><font face="Arial, Helvetica, sans-serif"> First Name </font></th>
 <th><font face="Arial, Helvetica, sans-serif"> Address </font></th>
 <th><font face="Arial, Helvetica, sans-serif"> Start Term </font></th>
 <th><font face="Arial, Helvetica, sans-serif"> Birth Date </font></th>
 <th><font face="Arial, Helvetica, sans-serif"> Major ID </font></th>
 <th><font face="Arial, Helvetica, sans-serif"> Phone </font></th>
 <th><font face="Arial, Helvetica, sans-serif"> Student Type </font></th>
 </tr>

<?php
while ($row = mysql_fetch_array($result))
{
	echo "<tr>";
	echo "<td>" . $row['student_id'] . "</td>";
	echo "<td>" . $row['last_name'] . "</td>";
	echo "<td>" . $row['first_name'] . "</td>";
	echo "<td>" . $row['street'] . " " . $row['city'] . ", " . $row['state'] . " " . $row['zip'] . "</td>";
	echo "<td>" . $row['start_term'] . "</td>";
	echo "<td>" . $row['birth_date'] . "</td>";
	echo "<td>" . $row['major_id'] . "</td>";
	echo "<td>" . $row['phone'] . "</td>";
	echo "<td>" . $row['student_type'] . "</td>";
	echo "</tr>";
}

mysql_free_result($result);
mysql_close();
?>

</table>

<p class = "footer"> <a href = "navMenu.html"> Return to Navigation Menu </a> </p>

</body>
</html>
