<?php
require_once "doLogin.php";
if(isset($_GET["ID"])&&isset($user)){
    $query = "SELECT * FROM Post WHERE `ID`='" . $_GET["ID"] . "' LIMIT 1";
    $result = mysqli_query($con, $query);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $topicID = $row["Topic_ID"];
            if($row["User_ID"]!=$user["ID"]){
                echo 'You didn\'t post that.';
                echo "<script> setTimeout(function(){ window.location='topic.php?ID=".$topicID."'; }, 2000); </script>";
                exit;
            } else {
              $query = "DELETE FROM Post WHERE `ID`='" . $_GET["ID"] . "' LIMIT 1";
              $result = mysqli_query($con, $query);
              if ($result) {
                echo "Record deleted successfully";
                echo "<script> setTimeout(function(){ window.location='topic.php?ID=".$topicID."'; }, 2000); </script>";
                exit;
              } else {
                echo "Error deleting record " . $con->error;
              }
            }
        }
    } else {
        echo 'Invalid Post ID';
        echo '<script>setTimeout(function(){window.location="forum.php?ID='.$con->insert_id.'"}, 2000); </script>';
        exit;
    }
} else {
    echo 'You are not logged in to delete Posts';
    echo '<script> window.location="login.php? </script>';
    exit;
}
