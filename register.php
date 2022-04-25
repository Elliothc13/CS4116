<?php
require('basic_functions.php');
// Launched when register button is clicked
if (wasPosted(array('email', 'password', 'first_name', 'surname', 'date_of_birth', 'gender', 'gender_preference', 'location', 'description')))
{
    // If all details present run the queries
    $conn = setupMySQL();

    // Escape incomptible characters
    $first_name = $conn -> real_escape_string($_POST['first_name']);
    $surname = $conn -> real_escape_string($_POST['surname']);
    $description = $conn -> real_escape_string($_POST['description']);
    $hash_password = md5( $hash_password);

    // Insert into Users
    $sql_1 = "INSERT INTO Users(firstName, surname, dateOfBirth, gender, genderPreference, location, description) VALUES('{$first_name}', '{$surname}', '{$_POST['date_of_birth']}', '{$_POST['gender']}', '{$_POST['gender_preference']}', '{$_POST['location']}', '{$description}');";
    $result_1 = $conn->query($sql_1);
    if (!$result_1) {
        echo "INSERT error: " . $conn->error;
        $conn->close();
        exit;
    }

    // Check if it worked
    $sql_2 = "SELECT userId FROM Users WHERE firstName = '{$first_name}' AND surname = '{$surname}' AND dateOfBirth = '{$_POST['date_of_birth']}' AND gender = '{$_POST['gender']}' AND genderPreference = '{$_POST['gender_preference']}' AND location = '{$_POST['location']}' AND description = '{$description}' LIMIT 1;";
    $result_2 = $conn->query($sql_2);
    if ((!$result_2)) {
        echo "Registration userId error: " . $result_2 -> error;
        $conn->close();
        exit;
    }
    $user_id = $result_2->fetch_assoc();
    if (!$user_id) {
        echo "Registration error, userId not found";
        $conn->close();
        exit;
    }

    // Insert into Credentials
    $sql_3 = "INSERT INTO Credentials(email, userId, password, isAdmin) VALUES ('{$_POST['email']}', '{$user_id}', '{$hash_password}', 0);";
    $result_3 = $conn->query($sql_3);
    if ((!$result_3)) {
        echo "Registration credentials error: " . $result_3->error;
        $conn->close();
        exit;
    }
    // Insert into BannedStatus
    $sql_4 = "INSERT INTO BannedStatus(userId, banStatus) VALUES ('{$user_id}', 0);";
    $result_4 = $conn->query($sql_4);
    if ((!$result_4)) {
        echo "Registration ban status error: " . $result_4->error;
        $conn->close();
        exit;
    }
    $conn->close();
    echo "\n Registration successful";
    header("Location: login.php");
}
exit;
?>