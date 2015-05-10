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
	<title>About Assignment</title>

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
	<li><a href="searchstatusform.php">Search for a Paper</a></li>
	<li><a href="about.php">About SERL</a></li>
	</ul>
	
	<div id=text>

	<h2>About SERL</h2>
	<p>

	<p>
	 The Software Engineering Research Lab (SERL) at AUT University undertakes world-class research directed
	  at understanding and improving the practice of software professionals in their creation and preservation 
	  of software systems. We are interested in all models of software provision – bespoke development, package
	   and component customisation, free/libre open source software (FLOSS) development, and delivery of software
	    as a service (SaaS). The research we carry out may relate to just one or all of these models.
	</p>
	
	<h2>About SERLER</h2>
	<p>
		SERL wishes to host a repository for capturing evidence relating to software development methods and will populate the repository with evidence relating to a selection of methods. Access to the repository will be via web service interface. 

The larger aim for creating such a repository is to build a body of evidence that will support researchers and practitioners in decision-making during software projects. 
The repository system, i.e. data store plus access mechanisms, will be named SERLER. 

The application to be developed is a structured repository of data on empirical studies of software engineering practices.
	</p>

	</div>
</body>
</html> 