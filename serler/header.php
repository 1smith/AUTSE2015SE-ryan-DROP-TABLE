<!DOCTYPE html>

<html>
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
        <li><a href="contact.php">Contact Us</a></li>
		<li><a href="about.php">About SERL</a></li>
	</ul>

</body>

</html>