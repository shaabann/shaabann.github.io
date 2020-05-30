<!DOCTYPE html>
<html>
  <head>
    <title>Reddit 2.0</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php include "navbar.php" ?>
    <div class="welcome">
      <h3>Welcome to Reddit 2.0!<h3>
    </div>

    <div class="forum-title">
      <h2 class="title-name">Forums</h2>
      <a class="create" href="createForum.php">Create Forum</a>
    </div>

<?php
 //connect to database
 require_once "connect.php";

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
        echo      '<span><a href="forum.php?ID='.$row['ID'].'">'. $row['Name'].'</a></span>';
        echo      '<span>'. $row['Description'].'</span>';
        echo    '</div>';
        echo    '<div class="forum-date">';
        echo      '<span>'. date('n-j-Y', strtotime($row['Date_Created'])).'</span>';
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
