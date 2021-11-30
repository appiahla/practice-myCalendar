<!DOCTYPE html>
<html>
<head>
    <title> 508 Group Project </title>
    <link rel = "stylesheet" type = "text/css" href = "/login-signup/successAssignment.css">
    <link rel = "stylesheet" href = "navigation.css">

    <nav class="nav-bar" >
      <div style="display: flex; justify-content: space-between;">
        <a id="home-pic" href="">myCalendar</a>
          <ul class="list">
            <li class="list-item">
              <a href="https://team2-508database.herokuapp.com/login-signup/checkLogin.php">Home</a>
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

          //Get the variables that will be inserted into the database
          $title = "Hello";
          
          $date = "12/10/1999";
              
          $course_name = "Data Base Theory";
    
          $description = "none of your busioness";
            
          $notes =  "i dont know";

          echo nl2br("<h3> Assignment Title:</h3> $title\n\n 
                      <h3> Assignment Date:</h3> $date\n\n  
                      <h3> Assignment Course:</h3> $course_name\n\n 
                      <h3> Assignment Description:</h3> $description\n\n
                      <h3> Assignment Notes:</h3>$note\n\n");
      ?>

    </div>
  </div>
</div>
</body>
</html>