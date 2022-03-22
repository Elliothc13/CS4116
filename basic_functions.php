<?php
function setupMySQL()
{
	$server_name = "sql212.epizy.com ";
	$db_username = "epiz_31170569";
	$db_password ="QEvjZHe1Gew";
	$db_name = "epiz_31170569_datingsite";
	$conn = new mysqli($server_name, $db_username, $db_password, $db_name);
	if ($conn->connection_error)
	{
		die("Connection failed");
		exit();
	}
	echo "Connected to DB successfully";
	return $conn;
}

function isLoggedIn()
{
	return ($_SESSION['logged_in'] && $_SESSION['user_id']);
}

function wasPosted($arr_of_props)
{
	$posted = isset($_POST);
	if ($posted)
	{
		foreach ($arr_of_props as $posted_prop)
		{
			$posted = $posted && $_POST[$posted_prop];
		}
	}
	return $posted;
}
?>