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

    $Name = trim($_POST['forumName']);
    $Description = trim($_POST['forumDescription']);
    $Date = date("m-d-Y");

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
      <p>Please Fill Both To Create Forum</p>
      <form method="post" action="#" class="createForum">
        <label for="forumName">Forum Name</label>
        <input type="text" name="forumName" id="forumName" required/>
        <label for="forumDescription">Description</label>
        <input type="text" name="forumDescription" id="forumDescription" required></textarea>
        <input type="submit" value="Create Forum" />
      </form>
    </div>
  </div>
</body>

</html>
