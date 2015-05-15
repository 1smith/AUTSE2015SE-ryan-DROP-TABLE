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
	<h2>Search Results</h2>

		<form action = "searchstatusprocess.php" method = "get">
			<input type="text" value="<?php echo $toSearch; ?>" name="input"> 
		Order: 
		<select name="orderby">
			<option <?php if (isset($orderby) &&$orderby == 0 ) echo 'selected'; ?> value="0">---</option>
		  <option <?php if (isset($orderby) &&$orderby == 1 ) echo 'selected'; ?> value="1">Date Written</option>
	 	 <option <?php if (isset($orderby) &&$orderby == 2 ) echo 'selected'; ?> value="2">Quality</option>
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

		$query = "SELECT id, title, quality, year FROM serler WHERE tags like '%{$toSearch}%' OR abstract like '%{$toSearch}%'";

		if(isset($order) && isset($orderby) && $orderby != 0) {
			if($orderby == 1){
				$query .= " ORDER BY year";
			}
			if($orderby == 2){
				$query .= " ORDER BY quality";
			}
			if($order == "ascending"){
				$query .= " ASC";
			}
			if($order == "descending"){
				$query .= " DESC";
			}
		}

		$results = mysqli_query($conn, $query);

		while($row = mysqli_fetch_assoc($results)) {
			echo "<br><a href=\"display.php?id={$row['id']}\">{$row['title']}</a>, Year = {$row['year']}, {$row['quality']} Stars</br>";
		}

		mysqli_free_result($results);
		mysqli_close($conn);
	}
	?>
	<br></br>
	<br><a href="searchstatusform.php">Search for another status</a></br>
	</div>
</body>
</html> 