<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title> 508 Group Project </title>
    <link rel = "stylesheet" type = "text/css" href = "editForm.css">
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
        <h2 class='title'>Edit Assignment</h2>
        <?php
            // get the values 
            $edit_assignment_id = $_POST['assignment_id'];
            echo($edit_assignment_id);

            $edit_assignment_title = $_POST['assignment_title'];

            $edit_assignment_date = $_POST['assignment_date'];

            $edit_assignment_course = $_POST['assignment_course'];

            $edit_assignment_description = $_POST['assignment_description'];

            $edit_assignment_notes = $_POST['assignment_notes'];

            //edit form
            echo "
                <form method='POST' action='updateEditAssignment.php'>

                <input type='hidden' name='AssignmentId' value='$assignment_id'>
                
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
                    <textarea id='assignmentDesc' name='AssignmentDesc'>$edit_assignment_description</textarea><br><br>
                </label>
                
                <label for='assignmentNotes'>
                    Notes:
                    <textarea id='assignmentNotes' name='AssignmentNotes'>$edit_assignment_notes</textarea><br><br>
                </label>
                
                <input class='btn' type='submit' value='Update' style='margin-top: 5px; margin-left: 24px;'>
                </form>"
        ?>
        </div>
        </div>
        </div>
</body>
</html>