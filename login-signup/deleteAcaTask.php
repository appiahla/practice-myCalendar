<?php

    session_start();
    
    $db_host = 'team2-database.cstfewbdata2.us-east-1.rds.amazonaws.com';
    $db_user = 'admin';
    $db_pass = 'databasegroup';
    $db_name = 'groupMyCalendar';
    $db_port = '3306';

    $link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name", "$db_port");

    $delete_taskA_id = $_POST['taskA_id'];

    // Check connection
    if (!$link) {
            
        //kill the connection
        die("Connection failed:" .mysqli_connect_error());
    }

        $get_v = $_SESSION['v_num'];

        //see if the v_num exists
        $sql =  "DELETE FROM AcademicTask WHERE task_id='$delete_taskA_id' AND v_number='$get_v'";

        if (mysqli_query($link,$sql)) {
            echo("Deleted");
        }
                
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }

    mysqli_close($link);
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
    <h2 class="title">Your Academic Tasks</h2>
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

            $sql =  "SELECT * FROM AcademicTask WHERE v_number='$get_v'";

            if ($taskA = mysqli_query($link,$sql)) {
                
                // Return the number of rows in result set
                $rowcount_taskA = mysqli_num_rows($taskA);
                
                //if there is a row
                if($rowcount_taskA > 0) { 

                    // output data of each row
                    while($row_current_taskA = $taskA->fetch_assoc()) {

                        //save variables in the case of wanting to edit
                        $taskA_id = $row_current_taskA['task_id'];
                        $taskA_title = $row_current_taskA['task_title'];
                        $taskA_course = $row_current_taskA['task_course'];
                        $taskA_description = $row_current_taskA['task_description'];
                        $taskA_date = $row_current_taskA['date_of'];
                        $taskA_status = $row_current_taskA['task_status'];


                        $taskA_recurring = $row_current_taskA['task_recurring'];
                        $taskA_monday= $row_current_taskA['recurringMon'];
                        $taskA_tuesday= $row_current_taskA['recurringTues'];
                        $taskA_wednesday= $row_current_taskA['recurringWed'];
                        $taskA_thursday= $row_current_taskA['recurringThurs'];
                        $taskA_friday= $row_current_taskA['recurringFri'];
                        $taskA_saturday= $row_current_taskA['recurringSat'];
                        $taskA_sunday= $row_current_taskA['recurringSun'];
                        $taskA_start= $row_current_taskA['start_date'];
                        $taskA_end= $row_current_taskA['end_date'];

                    // show the title
                    echo nl2br("<h4> Task Title:</h4>  $taskA_title\n\n");

                    // check for null
                    if ($taskA_course != '') {

                    echo nl2br("<h4> Task Course:</h4>  $taskA_course\n\n");

                    }
                    
                    if ($taskA_description != ''){
                    echo nl2br("<h4> Task Description:</h4>  $taskA_description\n\n");
                    }

                    if ($taskA_date != '') {

                    echo nl2br("<h4> Task Date:</h4>  $taskA_date\n\n");

                    }
                    
                    if ($taskA_status != ''){

                    echo nl2br("<h4> Task Status:</h4>  $taskA_status\n\n");

                    }

                    //check if the task is recurring
                    if ($taskA_recurring != ''){

                    echo nl2br("<h4>Task is Recurring on: </h4>\n\n");


                    if ($taskA_monday != ''){
                        
                        echo nl2br("$taskA_monday\n\n");
                    
                    }

                    if ($taskA_tuesday != ''){
                        
                        echo nl2br("$taskA_tuesday\n\n");

                    }
                    
                    if ($taskA_wednesday != ''){

                        echo nl2br("$taskA_wednesday\n\n");

                    }

                    if ($taskA_thursday != ''){

                        echo nl2br("$taskA_thursday\n\n");

                    }
                    
                    if ($taskA_friday != ''){

                        echo nl2br("$taskA_friday\n\n");
                    }

                    if ($taskA_saturday != ''){

                        echo nl2br("$taskA_saturday\n\n");
                    }

                    if ($taskA_sunday != ''){
                        
                        echo nl2br("$taskA_sunday\n\n");

                    }
                    
                    echo nl2br("<h4>Staring on: </h4>  $taskA_start\n\n");
                    echo nl2br("<h4>Ending on: </h4>   $taskA_end\n\n");
                    }

                    echo "<form action='./editAcademicTask.php' method='POST'>
                            <input type='hidden' name='taskA_id' value='$taskA_id'>
                            <input type='hidden' name='taskA_title' value='$taskA_title'>
                            <input type='hidden' name='taskA_course' value='$taskA_course'>
                            <input type='hidden' name='taskA_description' value='$taskA_description'>
                            <input type='hidden' name='taskA_date' value='$taskA_date'>
                            <input type='hidden' name='taskA_status' value='$taskA_status'>
                            <input type='hidden' name='taskA_recurring' value='$taskA_recurring'>
                            <input type='hidden' name='taskA_monday' value='$taskA_monday'>
                            <input type='hidden' name='taskA_tuesday' value='$taskA_tuesday'>
                            <input type='hidden' name='taskA_wednesday' value='$taskA_wednesday'>
                            <input type='hidden' name='taskA_thursday' value='$taskA_thursday'>
                            <input type='hidden' name='taskA_friday' value='$taskA_friday'>
                            <input type='hidden' name='taskA_saturday' value='$taskA_saturday'>
                            <input type='hidden' name='taskA_sunday' value='$taskA_sunday'>
                            <input type='hidden' name='taskA_start' value='$taskA_start'>
                            <input type='hidden' name='taskA_end' value='$taskA_end'>
                
                            <button type='submit' class='btn' id='viewAll'>Edit</button>
                        </form>";
                        echo "<br>";
                      
                      echo "<form action='./deleteAcaTask.php' method='POST' id='deleteBtn'>
                        <input type='hidden' name='taskA_id' value='$taskA_id'>
                      
                        <button type='submit' class='btn'>Delete</button>
                      </form>";
                    }
                } else {
                echo "No Academic Tasks yet!";
            }
            // Free result set
            mysqli_free_result($row_current_taskA);
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