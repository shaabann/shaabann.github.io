<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta charset="utf-8">
  <title>Reddit 2.0</title>
  <link rel="stylesheet" href="style.css">
  <?php
  if(isset($_POST["email"])) { 
    if($_POST["password"]!=$_POST["password_check"]) {
      echo "Password check failed.";
      echo '<meta http-equiv="refresh" content="5; url=index.php" /></head></html>';
      exit();
    }
    require_once "connect.php";
    $query = "INSERT INTO User (Username,Email) VALUES ('".$_POST["username"]."','".$_POST["email"]."')";
    $result = mysqli_query($con, $query);
    $rowCount = mysqli_num_rows($result);
    $query = "SELECT Salt FROM User WHERE `Username`='" . $_POST["username"]. "' LIMIT 1";
    $result = mysqli_query($con, $query);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
      while ($row = mysqli_fetch_array($result)) {
        $salt=$row["Salt"];
      }
    } else {
      echo 'Invalid Username';
      exit;
    }
    $query= "UPDATE User SET Password='".hash("sha256",$_POST["username"].hash("sha256",$_POST["password"]).$salt)."' WHERE `Username`='" . $_POST["username"]. "' LIMIT 1";
    $result = mysqli_query($con, $query);
    $rowCount = mysqli_num_rows($result);

    $_SESSION["username"] = $_POST["username"];
    $_SESSION["password"] = $_POST["password"];
    echo '<meta http-equiv="refresh" content="0; url=index.php" /></head></html>';

  } else if (isset($_POST["username"])) {
    require_once "connect.php";
    $query = "SELECT Salt FROM User WHERE `Username`='" . $_POST["username"]. "' LIMIT 1";
    $result = mysqli_query($con, $query);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
      while ($row = mysqli_fetch_array($result)) {
        $salt=$row["Salt"];
      }
    } else {
      echo 'Invalid Username';
      exit;
    }
    $query = "SELECT Username,ID,Email,Join_Date FROM User WHERE Username='" . $_POST["username"]. "' AND Password=".'"'.hash("sha256",$_POST["username"].hash("sha256",$_POST["password"]).$salt).'"'." LIMIT 1";
    $result = mysqli_query($con, $query);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
      while ($row = mysqli_fetch_array($result)) {
        $user=$row;
      $_SESSION['user'] = $user; 
      }
    } else {
      echo 'Invalid Password';
      exit;
    }
    //setcookie("username", $_POST["username"], time() + (86400 * 30*365), "/");
    //setcookie("password", hash("sha256",$_POST["password"]), time() + (86400 * 30*365), "/");
    echo '<meta http-equiv="refresh" content="0; url=index.php" /></head></html>';
    exit;
  }
  ?>
</head>

<body>
  <?php include "navbar.php"; ?>
  <div class="wrapper">
    <div class="member">
      <div class="login">
        <h2>Login</h2>
        <form method="post" action="login.php">
          Username: <input type="text" name="username" />
          Password: <input type="password" name="password">
          <input type="submit" />
        </form>
      </div>
      <div class="sign-up">
        <h2>Sign Up</h2>
        <form method="post" action="">
          Username: <input pattern=".{1,255}" required title="1 to 255 charecters" type="text" name="username" />
          Password: <input pattern=".{16,}" required title="at least 16 charecters" type="password" name="password">
          Password again: <input pattern=".{16,}" required title="at least 16 charecters" type="password" name="password_check">
          E-mail: <input pattern=".{5,255}" required title="5 to 255 charecters" type="email" name="email">
          <input type="submit" value="Signup" />
        </form>
      </div>
    </div>
  </div>
</body>

</html>