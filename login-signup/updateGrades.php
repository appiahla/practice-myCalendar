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

    <?php

      $db_host = 'team2-database.cstfewbdata2.us-east-1.rds.amazonaws.com';
      $db_user = 'admin';
      $db_pass = 'databasegroup';
      $db_name = 'groupMyCalendar';
      $db_port = '3306';

      $link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name", "$db_port");

      // Check connection
      if (!$link) {
              
          //kill the connection
          die("Connection failed:" .mysqli_connect_error());
      }

          
          //Get the variables that will be inserted into the database
          $crn = $_POST['courseCrn'];

          $grade = $_POST['CourseGrade'];
          
          $course_num = $_POST['edit_course_num'];
          
          $course_name = $_POST['edit_course_name'];

          $course_section = $_POST['edit_course_section'];

          $get_v = $_SESSION['v_num'];

          //now insert them into the database
          //see if the v_num exists
          $sql = "UPDATE Course
                    SET `grade`='$grade'
                WHERE `crn`='$crn' AND `v_number`='$get_v';";
                  
                if (mysqli_query($link, $sql)) {    

                    //Success Message
                    echo nl2br("<h2 class='title'>Your Grade Was Successfully!</h2>\n\n");

                    echo nl2br("<div class='course'><h2 style='margin-bottom: -10px;'> CourseL $course_name </h2> <div id='grades'><h3>$grade</h3></div>\n\n");

                    if($course_section==1){
                        echo nl2br("<h4 style='margin-top: 0px;'>$course_num-001 $course_crn</h4>\n\n");
                    }else{
                        echo nl2br("<h4 style='margin-top: 0px;'>>$course_num-$course_section $course_crn</h4>\n\n");
                    }
                    
                    echo nl2br("\n\n");
            }else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($link);
              }

      mysqli_close($link);

      ?>

    </div>
    <a href="./viewGrades.php" style="margin-left: 50px;">
      <button class="btn" id="viewAll" style="margin: -20px -50px; position:relative;">View Grades</button>
    </a>
  </div>
</div>
</body>
</html>