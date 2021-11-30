<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title> 508 Group Project </title>
    <link rel = "stylesheet" type = "text/css" href = "viewAll.css">
    <link rel = "stylesheet" href = "../navigation.css">

    <nav class="nav-bar" >
      <div style="display: flex; justify-content: space-between;">
        <a id="home-pic" href="">myCalendar</a>
          <ul class="list">
            <li class="list-item">
              <a href="https://team2-508database.herokuapp.com/login-signup/checkLogin.php">Home</a>
            </li>
            <li class="list-item">
              <a a href="">
                <button class="btn">+ Add</button>
              </a>
            </li>
            <li class="list-item">
              <a href="https://team2-508database.herokuapp.com/login-signup/profilePage.php">
                <button class="btn">Profile</button>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </head>
<body>
<div id="day-view-container">
  <div id="input-field">
    <div class="mytabs">
        <?php
            $assignment_title = $_SESSION['assignment_title'];
            echo( $assignment_title);

            $assignment_date = $_SESSION['assignment_date'];
            echo ($assignment_date);

            $assignment_course = $_SESSION['assignment_course'];
            echo ($assignment_course);

            $assignment_description = $_SESSION['assignment_description'];
            echo ($assignment_description);
            
            $assignment_notes = $_SESSION['assignment_notes'];
            echo ($assignment_notes);
        ?>
        </div>
        </div>
        </div>
</body>
</html>