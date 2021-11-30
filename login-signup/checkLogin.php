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

     //Get the variables that will be inserted into the database
    // if the session is new (new browser/tab), create the session variables
    if(!isset($_SESSION['v_num']) && empty($_SESSION['v_num'])) {
      $v_num = $_POST['vnum'];
    
      $email = $_POST['email'];
      
      $password = $_POST['password'];

      $_SESSION['email'] = $email;
      $_SESSION['v_num'] = $v_num;
      $_SESSION['password'] = $password;
    // otherwise it is the same session, grab the variables
    } else {
      $v_num = $_SESSION['v_num'];
    
      $email = $_SESSION['email'];
      
      $password = $_SESSION['password'];
    }

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
              <a href="https://team2-508database.herokuapp.com/login-signup/checkLogin.php">Home</a>
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

                  $sql_current_assignments = "SELECT course_num, course_name, professor_name, location FROM Course WHERE v_number = '$v_num'";
                  if ($result_current_assignments = mysqli_query($link,$sql_current_assignments)) {
                      // Return the number of rows in result set
                  $rowcount_course = mysqli_num_rows($result_current_assignments);
                  
                  //if there is a row
                  if($rowcount_course > 0) { 
                    // echo "<h3>You are in the database!.</h3>\n"; 

                      // output data of each row
                      while($row_current_assignments = $result_current_assignments->fetch_assoc()) {
                      
                        echo "Course Number: ".$row_current_assignments['course_num']."<br>";
                        echo "Course Name: ".$row_current_assignments['course_name']."<br>";
                        echo "Professor: ".$row_current_assignments['professor_name']."<br>";
                        echo "Location: ".$row_current_assignments['location']."<br>";

                        echo "<br>";
                      }
                  } else {
                    echo "No classes yet!";
                  }
                  // Free result set
                  mysqli_free_result($result_current_assignments);
                  }
                ?>
            </div>
          </div>
        </app-class-view>
    </div>


    <div class="home-group">
        <h3 class="home-title">Assignments Due Soon</h3>
        <!-- <app-assignment-item>
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
        </app-assignment-item> -->

        <? 
                  // course variables
                  $title = $_POST['Title'];
                  $due_date = $_POST['Due_Date'];
                  $course = $_POST['Course'];
                  $description = $_POST['Description'];
                  $notes = $_POST['Notes'];

                  $sql_current_assignments = "SELECT assignment_title AS Title, due_date AS Due_Date, course_name_assignment AS Course, description_section AS Description, notes AS Notes FROM Assignment ORDER BY due_date ASC LIMIT 10;";

                  if ($result_current_assignments = mysqli_query($link,$sql_current_assignments)) {
                      // Return the number of rows in result set
                  $rowcount_current_assignments = mysqli_num_rows($result_current_assignments);
                  
                  //if there is a row
                  if($rowcount_current_assignments > 0) { 
                    // echo "<h3>You are in the database!.</h3>\n"; 

                      // output data of each row
                      while($row_current_assignments = $result_current_assignments->fetch_assoc()) {
                      
                        echo "Title: ".$row_current_assignments['Title']."<br>";
                        echo "Due Date: ".$row_current_assignments['Due_Date']."<br>";
                        echo "Course: ".$row_current_assignments['Course']."<br>";
                        echo "Description: ".$row_current_assignments['Description']."<br>";
                        echo "Notes: ".$row_current_assignments['Notes']."<br>";

                        echo "<br>";
                      }
                  } else {
                    echo "No assignments yet!";
                  }
                  // Free result set
                  mysqli_free_result($result_current_assignments);
                  }
                ?>
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