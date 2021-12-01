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
    <h2 class="title">Your Assignments</h2>
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
            $sql =  "SELECT * FROM Assignment WHERE assignment_v_number='$get_v'";

            if ($assignments = mysqli_query($link,$sql)) {
                
                // Return the number of rows in result set
                $rowcount_assignments = mysqli_num_rows($assignments);
                
                //if there is a row
                if($rowcount_assignments > 0) { 

                    // output data of each row
                    while($row_current_assignments = $assignments->fetch_assoc()) {

                        //save variables in the case of wanting to edit
                        $assignment_id = $row_current_assignments['assignment_id'];
                        $assignment_title = $row_current_assignments['assignment_title'];
                        $assignment_date = $row_current_assignments['due_date'];
                        $assignment_course = $row_current_assignments['course_name_assignment'];
                        $assignment_description = $row_current_assignments['description_section'];
                        $assignment_notes= $row_current_assignments['notes'];

                    //show the title
                    echo nl2br("<h4> Assignment Title:</h4>  $assignment_title\n\n");

                    //show the course
                    echo nl2br("<h4> Assignment Course:</h4>  $assignment_course\n\n");


                    if ($assignment_date != ''){
                    
                      echo nl2br("<h4> Assignment Date:</h4>  $assignment_date\n\n");
                      
                    }
  
                    if ($assignment_description != '') {
  
                      echo nl2br("<h4> Assignment Description:</h4>  $assignment_description\n\n");
  
                    }
                      
                    if ($assignment_notes != ''){
  
                      echo nl2br("<h4> Assignment Notes:</h4>  $assignment_notes\n\n");
  
                    }

                    echo "<form action='./editAssignment.php' method='POST'>
                            <input type='hidden' name='assignment_id' value='$assignment_id'>
                            <input type='hidden' name='assignment_title' value='$assignment_title'>
                            <input type='hidden' name='assignment_date' value='$assignment_date'>
                            <input type='hidden' name='assignment_course' value='$assignment_course'>
                            <input type='hidden' name='assignment_description' value='$assignment_description'>
                            <input type='hidden' name='assignment_notes' value='$assignment_notes'>
                
                            <button type='submit' class='btn' id='viewAll'>Edit</button>
                        </form>";
                        echo "<br>";

                    echo "<form action='./deleteAssignment.php' method='POST' id='deleteBtn'>
                        <input type='hidden' name='assignment_id' value='$assignment_id'>
                      
                        <button type='submit' class='btn'>Delete</button>
                      </form>";
                    }
                } else {
                echo "No Assignments yet!";
            }
            // Free result set
            mysqli_free_result($row_current_assignments);
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