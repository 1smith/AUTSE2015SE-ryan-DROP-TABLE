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
<title>Here is your search result </title>
</head>

<body>
	<?php require_once('header.php'); ?>
	
	<?php 
	if (isset ($_GET["input"])){		$toSearch = $_GET["input"];	}
	if(isset($_GET["order"])){		$order = $_GET["order"];	}
	if(isset($_GET["orderby"])){		$orderby = $_GET["orderby"];	}
	if(isset($_GET["methodology"])){		$methodology = $_GET["methodology"];	}
	if(isset($_GET["date_added"])){		$date_added = $_GET["date_added"];	}

	if(isset($_GET["contributor"])){		$contributor = $_GET["contributor"];	}
	if(isset($_GET["journal"])){		$journal = $_GET["journal"];	}

	if(isset($_GET["level"])){		$level = $_GET["level"];	}
	if(isset($_GET["rater"])){		$rater = $_GET["rater"];	}
	if(isset($_GET["rate"])){		$rate = $_GET["rate"];	}
	if(isset($_GET["reason"])){		$reason = $_GET["reason"];	}
	if(isset($_GET["practice"])){		$practice = $_GET["practice"];	}

	if(isset($_GET["outcome"])){		$outcome = $_GET["outcome"];	}
	if(isset($_GET["when"])){		$when = $_GET["when"];	}
	if(isset($_GET["where"])){		$where = $_GET["where"];	}
	if(isset($_GET["why"])){		$why = $_GET["why"];	}
	if(isset($_GET["who"])){		$who = $_GET["who"];	}

	if(isset($_GET["what"])){		$what = $_GET["what"];	}
	if(isset($_GET["how"])){		$how = $_GET["how"];	}
	if(isset($_GET["result"])){		$result = $_GET["result"];	}
	if(isset($_GET["integrity"])){		$integrity = $_GET["integrity"];	}
	if(isset($_GET["question"])){		$question = $_GET["question"];	}

	if(isset($_GET["participants"])){		$participants = $_GET["participants"];	}
	if(isset($_GET["metrics"])){		$metrics = $_GET["metrics"];	}
	if(isset($_GET["method"])){		$method = $_GET["method"];	}
	if(isset($_GET["rating"])){		$rating = $_GET["rating"];	}
	if(isset($_GET["numberofratings"])){		$numberofratings = $_GET["numberofratings"];	}
	 ?>

	<div id=text>
	<?php 
	require_once('settings.php'); 
	$conn = @mysqli_connect($host, $user, $pswd)
	or die('Failed to connect to server');

	@mysqli_select_db($conn, $dbnm)
	or die('Database not available');
	

	$test = mysqli_query($conn, 'show tables like "query"');
	$row = mysqli_fetch_assoc($test);
	
	if(isset($row)){
	}
	else {
		echo "<p>Table Doesn't Exist</p>";
		$table = "CREATE TABLE IF NOT EXISTS query (id int(2) NOT NULL AUTO_INCREMENT,
			query varchar(1000) NOT NULL,  user_name varchar(100) NOT NULL,  PRIMARY KEY (id),
			KEY user_name (user_name)) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;)";
		@mysqli_query($conn, $table)
		or die('Failed to connect to server');
		$query = "ALTER TABLE query ADD CONSTRAINT query_ibfk_1 FOREIGN KEY (user_name) REFERENCES users (user_name);";
		@mysqli_query($conn, $query);
	}
	mysqli_free_result($test);
	mysqli_close($conn);
	?>
	
	<h2>Search Results</h2>

		<form action = "searchstatusprocess.php" method = "get">
			<input type="text" value="<?php echo $toSearch; ?>" name="input"> 
		Order: 
		<select name="orderby">
			<option <?php if (isset($orderby) &&$orderby == 0 ) echo 'selected'; ?> value="0">---</option>
		  <option <?php if (isset($orderby) &&$orderby == 1 ) echo 'selected'; ?> value="1">Date Written</option>
	 	 <option <?php if (isset($orderby) &&$orderby == 2 ) echo 'selected'; ?> value="2">Rating</option>
	 	 	 	 </select>

		<input type="radio" name="order"
		<?php if (isset($order) && $order=="ascending") echo "checked";?>	value="ascending" >Ascending
		
		<input type="radio" name="order"
		<?php if (isset($order) && $order=="descending") echo "checked";?>	value="descending">Descending
		<br><br><Strong>Show: </Strong>
		<input type="checkbox" <?php if (isset($methodology) && $methodology=="1") echo "checked";?> value="1" name="methodology"/>Methodology
		<input type="checkbox" <?php if (isset($date_added) && $date_added=="1") echo "checked";?> value="1" name="date_added"/>Date Added

		<input type="checkbox" <?php if (isset($contributor) && $contributor=="1") echo "checked";?> value="1" name="contributor"/>Contributor
		<input type="checkbox" <?php if (isset($journal) && $journal=="1") echo "checked";?> value="1" name="journal"/>Journal

		<input type="checkbox" <?php if (isset($level) && $level=="1") echo "checked";?> value="1" name="level"/>Level
		<input type="checkbox" <?php if (isset($rater) && $rater=="1") echo "checked";?> value="1" name="rater"/>Rater
		<input type="checkbox" <?php if (isset($rate) && $rate=="1") echo "checked";?> value="1" name="rate"/>Rate
		<input type="checkbox" <?php if (isset($reason) && $reason=="1") echo "checked";?> value="1" name="reason"/>Reason
		<input type="checkbox" <?php if (isset($practice) && $practice=="1") echo "checked";?> value="1" name="practice"/>Practice

		<input type="checkbox" <?php if (isset($outcome) && $outcome=="1") echo "checked";?> value="1" name="outcome"/>Outcome
		<input type="checkbox" <?php if (isset($when) && $when=="1") echo "checked";?> value="1" name="when"/>When
		<input type="checkbox" <?php if (isset($where) && $where=="1") echo "checked";?> value="1" name="where"/>Where
		<input type="checkbox" <?php if (isset($why) && $why=="1") echo "checked";?> value="1" name="why"/>Why
		<input type="checkbox" <?php if (isset($who) && $who=="1") echo "checked";?> value="1" name="who"/>Who

		<input type="checkbox" <?php if (isset($what) && $what=="1") echo "checked";?> value="1" name="what"/>What
		<input type="checkbox" <?php if (isset($how) && $how=="1") echo "checked";?> value="1" name="how"/>How
		<input type="checkbox" <?php if (isset($result) && $result=="1") echo "checked";?> value="1" name="result"/>Result
		<input type="checkbox" <?php if (isset($integrity) && $integrity=="1") echo "checked";?> value="1" name="integrity"/>Integrity
		<input type="checkbox" <?php if (isset($question) && $question=="1") echo "checked";?> value="1" name="question"/>Question

		<input type="checkbox" <?php if (isset($participants) && $participants=="1") echo "checked";?> value="1" name="participants"/>Participants
		<input type="checkbox" <?php if (isset($metrics) && $metrics=="1") echo "checked";?> value="1" name="metrics"/>Metrics
		<input type="checkbox" <?php if (isset($method) && $method=="1") echo "checked";?> value="1" name="method"/>Method
		<input type="checkbox" <?php if (isset($rating) && $rating=="1") echo "checked";?> value="1" name="rating"/>User Rating
		<input type="checkbox" <?php if (isset($numberofratings) && $numberofratings=="1") echo "checked";?> value="1" name="numberofratings"/>Number of User who Rated it

		<br><br>
		<input type="submit">
		</form>

	<?php
	if (isset ($toSearch)){
		require_once('settings.php'); 
		$conn = @mysqli_connect($host, $user, $pswd)
		or die('Failed to connect to server');

		@mysqli_select_db($conn, $dbnm)
		or die('Database not available');

		$query = "SELECT id, title, authors, rate, journal, year";

		if(isset($methodology) && $methodology == 1){			$query .= ", methodology";		}
		if(isset($date_added) && $date_added == 1){			$query .= ", date_added";		}

		if(isset($contributor) && $contributor == 1){			$query .= ", contributor";		}
		if(isset($journal) && $journal == 1){			$query .= ", journal";		}

		if(isset($level) && $level == 1){			$query .= ", level";		}
		if(isset($rater) && $rater == 1){			$query .= ", rater";		}
		if(isset($rate) && $rate == 1){			$query .= ", rate";		}
		if(isset($reason) && $reason == 1){			$query .= ", reason";		}
		if(isset($practice) && $practice == 1){			$query .= ", practice";		}

		if(isset($outcome) && $outcome == 1){			$query .= ", outcome";		}
		if(isset($when) && $when == 1){			$query .= ", `when`";		}
		if(isset($where) && $where == 1){			$query .= ", `where`";		}
		if(isset($why) && $why == 1){			$query .= ", why";		}
		if(isset($who) && $who == 1){			$query .= ", who";		}

		if(isset($what) && $what == 1){			$query .= ", what";		}
		if(isset($how) && $how == 1){			$query .= ", how";		}
		if(isset($result) && $result == 1){			$query .= ", result";		}
		if(isset($integrity) && $integrity == 1){			$query .= ", integrity";		}
		if(isset($question) && $question == 1){			$query .= ", question";		}

		if(isset($participants) && $participants == 1){			$query .= ", participants";		}
		if(isset($metrics) && $metrics == 1){			$query .= ", metrics";		}
		if(isset($method) && $method == 1){			$query .= ", method";		}
		if(isset($rating) && $rating == 1){			$query .= ", rating";		}
		if(isset($numberofratings) && $numberofratings == 1){			$query .= ", numberofratings";		}

		$query .= " FROM serler WHERE result like '%{$toSearch}%' OR authors like '%{$toSearch}%' OR title like '%{$toSearch}%' OR outcome like '%{$toSearch}%' OR methodology like '%{$toSearch}%'";

		if(isset($order) && isset($orderby) && $orderby != 0) {
			if($orderby == 1){
				$query .= " ORDER BY year";
			}
			if($orderby == 2){
				$query .= " ORDER BY rate";
			}
			if($order == "ascending"){
				$query .= " ASC";
			}
			if($order == "descending"){
				$query .= " DESC";
			}
		}

		$results = mysqli_query($conn, $query);
		echo "<br><hr>";
		//"name of source journal of article"
		if($results != null) {
		while($row = mysqli_fetch_assoc($results)) {
			echo "<a href=\"display.php?id={$row['id']}\">{$row['title']}</a><br> By {$row['authors']}<br>From:{$row['journal']}<br> Year:{$row['year']}, <br>Credability Rating: {$row['rate']} Stars<br>";
			if(isset($methodology) && $methodology == 1){				echo "Methodology: {$row['methodology']}<br>";			}
			if(isset($date_added) && $date_added == 1){				echo "Date Added: {$row['date_added']}<br>";			}

			if(isset($contributor) && $contributor == 1){				echo "Contributor: {$row['contributor']}<br>";			}
			if(isset($journal) && $journal == 1){				echo "Journal: {$row['journal']}<br>";			}

			if(isset($level) && $level == 1){				echo "Level: {$row['level']}<br>";			}
			if(isset($rater) && $rater == 1){				echo "Rater: {$row['rater']}<br>";			}
			if(isset($rate) && $rate == 1){				echo "Rate: {$row['rate']}<br>";			}
			if(isset($reason) && $reason == 1){				echo "Reason: {$row['reason']}<br>";			}
			if(isset($practice) && $practice == 1){				echo "Practice: {$row['practice']}<br>";			}

			if(isset($outcome) && $outcome == 1){				echo "Outcome: {$row['outcome']}<br>";			}
			if(isset($when) && $when == 1){				echo "When: {$row['when']}<br>";			}
			if(isset($where) && $where == 1){				echo "Where: {$row['where']}<br>";			}
			if(isset($why) && $why == 1){				echo "Why: {$row['why']}<br>";			}
			if(isset($who) && $who == 1){				echo "Who: {$row['who']}<br>";			}

			if(isset($what) && $what == 1){				echo "What: {$row['what']}<br>";			}
			if(isset($how) && $how == 1){				echo "How: {$row['how']}<br>";			}
			if(isset($result) && $result == 1){				echo "Result: {$row['result']}<br>";			}
			if(isset($integrity) && $integrity == 1){				echo "Integrity: {$row['integrity']}<br>";			}
			if(isset($question) && $question == 1){				echo "Question: {$row['question']}<br>";			}

			if(isset($participants) && $participants == 1){				echo "Participants: {$row['participants']}<br>";			}
			if(isset($metrics) && $metrics == 1){				echo "Metrics: {$row['metrics']}<br>";			}
			if(isset($method) && $method == 1){				echo "Method: {$row['method']}<br>";			}
			if(isset($rating) && $rating == 1){				echo "User's Rating: {$row['rating']}<br>";			}
			if(isset($numberofratings) && $numberofratings == 1){				echo "Number of User's who Rated: {$row['numberofratings']}<br>";			}


			echo "<br>";
		}

		mysqli_free_result($results);
		}
		mysqli_close($conn);
	}
	?>
	
	<form action = "saveQuery.php" method = "post">
		<input type="hidden" value=<?php 
		if (isset ($_GET["input"])){			echo "input=" . $_GET["input"];		}
		if (isset ($_GET["orderby"])){			echo "&orderby=" . $_GET["orderby"];		}
		if (isset ($_GET["order"])){			echo "&order=" . $_GET["order"];		}
		if (isset ($_GET["methodology"])){			echo "&methodology=" . $_GET["methodology"];		}
		if (isset ($_GET["date_added"])){			echo "&date_added=" . $_GET["date_added"];		}

		if (isset ($_GET["contributor"])){			echo "&contributor=" . $_GET["contributor"];		}
		if (isset ($_GET["journal"])){			echo "&journal=" . $_GET["journal"];		}

		if (isset ($_GET["level"])){			echo "&level=" . $_GET["level"];		}
		if (isset ($_GET["rater"])){			echo "&rater=" . $_GET["rater"];		}
		if (isset ($_GET["rate"])){			echo "&rate=" . $_GET["rate"];		}
		if (isset ($_GET["reason"])){			echo "&reason=" . $_GET["reason"];		}
		if (isset ($_GET["practice"])){			echo "&practice=" . $_GET["practice"];		}

		if (isset ($_GET["outcome"])){			echo "&outcome=" . $_GET["outcome"];		}
		if (isset ($_GET["when"])){			echo "&when=" . $_GET["when"];		}
		if (isset ($_GET["where"])){			echo "&where=" . $_GET["where"];		}
		if (isset ($_GET["why"])){			echo "&why=" . $_GET["why"];		}
		if (isset ($_GET["who"])){			echo "&who=" . $_GET["who"];		}

		if (isset ($_GET["what"])){			echo "&what=" . $_GET["what"];		}
		if (isset ($_GET["how"])){			echo "&how=" . $_GET["how"];		}
		if (isset ($_GET["result"])){			echo "&result=" . $_GET["result"];		}
		if (isset ($_GET["integrity"])){			echo "&integrity=" . $_GET["integrity"];		}
		if (isset ($_GET["question"])){			echo "&question=" . $_GET["question"];		}

		if (isset ($_GET["participants"])){			echo "&participants=" . $_GET["participants"];		}
		if (isset ($_GET["metrics"])){			echo "&metrics=" . $_GET["metrics"];		}
		if (isset ($_GET["method"])){			echo "&method=" . $_GET["method"];		}
		if (isset ($_GET["rating"])){			echo "&rating=" . $_GET["rating"];		}
		if (isset ($_GET["numberofratings"])){			echo "&numberofratings=" . $_GET["numberofratings"];		}


		?> name="query">
		<input type="submit" value="Save This Query">
	</form>	
	</div>
</body>
</html> 