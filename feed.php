<?php
require('basic_functions.php');
session_start();
if (isLoggedIn())
{
	// load the feed as normal
}
else
{
	//redirect to login
	header("Location: login.html");
	exit;
}

function showCard($rows)
{
	while ($row = $rows->fetch_assoc())
	{
		
		echo "<div class=\"card col-sm-8 offset-1\">
					  <img class=\"card-img-top\" src=\"data:image/png;base64," . $row['icon'] . "\" alt=\"Card image\">
					  <div class=\"card-body\">
						<h4 class=\"card-title\">" . $row['firstName'] . " " . $row['surname'] . "</h4>
						<p class=\"card-text\">Some example text.</p>
						<a href=\"profile?user=" .  $row['userId'] . "\" class=\"btn btn-primary\">See Profile</a>
					  </div>
					</div>" . "\n";
	}
}
?>
<?php
require('filter_functions.php');
showCard(getGenderMatchingUsers($_COOKIE['gender'], $_COOKIE['preferredGender']));
?>