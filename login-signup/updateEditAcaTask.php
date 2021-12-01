<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title> 508 Group Project </title>
    <link rel = "stylesheet" type = "text/css" href = "successSubmit.css">
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
          $id = $_POST['AcaTaskID'];

          $title = $_POST['AcaTaskName'];

          $course = $_POST['AcaTaskCourse'];

          $description = $_POST['AcaTaskDesc'];

          $date = $_POST['AcaTaskDate'];

          $status = $_POST['AcaTaskStatus'];

          $recurring = $_POST['recurring'];

          $monday = $_POST['monday'];
            
          $tuesday = $_POST['tuesday'];
            
          $wednesday = $_POST['wednesday'];
            
          $thursday = $_POST['thursday'];
            
          $friday = $_POST['friday'];
            
          $saturday = $_POST['saturday'];
            
          $sunday = $_POST['sunday'];
            
          $start = $_POST['AcaTaskRecurrStart'];
            
          $end = $_POST['AcaTaskRecurrEnd'];

          $get_v = $_SESSION['v_num'];

          //now insert them into the database
          //see if the v_num exists

          $sql = "UPDATE AcademicTask
                    SET
                        `task_title`='$title',
                        `task_course`='$course',
                        `task_description`='$description',
                        `date_of`='$date',
                        `task_status`='$status',
                        `task_recurring`='$recurring',
                        `recurringMon`='$monday',
                        `recurringTues`='$tuesday',
                        `recurringWed`='$wednesday',
                        `recurringThurs`='$thursday',
                        `recurringFri`='$friday',
                        `recurringSat`='$saturday',
                        `recurringSun`='$sunday',
                        `start_date`='$start',
                        `end_date`='$end'
                    WHERE `task_id`='$id' AND `v_number`='$get_v'";
                  
                if (mysqli_query($link, $sql)) {    

                  //Success Message
                  echo nl2br("<h2 class='title'>Your Academic Task was Updated Successfully!</h2>\n\n");
                  
                  // show the title
                  echo nl2br("<h3> Task Title:</h3>  $title\n\n");

                  // check for null
                  if ($course != '') {

                  echo nl2br("<h3> Task Course:</h3>  $course\n\n");

                  }
                  
                  if ($description != ''){
                  echo nl2br("<h3> Task Description:</h3>  $description\n\n");
                  }

                  if ($date != '') {

                  echo nl2br("<h3> Task Date:</h3>  $date\n\n");

                  }
                  
                  if ($status != ''){

                  echo nl2br("<h3> Task Status:</h3>  $status\n\n");

                  }

                  //check if the task is recurring
                  if ($recurring != ''){

                  echo nl2br("<h3>Task is Recurring on: </h3>\n\n");


                  if ($monday != ''){
                      
                      echo nl2br("$monday\n\n");
                  
                  }

                  if ($tuesday != ''){
                      
                      echo nl2br("$tuesday\n\n");

                  }
                  
                  if ($wednesday != ''){

                      echo nl2br("$wednesday\n\n");

                  }

                  if ($thursday != ''){

                      echo nl2br("$thursday\n\n");

                  }
                  
                  if ($friday != ''){

                      echo nl2br("$friday\n\n");
                  }

                  if ($saturday != ''){

                      echo nl2br("$saturday\n\n");
                  }

                  if ($sunday != ''){
                      
                      echo nl2br("$sunday\n\n");

                  }
                  
                  echo nl2br("<h4>Staring on: </h4>\n\n $start\n\n");
                  echo nl2br("<h4>Ending on: </h4>\n\n $end\n\n");
              }
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($link);
          }

  mysqli_close($link);

?>

    </div>
    <a href="./showAllAcademicTasks.php">
      <button class="btn" id="viewAll" style="margin: -20px -50px; position:relative; top:50%; left: 41%; margin-bottom: 10px;">View All Academic Tasks</button>
    </a>
  </div>
</div>
</body>
</html>