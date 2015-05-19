<!DOCTYPE html>
<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 19/05/2015
 * Time: 9:53 PM
 */
session_start(); // start the session
if (!isset ($_SESSION["login"])) { // check if session variable exists
    $_SESSION["login"] = ""; // create the session variable
}
$userlogin = $_SESSION["login"]; // copy the value to a variable
?>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">

    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Processing Status Post Input</title>
</head>

<body>

<?php require_once('header.php'); ?>

<div id=text>
    <?php

    $fullnameErr = false;
    $emailErr = false;
    $topicErr = false;
    $messageErr = false;


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        echo "<p> <b>You Have entered: </b>";

        if (!isset($_POST["name"]) && !empty($_POST["name"])) {
            $fullnameErr = true;
        } else {
            $fullname = $_POST["name"];
            echo "<br> {$fullname} </br>";
        }
        if (!isset($_POST["email"]) && !empty($_POST["email"])) {
            $emailErr = true;
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = $_POST["email"];
            $emailErr = true;
        } else {
            echo "<br> {$email} </br>";
        }
        if (!isset($_POST["topic"]) && !empty($_POST["topic"])) {
            $topicErr = true;
        } else {
            $topic = $_POST["topic"];
            echo "<br> {$topic} </br>";
        }
        if (!isset($_POST["message"]) && !empty($_POST["message"])) {
            $messageErr = true;
        } else {
            $message = $_POST["message"];
            echo "<br> {$message} </br>";
        }

    }
    echo "</p>";

    if ($fullnameErr == false AND $emailErr == false AND $topicErr == false AND $messageErr == false) {
        echo "<p> <b>You have entered correctly! </b>";

        require_once('settings.php');
        $conn = @mysqli_connect($host, $user, $pswd)
        or die('Failed to connect to server');

        @mysqli_select_db($conn, $dbnm)
        or die('Database not available');

        $result = mysqli_query($conn, 'show tables like "contact"');
        $row = mysqli_fetch_assoc($result);

        if (isset($row)) {
            echo "<p>Table Exists</p>";
        } else {
            echo "<p>Table Doesn't Exist</p>";
            $table = "CREATE TABLE IF NOT EXISTS contact (
						  fullname VARCHAR (50) NOT NULL,
						  email VARCHAR (50) NOT NULL,
						  topic varchar (20) NOT NULL,
						  message varchar(1000) NOT NULL,
						)";
            @mysqli_query($conn, $table)
            or die('Failed to connect to server');
        }

        $query = "INSERT INTO contact(fullname, email, topic, message)
			VALUES ('{$fullname}',	'{$email}', '{$topic}', '{$message}')";

        if (mysqli_query($conn, $query)) {
            echo "<p>New record created successfully</p>";
        } else {
            echo "<p>Insert Failed</p>";
            echo $query;
            echo "Go back to correct your Input";
            echo '<p><button onclick="goBack()">
						Go Back
						</button></p>';
            echo "</p>";
        }
        mysqli_close($conn);

    } else {
        echo "<p> <b>You have entered incorrectly: </b>";
        if ($fullnameErr == true) {
            echo "<p> Please enter Name </p>";
        }
        if ($emailErr == true) {
            echo "<p> Please enter email</p>";
        }
        if ($topicErr == true) {
            echo "<p> Please enter topic</p>";
        }
        if ($messageErr == true) {
            echo "<p> Please enter Message </p>";
        }


        echo "Go back to correct your Input";
        echo '<p><button onclick="goBack()">
					Go Back
					</button></p>';
        echo "</p>";
    }
    ?>

</div>

<script>
    function goBack() {
        window.history.back();
    }
</script>


</body>
</html>