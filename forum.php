<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta charset="utf-8">
  <title>Reddit 2.0</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php include "navbar.php" ?>
  <?php
  require_once "connect.php";
  $query = "SELECT * FROM Forum WHERE ID=" . $_GET["ID"] . " LIMIT 1";
  $result = mysqli_query($con, $query);
  $rowCount = mysqli_num_rows($result);

  $fourm = null;

  //display contents of forum
  if ($rowCount > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $fourm = $row;
    }
  } else {
    echo "Invalid ID " . $_GET["ID"];
    exit;
  }
  ?>
  <?php echo "<h2>" . $fourm["Name"] . "</h2>"; ?>
  <?php echo "<p>" . $fourm["Description"] . "</p>"; ?>
  <?php echo "<nav id=" . $fourm["ID"] . "></nav>"; ?>
    <?php
    require_once "connect.php";
    $query = "SELECT * FROM Topic WHERE Forum_ID=" . $_GET["ID"];
    $result = mysqli_query($con, $query);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
      echo '<div class="topic-wrapper">';
      echo    '<table id="topic">';
      echo    '<thead>';
      echo      '<tr>';
      echo       '<th>Topic</th>';
      echo        '<th>Description</th>';
      echo      '</tr>';
      echo    '</thead>';
      while ($row = mysqli_fetch_array($result)) {
        echo    '<tr>';
        echo      '<td><a class=topic-title href="topic.php?ID=' .$row['Forum_ID'] . '">'.  $row['Name'] .'</a></td>';
        echo      '<td>'. $row['Description'] .'</td>';
        echo    '</tr>';
      }
      echo  '</table>';
      echo '</div>';
    } else {
      echo 'No Topics';
    }
    ?>

  <aside class="form">
    <fieldset>
      <legend>Text input</legend>
      <form id="" action="createTopic.php" method="post" class="">
        <h2>Create Topic</h2>
        <fieldset class="topic">
          <legend></legend>
          <label for="Title">Topic Name</label>
          <input name="Topic" id="Topic" type="text" required placeholder="A Great Topic" maxlength="32" />
          <label for="Description">Description</label>
          <input name="Description" id="Description" type="text" required placeholder="A Great Description" maxlength="32" />
          <input name="Forum_ID" type="text" value="<?php echo $_GET["ID"]; ?>" style="display:none;"/>
        </fieldset>

        <fieldset>
          <label for="submit"></label>
          <input name="submit" id="submit" type="submit" value="Create Topic" />
        </fieldset>
      </form>

    </fieldset>
  </aside>
</body>
</html>
<?php
mysqli_close($con);
?>
