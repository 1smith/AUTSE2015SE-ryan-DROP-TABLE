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
  <title>Input a new</title>
</head>

<body>
  <?php require_once('header.php'); 
    if(isset($_GET["type"])){
      $type = $_GET["type"];
      if($type == "Methodology" || $type == "Practice" || $type == "Method" || $type == "Participants" ) {

      }
      else {
              header("location:javascript://history.go(-1)");

      }
    }
    else{
            header("location:javascript://history.go(-1)");

    }
    if(isset($_GET["input"])){
        $input = $_GET["input"];
    }
    if(isset($_GET["description"])){
        $description = $_GET["description"];
    }
  ?>
  <div id=text>
  <h2>Insert a new <?php 
    if($type == "Methodology"){
      echo "Methodology Used";
    }
    if($type == "Practice"){
      echo "Practice Being Investigated";
    }
    if($type == "Method"){
      echo "Research Method";
    }
    if($type == "Participants"){
      echo "Nature of Participants";
    }
    ?>
  </h2>

  <form action = "newmethod.php" method = "get">
    <input type="hidden" name="type" value="<?php echo $type;?>"> 
    Tile: <input type="text" value="<?php  if(isset($input)) { echo $input;}?>" name="input">
    <br> Description:  <textarea name="description" style="height:200px; width:100%";><?php  if(isset($description)) { echo $description;}?></textarea>
    <br> <input type="submit">
  </form>


  <?php 
  require_once('settings.php'); 
  $conn = @mysqli_connect($host, $user, $pswd)
  or die('Failed to connect to server');

  @mysqli_select_db($conn, $dbnm)
  or die('Database not available');

  if(isset($input) && isset($description) && isset($type)) {
    $query = "INSERT INTO";
    if($type == "Methodology"){
      $query .= " methodology";
    }
    if($type == "Practice"){
      $query .= " pratice";
    }
    if($type == "Method"){
      $query .= " method";
    }
    if($type == "Participants"){
      $query .= " participants";
    }
    $query .= "(method, description) VALUES('{$input}', '{$description}')";
    if (mysqli_query($conn, $query)) {
      echo "<p>New record created successfully</p>";
    }
    else {
      echo "<p>Insert Failed</p>";
      echo $query;
      echo "<br>Go back to correct your Input";
      echo '<p><button onclick="goBack()">
          Go Back
          </button></p>';
      echo "</p>";
    }
  }

  echo "<h3>Current {$type}'s in the database</h3>";

  $query = "SELECT * FROM";
  if($type == "Methodology"){
    $query .= " methodology";
  }
  if($type == "Practice"){
    $query .= " pratice";
  }
  if($type == "Method"){
    $query .= " method";
  }
  if($type == "Participants"){
    $query .= " participants";
  }
  $query .= " ORDER BY id ASC";
  $result = mysqli_query($conn, $query);
  echo "<br>";
  while($row = mysqli_fetch_assoc($result)) {
      echo "<strong>{$row['method']}</strong>";
      echo "<br>{$row['description']}<br>";
      echo "<br>";
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