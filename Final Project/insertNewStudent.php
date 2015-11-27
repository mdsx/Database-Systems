<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title> New Student Form PHP Page </title>
<style type="text/css">
h1 {text-align: center; color: blue}
h2 {font-family: Ariel, sans-serif; text-align: left; color: blue}
p.footer {text-align: center}
table.output {font-family: Ariel, sans-serif}
</style>
</head>

<body>
<?php
// Get connection
$Conn = mysql_connect('localhost', 'root','temp_pass');
mysql_select_db("universitydb");

// Test connection
if (!$Conn)
{
	exit ("Connection Failed: " . $Conn);
}

// Create short variable names
$studentID = $_POST["student_id"];
$birthDate = $_POST["birth_date"];
$lastName = $_POST["last_name"];
$firstName = $_POST["first_name"];
$phone = $_POST["phone"];
$street = $_POST["street"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];
$startTerm = $_POST["start_term"];
$majorID = $_POST["major_id"];
$studentType = $_POST["student_type"];

// Create SQL statement to INSERT new data
$SQLINSERT = "INSERT INTO student ";
$SQLINSERT .= "VALUES('$studentID', '$lastName', '$firstName', ";
$SQLINSERT .= "'$street', '$city', '$state', '$zip', ";
$SQLINSERT .= "'$startTerm', '$birthDate', '$majorID', '$phone', '$studentType')";

// Execute SQL statement
$Result = mysql_query($SQLINSERT);

// Test existence of result
echo "<h1>
		The University STUDENT Table
	</h1>
	<hr />";
if ($Result)
{
	echo "<h2>
		New Student Added:
	</h2>
	<table>
		<tr>";
		echo "<td>student_id:</td>";
		echo "<td>" . $studentID . "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>birth_date:</td>";
		echo "<td>" . $birthDate . "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>last_name:</td>";
		echo "<td>" . $lastName . "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>first_name:</td>";
		echo "<td>" . $firstName . "</td>";
		echo "</tr>";
		echo "<td>phone:</td>";
		echo "<td>" . $phone . "</td>";
		echo "</tr>";
		echo "<td>street:</td>";
		echo "<td>" . $street . "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>city:</td>";
		echo "<td>" . $city . "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>state:</td>";
		echo "<td>" . $state . "</td>";
		echo "</tr>";
		echo "<td>zip:</td>";
		echo "<td>" . $zip . "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>start_term:</td>";
		echo "<td>" . $startTerm . "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>major_id:</td>";
		echo "<td>" . $majorID . "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>student_type:</td>";
		echo "<td>" . $studentType . "</td>";
		echo "</tr>";
		echo "</table><br /><hr />";
}
else
{
	exit ("SQL Statement Error: " . $Result);
}

// Create SQL statement to read STUDENT table data
$SQL = "SELECT * FROM student";
// Execute SQL statement
$RecordSet = mysql_query($SQL);
// Test existence of recordset
if (!$RecordSet)
{
	exit ("SQL Statement Error: " . $SQL);
}
?>

<!-- Page Headers -->
<h1> The University STUDENT Table </h1>
<hr />
<h2> STUDENT </h2>

<?php
// Table headers
echo "<table class='output' border='1'>
<tr>
<th> Student ID </font></th>
<th> Last Name </font></th>
<th> First Name </font></th>
<th> Address </font></th>
<th> Start Term </font></th>
<th> Birth Date </font></th>
<th> Major ID </font></th>
<th> Phone </font></th>
<th> Student Type </font></th>
</tr>";

// Table data
while ($RecordSetRow = mysql_fetch_array($RecordSet))
{
	echo "<tr>";
	echo "<td>" . $RecordSetRow['student_id'] . "</td>";
	echo "<td>" . $RecordSetRow['last_name'] . "</td>";
	echo "<td>" . $RecordSetRow['first_name'] . "</td>";
	echo "<td>" . $RecordSetRow['street'] . " " . $RecordSetRow['city'] . ", " . $RecordSetRow['state'] . " " . $RecordSet['zip'] . "</td>";
	echo "<td>" . $RecordSetRow['start_term'] . "</td>";
	echo "<td>" . $RecordSetRow['birth_date'] . "</td>";
	echo "<td>" . $RecordSetRow['major_id'] . "</td>";
	echo "<td>" . $RecordSetRow['phone'] . "</td>";
	echo "<td>" . $RecordSetRow['student_type'] . "</td>";
	echo "</tr>";
}
echo "</table>";

// Close connection
mysql_close($Conn);
?>

<br />
<hr />
<p class = "footer"> <a href = "navMenu.html"> Return to Navigation Menu </a> </p>
<hr />
</body>
</html>