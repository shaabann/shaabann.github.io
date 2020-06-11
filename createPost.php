<?php
session_start();
require_once "connect.php";
if (isset($_SESSION["username"])) {
  if(isset($_POST["Title"])&&isset($_POST["Topic_ID"])&&isset($_POST["body"])&&isset($_POST["Topic_ID"])){
    $query = "INSERT INTO Post (Title,Body,User_ID,Topic_ID) VALUES ('".$_POST["Title"]."','".$_POST["body"]."','".$_SESSION["ID"]."','".$_POST["Topic_ID"]."')";
    $result = mysqli_query($con, $query);
    echo "Sucess!";
    echo '<script> setTimeout(function(){window.location="topic.php?ID='.$_POST["Topic_ID"].'"}, 2000); </script>';
  } else {
    echo 'Improper args.';
    echo '<script>setTimeout(2000,function(){window.location="index.php"}); </script>';
  }
} else {
  echo "You are not logged in to Post.";
  echo "<script>setTimeout(function(){window.location='login.php'},2000); </script>";
}
