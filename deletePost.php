<?php
require_once "doLogin.php";
if(isset($_GET["ID"])&&isset($user)){
    $query = "SELECT User_ID FROM Post WHERE `ID`='" . $_GET["ID"] . "' LIMIT 1";
    $result = mysqli_query($con, $query);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        while ($row = mysqli_fetch_array($result)) {
            if($row["User_ID"]!=$user["ID"]){
                echo 'You didn\'t post that.';
                echo '<script>setTimeout(2000,function(){window.location="forum.php?ID='.$con->insert_id.'"}); </script>';
                exit;
            }
        }
    } else {
        echo 'Invalid Post ID';
        echo '<script>setTimeout(2000,function(){window.location="forum.php?ID='.$con->insert_id.'"}); </script>';
        exit;
    }
} else {
    echo 'Invalid Post ID';
    echo '<script> window.location="forum.php?ID='.$con->insert_id.'" </script>';
    exit;
}