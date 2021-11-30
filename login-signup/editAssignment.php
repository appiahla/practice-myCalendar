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
            $edit_assignment_title = $_POST['assignment_title'];
                echo ($edit_assignment_title);

            $edit_assignment_date = $_POST['assignment_date'];
                echo ($edit_assignment_date);

            $edit_assignment_course = $_POST['assignment_course'];
                echo ($edit_assignment_course);

            $edit_assignment_description = $_POST['assignment_description'];
                echo ($edit_assignment_description);

            $edit_assignment_notes = $_POST['assignment_notes'];
                echo ($edit_assignment_notes);
        ?>
        </div>
        </div>
        </div>
</body>
</html>