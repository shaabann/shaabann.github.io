<?php
session_start();
require_once "doLogin.php";
if(isset($_POST["reply"])&&isset($_POST["Post_ID"])){
    $query = "INSERT INTO Reply (Author,Body,Post_ID,User_ID) VALUES ('".$user["Username"]."','".$_POST["reply"]."','".$_POST["Post_ID"]."','".$user["ID"]."')";
    $result = mysqli_query($con, $query);
    echo "Sucess!";
    echo '<script>window.location="topic.php?ID='.$_POST["Topic_ID"].'"</script>';
} else {
    echo 'Improper args.';
    echo '<script>setTimeout(2000,function(){window.location="forum.php?ID='.$con->insert_id.'"}); </script>';
}