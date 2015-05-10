<!DOCTYPE html>
<?php
 session_start(); // start the session
 if (!isset ($_SESSION["login"])) { // check if session variable exists
 $_SESSION["login"] = ""; // create the session variable
 }
 $userlogin = $_SESSION["login"]; // copy the value to a variable
?>

<?php require_once('settings.php');  
	if (isset ($_GET["id"])){
		$id = $_GET["id"];

		$conn = @mysqli_connect($host, $user, $pswd)
		or die('Failed to connect to server');

		@mysqli_select_db($conn, $dbnm)
		or die('Database not available');

		$query = "SELECT * FROM serler WHERE id = '{$id}'";
		$results = mysqli_query($conn, $query);

		while($row = mysqli_fetch_assoc($results)) {
			$title = $row['title'];
			$contributor = $row['contributor'];
			$date = $row['date_added'];
			$year = $row['year'];
			$authors = $row['authors'];
			$venue = $row['venue'];
			$quality = $row['quality'];
			$tags = $row['tags'];
			$abstract = $row['abstract'];
		}

		mysqli_free_result($results);
		mysqli_close($conn);
	}
	else {
		header("location:javascript://history.go(-1)");
	}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
</head>

<body>
	<div id=login>
		<?php if($userlogin != ""){ echo "{$userlogin} <a href=\"logout.php\">Log Out</a>";} else echo "<a href=\"login.php\">Login to SERLER</a>"; ?>
	</div>
	<div id=quicksearch>
	<form id="quicksearch" action = "searchstatusprocess.php" method = "get">
		<input type="text" value="Search for Papers" 
			onblur="if(this.value == '') { 
			this.value = 'Search for Papers'; }" 
			onfocus="if(this.value == 'Search for Papers') {
			 this.value = ''; 
			}" 
		name="input">
		<input type="Submit" name="button">
	</form>
	</div>
		<h1>SERLER Software Engineering Research Laboratory Evidence Repository</h1>
	
	
	<ul class="menu">
	<li><a href="index.php">Home</a></li>
	<li><a href="poststatusform.php">Add a Paper</a></li>
	<li><a href="searchstatusform.php">Advanced Search</a></li>
	<li><a href="about.php">About SERL</a></li>
	</ul>
	
	<div id=text>
	<?php
	echo "<h2>{$title}</h2>";
	echo $date;
	echo "- {$contributor}";
	echo "<p>
		<br><strong>Author(s): </strong>{$authors}</br>
		<br><strong>Venue: </strong>{$venue}</br>
		<br><strong>Year: </strong>{$year}</br>
	</p>";

	echo "Quality <br>";

	for($i = $quality;  $i > 0; $i--){
		echo "<img src=\"star.png\" height=\"15\"  width=\"15\" >";
	}
	for($j = 5 - $quality; $j > 0; $j--){
		echo "<img src=\"unstar.png\"  height=\"15\"  width=\"15\" >";
	}


	echo "<p>";
	echo $abstract;
	echo "</p>";

	echo $tags;

	echo "<br></br>";
	echo '<p><button onclick="goBack()">
					Go Back to search results
					</button></p>';
			echo "</p>";
	?>
	</div>

	<script>
	function goBack() {
		window.history.back();
	}
	</script>

</body>
</html> 