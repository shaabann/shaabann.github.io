<?php
require_once "doLogin.php";
if(isset($_POST["Title"])&&isset($_POST["Topic_ID"])&&isset($_POST["body"])&&isset($_POST["Topic_ID"])){
    $query = "INSERT INTO Post (Title,Body,User_ID,Topic_ID) VALUES ('".$_POST["Title"]."','".$_POST["body"]."','".$user["ID"]."','".$_POST["Topic_ID"]."')";
    $result = mysqli_query($con, $query);
    echo "Sucess!";
    echo '<script>window.location="topic.php?ID='.$_POST["Topic_ID"].'"</script>';
} else {
    echo 'Improper args.';
    echo '<script>setTimeout(2000,function(){window.location="index.php"}); </script>';
}