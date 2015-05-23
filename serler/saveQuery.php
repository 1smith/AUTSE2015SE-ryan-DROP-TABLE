<!DOCTYPE html>
<?php
 session_start(); // start the session
 if (!isset ($_SESSION["login"])) { // check if session variable exists
 $_SESSION["login"] = ""; // create the session variable
 }
 $userlogin = $_SESSION["login"]; // copy the value to a variable
?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="styles.css">

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Processing Status Post Input</title>
</head>

<body>

	<?php require_once('header.php'); ?>
	
	<div id=text>
	<?php
	if($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST["query"]) || empty($_POST["query"])){
			$query = $_POST["query"];				
			require_once('settings.php'); 
			$conn = @mysqli_connect($host, $user, $pswd)
			or die('Failed to connect to server');
			$query = addslashes($query);
			@mysqli_select_db($conn, $dbnm)
			or die('Database not available');
			
			$insert = "INSERT INTO query (query, user_name)
			VALUES('{$query}', '{$userlogin}')";

			mysqli_query($conn, $insert);
			mysqli_close($conn);
			echo "<p>Query Saved:";
			echo '<button onclick="goBack()">
						Go Back
						</button></p>';
			echo "</p>";
		}else echo "Failed to get query";
	}
	else echo "Failed to get recieve input";
		
	?>
	<script>
	function goBack() {
		window.history.back();
	}
	</script>
	
	</div>
	
	
</body>
</html> 