<!DOCTYPE html>
<html>
<head>
    <title> 508 Group Project </title>
    <link rel = "stylesheet" type = "text/css" href = "successSubmit.css">
    <link rel = "stylesheet" href = "../navigation.css">

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
<div id="day-view-container">
  <div id="input-field">
    <div class="mytabs">

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
            $type = 'Quiz';
            
            $title = $_POST['QuizName'];
            
            $date_of = $_POST['QuizDate'];
            
            $course_name = $_POST['QuizCourseName'];

            $material = $_POST['QuizMaterial'];
        
            $notes =  $_POST['QuizNotes'];

            $get_v = $_SESSION['v_num'];

            //now insert them into the database
            //see if the v_num exists
            $sql =  "INSERT INTO Assessment (`assessment_type`, `assessment_title`, `course_name_assessment`, `date_of`, `material`, `notes`, `assessment_v_number`) 
            VALUES ('$type', '$title', '$course_name', '$date_of', '$material', '$notes', '$get_v')";
                
                    
                if (mysqli_query($link, $sql)) {    
                    //Success Message
                    echo nl2br("<h2 class='title'>Your Quiz was Submitted Successfully!</h2>\n\n");
                    
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
                } 
                
                else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($link);
                }

        mysqli_close($link);

        ?>
    </div>
    <a href="">
      <button class="btn" id="viewAll">View All Quizzes</button>
    </a>
  </div>
</div>
</body>
</html>