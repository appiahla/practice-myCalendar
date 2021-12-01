<?php

    session_start();
    
    $db_host = 'team2-database.cstfewbdata2.us-east-1.rds.amazonaws.com';
    $db_user = 'admin';
    $db_pass = 'databasegroup';
    $db_name = 'groupMyCalendar';
    $db_port = '3306';

    $link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name", "$db_port");

    $delete_assessmentT_id = $_POST['assessmentT_id'];

    // Check connection
    if (!$link) {
            
        //kill the connection
        die("Connection failed:" .mysqli_connect_error());
    }

        $get_v = $_SESSION['v_num'];

        //see if the v_num exists
        $sql =  "DELETE FROM Assessment WHERE assessment_id='$delete_assessmentT_id' AND assessment_type='Test' AND assessment_v_number='$get_v'";

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
  <body>
<div id="day-view-container">
  <div id="input-field">
    <h2 class="title">Your Tests</h2>
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
                $sql =  "SELECT * FROM Assessment WHERE assessment_type='Test' AND assessment_v_number='$get_v'";

                if ($assessmentsT = mysqli_query($link,$sql)) {
                    
                    // Return the number of rows in result set
                    $rowcount_assessmentsT = mysqli_num_rows($assessmentsT);
                    
                    //if there is a row
                    if($rowcount_assessmentsT > 0) {

                        // output data of each row
                        while($row_current_assessmentsT = $assessmentsT->fetch_assoc()) {

                            //save variables in the case of wanting to edit
                            $assessmentT_id = $row_current_assessmentsT['assessment_id'];
                            $assessmentT_title = $row_current_assessmentsT['assessment_title'];
                            $assessmentT_date = $row_current_assessmentsT['date_of'];
                            $assessmentT_course = $row_current_assessmentsT['course_name_assessment'];
                            $assessmentT_material = $row_current_assessmentsT['material'];
                            $assessmentT_notes= $row_current_assessmentsT['notes'];

                            echo nl2br("<h4> Test Title:</h4>  $assessmentT_title\n\n");
                        
                            echo nl2br("<h4> Test Course:</h4>  $assessmentT_course\n\n");
                                        
                            if ($assessmentT_date != ''){
                                        
                                echo nl2br("<h4> Test Date:</h4>  $assessmentT_date\n\n");
                                        
                            }
                    
                            if ($assessmentT_material != '') {
                    
                                echo nl2br("<h4> Test Material:</h4>  $assessmentT_material\n\n");
    
                            }
                                    
                            if ($assessmentT_notes != ''){
                    
                                echo nl2br("<h4> Test Notes:</h4>  $assessmentT_notes\n\n");
                    
                            }

                        echo "<form action='./editTest.php' method='POST'>
                                <input type='hidden' name='assessmentT_id' value='$assessmentT_id'>
                                <input type='hidden' name='assessmentT_title' value='$assessmentT_title'>
                                <input type='hidden' name='assessmentT_date' value='$assessmentT_date'>
                                <input type='hidden' name='assessmentT_course' value='$assessmentT_course'>
                                <input type='hidden' name='assessmentT_material' value='$assessmentT_material'>
                                <input type='hidden' name='assessmentT_notes' value='$assessmentT_notes'>
                    
                                <button type='submit' class='btn' id='viewAll'>Edit</button>
                            </form>";
                          echo "<br>";

                          echo "<form action='./deleteTest.php' method='POST' id='deleteBtnD'>
                                <input type='hidden' name='assessmentT_id' value='$assessmentT_id'>
                              
                                <button type='submit' class='btn'>Delete</button>
                            </form>";
                          
                        }
                    } else {
                    echo "No Tests yet!";
                }
                // Free result set
                mysqli_free_result($row_current_assessmentsT);
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

