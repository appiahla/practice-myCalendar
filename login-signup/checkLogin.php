<?php

session_start();

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
    // if the session is new (new browser/tab), create the session variables
    if(!isset($_SESSION['v_num']) && empty($_SESSION['v_num'])) {
      $v_num = $_POST['vnum'];
    
      $email = $_POST['email'];
      
      $password = $_POST['password'];

      $_SESSION['email'] = $email;
      $_SESSION['v_num'] = $v_num;
      $_SESSION['password'] = $password;
    // otherwise it is the same session, grab the variables
    } else {
      $v_num = $_SESSION['v_num'];
    
      $email = $_SESSION['email'];
      
      $password = $_SESSION['password'];
    }

    //now insert them into the database
    //see if the v_num exists
    $sql_user = "SELECT * FROM Student WHERE v_num = '$v_num'";
           
    if ($result_user = mysqli_query($link,$sql_user)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows($result_user);
    
    //if there is a row
    if($rowcount == 1) { 


        echo "<div class='alert alert-success role='alert' id='alert'>
                <strong>Success!</strong> You are in the database!</div>\n"; 

            // output data of each row
            while($row = $result_user->fetch_assoc()) {
            
                //check if the email is correct
                if ($row["username"] != $email){ 
                  echo "<div class='alert alert-danger' role='alert'>
                        <strong>Failure!</strong> You entered the wrong email!</div>\n"; 
                }

                //check if the password is correct
                if ($row["password"] != $password) {
                  echo "<div class='alert alert-danger' role='alert'>
                      <strong>Failure!</strong> You entered the wrong password!</div>\n"; 
                 }

            }
          } else {
            echo "0 results";
          }

    // Free result set
    mysqli_free_result($result_user);
    }
?>

<!DOCTYPE html>
<html>
  
