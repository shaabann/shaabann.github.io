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

      $topicID = null;

    	if( isset($_GET['ID']) )
    	{
        $query = "SELECT * FROM Post WHERE ID=" . $_GET['ID'];
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $topicID = $row['Topic_ID'];
      }

    	if( isset($_POST['newBody']) )
    	{
    		$newBody = $_POST['newBody'];
    		$ID = $_POST['ID'];
    		$query = "UPDATE Post SET Body='$newBody' WHERE ID=" . $ID;
    		$result = mysqli_query($con, $query);

    		echo "<script> window.location='index.php' </script>";
    	}
    ?>
    <h2>Edit Post</h2>
        <div class="post">
          <div class="post-contents">
             <div class="post-container">
                 <div class="post-title">
                     <span class="post-title"> <?php echo $row['Title'] ?></span>
                  </div>
                  <span class="post-date"><?php echo $row['Date'] ?></span>
                  <form action="editPost.php" method="POST">
                    <label for="newBody">Body</label>
                    <textarea type="text" name="newBody"  rows="4" cols="50"> <?php echo $row['Body'] ?></textarea><br />
                    <input type="hidden" name="ID" value="<?php echo $row['ID']; ?>"/>
                    <input type="submit" value="Update"/>
                  </form>
                </div>
              </div>
            </div>
  </body>
</html>
