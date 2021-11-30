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
    $title = $_POST['AcaTaskName'];
    echo("$title\n\n");

    $course = $_POST['AcaTaskCourse'];
    echo("$course\n\n");

    $description = $_POST['AcaTaskDesc'];
    echo("$description\n\n");

    $date = $_POST['AcaTaskDate'];
    echo("$date\n\n");

    $status = $_POST['AcaTaskStatus'];
    echo("$status\n\n");

    $recurring = $_POST['recurring'];
    echo("$recurring\n\n");

    $monday = $_POST['monday'];
    echo("$monday\n\n");
    
    $tuesday = $_POST['tuesday'];
    echo("$tuesday\n\n");
    
    $wednesday = $_POST['wednesday'];
    echo("$wednesday\n\n");
    
    $thursday = $_POST['thursday'];
    echo("$thursday\n\n");
    
    $friday = $_POST['friday'];
    echo("$friday\n\n");
    
    $saturday = $_POST['saturday'];
    echo("$saturday\n\n");
    
    $sunday = $_POST['sunday'];
    echo("$sunday\n\n");
    
    $start = $_POST['AcaTaskRecurrStart'];
    echo("$start\n\n");
    
    $end = $_POST['AcaTaskRecurrEnd'];
    echo("$end\n\n");

    $v_num = 'V00875392';

    //now insert them into the database
    //see if the v_num exists
    // $sql =  "INSERT INTO AcademicTask (`task_title`, `task_course`, `task_description`, `date_of`, `task_status`, `task_recurring`,`recurringMon`, `recurringTues`, `recurringWed`, `recurringThurs`, `recurringFri`, `recurringSat`, `recurringSun`, `start_date`, `end_date`, `v_number`) 
    // VALUES ('$title', '$course', '$description', '$date', '$status', '$recurring', '$monday', '$tuesday', '$wednesday', '$thursday', '$friday', '$saturday', '$sunday', '$start', '$end', '$v_num')";
           
             
    //        if (mysqli_query($link, $sql)) {    
    //         echo "New record created successfully";
    //         echo "<h3>data stored in a database successfully." 
    //             . " Please browse your localhost php my admin" 
    //             . " to view the updated data</h3>"; 
  
    //         echo nl2br("\n$type\n $title\n $course_name\n $date_of\n $material\n $notes\n");
    //     } else {
    //         echo "Error: " . $sql . "<br>" . mysqli_error($link);
    //     }

mysqli_close($link);

?>