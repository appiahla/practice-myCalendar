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
    $sql =  "INSERT INTO Assignment (`assignment_title`, `due_date`, `course_name `,`description_section`, `notes`) 
    VALUES ('$title', '$date', '$course_name', '$description', ''$notes'')";
           
             
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
