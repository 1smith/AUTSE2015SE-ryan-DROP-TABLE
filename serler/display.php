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
			$title = $row["title"];
			$authors = $row["authors"];
			$journal = $row["journal"];
			$level = $row["level"];
			$rater = $row["rater"];
			$rate = $row["rate"];
			$reason = $row["reason"];
			$outcome = $row["outcome"];
			$when = $row["when"];
			$where = $row["where"];
			$why = $row["why"];
			$who = $row["who"];
			$what = $row["what"];
			$how = $row["how"];
			$result = $row["result"];
			$integrity = $row["integrirty"];
			$question = $row["question"];
			$metrics = $row["metrics"];
			$contributor = $row["contributor"];
			$year = $row["year"];
			$methodology = $row["methodology"];
			$pratice = $row["practice"];
			$contributor = $row["contributor"];
			$method = $row["method"];
			$participants = $row["participants"];
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
	<?php require_once('header.php'); ?>
	
	<div id=text>
	<?php
	echo "<h2>{$title}</h2>";
	echo $date;
	echo "- {$contributor}";
	echo "<br><strong>Author(s): </strong>{$authors}
		<br><strong>Journal: </strong>{$journal}
		<br><strong>Year: </strong>{$year}
		<br><strong>Research Level: </strong>{$level}";

	echo "<br>";
	echo "<h3>Credibility </h3>";

	for($i = $rate;  $i > 0; $i--){
		echo "<img src=\"star.png\" height=\"15\"  width=\"15\" >";
	}
	for($j = 5 - $rate; $j > 0; $j--){
		echo "<img src=\"unstar.png\"  height=\"15\"  width=\"15\" >";
	}
	echo "  -  By: {$rater} <br> <strong>Reason: </strong>{$reason}";

	echo "<br><strong>Methodology: </strong>{$methodology}
		<br><strong>Practice Investigated: </strong>{$pratice}
	";

	echo "<br>";
	echo "<h3>Evidence Item </h3>";
	echo "<strong>Benefit/Outcome tested: </strong>{$outcome}
		<br><br><strong>Context of the Study</strong>
		<br><strong>When: </strong>{$when}   <strong>Where: </strong>{$where} 		<strong>Why: </strong>{$why}   
		<strong>Who: </strong>{$who}    <strong>What: </strong>{$what}    <strong>How: </strong>{$how}
		<br><br><strong>Study Result: </strong><br>{$result}
		<br><br><strong>Method/Practice implementation integrity: </strong><br>{$integrity}
	";

	echo "<br>";
	echo "<h3>Research Design </h3>";
	echo "<strong>Question: </strong><br>{$question}
			<br><strong>Nature of Participants: </strong> {$participants}
		<br><br><strong>Metrics used: </strong><br>{$metrics}
				<br><strong>Method: </strong> {$method}

	";

	echo "<br>";
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