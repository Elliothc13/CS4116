<?php
require('basic_functions.php');
session_start();
if (isLoggedIn()) {
	// redirect to feed
	if ($_SESSION['is_admin']) {
		header("Location: admin.php");
	} else {
		header("Location: feed2.php");
	}
	exit(); 
	// redirects to the feed or admin page
} else {
	// not logged in
	if (wasPosted(array('email', 'password'))) {
		// if credentials were posted
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$conn = setupMySQL();
		
		$sql = "SELECT * FROM Credentials WHERE email = '".$email."' AND password = '".$password."' LIMIT 1";
		echo "\n".$sql;
		$result = $conn->query($sql);
		$row = $result->fetch_assoc(); 
		echo "\n".$row;
		if ($row) {
			$_SESSION['logged_in'] = true;
			$_SESSION['user_id'] = $row['userId'];
			$_SESSION['is_admin'] = $row['isAdmin'];
			
			if (! $row['isAdmin']) {
				$sql_2 = "SELECT * FROM Users WHERE userId = {$_SESSION['user_id']} LIMIT 1;";
				$result_2 = $conn->query($sql_2);
				$result_3 = $result_2->fetch_assoc();

				// for normal user load that users details into cookies
				setcookie("filter", "BEST_MATCH", time() + 7200);
				setcookie("gender", $result_3['gender'], time() + 7200);
				setcookie("gender_preference", $result_3['genderPreference'], time() + 7200);
				header("Location: feed2.php");
			} else {
				header("Location: admin.php");
			}
		} else {
			echo "Login failed, please check the credentials";
		}
		$conn->close();
	} else {
		header("Location: login.html");
	}
}
?>