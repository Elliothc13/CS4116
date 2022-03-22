<!DOCTYPE html>
<html>
<head>
<title>Regiterphp</title>
</head>
<body>
<h1>Hello world</h1>
<?php
print "<h1>zero ok</h1>\n";
require('basic_functions.php');
print "<h1>one ok</h1>\n";
if (wasPosted(array('email', 'password', 'first_name', 'surname', 'date_of_birth', 'gender', 'gender_preference', 'location', 'description')))
{
	print "<h1>two ok</h1>\n";
	$conn = setupMySQL();
	print "<h1>three ok</h1>\n";
	$sql_1 = "INSERT INTO Users(firstName, surname, dateOfBirth, gender, genderPreference, location, description) VALUES(\'{$_POST['first_name']}\', \'{$_POST['surname']}\', \'{$_POST['date_of_birth']}\', \'{$_POST['gender']}\', \'{$_POST['gender_preference']}\', \'{$_POST['location']}\', \'{$_POST['description']}\');";
	print("<p>{$sql_1}</p>");
	$result = $conn->query($sql_1);
	if (!$result)
	{
		echo "Registration insertion error: " . $conn->error;
		$conn->close();
		exit;
	}
	print "<h1>4 ok</h1>\n";
	$sql_2 = "SELECT userId FROM Users WHERE firstName = '{$_POST['first_name']}' AND surname = '{$_POST['surname']}' AND dateOfBirth = '{$_POST['date_of_birth']}' AND gender = '{$_POST['gender']}' AND genderPreference = '{$_POST['gender_preference']}' AND location = '{$_POST['location']}' AND description = '{$_POST['description']}' LIMIT 1;";
	$result = $conn->query($sql_2);
	if ((!$result))
	{
		echo "Registration userId error: " . $result->error;
		$conn->close();
		exit;
	}
	$user_id = $result->fetch_assoc();
	if (!$user_id)
	{
		echo "Registration error, userId not found";
		$conn->close();
		exit;
	}
	print "<h1>5 ok</h1>\n";
	$sql_3 = "INSERT INTO Credentials(email, userId, password, isAdmin) VALUES ('{$_POST['email']}', '{$user_id}', '{$_POST['password']}', 0);";
	$result = $conn->query($sql_3);
	if ((!$result))
	{
		echo "Registration credentials error: " . $result->error;
		$conn->close();
		exit;
	}
	print "<h1>6 ok</h1>\n";
	$sql_4 = "INSERT INTO BannedStatus(userId, banStatus) VALUES ('{$user_id}', 0);";
	$result = $conn->query($sql_4);
	if ((!$result))
	{
		echo "Registration ban status error: " . $result->error;
		$conn->close();
		exit;
	}
	$conn->close();
	print "<h1>7 ok</h1>\n";
	echo "Registration successful";
	print "<h1>8 ok</h1>\n";
	header("Location: login.php");
	exit;
}
?>
</body>
</html>