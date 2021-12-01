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
                        echo($finalGPA);
                    }
                } 
                
                else {
                echo "No Courses!";
            }
            // Free result set
            mysqli_free_result($row_current_course);
            }
                    
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }

        mysqli_close($link);
        ?>
        
    <?php
             $get_v = $_SESSION['v_num'];

            //see if the v_num exists
            $sql =  "SELECT * FROM Course WHERE v_number='$get_v'";

            if ($course = mysqli_query($link,$sql)) {
                
                // Return the number of rows in result set
                $rowcount_course = mysqli_num_rows($course);
                
                //if there is a row
                if($rowcount_course> 0) {

                    // output data of each row
                    while($row_current_course= $course->fetch_assoc()) {

                        //save variables in the case of wanting to edit
                        $course_crn = $row_current_course['crn'];
                        $course_num = $row_current_course['course_num'];
                        $course_name = $row_current_course['course_name'];
                        $course_section = $row_current_course['section_num'];
                        $course_grade = $row_current_course['grade'];
                
                    
                    echo nl2br("<div class='course'><h2 style='margin-bottom: -10px;'> Course $course_name: </h2> <div id='grades'><h3>$course_grade</h3></div>\n\n");

                    if($course_section==1){
                        echo nl2br("<h4>$course_num-001 $course_crn</h4>\n\n");
                    }else{
                        echo nl2br("<h4>$course_num-$course_section $course_crn</h4>\n\n");
                    }
                }
           
                    echo "<form action='./viewGrades.php' method='POST'>                         
                         <button type='submit' class='btn' id='viewAll' style='position: relative;left: 30%; margin-top: 15px;'>Go Back To Grades</button>
                        </form>";
                     echo "<br>";
   
                } 
                
                else {
                echo "No Courses!";
            }
            // Free result set
            mysqli_free_result($row_current_course);
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