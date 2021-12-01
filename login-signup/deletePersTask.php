<?php

    session_start();
    
    $db_host = 'team2-database.cstfewbdata2.us-east-1.rds.amazonaws.com';
    $db_user = 'admin';
    $db_pass = 'databasegroup';
    $db_name = 'groupMyCalendar';
    $db_port = '3306';

    $link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name", "$db_port");

    $delete_taskP_id = $_POST['taskP_id'];

    // Check connection
    if (!$link) {
            
        //kill the connection
        die("Connection failed:" .mysqli_connect_error());
    }

        $get_v = $_SESSION['v_num'];

        //see if the v_num exists
        $sql =  "DELETE FROM PersonalTask WHERE task_id='$delete_taskP_id' AND v_number='$get_v'";

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
    <h2 class="title">Your Personal Tasks</h2>
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

            $sql =  "SELECT * FROM PersonalTask WHERE v_number='$get_v'";

            if ($taskP = mysqli_query($link,$sql)) {
                
                // Return the number of rows in result set
                $rowcount_taskP = mysqli_num_rows($taskP);
                
                //if there is a row
                if($rowcount_taskP > 0) { 

                    // output data of each row
                    while($row_current_taskP = $taskP->fetch_assoc()) {

                        //save variables in the case of wanting to edit
                        $taskP_id = $row_current_taskP['task_id'];
                        $taskP_title = $row_current_taskP['task_title'];
                        $taskP_with = $row_current_taskP['task_with'];
                        $taskP_location = $row_current_taskP['task_location'];
                        $taskP_description = $row_current_taskP['task_description'];
                        $taskP_date = $row_current_taskP['date_of'];
                        $taskP_status = $row_current_taskP['task_status'];


                        $taskP_recurring = $row_current_taskP['task_recurring'];
                        $taskP_monday= $row_current_taskP['recurringMon'];
                        $taskP_tuesday= $row_current_taskP['recurringTues'];
                        $taskP_wednesday= $row_current_taskP['recurringWed'];
                        $taskP_thursday= $row_current_taskP['recurringThurs'];
                        $taskP_friday= $row_current_taskP['recurringFri'];
                        $taskP_saturday= $row_current_taskP['recurringSat'];
                        $taskP_sunday= $row_current_taskP['recurringSun'];
                        $taskP_start= $row_current_taskP['start_date'];
                        $taskP_end= $row_current_taskP['end_date'];


                    // show the title
                       echo nl2br("<h3> Task Title:</h3>  $taskP_title\n\n");

                       // check for null
                       if ($taskP_with != '') {
   
                       echo nl2br("<h3> With:</h3>  $taskP_with\n\n");
   
                       }
   
                       if ($taskP_location != '') {
   
                           echo nl2br("<h3> Task Location:</h3>  $taskP_location\n\n");
               
                           }
                       
                       if ($taskP_description != ''){
                           
                           echo nl2br("<h3> Task Description:</h3>  $taskP_description\n\n");
                       
                       }
   
                       if ($taskP_date != '') {
   
                           echo nl2br("<h3> Task Date:</h3>  $taskP_date\n\n");
   
                       }
                       
                       if ($taskP_status != ''){
   
                           echo nl2br("<h3> Task Status:</h3>  $taskP_status\n\n");
   
                       }
   
                       //check if the task is recurring
                       if ($taskP_recurring != ''){
   
                           echo nl2br("<h3>Task is Recurring on: </h3>\n\n");
   
   
                           if ($taskP_monday != ''){
                               
                               echo nl2br("$taskP_monday\n\n");
                           
                           }
   
                           if ($taskP_tuesday != ''){
                               
                               echo nl2br("$taskP_tuesday\n\n");
   
                           }
                           
                           if ($taskP_wednesday != ''){
   
                               echo nl2br("$taskP_wednesday\n\n");
   
                           }
   
                           if ($taskP_thursday != ''){
   
                               echo nl2br("$taskP_thursday\n\n");
   
                           }
                           
                           if ($taskP_friday != ''){
   
                               echo nl2br("$taskP_friday\n\n");
                           }
   
                           if ($taskP_saturday != ''){
   
                               echo nl2br("$taskP_saturday\n\n");
                           }
   
                           if ($taskP_sunday != ''){
                               
                               echo nl2br("$taskP_sunday\n\n");
   
                           }
                           
                           echo nl2br("<h4>Staring on: </h4>  $taskP_start\n\n");
                           echo nl2br("<h4>Ending on: </h4>   $taskP_end\n\n");
                       }

                    echo "<form action='./editPersonalTask.php' method='POST'>
                            <input type='hidden' name='taskP_id' value='$taskP_id'>
                            <input type='hidden' name='taskP_title' value='$taskP_title'>
                            <input type='hidden' name='taskP_with' value='$taskP_with'>
                            <input type='hidden' name='taskP_location' value='$taskP_location'>
                            <input type='hidden' name='taskP_description' value='$taskP_description'>
                            <input type='hidden' name='taskP_date' value='$taskP_date'>
                            <input type='hidden' name='taskP_status' value='$taskP_status'>
                            <input type='hidden' name='taskP_recurring' value='$taskP_recurring'>
                            <input type='hidden' name='taskP_monday' value='$taskP_monday'>
                            <input type='hidden' name='taskP_tuesday' value='$taskP_tuesday'>
                            <input type='hidden' name='taskP_wednesday' value='$taskP_wednesday'>
                            <input type='hidden' name='taskP_thursday' value='$taskP_thursday'>
                            <input type='hidden' name='taskP_friday' value='$taskP_friday'>
                            <input type='hidden' name='taskP_saturday' value='$taskP_saturday'>
                            <input type='hidden' name='taskP_sunday' value='$taskP_sunday'>
                            <input type='hidden' name='taskP_start' value='$taskP_start'>
                            <input type='hidden' name='taskP_end' value='$taskP_end'>
                
                            <button type='submit' class='btn' id='viewAll'>Edit</button>
                        </form>";
                      echo "<br>";

                      echo "<form action='./deletePersTask.php' method='POST' id='deleteBtnD'>
                        <input type='hidden' name='taskP_id' value='$taskP_id'>
                      
                        <button type='submit' class='btn'>Delete</button>
                      </form>";
                    }
                } else {
                echo "No Academic Tasks yet!";
            }
            // Free result set
            mysqli_free_result($row_current_taskP);
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