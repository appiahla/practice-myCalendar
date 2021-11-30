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


    $get_v = $_SESSION['v_num'];

    //see if the v_num exists
    $sql =  "INSERT INTO Assignment (`assignment_title`, `due_date`, `course_name_assignment`,`description_section`, `notes`) 
    VALUES ('$title', '$date', '$course_name', '$description', '$notes')";
          
            
          if (mysqli_query($link, $sql)) {    

              //Success Message
            //   echo nl2br("<h2 class='title'>Your Assignment was Submitted Successfully!</h2>\n\n");
            //   echo nl2br("<h3> Assignment Title:</h3>  $title\n\n 
            //   <h3> Assignment Date:</h3>  $date\n\n  
            //   <h3> Assignment Course:</h3>  $course_name\n\n 
            //   <h3> Assignment Description:</h3>  $description\n\n
            //   <h3> Assignment Notes:</h3>  $notes\n\n");
              
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }

mysqli_close($link);


    

mysqli_close($link);

?>