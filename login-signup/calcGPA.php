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
    <h2 class="title">Your Grades</h2>
    <div class="mytabs">

    <?php
            $get_v = $_SESSION['v_num'];

            //see if the v_num exists
            $sql =  "SELECT AVG(grade) as avg_grade, SUM(credit) as total_credit FROM Course WHERE v_number='$get_v'";

            if ($course = mysqli_query($link,$sql)) {
                
                // Return the number of rows in result set
                $rowcount_course = mysqli_num_rows($course);
                
                //if there is a row
                if($rowcount_course> 0) {

                    // output data of each row
                    while($row_current_course= $course->fetch_assoc()) {

                        $course_total_grade = $row_current_course['avg_grade'];
                        $course_total_credit = $row_current_course['total_credit'];
                        
                        $finalGPA = ($course_total_grade*$course_total_credit)/$course_total_credit;


                        if (93 <= $finalGPA){
                            echo nl2br("<div class='course'><h2 style='margin-bottom: -10px; text-align: center;'> Your Semester GPA is: 4.0!</h2>\n\n");
                        }
                        else if (90 <= $finalGPA){
                            echo nl2br("<div class='course'><h2 style='margin-bottom: -10px; text-align: center;'> Your Semester GPA is: 3.7!</h2>\n\n");
                        }
                        else if (87 <= $finalGPA){
                            echo nl2br("<div class='course'><h2 style='margin-bottom: -10px; text-align: center;'> Your Semester GPA is: 3.3!</h2>\n\n");
                        }
                        else if (83 <= $finalGPA){
                            echo nl2br("<div class='course'><h2 style='margin-bottom: -10px; text-align: center;'> Your Semester GPA is: 3.0!</h2>\n\n");
                        }
                        else if (80 <= $finalGPA){
                            echo nl2br("<div class='course'><h2 style='margin-bottom: -10px; text-align: center;'> Your Semester GPA is: 2.7!</h2>\n\n");
                        }
                        else if (77 <= $finalGPA){
                            echo nl2br("<div class='course'><h2 style='margin-bottom: -10px; text-align: center;'> Your Semester GPA is: 2.3!</h2>\n\n");
                        }
                        else if (73 <= $finalGPA){
                            echo nl2br("<div class='course'><h2 style='margin-bottom: -10px; text-align: center;'> Your Semester GPA is: 2.0!</h2>\n\n");
                        }
                        else if (70 <= $finalGPA){
                            echo nl2br("<div class='course'><h2 style='margin-bottom: -10px; text-align: center;'> Your Semester GPA is: 1.7!</h2>\n\n");
                        }
                        else if (67 <= $finalGPA){
                            echo nl2br("<div class='course'><h2 style='margin-bottom: -10px; text-align: center;'> Your Semester GPA is: 1.3!</h2>\n\n");
                        }
                        else if (65 <= $finalGPA){
                            echo nl2br("<div class='course'><h2 style='margin-bottom: -10px; text-align: center;'> Your Semester GPA is: 1.0!</h2>\n\n");
                        }
                        else if ($finalGPA > 65){
                            echo nl2br("<div class='course'><h2 style='margin-bottom: -10px; text-align: center;'> Your Semester GPA is: 0.0!</h2>\n\n");
                        }
                    }
                    echo "<form action='./viewGrades.php' method='POST'>                         
                        <button type='submit' class='btn' id='viewAll' style='position: relative;left: 35%; margin-top: 15px;'>Go Back To Grades</button>
                        </form>";
                        echo "<br>";
                } 
                
                else {
                echo "No Courses!";
            }
            // Free result set
            mysqli_free_result($row_current_course);
            }
                    
        mysqli_close($link);
        ?>
    </div>
  </div>
</div>
</body>
</html>