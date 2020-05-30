<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_HOST', 'classmysql.engr.oregonstate.edu');
define('DB_USER', 'cs340_hoanger');
define('DB_PASSWORD', 'Ironman1');
define('DB_NAME', 'cs340_hoanger');
define('CON_STRING', 'mysql:host=classmysql.engr.oregonstate.edu;dname=cs340_hoanger');
/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
foreach ($_POST as $key => $value) {
    $_POST[$key]=mysqli_real_escape_string($value);
}
foreach ($_GET as $key => $value) {
    $_GET[$key]=mysqli_real_escape_string($value);
}
?>
