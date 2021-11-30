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
    $type = 'Quiz';
    
    $title = $_POST['QuizName'];
    
    $date_of = $_POST['QuizDate'];
    
    $course_name = $_POST['QuizCourseName'];

    $material = $_POST['QuizMaterial'];
  
    $notes =  $_POST['QuizNotes'];

    //now insert them into the database
    //see if the v_num exists
    $sql =  "INSERT INTO Assessment (`assessment_type`, `assessment_title`, `course_name_assessment`, `date_of`, `material`, `notes`) 
    VALUES ('$type', '$title', '$course_name', '$date_of', '$material', '$notes')";
           
             
           if (mysqli_query($link, $sql)) {    
            echo "New record created successfully";
            echo "<h3>data stored in a database successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"; 
  
            echo nl2br("\n$type\n $title\n $course_name\n $date_of\n $material\n $notes\n");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }

mysqli_close($link);

?>