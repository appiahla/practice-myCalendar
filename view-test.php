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
    <h2 class="title">Your Personal Task was Submitted Successfully!</h2>

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
            $title = "Coffee Date";

            $with =  "Adam";

            $location =  "Starbucks";

            $description = "I hate it here";

            $date = "11/30/2021";

            $status = "Not Started";

            $recurring = "Recurrint";

            $monday = "";
            
            $tuesday = "";
            
            $wednesday = "Wednesday";
            
            $thursday = "";
            
            $friday = "";
            
            $saturday = "Staurday";
            
            $sunday = "";
            
            $start = "12/10/2021";
            
            $end = "01/01/2022";

            $v_num = 'V00875392';

           // show the title
           echo nl2br("<h3> Task Title:</h3>  $title\n\n");

           // check for null
           if ($with != '') {

           echo nl2br("<h3> With:</h3>  $with\n\n");

           }

           if ($location != '') {

            echo nl2br("<h3> Task Location:</h3>  $location\n\n");
 
            }
           
           if ($description != ''){
           echo nl2br("<h3> Task Date:</h3>  $description\n\n");
           }

           if ($date != '') {

           echo nl2br("<h3> Task Date:</h3>  $date\n\n");

           }
           
           if ($status != ''){

           echo nl2br("<h3> Task Status:</h3>  $status\n\n");

           }

           //check if the task is recurring
           if ($recurring != ''){

           echo nl2br("<h3>Task is Recurring on: </h3>\n\n");


           if ($monday != ''){
               
               echo nl2br("$monday\n\n");
           
           }

           if ($tuesday != ''){
               
               echo nl2br("$tuesday\n\n");

           }
           
           if ($wednesday != ''){

               echo nl2br("$wednesday\n\n");

           }

           if ($thursday != ''){

               echo nl2br("$thursday\n\n");

           }
           
           if ($friday != ''){

               echo nl2br("$friday\n\n");
           }

           if ($saturday != ''){

               echo nl2br("$saturday\n\n");
           }

           if ($sunday != ''){
               
               echo nl2br("$sunday\n\n");

           }
           
           echo nl2br("<h4>Staring on: </h4>\n\n $start\n\n");
           echo nl2br("<h4>Ending on: </h4>\n\n $end\n\n");
       }
?>
    </div>
  </div>
</div>
</body>
</html>