<?php
require('basic_functions.php');
session_start();
if (isLoggedIn())
{
	// redirect to feed
	if ($_SESSION['isAdmin'])
	{
		header("Location: admin.php");
	}
	else
	{
		header("Location: feed.php");
	}
	exit(); // redirects to the feed or admin page
}
else
{
	// not logged in
	if (wasPosted(array('email', 'password'))
	{
		// if credentials were posted
		$email = $_POST['email'];
		$password = $_POST['password'];
		$conn = setupMySQL();
		$sql = "SELECT * FROM Credentials WHERE email = '{$email}' AND password = '{$password}' LIMIT 1;";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc(); 
		if ($row)
		{
			$_SESSION['logged_in'] = true;
			$_SESSION['user_id'] = $row['userId'];
			$_SESSION['is_admin'] = $row['isAdmin'];
			
			header("Location: feed.php");
			
			if (! $row['isAdmin'])
			{
				// for normal user
				setcookie("filter", "NONE", time() + 3600);
				setcookie("gender", $row['gender'], time() + 3600);
				setcookie("preferredGender", $row['preferredGender'], time() + 3600);
				header("Location: feed.php");
			}
			exit;
		}
		else
		{
			echo "Login failed, please check the credentials";
		}
		$conn->close();
	}
}
?>