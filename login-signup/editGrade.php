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
        <h2 class='title'>Edit Grade</h2>
        <?php
            // get the values 
            $edit_course_crn = $_POST['course_crn'];

            $edit_course_num = $_POST['course_num'];

            $edit_course_name = $_POST['course_name'];

            $edit_course_section = $_POST['course_section'];

            $edit_course_grade = $_POST['course_grade'];

            echo nl2br("<div class='course'><h2 style='margin-bottom: -10px;'> Course $edit_course_name: </h2>\n\n");
            if($edit_course_section==1){
                echo nl2br("<h4>$edit_course_num-001 $edit_course_crn</h4>\n\n");
            }else{
                echo nl2br("<h4>$edit_course_num-$edit_course_section $edit_course_crn</h4>\n\n");
            }
            echo "<div id='grades' style='margin-top: -127px;padding-left: 300px;'>    
                <form method='POST' action='updateGrades.php'>
            
                <label for='assignmentName'>
                    <input type='hidden' name='courseCrn' value='$edit_course_crn'>
                    <input type='hidden' name='edit_course_num' value='$edit_course_num'>
                    <input type='hidden' name='edit_course_name' value='$edit_course_name'>
                    <input type='hidden' name='edit_course_section' value='$edit_course_section'>
                    <input id='coursegrade' type='text' name='CourseGrade' value='$edit_course_grade'><br><br>
                </label>
                <input class='btn' type='submit' value='Update' style='margin-top: 5px; margin-left: 80px;'>
                </form>
                </div>";
        ?>
        </div>
        </div>
        </div>
</body>
</html>