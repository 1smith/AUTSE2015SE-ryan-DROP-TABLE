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
		$titleErr = false;
		$authorsErr = false;
		$journalErr = false;
		$yearErr = false;
		$levelErr = false;
		$rateErr = false;
		$methodologyErr = false;
		$praticeErr = false;
		$methodErr = false;
		$participantsErr = false;
		$raterErr = false;
		$reasonErr = false;
		$outcomeErr = false;
		$whenErr = false;
		$whereErr = false;
		$whyErr = false;
		$whoErr = false;
		$whatErr = false;
		$howErr = false;
		$resultErr = false;
		$integrityErr = false;
		$questionErr = false;
		$metricsErr = false;
		$contributorErr = false;

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			echo "<p> <b>You Have entered: </b>";
			if (!isset($_POST["title"]) && !empty($_POST["title"])) {
				$titleErr = true;
			}else {
				$title = $_POST["title"];
				echo "<br> {$title} </br>";
				if(!preg_match('/^[a-zA-Z0-9 !,?. ]+$/', $title)){
					$titleErr = true;
				}
			}
			if (!isset($_POST["authors"]) && !empty($_POST["authors"])) {
				$authorsErr = true;
			}else {
				$authors = $_POST["authors"];
				echo "<br> {$authors} </br>";
				if(!preg_match('/^[a-zA-Z0-9 !,?. ]+$/', $authors)){
					$authorsErr = true;
				}
			}
			if (!isset($_POST["journal"]) && !empty($_POST["journal"])) {
				$journalErr = true;
			}else {
				$journal = $_POST["journal"];
				echo "<br> {$journal} </br>";
				if(!preg_match('/^[a-zA-Z0-9 !,?. ]+$/', $journal)){
					$journalErr = true;
				}
			}
			if (!isset($_POST["level"]) && !empty($_POST["level"])) {
				$levelErr = true;
			}else {
				$level = $_POST["level"];
				echo "<br> {$level} </br>";
				if(!preg_match('/^[a-zA-Z0-9 !,?. ]+$/', $level)){
					$levelErr = true;
				}
			}
			if (!isset($_POST["rater"]) && !empty($_POST["rater"])) {
				$raterErr = true;
			}else {
				$rater = $_POST["rater"];
				echo "<br> {$rater} </br>";
				if(!preg_match('/^[a-zA-Z0-9 !,?. ]+$/', $rater)){
					$raterErr = true;
				}
			}
			if (!isset($_POST["reason"]) && !empty($_POST["reason"])) {
				$reasonErr = true;
			}else {
				$reason = $_POST["reason"];
				echo "<br> {$reason} </br>";
				if(!preg_match('/^[a-zA-Z0-9 !,?. ]+$/', $reason)){
					$reasonErr = true;
				}
			}
			if (!isset($_POST["outcome"]) && !empty($_POST["outcome"])) {
				$outcomeErr = true;
			}else {
				$outcome = $_POST["outcome"];
				echo "<br> {$outcome} </br>";
				if(!preg_match('/^[a-zA-Z0-9 !,?. ]+$/', $outcome)){
					$outcomeErr = true;
				}
			}
			if (!isset($_POST["when"]) && !empty($_POST["when"])) {
				$whenErr = true;
			}else {
				$when = $_POST["when"];
				echo "<br> {$when} </br>";
				if(!preg_match('/^[a-zA-Z0-9 !,?. ]+$/', $when)){
					$whenErr = true;
				}
			}
			if (!isset($_POST["where"]) && !empty($_POST["where"])) {
				$whereErr = true;
			}else {
				$where = $_POST["where"];
				echo "<br> {$where} </br>";
				if(!preg_match('/^[a-zA-Z0-9 !,?. ]+$/', $where)){
					$whereErr = true;
				}
			}
			if (!isset($_POST["why"]) && !empty($_POST["why"])) {
				$whyErr = true;
			}else {
				$why = $_POST["why"];
				echo "<br> {$why} </br>";
				if(!preg_match('/^[a-zA-Z0-9 !,?. ]+$/', $why)){
					$whyErr = true;
				}
			}
			if (!isset($_POST["who"]) && !empty($_POST["who"])) {
				$whoErr = true;
			}else {
				$who = $_POST["who"];
				echo "<br> {$who} </br>";
				if(!preg_match('/^[a-zA-Z0-9 !,?. ]+$/', $who)){
					$whoErr = true;
				}
			}
			if (!isset($_POST["what"]) && !empty($_POST["what"])) {
				$whatErr = true;
			}else {
				$what = $_POST["what"];
				echo "<br> {$what} </br>";
				if(!preg_match('/^[a-zA-Z0-9 !,?. ]+$/', $what)){
					$whatErr = true;
				}
			}
			if (!isset($_POST["how"]) && !empty($_POST["how"])) {
				$howErr = true;
			}else {
				$how = $_POST["how"];
				echo "<br> {$how} </br>";
				if(!preg_match('/^[a-zA-Z0-9 !,?. ]+$/', $how)){
					$howErr = true;
				}
			}
			if (!isset($_POST["result"]) && !empty($_POST["result"])) {
				$resultErr = true;
			}else {
				$result = $_POST["result"];
				echo "<br> {$result} </br>";
				if(!preg_match('/^[a-zA-Z0-9 !,?. ]+$/', $result)){
					$resultErr = true;
				}
			}
			if (!isset($_POST["integrity"]) && !empty($_POST["integrity"])) {
				$integrityErr = true;
			}else {
				$integrity = $_POST["integrity"];
				echo "<br> {$integrity} </br>";
				if(!preg_match('/^[a-zA-Z0-9 !,?. ]+$/', $integrity)){
					$integrityErr = true;
				}
			}
			if (!isset($_POST["question"]) && !empty($_POST["question"])) {
				$questionErr = true;
			}else {
				$question = $_POST["question"];
				echo "<br> {$question} </br>";
				if(!preg_match('/^[a-zA-Z0-9 !,?. ]+$/', $question)){
					$questionErr = true;
				}
			}
			if (!isset($_POST["metrics"]) && !empty($_POST["metrics"])) {
				$metricsErr = true;
			}else {
				$metrics = $_POST["metrics"];
				echo "<br> {$metrics} </br>";
				if(!preg_match('/^[a-zA-Z0-9 !,?. ]+$/', $metrics)){
					$metricsErr = true;
				}
			}
			if (!isset($_POST["contributor"]) && !empty($_POST["contributor"])) {
				$contributorErr = true;
			}else {
				$contributor = $_POST["contributor"];
				echo "<br> {$contributor} </br>";
				if(!preg_match('/^[a-zA-Z0-9 !,?. ]+$/', $contributor)){
					$contributorErr = true;
				}
			}
			if (!isset($_POST["year"]) && !empty($_POST["year"])) {
				$yearErr = true;
			}else {
				$year = $_POST["year"];
				echo "<br> {$year} </br>";
				if(!preg_match('/^[0-9]+$/', $year)){
					$yearErr = true;
				}
				if(strlen($year) > 4){
					$yearErr = true;
				}

			}
			if (!isset($_POST["rate"]) && !empty($_POST["rate"])) {
				$rateErr = true;
			}else {
				//Converting the permision type in booleans
				foreach($_POST['rate'] as $rate){
					echo "<br>", $rate, "</br>";
				}
			}
			if (!isset($_POST["methodology"]) && !empty($_POST["methodology"])) {
				$methodologyErr = true;
			}else {
				$methodology = $_POST["methodology"];
				echo "<br> {$methodology} </br>";
			}
			if (!isset($_POST["pratice"]) && !empty($_POST["pratice"])) {
				$praticeErr = true;
			}else {
				$pratice = $_POST["pratice"];
				echo "<br> {$pratice} </br>";
			}
			if (!isset($_POST["contributor"]) && !empty($_POST["contributor"])) {
				$contributorErr = true;
			}else {
				$contributor = $_POST["contributor"];
				echo "<br> {$contributor} </br>";
			}
			if (!isset($_POST["method"]) && !empty($_POST["method"])) {
				$methodErr = true;
			}else {
				$method = $_POST["method"];
				echo "<br> {$method} </br>";
			}
			if (!isset($_POST["participants"]) && !empty($_POST["participants"])) {
				$participantsErr = true;
			}else {
				$participants = $_POST["participants"];
				echo "<br> {$participants} </br>";
			}
			
		}
		echo "</p>";
		
		if($titleErr == false && $authorsErr == false && $journalErr == false && $yearErr == false && $levelErr == false && $raterErr == false && $rateErr == false && $reasonErr == false && $methodologyErr == false && 
		$praticeErr == false && $outcomeErr == false && $whenErr == false && $whereErr == false && $whyErr == false && $whoErr == false && $whatErr == false && $howErr == false && $resultErr == false && $integrityErr == false && 
		$questionErr == false && $participantsErr == false && $metricsErr == false && $methodErr == false && $contributorErr == false){
			echo "<p> <b>You have entered correctly! </b>";
					
			require_once('settings.php'); 
			$conn = @mysqli_connect($host, $user, $pswd)
			or die('Failed to connect to server');

			@mysqli_select_db($conn, $dbnm)
			or die('Database not available');

			$test = mysqli_query($conn, 'show tables like "serler"');
			$row = mysqli_fetch_assoc($test);
			
			if(isset($row)){
				echo "<p>Table Exists</p>";
			}
			else {
				echo "<p>Table Doesn't Exist</p>";
				$table = "CREATE TABLE IF NOT EXISTS serler (
						  id int(2) NOT NULL AUTO_INCREMENT,
						  title varchar(100) NOT NULL,
						  year year(4) NOT NULL,
						  date_added timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
						  authors varchar(100) NOT NULL,
						  contributor varchar(100) NOT NULL,
						  journal varchar(1000) NOT NULL,
						  level varchar(1000) NOT NULL,
						  rater varchar(1000) NOT NULL,
						  rate int(1) NOT NULL,
						  reason varchar(1000) NOT NULL,
						  methodology varchar(1000) NOT NULL,
						  practice varchar(1000) NOT NULL,
						  outcome varchar(1000) NOT NULL,
						  when varchar(1000) NOT NULL,
						  where varchar(1000) NOT NULL,
						  why varchar(1000) NOT NULL,
						  who varchar(1000) NOT NULL,
						  what varchar(1000) NOT NULL,
						  how varchar(1000) NOT NULL,
						  result varchar(10000) NOT NULL,
						  integrirty varchar(10000) NOT NULL,
						  question  varchar(10000) NOT NULL,
						  participants varchar(1000) NOT NULL,
						  metrics varchar(10000) NOT NULL,
						  method varchar(1000) NOT NULL,
						)";
				@mysqli_query($conn, $table)
				or die('Failed to connect to server');
			}
			
			$query = "INSERT INTO serler (title, year, authors, contributor, journal, level, rater, rate, reason, 
			methodology, practice, outcome, `when`, `where`, why, who, what, how, result, integrirty, question, participants, metrics, method)
			VALUES('{$title}', '{$year}', '{$authors}', '{$contributor}', '{$journal}', '{$level}', '{$rater}', '{$rate}', '{$reason}','{$methodology}', '{$pratice}',
			'{$outcome}', 
			'{$when}',
			'{$where}', 
			'{$why}', 
			'{$who}', 
			'{$what}',
			'{$how}',
			'{$result}', 
			'{$integrity}', 
			'{$question}', 
			'{$participants}',
			'{$metrics}', 
			'{$method}')";

			
			if (mysqli_query($conn, $query)) {
				echo "<p>New record created successfully</p>";
			}
			else {
				echo "<p>Insert Failed</p>";
				echo $query;
				echo "<br>";
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
			if($authorsErr == true) {	echo "<p> Please enter the Authors of the paper </p>"; }
			if($journalErr == true) {	echo "<p> Please enter the Journal the paper is entered in</p>"; }
			if($yearErr == true) {	echo "<p> Please enter year the paper was written</p>"; }
			if($level == true) {	echo "<p> Please enter year the Research Level of the paper</p>"; }


			if($raterErr == true) {	echo "<p> Please enter the rater of the paper </p>"; }
			if($rateErr == true) {	echo "<p> Please enter a Crediblity Rating</p>"; }
			if($reasonErr == true) {	echo "<p> Please enter the reason given for the rating </p>"; }

			if($methodologyErr == true) {	echo "<p> Please the methodology of the paper </p>"; }
			if($praticeErr == true) {	echo "<p> Please the pratice of the paper </p>"; }

			if($outcomeErr == true) {	echo "<p> Please the outcome of the paper </p>"; }
			if($whenErr == true) {	echo "<p> Please enter when of the study</p>"; }
			if($whereErr == true) {	echo "<p> Please enter where of the study</p>"; }
			if($whyErr == true) {	echo "<p> Please enter why of the study</p>"; }
			if($whoErr == true) {	echo "<p> Please enter who of the study</p>"; }
			if($whatErr == true) {	echo "<p> Please enter what of the study </p>"; }
			if($howErr == true) {	echo "<p> Please enter how of the study</p>"; }

			if($resultErr == true) {	echo "<p> Please enter the result of the paper </p>"; }
			if($integrityErr == true) {	echo "<p> Please enter the ingerity the paper </p>"; }

			if($questionErr == true) {	echo "<p> Please enter question posed by the paper </p>"; }
			if($participantsErr == true) {	echo "<p> Please enter type of participants in the study </p>"; }
			if($metricsErr == true) {	echo "<p> Please enter metrics of the study</p>"; }
			if($methodErr == true) {	echo "<p> Please enter methods used in the study</p>"; }

			if($contributorErr == true) {	echo "<p>You need to be logged in to add a paper</p>";	}

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