<head>
    <title>Homepage</title>
    <link rel = "stylesheet" href = "../navigation.css">
    <link rel = "stylesheet" type = "text/css" href = "../home-style.css">
    <script>
        setTimeout(function() {
          var loader = document.getElementById("alert");
          loader.style.transition = '7s';
          loader.style.opacity = '0';
          loader.style.visibility = 'hidden';
          loader.style.display = 'none';
        }, 1250);
    </script>
    <nav class="nav-bar" >
      <div style="display: flex; justify-content: space-between;">
        <a id="home-pic" href="">myCalendar</a>
          <ul class="list">
            <li class="list-item">
              <a href="https://team2-508database.herokuapp.com/login-signup/checkLogin.php">Home</a>
            </li>
            <li class="list-item">
              <a href="./addItems.php">
                <button class="btn">+ Add</button>
              </a>
            </li>
           </form>
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
    <h1 style="text-align: center;">Welcome to myCalendar!</h1>

    <div id="home-group-flex">
    <div class="home-group">
        <h3 class="home-title">Classes for this Semester</h3>
        <app-class-view>
          <div id="class-view-flex">
            <div class="class">
                <?php
                  // course variables
                  $course_num = $_POST['course_num'];
                  $course_name = $_POST['course_name'];
                  $professor_name = $_POST['professor_name'];
                  $location = $_POST['location'];

                  $sql_course = "SELECT course_num, course_name, professor_name, location FROM Course WHERE v_number = '$v_num'";
                  if ($result_course = mysqli_query($link,$sql_course)) {
                      // Return the number of rows in result set
                  $rowcount_course = mysqli_num_rows($result_course);
                  
                  //if there is a row
                  if($rowcount_course > 0) { 

                      // output data of each row
                      while($row_course = $result_course->fetch_assoc()) {
                      
                        $course_num_login = $row_course['course_num'];
                        $course_name_login = $row_course['course_name'];
                        $course_proff_login = $row_course['professor_name'];
                        $course_location_login = $row_course['location'];

                        
                        echo nl2br("<h4 style='margin-top: 0px;margin-bottom: 0px;padding-left: 15px;'> $course_num_login $course_name_login </h4>\n\n");
                        echo nl2br("<p style='margin-top: -20px; padding-left: 45px;'> $course_proff_login </p> \n\n");
                        echo nl2br("<p style='margin-top: -40px;padding-left: 45px;'> $course_location_login </p> \n\n");
                      }
                  } else {
                    echo "No classes yet!";
                  }
                  // Free result set
                  mysqli_free_result($result_course);
                  }
                ?>
            </div>
          </div>
        </app-class-view>
    </div>


    <div class="home-group">
        <h3 class="home-title">Assignments Due Soon</h3>
        <?php
          // assignment variables
          $title = $_POST['Title'];
          $due_date = $_POST['Due_Date'];
          $course = $_POST['Course'];
          $description = $_POST['Description'];
          $notes = $_POST['Notes'];
          
          $temp_assignment = $_SESSION['v_num'];

          $sql_current_assignments = "	SELECT assignment_title AS Title, due_date AS Due_Date, course_name_assignment AS Course, description_section AS Description, notes AS Notes
                                            FROM Assignment
                                            WHERE assignment_v_number = '$temp_assignment'
                                            ORDER BY due_date ASC LIMIT 5;";

          if ($result_current_assignments = mysqli_query($link,$sql_current_assignments)) {
              // Return the number of rows in result set
          $rowcount_current_assignments = mysqli_num_rows($result_current_assignments);
          
          //if there is a row
          if($rowcount_current_assignments > 0) { 

              // output data of each row
              while($row_current_assignments = $result_current_assignments->fetch_assoc()) {
              
                $assign_title_login = $row_current_assignments['Title'];
                $assign_due_date_login = $row_current_assignments['Due_Date'];
                $assign_course_login = $row_current_assignments['Course'];
                $assign_description_login = $row_current_assignments['Description'];
                $assign_notes_login = $row_current_assignments['Notes'];


                echo nl2br("<h4 style='margin-bottom: 0px;margin-top: 0px;padding-left: 20px;'> $assign_title_login </h4>\n\n");
                  
                //null check
                if ($assign_description_login != '') {
                  echo nl2br("<p style='margin-top: -25px;padding-left: 45px;'> $assign_description_login </p> \n\n");
                }
               
                if( $assign_due_date_login != ''){
                  echo nl2br("<h5 style='margin-top: -40px;padding-left: 45px;font-size: medium;'>Due Date:</h5>
                            <p style='margin-top: -63px;padding-left: 125px;'> $assign_due_date_login </p> \n\n");
                }
                
                echo nl2br("<h5 style='font-size: medium;margin-top: -35px;padding-left: 45px;'>Course:</h5> <p style='margin-top: -45px;padding-left: 125px;'>$assign_course_login </p> \n\n");
              
                if ($assign_notes_login != '') {
                  echo nl2br("<p style='margin-top: -35px;padding-left: 45px;'>Notes: $assign_notes_login </p> \n\n");
                }
              }
          } else {
            echo "No assignments yet!";
          }
          // Free result set
          mysqli_free_result($result_current_assignments);
          }
        ?>
    </div> 


    <div class="home-group">
        <h3 class="home-title">Today's Tasks</h3>

          <?php

          // task variables
          $title = $_POST['Title'];
          $status = $_POST['Status'];
          $start = $_POST['Start'];
          $description = $_POST['Description'];
          $end = $_POST['End'];

          $temp_tasks = $_SESSION['v_num'];

          $sql_current_tasks = "CALL get_todays_tasks('$temp_tasks')";

          // $sql_current_tasks_not_recurring = "CALL create_todays_not_recurring_tasks('$temp_tasks');";
          if ($result_current_tasks = mysqli_query($link,$sql_current_tasks)) {

              // Return the number of rows in result set
              $rowcount_current_tasks = mysqli_num_rows($result_current_tasks);

              //if there is a row
              if($rowcount_current_tasks > 0) { 

              // output data of each row
              while($row_current_tasks = $result_current_tasks->fetch_assoc()) {
                
                $title = $row_current_tasks['task_title'];
                $date_of = $row_current_tasks['date_of'];
                $task_description = $row_current_tasks['task_description'];
                $task_status = $row_current_tasks['task_status'];
                $task_recurring = $row_current_tasks['task_recurring'];
                $start = $row_current_tasks['start_date'];
                $end = $row_current_tasks['end_date'];
                $type = $row_current_tasks['task_type'];
                $location = $row_current_tasks['task_location'];
                $course = $row_current_tasks['task_course'];


                //check if it is recurring or not
                if($task_recurring == NULL){
                  echo nl2br("<h4 style='margin-bottom: 0px;margin-top: 0px;padding-left: 20px;'>Do Today: <div id='littleTitle'>$title</div></h4> \n\n");
                                
                  //null check
                  if ($course != '') {
                    echo nl2br("<h5 style='font-size: medium;margin-top: -35px;padding-left: 45px;'>Course: </h5> <p style='margin-top: -44.5px;padding-left: 130px;'>$course </p> \n\n");
                  }
                  if ($type != '') {
                    echo nl2br("<h5 style='font-size: medium;margin-top: -35px;padding-left: 45px;'>Type: </h5> <p style='margin-top: -44.5px;padding-left: 130px;'>$type </p> \n\n");
                  }
              
                  if ($task_status != '') {
                    echo nl2br("<h5 style='font-size: medium;margin-top: -35px;padding-left: 45px;'>Status: </h5> <p style='margin-top: -44.5px;padding-left: 130px;'>$task_status </p> \n\n");
                  }
              
                  if ($location != '') {
                    echo nl2br("<h5 style='font-size: medium;margin-top: -35px;padding-left: 45px;'>Location: </h5> <p style='margin-top: -44.5px;padding-left: 130px;'>$location </p> \n\n");
                  }
                                
                  if ($task_description != '') {
                     echo nl2br("<p style='margin-top: -35px;padding-left: 45px;'>$task_description </p> \n\n");
                  }
                }

                if($task_recurring == 'Recurring'){
                  echo nl2br("<h4 style='margin-bottom: 0px;margin-top: 0px;padding-left: 20px;'>Recurring:  <div id='littleTitle'>$title</div></h4>\n\n");
                  
                    //null check
                    if ($course != '') {
                      echo nl2br("<h5 style='font-size: medium;margin-top: -35px;padding-left: 45px;'>Course: </h5> <p style='margin-top: -44.5px;padding-left: 130px;'>$course </p> \n\n");
                    }
                    if ($type != '') {
                      echo nl2br("<h5 style='font-size: medium;margin-top: -35px;padding-left: 45px;'>Type: </h5> <p style='margin-top: -44.5px;padding-left: 130px;'>$type </p> \n\n");
                    }
                    
                    if ($task_status != '') {
                      echo nl2br("<h5 style='font-size: medium;margin-top: -35px;padding-left: 45px;'>Status: </h5> <p style='margin-top: -44.5px;padding-left: 130px;'>$task_status </p> \n\n");
                    }
                  
                    if( $start != ''){
                      echo nl2br("<h5 style='margin-top: -40px;padding-left: 45px;font-size: medium;'>Start Date:</h5>
                                <p style='margin-top: -63px;padding-left: 130px;'> $start </p> \n\n");
                    }

                    if( $end != ''){
                      echo nl2br("<h5 style='margin-top: -40px;padding-left: 45px;font-size: medium;'>End Date:</h5>
                                <p style='margin-top: -63px;padding-left: 130px;'> $end </p> \n\n");
                    }
                  
                    if ($location != '') {
                      echo nl2br("<h5 style='font-size: medium;margin-top: -35px;padding-left: 45px;'>Location: </h5> <p style='margin-top: -44.5px;padding-left: 130px;'>$location </p> \n\n");
                    }
                        
                    if ($task_description != '') {
                      echo nl2br("<p style='margin-top: -35px;padding-left: 45px;'>$task_description </p> \n\n");
                    }
               }
               }
          } else {
            echo "No Tasks Today, Enjoy!";
          }
          // Free result set
          mysqli_free_result($result_current_recurring_tasks);
          }
          // else {
          //   printf("error: %s\n", mysqli_error($link));
          // }
        ?>
    </div>
    </div>
</body>
</html>

<?php
  mysqli_close($link);
?>