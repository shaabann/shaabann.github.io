<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  xml:lang="en" lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reddit 2.0</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
      include "navbar.php";
    	include_once('connect.php');

    	if( isset($_GET['ID']) )
    	{
        $query = "SELECT * FROM Reply WHERE ID=" . $_GET['ID'];
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
      }

    	if( isset($_POST['newBody']) )
    	{
    		$newBody = $_POST['newBody'];
    		$ID = $_POST['ID'];
    		$query = "UPDATE Reply SET Body='$newBody' WHERE ID=" . $ID;
        $result = mysqli_query($con, $query);
        
        $query = "SELECT Topic_ID FROM Post WHERE `ID`=(SELECT Post_ID FROM Reply WHERE ID=" . $_POST['ID'] . ") LIMIT 1";
        $result = mysqli_query($con, $query);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $topic = $row["Topic_ID"];
            }
        } else {
            echo "failed to find topic";
            exit;
        }
    		echo "<script> window.location='par.php?ID=".$topic."' </script>";
    	}
    ?>
    <h2>Edit Reply</h2>
    <div class="post-reply-container">
      <p class="reply-author"> <?php echo $row['Author'] ?></p>
      <span class="reply-date"><?php echo $row['Date'] ?> </span>
    <form action="edit.php" method="POST">
    <label for="newBody">Body</label>
    <textarea type="text" name="newBody"  rows="4" cols="50"> <?php echo $row['Body'] ?></textarea><br />
    <input type="hidden" name="ID" value="<?php echo $row['ID']; ?>"/>
    <input type="submit" value="Update"/>
    </form>
  </div>
  </body>
</html>
