<?php
require_once "connect.php";
$query = "INSERT INTO Topic(Name, Description, Forum_ID)
VALUES ('".$_POST["Topic"]."', '".$_POST["Description"]."','".$_POST["Forum_ID"]."')";
if (mysqli_query($con, $query)) {
  echo "Successfully Created a New Topic";
} else {
  echo "ERROR: Could not  create the topic. " . mysqli_error($con);
}
?>
<html><head><meta http-equiv="refresh" content="0; url=forum.php?ID=<?php echo $_POST["Forum_ID"];?>" /></head></html>