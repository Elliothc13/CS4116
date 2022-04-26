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

    // Check if not registered already
    $email = $_POST['email'];
    $sql_0 = "SELECT * FROM Credentials WHERE email = '{$email}' LIMIT 1;";
    $result_0 = $conn -> query($sql_0);
    if (!$result_0) {
        echo "\nAccessing Credentials error: " . $conn->error;
        $conn->close();
        exit;
    } elseif ($result_0->num_rows) {
        // If there is duplication
        // Check if not banned
        $userId = ($result_0->fetch_assoc())['userId'];
        $sql_5 = "SELECT * FROM BannedStatus WHERE userId = {$userId} AND banStatus > 0 LIMIT 1;";
        $result_5 = $conn->query($sql_5);
        if (!$result_5) {
            echo "\nAccessing BannedStatus error: " . $conn->error;
        } elseif ($result_5->num_rows) {
            // If user was banned
            header("Location: banned.html");
            $conn->close();
            exit;
        }
        echo '<script>alert("An account with email ' . $email . ' already exists.\nYou will be redirected to login page."); window.location.href="login.html";</script>';
        $conn->close();
    } else {

        // Insert into Credentials
        $sql_3 = "INSERT INTO Credentials(email, password) VALUES ('{$_POST['email']}', '{$hash_password}');";
        $result_3 = $conn->query($sql_3);
        if ((!$result_3)) {
            echo "\nRegistration credentials error: " . $conn->error;
            $conn->close();
            exit;
        }

        // Check if it worked
        $sql_2 = "SELECT userId FROM Credentials WHERE email = '{$email}' LIMIT 1;";
        $result_2 = $conn->query($sql_2);
        if ((!$result_2)) {
            echo "\nRegistration userId error: " . $conn->error;
            $conn->close();
            exit;
        }
        $user_id = $result_2->fetch_assoc()['userId'];
        if (!$user_id) {
            echo "\nRegistration error, userId not found";
            $conn->close();
            exit;
        }

        // Insert into BannedStatus
        $sql_4 = "INSERT INTO BannedStatus(userId, banStatus) VALUES ('{$user_id}', 0);";
        $result_4 = $conn->query($sql_4);
        if ((!$result_4)) {
            echo "\nRegistration ban status error: " . $conn->error;
            $conn->close();
            exit;
        }

        // Insert into Users
        $sql_1 = "INSERT INTO Users(firstName, surname, dateOfBirth, gender, genderPreference, location, description) VALUES('{$first_name}', '{$surname}', '{$_POST['date_of_birth']}', '{$_POST['gender']}', '{$_POST['gender_preference']}', '{$_POST['location']}', '{$description}');";
        $result_1 = $conn->query($sql_1);
        if (!$result_1) {
            echo "\nINSERT error: " . $conn->error;
            $conn->close();
            exit;
        }
        
        $conn->close();
        echo "\n Registration successful";
        header("Location: login.html");
    }
}
?>