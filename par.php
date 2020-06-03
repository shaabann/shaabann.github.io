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
      $query = "SELECT * FROM Topic WHERE Forum_ID=" . $_GET["ID"];
      $result = mysqli_query($con, $query);
      $rowCount = mysqli_num_rows($result);

      //display contents of Topic
      if ($rowCount > 0) {
        while ($row = mysqli_fetch_array($result)) {
           echo '<div class="post-wrapper">';
           echo   '<h2>' . $row['Name']. '</h2>';
           echo   "<nav id=" . $row["ID"] . "></nav>";

            $query = "SELECT * FROM Post WHERE Topic_ID=" . $_GET["ID"];
            $result = mysqli_query($con, $query);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount > 0) {
               echo    '<div class="post">';
               echo      '<div class="post-contents">';
               echo         '<div class="post-container">';
               echo             '<div class="post-title">';
               while ($row = mysqli_fetch_array($result)) {
                    echo            '<span class="post-title">'. $row['Title'] .'</span>';
                    echo         '</div>';
                    echo         '<span class="post-desc">'. $row['Body'] .'</span>';
                    echo         '<a class="reply" href="#">reply</a>';
                    echo         '<span class="post-date">06-02-2020</span>';
                    $postID = $row['ID'];
                    $query = 'SELECT * FROM Reply WHERE Post_ID=' . $postID;
                    $result = mysqli_query($con, $query);
                    $rowCount = mysqli_num_rows($result);

                    if ($rowCount > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<div class="post-reply-container">';
                            echo    '<p class="reply-author">' . $row['Author'] . '</p>';
                            echo    '<span class="reply-desc">' . $row['Body'] . '</span>';
                            echo    '<span class="reply-date">' . $row['Date'] . '</span>';
                            echo '</div>';
                        }
                    }
                    echo  '</div>';
              }
              echo '</div>';
              echo '</div>';
            } else {
              echo 'No Posts';
            }
        }
      echo '</div>';
      } else {
        echo "No Topics ";
        exit;
      }
    ?>

    <form>
      <fieldset>
        <legend>Text input</legend>
        <form id="" action="index.php" method="post" class="">
          <h2>{topic title}</h2>
          <fieldset class="post">
            <legend>Put post here</legend>
            <label for="Title">Post Title</label>
            <input name="Title" id="Post Title" type="text" required placeholder="A Great Title" maxlength="32" />
          </fieldset>
          <fieldset class="">
            <legend>Prompt...</legend>
            <p></p>
            <label for="message">Reply</label>
            <p></p>
            <textarea id="post" name="post" required placeholder="Text only" maxlength="1500"></textarea>
            </label>
          </fieldset>

          <fieldset>
            <legend>Create Post</legend>
            <label for="submit"></label>
            <input name="submit" id="submit" type="submit" value="Send" />
            <label for="reset"></label>
            <input name="reset" id="reset" type="reset" value="Reset" />

          </fieldset>
        </form>

      </fieldset>
    </form>
    </body>

    </html>
