<?php
function getGenderMatchingUsers($conn, $user_gender, $preferred_gender)
{
	// gets rows with all matching users filtering by gender and gender preference
	$sql = "SELECT * FROM Users WHERE preferredGender = '{$user_gender}' AND gender = '{$preferred_gender}';";
	return $conn->query($sql);
}
?>