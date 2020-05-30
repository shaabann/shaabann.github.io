<!DOCTYPE html>
<html>

<head>
  <title>Create Forum</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php include "navbar.php"; ?>
  <?php
  //connect to database
  require_once "connect.php";

  if (isset($_POST['forumName'])) {

    $Name = $_POST['forumName'];
    $Description = $_POST['forumDescription'];
    $Date = date("n-j-Y");

    $query = "INSERT INTO Forum(Name, Date_Created, Description)
    VALUES ('$Name', '$Date', '$Description')";
    if (mysqli_query($con, $query)) {
      echo "Successfully Created a New Forum";
    } else {
      echo "ERROR: Could not  create the forum. " . mysqli_error($con);
    }
    echo '<script> window.location="forum.php?ID='.$con->insert_id.'" </script>';
  }
  ?>

  <div class="createTitle">
    <h2>Create A Forum</h2>
  </div>

  <div class="wrapper">
    <div class="form">
      <form method="post" action="#" class="createForum">
        <label for="forumName">Forum Name</label>
        <input type="text" name="forumName" class="required" id="forumName" />
        <label for="forumDescription">Description</label>
        <input type="text" name="forumDescription" class="required" id="forumDescription"></textarea>
        <input type="submit" value="Create Forum" />
      </form>
    </div>
  </div>
</body>

</html>