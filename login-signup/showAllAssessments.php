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
  <body>
<div id="day-view-container">
  <div id="input-field">
    <h2 class="title">Your Assessments</h2>
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
            $sql =  "SELECT * FROM Assessment WHERE assessment_v_number='$get_v'";

            if ($assessment = mysqli_query($link,$sql)) {
                
                // Return the number of rows in result set
                $rowcount_assessments= mysqli_num_rows($assessment);
                
                //if there is a row
                if($rowcount_assessments> 0) {

                    // output data of each row
                    while($row_current_assessments = $assessment->fetch_assoc()) {

                        //save variables in the case of wanting to edit
                        $assessment_id = $row_current_assessments['assessment_id'];
                        $assessment_type = $row_current_assessments['assessment_type'];
                        $assessment_title = $row_current_assessments['assessment_title'];
                        $assessment_date = $row_current_assessments['date_of'];
                        $assessment_course = $row_current_assessments['course_name_assessment'];
                        $assessment_material = $row_current_assessments['material'];
                        $assessment_notes= $row_current_assessments['notes'];


                    // check to see if it is a quiz or test
                    if($assessment_type=='Test') {
                        echo nl2br("<h3>Test</h3>\n\n");
                        echo nl2br("<h4> Test Title:</h4>  $assessment_title\n\n");
                        
                        echo nl2br("<h4> Test Course:</h4>  $assessment_course\n\n");
                                    
                        if ($assessment_date != ''){
                                    
                            echo nl2br("<h4> Test Date:</h4>  $assessment_date\n\n");
                                    
                        }
                
                        if ($assessment_material != '') {
                
                            echo nl2br("<h4> Test Material:</h4>  $assessment_material\n\n");

                        }
                                
                        if ($assessment_notes != ''){
                
                            echo nl2br("<h4> Test Notes:</h4>  $assessment_notes\n\n");
                
                        }

                        echo "<form action='./editTest.php' method='POST'>
                                <input type='hidden' name='assessmentT_id' value='$assessment_id'>
                                <input type='hidden' name='assessmentT_title' value='$assessment_title'>
                                <input type='hidden' name='assessmentT_date' value='$assessment_date'>
                                <input type='hidden' name='assessmentT_course' value='$assessment_course'>
                                <input type='hidden' name='assessmentT_material' value='$assessment_material'>
                                <input type='hidden' name='assessmentT_notes' value='$assessment_notes'>
                    
                                <button type='submit' class='btn' id='viewAll'>Edit</button>
                            </form>";
                          echo "<br>";

                          echo "<form action='./deleteTest.php' method='POST' id='deleteBtn'>
                                <input type='hidden' name='assessmentT_id' value='$assessment_id'>
                              
                                <button type='submit' class='btn'>Delete</button>
                            </form>";
                    }

                    if($assessment_type=='Quiz') {
                        echo nl2br("<h3>Quiz</h3>\n\n");
                        echo nl2br("<h4> Quiz Title:</h4>  $assessment_title\n\n");

                        echo nl2br("<h4> Quiz Course:</h4>  $assessment_course\n\n");
                        
                        if ($assessment_date != ''){
                        
                        echo nl2br("<h4> Quiz Date:</h4>  $assessment_date\n\n");
                        
                        }
    
                        if ($assessment_material != '') {
    
                        echo nl2br("<h4> Quiz Material:</h4>  $assessment_material\n\n");
    
                        }
                        
                        if ($assessment_notes != ''){
    
                        echo nl2br("<h4> Quiz Notes:</h4>  $assessment_notes\n\n");
    
                        }

                        echo "<form action='./editQuiz.php' method='POST'>
                            <input type='hidden' name='assessmentQ_id' value='$assessment_id'>
                            <input type='hidden' name='assessmentQ_title' value='$assessment_title'>
                            <input type='hidden' name='assessmentQ_date' value='$assessment_date'>
                            <input type='hidden' name='assessmentQ_course' value='$assessment_course'>
                            <input type='hidden' name='assessmentQ_material' value='$assessment_material'>
                            <input type='hidden' name='assessmentQ_notes' value='$assessment_notes'>
                
                            <button type='submit' class='btn' id='viewAll'>Edit</button>
                        </form>";
                         echo "<br>";

                         echo "<form action='./deleteQuiz.php' method='POST' id='deleteBtn'>
                            <input type='hidden' name='assessmentQ_id' value='$assessment_id'>
                  
                            <button type='submit' class='btn'>Delete</button>
                        </form>";  
                    }
                }
                } else {
                echo "No Assessments yet!";
            }
            // Free result set
            mysqli_free_result($row_current_assessments);
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