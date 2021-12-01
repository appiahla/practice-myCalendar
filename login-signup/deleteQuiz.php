<?php

    session_start();
    
    $db_host = 'team2-database.cstfewbdata2.us-east-1.rds.amazonaws.com';
    $db_user = 'admin';
    $db_pass = 'databasegroup';
    $db_name = 'groupMyCalendar';
    $db_port = '3306';

    $link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name", "$db_port");

    $delete_assessmentQ_id = $_POST['assessmentQ_id'];

    // Check connection
    if (!$link) {
            
        //kill the connection
        die("Connection failed:" .mysqli_connect_error());
    }

        $get_v = $_SESSION['v_num'];

        //see if the v_num exists
        $sql =  "DELETE FROM Assessment WHERE assessment_id='$delete_assessmentQ_id' AND assessment_type='Quiz' AND assessment_v_number='$get_v'";

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
    <h2 class="title">Your Quizzes</h2>
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
            $sql =  "SELECT * FROM Assessment WHERE assessment_type='Quiz' AND assessment_v_number='$get_v'";

            if ($assessmentsQ = mysqli_query($link,$sql)) {
                
                // Return the number of rows in result set
                $rowcount_assessmentsQ = mysqli_num_rows($assessmentsQ);
                
                //if there is a row
                if($rowcount_assessmentsQ> 0) {

                    // output data of each row
                    while($row_current_assessmentsQ = $assessmentsQ->fetch_assoc()) {

                        //save variables in the case of wanting to edit
                        $assessmentQ_id = $row_current_assessmentsQ['assessment_id'];
                        $assessmentQ_title = $row_current_assessmentsQ['assessment_title'];
                        $assessmentQ_date = $row_current_assessmentsQ['date_of'];
                        $assessmentQ_course = $row_current_assessmentsQ['course_name_assessment'];
                        $assessmentQ_material = $row_current_assessmentsQ['material'];
                        $assessmentQ_notes= $row_current_assessmentsQ['notes'];


                    // show the title
                    echo nl2br("<h4> Quiz Title:</h4>  $assessmentQ_title\n\n");

                    echo nl2br("<h4> Quiz Course:</h4>  $assessmentQ_course\n\n");
                    
                    if ($assessmentQ_date != ''){
                    
                    echo nl2br("<h4> Quiz Date:</h4>  $assessmentQ_date\n\n");
                    
                    }

                    if ($assessmentQ_material != '') {

                    echo nl2br("<h4> Quiz Material:</h4>  $assessmentQ_material\n\n");

                    }
                    
                    if ($assessmentQ_notes != ''){

                    echo nl2br("<h4> Quiz Notes:</h4>  $assessmentQ_notes\n\n");

                    }

                    echo "<form action='./editQuiz.php' method='POST'>
                            <input type='hidden' name='assessmentQ_id' value='$assessmentQ_id'>
                            <input type='hidden' name='assessmentQ_title' value='$assessmentQ_title'>
                            <input type='hidden' name='assessmentQ_date' value='$assessmentQ_date'>
                            <input type='hidden' name='assessmentQ_course' value='$assessmentQ_course'>
                            <input type='hidden' name='assessmentQ_material' value='$assessmentQ_material'>
                            <input type='hidden' name='assessmentQ_notes' value='$assessmentQ_notes'>
                
                            <button type='submit' class='btn' id='viewAll'>Edit</button>
                        </form>";
                        echo "<br>";

                        echo "<form action='./deleteQuiz.php' method='POST'>
                                <input type='hidden' name='assessmentQ_id' value='$assessmentQ_id'>
                      
                                <button type='submit' class='btn' id='deleteBtn'>Delete</button>
                          </form>";
                          echo "<br>";

                    }
                } else {
                echo "No Assessments yet!";
            }
            // Free result set
            mysqli_free_result($row_current_assessmentsQ);
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