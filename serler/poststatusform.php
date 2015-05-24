<!DOCTYPE html>
<?php
 session_start(); // start the session
 if (!isset ($_SESSION["login"])) { // check if session variable exists
 $_SESSION["login"] = ""; // create the session variable
 }
 $userlogin = $_SESSION["login"]; // copy the value to a variable
?>
<!-- REFACTORED 'pratice' into 'practice' -->
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Input your Paper </title>
<script src="paperTest.js"></script>
</head>

<body>
	<script type="text/javascript">
	    function toggle_visibility() 
	    {
	    	alert("Please Login");
	    	window.location = "login.php";
	    }
	</script>

	<?php require_once('header.php'); ?>

	<?php 
	require_once('settings.php'); 
	$conn = @mysqli_connect($host, $user, $pswd)
	or die('Failed to connect to server');

	@mysqli_select_db($conn, $dbnm)
	or die('Database not available');

	$result = mysqli_query($conn, 'show tables like "methodology"');
	$row = mysqli_fetch_assoc($result);
	
	if(isset($row)){
	}
	else {
		echo "<p>Table Doesn't Exist</p>";
		$table = "CREATE TABLE IF NOT EXISTS methodology (
				  id int(2) NOT NULL AUTO_INCREMENT,
				  method varchar(100) NOT NULL,
				  description varchar(1000) NOT NULL,
				  PRIMARY KEY (id)
				)";
		@mysqli_query($conn, $table)
		or die('Failed to connect to server');

		header("location:poststatusform.php");
	}
	$result = mysqli_query($conn, 'show tables like "practice"');
	$row = mysqli_fetch_assoc($result);
	
	if(isset($row)){
	}
	else {
		echo "<p>Table Doesn't Exist</p>";
		$table = "CREATE TABLE IF NOT EXISTS practice (
				  id int(2) NOT NULL AUTO_INCREMENT,
				  method varchar(100) NOT NULL,
				  description varchar(1000) NOT NULL,
				  PRIMARY KEY (id)
				)";
		@mysqli_query($conn, $table)
		or die('Failed to connect to server');

		header("location:poststatusform.php");
	}
	

	$result = mysqli_query($conn, 'show tables like "method"');
	$row = mysqli_fetch_assoc($result);
	
	if(isset($row)){
	}
	else {
		echo "<p>Table Doesn't Exist</p>";
		$table = "CREATE TABLE IF NOT EXISTS method (
				  id int(2) NOT NULL AUTO_INCREMENT,
				  method varchar(100) NOT NULL,
				  description varchar(1000) NOT NULL,
				  PRIMARY KEY (id)
				)";
		@mysqli_query($conn, $table)
		or die('Failed to connect to server');

		header("location:poststatusform.php");
	}

	$result = mysqli_query($conn, 'show tables like "participants"');
	$row = mysqli_fetch_assoc($result);
	
	if(isset($row)){
	}
	else {
		echo "<p>Table Doesn't Exist</p>";
		$table = "CREATE TABLE IF NOT EXISTS participants (
				  id int(2) NOT NULL AUTO_INCREMENT,
				  method varchar(100) NOT NULL,
				  description varchar(1000) NOT NULL,
				  PRIMARY KEY (id)
				)";
		@mysqli_query($conn, $table)
		or die('Failed to connect to server');

		header("location:poststatusform.php");
	}
	mysqli_close($conn);
	if($userlogin == null){
		echo '<script type="text/javascript">'
		   , 'toggle_visibility();'
		   , '</script>';
	}
	?>

	<div id=text>
	<form action = "poststatusprocess.php" method = "post">

	
	<br><h3>Information about the article</h3>
	<strong>Bibliographic Info - Standard APA format</strong>
	<br>Title: <input type="text" name="title">	  Authors: <input type="text" name="authors"> Journal: <input type="text" name="journal"> Year: <input type="text" name="year"></br>
	<br>Research Level: <input type="text" name="level"></br>
	<br><strong>Credibility rating of article</strong>
	<br>Who Rated it: <input type="text" name="rater">

	Rating: <label class="ckb">
	  <input type="checkbox" value="1" name="rate[]"/>	  <i></i>
	</label>
	<label class="ckb">
	  <input type="checkbox" value="2" name="rate[]"/>	  <i></i>
	</label>
	<label class="ckb">
	  <input type="checkbox" value="3" name="rate[]"/>	  <i></i>
	</label>
	<label class="ckb">
	  <input type="checkbox" value="4" name="rate[]"/>	  <i></i>
	</label>
	<label class="ckb">
	  <input type="checkbox" value="5" name="rate[]"/>	  <i></i>
	</label>
	Reason: <input type="text" name="reason">
	</br>

	<br>Methodology:
	<select name="methodology">
	<?php 
		$conn = @mysqli_connect($host, $user, $pswd)
		or die('Failed to connect to server');

		@mysqli_select_db($conn, $dbnm)
		or die('Database not available');
		
		$query = "SELECT * FROM methodology";
		$results = mysqli_query($conn, $query);

		while ($item = mysqli_fetch_assoc($results)) {
			echo "<option value=\"{$item['method']}\" title=\"{$item['description']}\">{$item['method']}</option>";
			echo $item;
		}
		mysqli_close($conn);
		echo " </select>";
		echo "  <a href=\"newmethod.php?type=Methodology\">Add a new Methodology</a>";		
		echo "</br>";
	?>

	<br>Pratice Investigated:
	<select name="practice">
	<?php 
		$conn = @mysqli_connect($host, $user, $pswd)
		or die('Failed to connect to server');

		@mysqli_select_db($conn, $dbnm)
		or die('Database not available');
		
		$query = "SELECT * FROM practice";
		$results = mysqli_query($conn, $query);

		while ($item = mysqli_fetch_assoc($results)) {
			echo "<option value=\"{$item['method']}\" title=\"{$item['description']}\">{$item['method']}</option>";
			echo $item;
		}
		mysqli_close($conn);
		echo " </select>";
		echo "  <a href=\"newmethod.php?type=Practice\">Add a new Pratice</a>";		
		echo "</br>";
	?>
	</br>

	<h3>Evidence Items</h3>
	Benefit/Outcome tested: <input type="text" name="outcome"><br>
	<br><strong>Context of the Study:</strong>
	<br>When: <input type="text" name="when"> Where: <input type="text" name="where"> Why: <input type="text" name="why">  <br>
	 Who: <input type="text" name="who"> What: <input type="text" name="what"> How: <input type="text" name="how"></br>
	<br>
	Study Result:  <textarea name="result" style="height:100px; width:100%";></textarea> <br>
	Method/Practice implementation integrity:  <textarea name="integrity" style="height:100px; width:100%";></textarea> <br>
	Confidence Rating:  
	</br>

	<h3>Research Design</h3>
	Question:  <textarea name="question" style="height:100px; width:100%";></textarea> <br>
	Nature of Participants:  
	<select name="participants">
	<?php 
		$conn = @mysqli_connect($host, $user, $pswd)
		or die('Failed to connect to server');

		@mysqli_select_db($conn, $dbnm)
		or die('Database not available');
		
		$query = "SELECT * FROM participants";
		$results = mysqli_query($conn, $query);

		while ($item = mysqli_fetch_assoc($results)) {
			echo "<option value=\"{$item['method']}\" title=\"{$item['description']}\">{$item['method']}</option>";
			echo $item;
		}
		mysqli_close($conn);
		echo " </select>";
		echo "  <a href=\"newmethod.php?type=Participants\">Add a new Nature of Participants</a>";		
		echo "</br>";
	?>
	<br>


	Metrics used:  <textarea name="metrics" style="height:100px; width:100%";></textarea> <br>
	Method: 
	<select name="method">
	<?php 
		$conn = @mysqli_connect($host, $user, $pswd)
		or die('Failed to connect to server');

		@mysqli_select_db($conn, $dbnm)
		or die('Database not available');
		
		$query = "SELECT * FROM method";
		$results = mysqli_query($conn, $query);

		while ($item = mysqli_fetch_assoc($results)) {
			echo "<option value=\"{$item['method']}\" title=\"{$item['description']}\">{$item['method']}</option>";
			echo $item;
		}
		mysqli_close($conn);
		echo " </select>";
		echo "  <a href=\"newmethod.php?type=Method\">Add a new Research Method</a>";		
		echo "</br>";
	?>
	<br>



	<input type="hidden" name="contributor" <?php echo "value= \"{$userlogin}\"";?>>

	<input type="submit">
	<input type="reset">
	</form>
	</div>
</body>
</html> 