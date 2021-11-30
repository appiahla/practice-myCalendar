<!DOCTYPE html>
<html>
<head>
    <title> 508 Group Project </title>
    <link rel = "stylesheet" type = "text/css" href = "/login-signup/login-signup-style.css">
    <link rel = "stylesheet" href = "navigation.css">

    <nav class="nav-bar" >
      <div style="display: flex; justify-content: space-between;">
        <a id="home-pic" href="">myCalendar</a>
          <ul class="list">
            <li class="list-item">
              <a href="">Home</a>
            </li>
            <li class="list-item">
              <a a href="">
                <button class="btn">+ Add</button>
              </a>
            </li>
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
<div id="day-view-container">
  <div id="input-field">
    <h2 class="title">Your Assignment was Submitted Successfully!</h2>

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

          
          //Get the variables that will be inserted into the database
          $title = $_POST['AssignmentName'];
          
          $date = $_POST['DueDate'];
          
          $course_name = $_POST['CourseName'];

          $description = $_POST['AssignmentDesc'];
        
          $notes =  $_POST['AssignmentNotes'];

          //now insert them into the database
          //see if the v_num exists
          $sql =  "INSERT INTO Assignment (`assignment_title`, `due_date`, `course_name_assignment`,`description_section`, `notes`) 
          VALUES ('$title', '$date', '$course_name', '$description', '$notes')";
                
                  
                if (mysqli_query($link, $sql)) {    
                  echo "New record created successfully";
                  echo "<h3>data stored in a database successfully." 
                      . " Please browse your localhost php my admin" 
                      . " to view the updated data</h3>"; 
        
                  echo nl2br("\n$title\n $date\n $course_name\n $description\n $notes\n");
              } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($link);
              }

      mysqli_close($link);

      ?>

    </div>
  </div>
</div>
</body>
</html>