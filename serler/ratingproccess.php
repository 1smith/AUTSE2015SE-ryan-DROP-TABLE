<!DOCTYPE html>

<html>

<head>

<title>Recive</title>
  <link rel="stylesheet" type="text/css" href="styles.css">

<meta http-equiv="content-type" content="text/html; charset=utf-8" />

</head>

<body>
<?php	
	require_once('header.php'); 
	require_once('settings.php');  

	if (isset ($_GET["id"]) && isset($_GET["Rating"])){

		$id = $_GET["id"];
		$rate = $_GET["Rating"];


		$conn = @mysqli_connect($host, $user, $pswd)
		or die('Failed to connect to server');



		@mysqli_select_db($conn, $dbnm)
		or die('Database not available');



		$query = "SELECT * FROM serler WHERE id = '{$id}'";
		$results = mysqli_query($conn, $query);

		$row = mysqli_fetch_assoc($results);

		$rating = $row['rating'];

		$number = $row['numberofratings'];

		$rating = (($rating * $number) + $rate) / ($number + 1);

		$number++;

		$query2 = "UPDATE serler SET rating = '{$rating}', numberofratings = '{$number}' WHERE id = '{$id}'";
		echo $query2;
		mysqli_query($conn, $query2);
		mysqli_close($conn);
	}
	else {
		echo "Failure";
		
	}
	header("location:index.php");
?>

</body>

</html>