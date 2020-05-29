<!DOCTYPE html>
<html>
  <head>
    <title>Reddit 2.0</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="navbar">
      <a class= "active" href="index.php">Home</a>
      <a href="forum.html">Enter Forum</a>
      <a href="login.html">Login<br/>Sign Up</a>
    </div>

    <div class="welcome">
      <h3>Welcome to Reddit 2.0!<h3>
    </div>

    <div class="forum-title">
      <h2 class="title-name">Forums</h2>
      <input type='submit' class="createForum" value='Create Forum' />
    </div>

<?php
 //connect to database
	include "connectvar.php";

  /* Attempt to connect to MySQL database */
  $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  // Check connection
  if($con === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

  //get data from forum table
	$query = "SELECT * FROM Forum";
	$result = mysqli_query($con, $query);
  $rowCount = mysqli_num_rows($result);


  //display contents of forum
  if($rowCount > 0){
    echo '<div class="forum-display">';
  		while($row = mysqli_fetch_array($result)){
        echo   '<div class="forum-contents">';
        echo     '<div class="forum-desc">';
        echo      '<span><a href="forum.php?ID">'. $row['Name'].'</span>';
        echo      '<span>'. $row['Description'].'</span>';
        echo    '</div>';
        echo    '<div class="forum-date">';
        echo      '<span>'. $row['Date_Created'].'</span>';
        echo    '</div>';
        echo   '</div>';
      }
      echo  '</div>';
  }else{
      echo 'Not available';
  }
      mysqli_close($con);
?>

</body>
</html>
