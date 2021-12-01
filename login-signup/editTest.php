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
                <a href="https://team2-508database.herokuapp.com/login-signup/addItems.php">
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
        <h2 class='title'>Edit Test</h2>
        
        <?php

            // get the values 
            $edit_assessmentT_id = $_POST['assessmentT_id'];

            $edit_assessmentT_title = $_POST['assessmentT_title'];

            $edit_assessmentT_date = $_POST['assessmentT_date'];

            $edit_assessmentT_course = $_POST['assessmentT_course'];

            $edit_assessmentT_material= $_POST['assessmentT_material'];

            $edit_assessmentT_notes = $_POST['assessmentT_notes'];

            //edit form
            echo "
                <form method='POST' action='updateEditTest.php'>

                <input type='hidden' name='TestID' value='$edit_assessmentT_id'>

                <label for='testName'>
                  Test Title:
                  <input type='text' id='testName' name='TestName' value='$edit_assessmentT_title'><br><br>
                </label>
                
                <label for='testDate'>
                 Test Date:
                  <input type='date' id='testDate' name='TestDate' value='$edit_assessmentT_date'><br><br>
                </label>
                
                <label for='testCourseName'>
                  Course Name:
                  <input type='text' id='testCourseName' name='TestCourseName' value='$edit_assessmentT_course'><br><br>
                </label>
                
                <label for='testMaterial'>
                  Material:
                  <textarea id='testMaterial' name='TestMaterial'>$edit_assessmentT_material</textarea><br><br>
                </label>
                
                <label for='testNotes'>
                  Notes:
                  <textarea id='testNotes' name='TestNotes'>$edit_assessmentT_notes</textarea><br><br>
                </label>
                
                <input class='btn' type='submit' value='Update 'style='margin-left: 24px;'>
              </form>"
        ?>
        </div>
        </div>
        </div>
</body>
</html>