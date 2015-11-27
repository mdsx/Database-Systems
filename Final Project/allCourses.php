<?php
$host = "localhost"; // Host name
$username = "root"; // MySQL username
$password = "temp_pass"; // MySQL password
$db_name = "universitydb"; // Database name
$tbl_name = "course"; // Table name
mysql_connect("$host", "$username", "$password");

mysql_select_db("$db_name");

$query = "SELECT * FROM course";
$result = mysql_query($query);
?>

<html>
<head>
<title> Courses </title>
</head>
<body>
<h2> Courses </h2>
<table border="2" cellspacing="2" cellpadding="2">
 <tr>
 <th><font face="Arial, Helvetica, sans-serif"> Course ID </font></th>
 <th><font face="Arial, Helvetica, sans-serif"> Title </font></th>
 <th><font face="Arial, Helvetica, sans-serif"> Credits </font></th>
 <th><font face="Arial, Helvetica, sans-serif"> Department ID </font></th>
 </tr>

<?php
while ($row = mysql_fetch_array($result))
{
	echo "<tr>";
	echo "<td>" . $row['course_id'] . "</td>";
	echo "<td>" . $row['title'] . "</td>";
	echo "<td>" . $row['credits'] . "</td>";
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
