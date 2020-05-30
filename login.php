<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  xml:lang="en" lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reddit 2.0</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="navbar">
      <a class= "active" href="index.php">Home</a>
      <a href="login.html">Login<br/>Sign Up</a>
    </div>

    <div class="wrapper">
    <div class="member">
    <div class="login">
      <h2>Login</h2>
      <form method="post" action="">
            Username: <input type="text" name="user_name" />
            Password: <input type="password" name="user_pass">
            <input type="submit" value="Login" />
      </form>
    </div>
    <div class="sign-up">
      <h2>Sign Up</h2>
      <form method="post" action="">
        Username: <input type="text" name="user_name" />
        Password: <input type="password" name="user_pass">
        Password again: <input type="password" name="user_pass_check">
        E-mail: <input type="email" name="user_email">
        <input type="submit" value="Signup" />
     </form>
    </div>
    </div>
    </div>
  </body>
</html>
