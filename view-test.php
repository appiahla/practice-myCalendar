<!DOCTYPE html>
<html>
<head>
    <title> 508 Group Project </title>
    <link rel = "stylesheet" type = "text/css" href = "/login-signup/successSubmit.css">
    <link rel = "stylesheet" href = "navigation.css">

    <nav class="nav-bar" >
      <div style="display: flex; justify-content: space-between;">
        <a id="home-pic" href="">myCalendar</a>
          <ul class="list">
            <li class="list-item">
              <a href="https://team2-508database.herokuapp.com/login-signup/checkLogin.php">Home</a>
            </li>
            <li class="list-item">
              <a href="">
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

    <div class="mytabs">

    <?php
            
            //Get the variables that will be inserted into the database
            $type = 'Quiz';
            
            $title = "Database Quiz 8";
            
            $date_of = "12/10/2021";
            
            $course_name = "Data Base Theory";

            $material = "Everything that was covered since the last test";
        
            $notes =  "Help";


            echo nl2br("<h2 class='title'>Your Test was Submitted Successfully!</h2>\n\n");
             // show the title
             echo nl2br("<h3> Quiz Title:</h3>  $title\n\n");

             echo nl2br("<h3> Quiz Course:</h3>  $course_name\n\n");
             
            if ($date_of != ''){
              
              echo nl2br("<h3> Quiz Date:</h3>  $date_of\n\n");
            
            }

             if ($material != '') {

             echo nl2br("<h3> Quiz Material:</h3>  $material\n\n");

             }
             
             if ($notes != ''){

             echo nl2br("<h3> Quiz Notes:</h3>  $notes\n\n");

             }
        ?>
    </div>

    <a href="">
      <button class="btn">View All Tests</button>
    </a>
  </div>
</div>
</body>
</html>