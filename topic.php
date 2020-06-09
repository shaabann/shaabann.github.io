<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  xml:lang="en" lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reddit 2.0</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php include "navbar.php";
     require_once "connect.php";
      $query = "SELECT * FROM Topic WHERE ID=" . $_GET["ID"];
      $result = mysqli_query($con, $query);
      $rowCount = mysqli_num_rows($result);

      //display contents of Topic
      if ($rowCount > 0) {
        while ($row = mysqli_fetch_array($result)) {
           echo '<div class="post-wrapper">';
           echo   '<h2>' . $row['Name']. '</h2>';
           echo   '<p>' . $row['Description']. '</p>';
           echo   "<nav id=" . $row["ID"] . "></nav>";

            $post_query = "SELECT * FROM Post WHERE Topic_ID=" . $_GET["ID"];
            $post_result = mysqli_query($con, $post_query);
            $post_rowCount = mysqli_num_rows($post_result);
            if ($post_rowCount > 0) {
               while ($post_row = mysqli_fetch_array($post_result)) {
                echo    '<div class="post">';
                echo      '<div class="post-contents">';
                echo         '<div class="post-container">';
                echo             '<div class="post-title">';
                    echo         '<span class="post-title">'. $post_row['Title'] .'</span>';
                    echo         '</div>';
                    echo         '<span class="post-desc">'. $post_row['Body'] .'</span><div class="editing">';
                    echo         '<a class="reply" onclick="document.getElementById(\'reply-post-'.$row["ID"].'-'.$post_row['ID'].'\').style.display=\'block\';"> reply </a>';
                    echo         '<a class="reply" href="editPost.php?ID=' . $post_row['ID'] . '"> edit </a></div>';
                    echo         '<span class="post-date">' . $post_row['Date']. '<a class="deletePost" href="deletePost.php?ID=' . $post_row['ID'] .'">X</a></span>';
                    ?>
                    <form id="" action="createReply.php" method="post" class="">
                      <fieldset id="reply-post-<?php echo $row["ID"].'-'.$post_row['ID']; ?>" style="display:none;">
                        <legend>Reply...</legend>
                        <p></p>
                        <textarea id="post" name="reply" required placeholder="Text only" maxlength="1500" style="width:100%"></textarea>
                        <input name="Post_ID" style="display:none;" value="<?php echo $post_row['ID'];?>"/>
                        <input name="Topic_ID" style="display:none;" value="<?php echo $_GET['ID'];?>"/>
                        <input id="submit" type="submit"/>
                      </fieldset>
                    </form>
                    <?php
                    $reply_query = 'SELECT * FROM Reply WHERE Post_ID=' . $post_row["ID"];
                    $reply_result = mysqli_query($con, $reply_query);
                    $reply_rowCount = mysqli_num_rows($reply_result);

                    if ($reply_rowCount > 0) {
                        while ($reply_row = mysqli_fetch_array($reply_result)) {
                            echo '<div class="post-reply-container">';
                            echo    '<p class="reply-author">' . $reply_row['Author'] . '</p>';
                            echo    '<span class="reply-desc">' . $reply_row['Body'] . '</span>';
                            echo    '<span class="reply-date">' . $reply_row['Date'] . '<a href="deleteReply.php?ID=' . $reply_row['ID'] .'">X</a></span>';
                            echo    '<a class ="editReply" href="edit.php?ID=' . $reply_row['ID'] . '">Edit</a>';
                            echo '</div>';
                        }
                    }
                    echo  '</div></div></div>';
              }
              echo '</div>';
              echo '</div>';
            } else {
              echo 'No Posts';
            }
        }
      } else {
        echo "<div>No Posts or Replies ";
      }
      ?>
      <form action="createPost.php" method="post">
          <fieldset class="post">
            <legend>Post</legend>
            <input name="Title" type="text" required placeholder="A Great Title" maxlength="32" />
            <input name="Topic_ID" value="<?php echo $_GET["ID"]; ?>" style="display:none;"/>
            <textarea name="body" required placeholder="Post Body" maxlength="1500" style="width:100%"></textarea>
            <input type="submit"/>
          </fieldset>
        </form>
        <?php
      echo '</div>';
    ?>
    </body>

    </html>
