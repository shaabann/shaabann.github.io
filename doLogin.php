<?php
require_once "connect.php";
if (isset($_SESSION["username"])) {
    $query = "SELECT Salt FROM User WHERE `Username`='" . $_SESSION["username"] . "' LIMIT 1";
    $result = mysqli_query($con, $query);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $salt = $row["Salt"];
        }
    } else {
        echo 'Invalid Username';
        exit;
    }
    $query = "SELECT Username,ID,Email,Join_Date FROM User WHERE `Username`='" . $_SESSION["username"]. "' LIMIT 1";
    $result = mysqli_query($con, $query);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $user = $row;
        }
    } else {
        echo 'Invalid Password';
        exit;
    }
}
