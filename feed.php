<?php
require('basic_functions.php');
echo "\n Feed php step 0";
require('feed.php');
session_start();
if (isLoggedIn()) {
	$conn = setupMySQL();
	echo "SQL setup successful";
	$users_query = getBestMatchingUsersQuery();
	echo $users_query;
	$users = $conn->query($users_query);
	showCards($users);
} else {
	header("Location: login.html");
	exit;
}
                    
function getBestMatchingUsersQuery() {
	return "SELECT * FROM USERS WHERE gender = '".$_COOKIE['gender_preference']."' AND genderPreference = '".$_COOKIE['gender']."';";
}
function getUserByName($search_term) {
	$sql = "SELECT * FROM USERS WHERE firstName LIKE '%".$search_term."%';";
}
// function getGenderMatchingUsers($conn, $user_gender, $preferred_gender)
// {
// 	// gets rows with all matching users filtering by gender and gender preference
// 	$sql = "SELECT * FROM Users WHERE preferredGender = '{$user_gender}' AND gender = '{$preferred_gender}';";
// 	return $conn->query($sql);
// }
function showCards($rows)
{
	echo '\n ShowCards 0';
	while ($row = $rows->fetch_assoc())
	{
		echo '\n ShowCards 1';

		echo '<div class="feed">
		<div class="head">
			<div class="user">
				<div class="profilepicture">
					<img src="data:image/png;base64,'.$row['icon'].'" alt="user image">
				</div>
				<div class="searchName">
					<a href="#">
						<h3>'.$row['firstName'].'</h3>
					</a>
				</div>
			</div>
		</div>
		<div class="photo">
		<img src="data:image/png;base64,'.$row['icon'].'" alt="user icon">
		</div>
		<div class="action-buttons">
			<div class="interaction-buttons">
				<span><i class="uil uil-heart"></i></span>
				<span><i class="uil uil-thumbs-down"></i></span>
			</div>
		</div>
		<div class="caption">
			<p>'.$row['description'].'</p>
		</div>
	</div>';
	echo '\n ShowCards 2';
	}
}
function getCustomFiltersQuery() {
	$filtered_query = 'SELECT * FROM USERS WHERE ';
	$addons = 0;
	if (isset($_POST['showMale'])) {
		$filtered_query = $filtered_query . "gender = 'MALE'";
		$addons = $addons + 1;
	}
	if (isset($_POST['showFemale'])) {
		if ($addons > 0) {
			$filtered_query = $filtered_query . ' AND ';
		}
		$filtered_query = $filtered_query . "gender = 'FEMALE'";
		$addons = $addons + 1;
	}
	if (isset($_POST['showOther'])) {
		if ($addons > 0) {
			$filtered_query = $filtered_query . ' AND ';
		}
		$filtered_query = $filtered_query . "gender = 'OTHER'";
		$addons = $addons + 1;
	}
	$current_year = (int) date("Y");
	$days = date("m-d");
	if (isset($_POST['showOlderThan'])) {
		if ($addons > 0) {
			$filtered_query = $filtered_query . ' AND ';
		}
		$addons = $addons + 1;
		$age_min = (int) $_POST['showOlderThan'];
		$year_max = $current_year - $age_min;
		$filtered_query = $filtered_query . "dateOfBirth < '{$year_max}-{$days}'";
	}
	if (isset($_POST['showYoungerThan'])) {
		if ($addons > 0) {
			$filtered_query = $filtered_query . ' AND ';
		}
		$addons = $addons + 1;
		$age_max = (int) $_POST['showYoungerThan'];
		$year_min = $current_year - $age_min;
		$filtered_query = $filtered_query . "dateOfBirth > '{$year_max}-{$days}''";
	}
	return $filtered_query . ';';
}
?>
