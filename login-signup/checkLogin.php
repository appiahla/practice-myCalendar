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

    
     //Get the variables that will be inserted into the database
    $v_num = $_POST['vnum'];
    
    $email = $_POST['email'];
    
    $password = $_POST['password'];

    //now insert them into the database
    //see if the v_num exists
    $sql_user = "SELECT * FROM Student WHERE v_num = '$v_num'";
           
    if ($result_user = mysqli_query($link,$sql_user)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows($result_user);
    
    //if there is a row
    if($rowcount == 1) { 
        echo "<h3>You are in the database!.</h3>\n"; 

            // output data of each row
            while($row = $result_user->fetch_assoc()) {
              echo "V Number: " . $row["v_num"]. " - Email: " . $row["username"]. " - Password: " . $row["password"]. "<br>";
            
                //check if the email is correct
                if ($row["username"] == $email){ 
                    echo "The emails match!";
                }

                //check if the password is correct
                if ($row["password"] == $password) {
                    echo "The passwords match!";
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
    <nav class="nav-bar" >
      <div style="display: flex; justify-content: space-between;">
        <a id="home-pic" href="">myCalendar</a>
          <ul class="list">
            <li class="list-item">
              <a href="">Home</a>
            </li>
            <li class="list-item">
              <a href="./addItems.php">
                <button class="btn">+ Add</button>
              </a>
            </li>
           </form>
            <li class="list-item">
              <a href="">
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
              <h4 class="class-name">Database</h4>
                <? 
                  // course variables
                  $course_num = $_POST['course_num'];
                  $course_name = $_POST['course_name'];
                  $professor_name = $_POST['professor_name'];
                  $location = $_POST['location'];

                  $sql_courses = "SELECT course_num, course_name, professor_name, location FROM Course WHERE v_number = '$v_num'";
                  if ($result_course = mysqli_query($link,$sql_courses)) {
                      // Return the number of rows in result set
                  $rowcount_course = mysqli_num_rows($result_course);
                  
                  //if there is a row
                  if($rowcount_course > 0) { 
                    // echo "<h3>You are in the database!.</h3>\n"; 

                      // output data of each row
                      while($row_course = $result_course->fetch_assoc()) {
                      
                        echo "Course Number: ".$row_course['course_num']."<br>";
                        echo "Course Name: ".$row_course['course_name']."<br>";
                        echo "Professor: ".$row_course['professor_name']."<br>";
                        echo "Location: ".$row_course['location']."<br>";

                        echo "<br>";

                        
                      }
                  } else {
                    echo "0 results";
                  }

                  // Free result set
                  mysqli_free_result($result_course);
                  }
                ?>
              <p style="font-size: large; font-weight: 600;" class="professor-name">Professor:</p>
                <p style="font-size: meduim; margin-left: 10px;"></p>

              <p style="font-size: large; font-weight: 600;" class="location-name">Location:</p>
                <p style="font-size: meduim; margin-left: 10px;">601 W Main St Richmond, VA 23220 </p>
              
              <p style="font-size: large; font-weight: 600;" class="schudule-name">Meeting Times: </p>
                <p style="font-size: meduim; margin-left: 10px;">Tuesday/Thursday 3:30-4:45pm</p>
            </div>
          </div>
        </app-class-view>
    </div>


    <div class="home-group">
        <h3 class="home-title">Assignments Due Soon</h3>
        <app-assignment-item>
          <div id="assignment-details">
              <div id="assignment-title">508 Group Project</div>
          
              <div id="due-date">
              <span class="section-header">Due:</span>
                11/31/2021
              </div>
          
              <div id="notes-section">
                <span class="section-header">Notes:</span>
                <ul id="notes">
                  <li>Get this done today!</li>
                </ul>
            </div>
          </div>
        </app-assignment-item>
    </div>


    <div class="home-group">
        <h3 class="home-title">Today's View</h3>
        <!-- this would be a calendar view of that day -->
    </div>
    </div>
</body>
</html>

<?php
  mysqli_close($link);
?>