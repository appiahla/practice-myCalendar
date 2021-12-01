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
    <h2 class="title">Your Tasks</h2>
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


            $get_v = $_SESSION['v_num'];

            //see if the v_num exists
            $sql =  "SELECT task_id, task_title, task_type, task_course, NULL as task_with, NULL as task_location, task_description, date_of, task_status, task_recurring, recurringMon, recurringTues, recurringWed, recurringThurs, recurringFri, recurringSat, recurringSun, start_date, end_date
                        FROM AcademicTask
                    UNION 
                     SELECT task_id, task_title, task_type, NULL as task_course, task_with, task_location, task_description, date_of, task_status, task_recurring, recurringMon, recurringTues, recurringWed, recurringThurs, recurringFri, recurringSat, recurringSun, start_date, end_date
                        FROM PersonalTask
                     WHERE v_number='$get_v'";

            if ($tasks = mysqli_query($link,$sql)) {
                
                // Return the number of rows in result set
                $rowcount_tasks = mysqli_num_rows($tasks);
                
                //if there is a row
                if($rowcount_tasks > 0) { 

                    // output data of each row
                    while($row_current_tasks= $tasks->fetch_assoc()) {

                        //save variables in the case of wanting to edit
                        //save variables in the case of wanting to edit
                        $task_id = $row_current_tasks['task_id'];
                        $task_type = $row_current_tasks['task_type'];
                        $task_title = $row_current_tasks['task_title'];
                        $task_course = $row_current_tasks['task_course'];
                        $task_with = $row_current_tasks['task_with'];
                        $task_location = $row_current_tasks['task_location'];
                        $task_description = $row_current_tasks['task_description'];
                        $task_date = $row_current_tasks['date_of'];
                        $task_status = $row_current_tasks['task_status'];


                        $task_recurring = $row_current_tasks['task_recurring'];
                        $task_monday= $row_current_tasks['recurringMon'];
                        $task_tuesday= $row_current_tasks['recurringTues'];
                        $task_wednesday= $row_current_tasks['recurringWed'];
                        $task_thursday= $row_current_tasks['recurringThurs'];
                        $task_friday= $row_current_tasks['recurringFri'];
                        $task_saturday= $row_current_tasks['recurringSat'];
                        $task_sunday= $row_current_tasks['recurringSun'];
                        $task_start= $row_current_tasks['start_date'];
                        $task_end= $row_current_tasks['end_date'];

                    //check to see if it is personal or academic
                    if($task_type == 'Personal') {
                        echo nl2br("<h3>Personal</h3>\n\n");
                         // show the title
                       echo nl2br("<h3> Task Title:</h3>  $task_title\n\n");

                       // check for null
                       if ($task_with != '') {
   
                       echo nl2br("<h3> With:</h3>  $task_with\n\n");
   
                       }
   
                       if ($task_location != '') {
   
                           echo nl2br("<h3> Task Location:</h3>  $task_location\n\n");
               
                           }
                       
                       if ($task_description != ''){
                           
                           echo nl2br("<h3> Task Description:</h3>  $task_description\n\n");
                       
                       }
   
                       if ($task_date != '') {
   
                           echo nl2br("<h3> Task Date:</h3>  $task_date\n\n");
   
                       }
                       
                       if ($task_status != ''){
   
                           echo nl2br("<h3> Task Status:</h3>  $task_status\n\n");
   
                       }
   
                       //check if the task is recurring
                       if ($task_recurring != ''){
   
                           echo nl2br("<h3>Task is Recurring on: </h3>\n\n");
   
   
                           if ($task_monday != ''){
                               
                               echo nl2br("$task_monday\n\n");
                           
                           }
   
                           if ($task_tuesday != ''){
                               
                               echo nl2br("$task_tuesday\n\n");
   
                           }
                           
                           if ($task_wednesday != ''){
   
                               echo nl2br("$task_wednesday\n\n");
   
                           }
   
                           if ($task_thursday != ''){
   
                               echo nl2br("$task_thursday\n\n");
   
                           }
                           
                           if ($task_friday != ''){
   
                               echo nl2br("$task_friday\n\n");
                           }
   
                           if ($task_saturday != ''){
   
                               echo nl2br("$task_saturday\n\n");
                           }
   
                           if ($task_sunday != ''){
                               
                               echo nl2br("$task_sunday\n\n");
   
                           }
                           
                           echo nl2br("<h4>Staring on: </h4>  $task_start\n\n");
                           echo nl2br("<h4>Ending on: </h4>   $task_end\n\n");
                       }

                    echo "<form action='./editPersonalTask.php' method='POST'>
                            <input type='hidden' name='taskP_id' value='$task_id'>
                            <input type='hidden' name='taskP_title' value='$task_title'>
                            <input type='hidden' name='taskP_with' value='$task_with'>
                            <input type='hidden' name='taskP_location' value='$task_location'>
                            <input type='hidden' name='taskP_description' value='$task_description'>
                            <input type='hidden' name='taskP_date' value='$task_date'>
                            <input type='hidden' name='taskP_status' value='$task_status'>
                            <input type='hidden' name='taskP_recurring' value='$task_recurring'>
                            <input type='hidden' name='taskP_monday' value='$task_monday'>
                            <input type='hidden' name='taskP_tuesday' value='$task_tuesday'>
                            <input type='hidden' name='taskP_wednesday' value='$task_wednesday'>
                            <input type='hidden' name='taskP_thursday' value='$task_thursday'>
                            <input type='hidden' name='taskP_friday' value='$task_friday'>
                            <input type='hidden' name='taskP_saturday' value='$task_saturday'>
                            <input type='hidden' name='taskP_sunday' value='$task_sunday'>
                            <input type='hidden' name='taskP_start' value='$task_start'>
                            <input type='hidden' name='taskP_end' value='$task_end'>
                
                            <button type='submit' class='btn' id='viewAll'>Edit</button>
                        </form>";
                      echo "<br>";

                      echo "<form action='./deletePersTask.php' method='POST' id='deleteBtn'>
                        <input type='hidden' name='taskP_id' value='$task_id'>
                      
                        <button type='submit' class='btn'>Delete</button>
                      </form>";

                    }

                    if($task_type == 'Academic') {
                        echo nl2br("<h3>Academic</h3>\n\n");
                        // show the title
                        echo nl2br("<h4> Task Title:</h4>  $task_title\n\n");

                        // check for null
                        if ($task_course != '') {

                        echo nl2br("<h4> Task Course:</h4>  $task_course\n\n");

                        }
                        
                        if ($task_description != ''){
                        echo nl2br("<h4> Task Description:</h4>  $task_description\n\n");
                        }

                        if ($task_date != '') {

                        echo nl2br("<h4> Task Date:</h4>  $task_date\n\n");

                        }
                        
                        if ($task_status != ''){

                        echo nl2br("<h4> Task Status:</h4>  $task_status\n\n");

                        }

                        //check if the task is recurring
                        if ($task_recurring != ''){

                        echo nl2br("<h4>Task is Recurring on: </h4>\n\n");


                        if ($task_monday != ''){
                            
                            echo nl2br("$task_monday\n\n");
                        
                        }

                        if ($task_tuesday != ''){
                            
                            echo nl2br("$task_tuesday\n\n");

                        }
                        
                        if ($task_wednesday != ''){

                            echo nl2br("$task_wednesday\n\n");

                        }

                        if ($task_thursday != ''){

                            echo nl2br("$task_thursday\n\n");

                        }
                        
                        if ($task_friday != ''){

                            echo nl2br("$task_friday\n\n");
                        }

                        if ($task_saturday != ''){

                            echo nl2br("$task_saturday\n\n");
                        }

                        if ($task_sunday != ''){
                            
                            echo nl2br("$task_sunday\n\n");

                        }
                        
                        echo nl2br("<h4>Staring on: </h4>  $task_start\n\n");
                        echo nl2br("<h4>Ending on: </h4>   $task_end\n\n");
                        }

                        echo "<form action='./editAcademicTask.php' method='POST'>
                                <input type='hidden' name='taskA_id' value='$task_id'>
                                <input type='hidden' name='taskA_title' value='$task_title'>
                                <input type='hidden' name='taskA_course' value='$task_course'>
                                <input type='hidden' name='taskA_description' value='$task_description'>
                                <input type='hidden' name='taskA_date' value='$task_date'>
                                <input type='hidden' name='taskA_status' value='$task_status'>
                                <input type='hidden' name='taskA_recurring' value='$task_recurring'>
                                <input type='hidden' name='taskA_monday' value='$task_monday'>
                                <input type='hidden' name='taskA_tuesday' value='$task_tuesday'>
                                <input type='hidden' name='taskA_wednesday' value='$task_wednesday'>
                                <input type='hidden' name='taskA_thursday' value='$task_thursday'>
                                <input type='hidden' name='taskA_friday' value='$task_friday'>
                                <input type='hidden' name='taskA_saturday' value='$task_saturday'>
                                <input type='hidden' name='taskA_sunday' value='$task_sunday'>
                                <input type='hidden' name='taskA_start' value='$task_start'>
                                <input type='hidden' name='taskA_end' value='$task_end'>
                    
                                <button type='submit' class='btn' id='viewAll'>Edit</button>
                            </form>";
                            echo "<br>";
                        
                        echo "<form action='./deleteAcaTask.php' method='POST' id='deleteBtn'>
                            <input type='hidden' name='taskA_id' value='$task_id'>
                        
                            <button type='submit' class='btn'>Delete</button>
                        </form>";
                            
                    }
                    }
                } else {
                echo "No Assignments yet!";
            }
            // Free result set
            mysqli_free_result($row_current_tasks);
            }
                    
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }

        mysqli_close($link);

        ?>
        </div>
        </div>
        </div>
</body>
</html>