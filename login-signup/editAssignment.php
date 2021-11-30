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


            echo "
            <form method='POST' action='updateEditAssignment.php'>
             
            <label for='assignmentName'>
                Assignment Title:
                <input id='assignmentName' type='text' name='AssignmentName' value='$edit_assignment_title'><br><br>
            </label>
              
            <label for='dueDate'>
                Due Date:
                <input  id='dueDate' type='date' name='DueDate' value='$edit_assignment_date'><br><br>
            </label>
              
            <label for='courseName'>
                Course Name:
                <input  id='courseName' type='text' name='CourseName' value='$edit_assignment_course'><br><br>
            </label>
              
            <label for='assignmentDesc'>
                Description:
                <textarea id='assignmentDesc' name='AssignmentDesc' value='$edit_assignment_description'></textarea><br><br>
            </label>
              
            <label for='assignmentNotes'>
                Notes:
                <textarea id='assignmentNotes' name='AssignmentNotes' value='$edit_assignment_notes'></textarea><br><br>
            </label>
             
              <input class='btn' type='submit' value='Submit'>
            </form>"
        ?>
        </div>
        </div>
        </div>
</body>
</html>