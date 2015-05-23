<!DOCTYPE html>

<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 19/05/2015
 * Time: 9:08 PM
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
    <title>Index</title>

</head>

<body>
    <?php require_once('header.php'); ?>

    <?php require_once('settings.php');  
    $conn = @mysqli_connect($host, $user, $pswd)
    or die('Failed to connect to server');

    @mysqli_select_db($conn, $dbnm)
    or die('Database not available');

    $query = "SELECT * FROM users WHERE user_name = '{$userlogin}'";
    $results = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($results)) {
        $email = $row['email'];
    }

    mysqli_free_result($results);
    mysqli_close($conn);
    ?>

    <div id=text>
    <br>

    <form action="contactprocess.php" method="post">
        Full Name: <input type="text" value="<?php if(isset($userlogin)){ echo $userlogin;} ?>" name="name"></br>
        <br>Email: <input type="email" value="<?php if(isset($email)){ echo $email;} ?>"name="email"></br>
        <br>Topic: <input type="text" name="topic"></br>
        <br>Message:</br> <br> <textarea name="message" style="...";></textarea></br>

        <input type="submit">
        <input type="reset">
    </form>
    </div>


</body>
</html>