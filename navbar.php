<?php require_once "doLogin.php"; ?>
<div class="navbar">
    <a class="active" href="index.php">Home</a>
    <?php
    if(isset($user)){
        echo "<a href=logout.php>Logout of<br />".$user["Username"]."</a>";
    }
    else {
        echo '<a href="login.php">Login<br />Sign Up</a>';
    }
    ?>
</div>