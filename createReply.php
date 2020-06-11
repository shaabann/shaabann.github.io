<?php
session_start();
require_once "connect.php";
if (isset($_SESSION["username"])) {
  if(isset($_POST["reply"])&&isset($_POST["Post_ID"])){
    $query = "INSERT INTO Reply (Author,Body,Post_ID,User_ID) VALUES ('".$_SESSION["username"]."','".$_POST["reply"]."','".$_POST["Post_ID"]."','".$_SESSION["ID"]."')";
    $result = mysqli_query($con, $query);
    echo "Sucess!";
    echo '<script> setTimeout(function(){window.location="topic.php?ID='.$_POST["Topic_ID"].'"},2000); </script>';
  } else {
    echo 'Improper args.';
    echo '<script>setTimeout(function(){window.location="forum.php?ID='.$con->insert_id.'"}, 2000); </script>';
  }
} else {
  echo "You are not logged in to Reply.";
  echo "<script>setTimeout(function(){window.location='Login.php'},2000); </script>";
}
