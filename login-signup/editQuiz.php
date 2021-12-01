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
        <h2 class='title'>Edit Quiz</h2>
        
        <?php

            // get the values 
            $edit_assessmentQ_id = $_POST['assessmentQ_id'];

            $edit_assessmentQ_title = $_POST['assessmentQ_title'];

            $edit_assessmentQ_date = $_POST['assessmentQ_date'];

            $edit_assessmentQ_course = $_POST['assessmentQ_course'];

            $edit_assessmentQ_material= $_POST['assessmentQ_material'];

            $edit_assessmentQ_notes = $_POST['assessmentQ_notes'];

            //edit form
            echo "
                <form method='POST' action='updateEditQuiz.php'>

                <input type='hidden' name='QuizID' value='$edit_assessmentQ_id'>

                <label for='quizName'>
                    Quiz Title:
                    <input type='text' id='quizName' name='QuizName' value='$edit_assessmentQ_title'><br><br>
                </label>
                
                <label for='quizDate'>
                    Quiz Date:
                    <input type='date' id='quizDate' name='QuizDate' value='$edit_assessmentQ_date'><br><br>
                </label>
                
                <label for='quizCourseName'>
                    Course Name:
                    <input type='text' id='quizCourseName' name='QuizCourseName' value='$edit_assessmentQ_course'><br><br>
                </label>
                
                <label for='quizMaterial'>
                    Material:
                    <textarea id='quizMaterial' name='QuizMaterial'>$edit_assessmentQ_material</textarea><br><br>
                </label>
                
                <label for='quizNotes'>
                    Notes:
                    <textarea id='quizNotes' name='QuizNotes'>$edit_assessmentQ_notes</textarea><br><br>
                </label>
                    
                <input class='btn' type='submit' value='Update 'style='margin-left: 24px;'>
              </form>"
        ?>
        </div>
        </div>
        </div>
</body>
</html>