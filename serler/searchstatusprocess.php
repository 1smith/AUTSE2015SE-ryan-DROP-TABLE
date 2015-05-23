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
	if (isset ($_GET["input"])){
		$toSearch = $_GET["input"];
	}
	if(isset($_GET["order"])){
		$order = $_GET["order"];
	}
	if(isset($_GET["orderby"])){
		$orderby = $_GET["orderby"];
	}

	 ?>

	<div id=text>
	<?php 
	require_once('settings.php'); 
	$conn = @mysqli_connect($host, $user, $pswd)
	or die('Failed to connect to server');

	@mysqli_select_db($conn, $dbnm)
	or die('Database not available');
	

	$result = mysqli_query($conn, 'show tables like "users"');
	$row = mysqli_fetch_assoc($result);
	
	if(isset($row)){
	}
	else {
		echo "<p>Table Doesn't Exist</p>";
		$table = "CREATE TABLE IF NOT EXISTS users query (id int(2) NOT NULL AUTO_INCREMENT,
			query varchar(1000) NOT NULL,  user_name varchar(100) NOT NULL,  PRIMARY KEY (id),
			KEY user_name (user_name)) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;)";
		@mysqli_query($conn, $table)
		or die('Failed to connect to server');
		$query = "ALTER TABLE query ADD CONSTRAINT query_ibfk_1 FOREIGN KEY (user_name) REFERENCES users (user_name);";
		@mysqli_query($conn, $query);
	}
	mysqli_free_result($result);
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
		<input type="submit">
		</form>

	<?php
	if (isset ($toSearch)){
		require_once('settings.php'); 
		$conn = @mysqli_connect($host, $user, $pswd)
		or die('Failed to connect to server');

		@mysqli_select_db($conn, $dbnm)
		or die('Database not available');

		$query = "SELECT id, title, rate, year FROM serler WHERE result like '%{$toSearch}%' OR authors like '%{$toSearch}%' OR title like '%{$toSearch}%' OR outcome like '%{$toSearch}%' OR methodology like '%{$toSearch}%'";

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

		if($results != null) {
		while($row = mysqli_fetch_assoc($results)) {
			echo "<br><a href=\"display.php?id={$row['id']}\">{$row['title']}</a>, Year = {$row['year']}, {$row['rate']} Stars</br>";
		}

		mysqli_free_result($results);
		}
		mysqli_close($conn);
	}
	?>
	<br></br>
	<br><a href="searchstatusform.php">Search for another status</a></br>

	<form action = "saveQuery.php" method = "post">
		<input type="hidden" value=<?php 
		if (isset ($_GET["input"])){
			echo "input=" . $_GET["input"];
		}
		if (isset ($_GET["orderby"])){
			echo "&orderby=" . $_GET["orderby"];
		}
		if (isset ($_GET["order"])){
			echo "&order=" . $_GET["order"];
		}
		?> name="query">
		<input type="submit" value="Save This Query">
	</form>	
	</div>
</body>
</html> 