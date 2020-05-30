<!DOCTYPE html>
<html>
  <head>
    <title>Create Forum</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="navbar">
      <a href="index.php">Home</a>
      <a href="forum.html">Enter Forum</a>
      <a href="login.html">Login<br/>Sign Up</a>
    </div>

    <div class="createTitle">
      <h2>Create A Forum</h2>
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
  if (isset($_POST['submit']))
    {


    if($_SERVER['REQUEST_METHOD'] = 'POST')
  {

    $Name = mysqli_real_escape_string($conn, $_POST['forumName']);
    $Description =mysqli_real_escape_string($conn, $_POST['forumDescription']);
    $Date = date("n-j-Y");

      $query = "INSERT INTO Forum(Name, Date_Created, Description)
      VALUES ('$Name', '$Date', '$Description')";
        if(mysqli_query($con, $query)){
			echo "Successfully Created a New Forum";
        } else{
			echo "ERROR: Could not  create the forum. " . mysqli_error($con);
		}
  }
    }
    mysqli_close($con);
  ?>
    <div class="wrapper">
      <div class="form">
        <form action="post" class="createForum">
          <label for="forumName">Forum Name</label>
          <input type="text" name="forumName" class="required" id="forumName" />
          <label for="forumDescription">Description</label>
          <input type="text" name="forumDescription" class="required" id="forumDescription"></textarea>
          <input type="submit" value="Create Forum"/>
        </form>
      </div>
    </div>
    </body>
  </html>
