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

		$titleErr = false;
		$contributorErr = false;
		$authorsErr = false;
		$venueErr = false;
		$qualityErr = false;
		$tagsErr = false;
		$yearErr = false;
		$abstractErr = false;
	
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			echo "<p> <b>You Have entered: </b>";

			if (!isset($_POST["title"]) && !empty($_POST["title"])) {				$titleErr = true;
			}else {				$title = $_POST["title"];				echo "<br> {$title} </br>";
			}
			if (!isset($_POST["contributor"])  && !empty($_POST["contributor"])) {				$contributorErr = true;
			}else {				$contributor = $_POST["contributor"];				echo "<br> {$contributor} </br>";
			}
			if (!isset($_POST["authors"])  && !empty($_POST["authors"])) {				$authorsErr = true;
			}else {				$authors = $_POST["authors"];				echo "<br> {$authors} </br>";
			}
			if (!isset($_POST["venue"]) && !empty($_POST["venue"])) {				$venueErr = true;
			}else {				$venue = $_POST["venue"];				echo "<br> {$venue} </br>";
			}
			if (!isset($_POST["quality"]) && !empty($_POST["quality"])) {
				$qualityErr = true;
			}else {
				$quality = $_POST["quality"];
				echo "<br> {$quality} </br>";
				if($quality > 5)
					$qualityErr = true;
			}
			if (!isset($_POST["tags"]) && !empty($_POST["tags"])) {				$tagsErr = true;
			}else {				$tags = $_POST["tags"];				echo "<br> {$tags} </br>";
			}
			if (!isset($_POST["year"]) && !empty($_POST["year"])) {				$yearErr = true;
			}else {				$year = $_POST["year"];				echo "<br> {$year} </br>";
			}
			if (!isset($_POST["abstract"]) && !empty($_POST["abstract"])) {
				$abstractErr = true;
			}else {
				$abstract = $_POST["abstract"];
				echo "<br> {$abstract} </br>";
				if(!preg_match('/^[a-zA-Z0-9 !,?. ]+$/', $abstract)){
					$abstractErr = true;
				}
			}
			
		}
		echo "</p>";
		
		if($titleErr == false AND $contributorErr == false AND $authorsErr == false AND $venueErr == false AND $qualityErr == false AND $tagsErr == false AND $yearErr == false AND $abstractErr == false){
			echo "<p> <b>You have entered correctly! </b>";
					
			require_once('settings.php'); 
			$conn = @mysqli_connect($host, $user, $pswd)
			or die('Failed to connect to server');

			@mysqli_select_db($conn, $dbnm)
			or die('Database not available');

			$result = mysqli_query($conn, 'show tables like "serler"');
			$row = mysqli_fetch_assoc($result);
			
			if(isset($row)){
				echo "<p>Table Exists</p>";
			}
			else {
				echo "<p>Table Doesn't Exist</p>";
				$table = "CREATE TABLE IF NOT EXISTS serler (
						  id int(2) NOT NULL AUTO_INCREMENT,
						  title varchar(100) NOT NULL,
						  contributor varchar(100) NOT NULL,
						  date_added timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
						  year year(4) NOT NULL,
						  authors varchar(100) NOT NULL,
						  venue varchar(100) NOT NULL,
						  quality int(1) NOT NULL,
						  abstract varchar(1000) NOT NULL,
						  tags varchar(500) NOT NULL,
						  PRIMARY KEY (id)
						)";
				@mysqli_query($conn, $table)
				or die('Failed to connect to server');
			}
			
			$query = "INSERT INTO serler(title, contributor, authors, venue, quality, tags, year, abstract)
			VALUES ('{$title}',	'{$contributor}', '{$authors}', '{$venue}', '{$quality}', '{$tags}', '{$year}', '{$abstract}')";
			
			if (mysqli_query($conn, $query)) {
				echo "<p>New record created successfully</p>";
			}
			else {
				echo "<p>Insert Failed</p>";
				echo $query;
				echo "Go back to correct your Input";
				echo '<p><button onclick="goBack()">
						Go Back
						</button></p>';
				echo "</p>";
			}
			mysqli_close($conn);
			
		}
		else{
			echo "<p> <b>You have entered incorrectly: </b>";
			if($titleErr == true) {	echo "<p> Please enter a Title for the paper </p>"; }
			if($contributorErr == true) {	echo "<p> Please enter your name</p>";	}
			if($authorsErr == true) {	echo "<p> Please enter the Authors of the paper </p>"; }
			if($venueErr == true) {	echo "<p> Please enter the Venue for the paper </p>"; }
			if($qualityErr == true) {	echo "<p> Please enter a Quality Rating for the paper out of 5 stars</p>"; }
			if($tagsErr == true) {	echo "<p> Please enter tags for the paper </p>"; }
			if($yearErr == true) {	echo "<p> Please enter year the paper the paper is from</p>"; }
			if($abstractErr == true) {	echo "<p> Please enter the abstract form the paper, it can not contain any non-alphanumeric characters, apart from !, ?, . , and Space </p>"; }


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