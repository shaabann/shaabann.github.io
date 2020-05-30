<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  xml:lang="en" lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reddit 2.0</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php include "navbar.php" ?>
    <?php
      require_once "connect.php";
      $query = "SELECT * FROM Forum WHERE ID=".$_GET["ID"]." LIMIT 1";
      $result = mysqli_query($con, $query);
      $rowCount = mysqli_num_rows($result);

      $fourm=null;
    
      //display contents of forum
      if($rowCount > 0){
        while($row = mysqli_fetch_array($result)){
          $fourm=$row;
        }
      } else {
        echo "Invalid ID ".$_GET["ID"];
        exit;
      }
    ?>
    <?php echo "<h2>".$fourm["Name"]."</h2>"; ?>
    <?php echo "<nav id=".$fourm["ID"]."></nav>"; ?>
    <ul>
    <?php 
      $query = "SELECT * FROM Topic WHERE Forum_ID=".$_GET["ID"];
      $result = mysqli_query($con, $query);
      $rowCount = mysqli_num_rows($result);
      if($rowCount > 0){
          while($row = mysqli_fetch_array($result)){
            echo '<li><a href="#forum-'.$row['ID'].'" class="" data-speed="400"><i class=""></i>'.$row['Name'].'</a></li>';
          }
      }else{
          echo 'Not available';
      }
    ?>
    </ul>

    <fieldset>
    <legend>Text input</legend>
    <form id="" action="index.php" method="post"class ="" >
    <h2>Create Topic</h2>
    <fieldset class="topic">
      <legend></legend>
      <label for="Title">Topic Name</label>
      <input name="Topic Name" id="Post Title" type="text" required placeholder="A Great Topic" maxlength="32" />
    </fieldset>

    <fieldset>
      <label for="submit"></label>
      <input name="submit" id="submit" type="submit" value="Create Topic" />
    </fieldset>
    </form>

          </fieldset>
        </form>
      </body>
    </html>
    <form>
      <fieldset>
        <legend>Text input</legend>
<form id="" action="index.php" method="post"class ="" >
<h2>{topic title}</h2>
<fieldset class="post">
  <legend>Put post here</legend>
  <label for="Title">Post Title</label>
  <input name="Title" id="Post Title" type="text" required placeholder="A Great Title" maxlength="32" />
</fieldset>
<fieldset class="">
  <legend>Prompt...</legend>
  <p></p>
  <label for="message">Reply</label>
  <p></p>
  <textarea id="post" name="post" required placeholder="Text only" maxlength="1500"></textarea>
</label>
</fieldset>

<fieldset>
  <legend>Create Post</legend>
  <label for="submit"></label>
  <input name="submit" id="submit" type="submit" value="Send" />
  <label for="reset"></label>
  <input name="reset" id="reset" type="reset" value="Reset" />

</fieldset>
</form>

      </fieldset>
    </form>
  </body>
</html>
<?php 
          mysqli_close($con);
          ?>
