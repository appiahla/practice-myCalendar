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

    $course = $_POST['AcaTaskCourse'];

    $description = $_POST['AcaTaskDesc'];

    $date = $_POST['AcaTaskDate'];

    $status = $_POST['AcaTaskStatus'];

    $recurring = $_POST['recurring'];

    $monday = $_POST['monday'];
    
    $tuesday = $_POST['tuesday'];
    
    $wednesday = $_POST['wednesday'];
    
    $thursday = $_POST['thursday'];
    
    $friday = $_POST['friday'];
    
    $saturday = $_POST['saturday'];
    
    $sunday = $_POST['sunday'];
    
    $start = $_POST['AcaTaskRecurrStart'];
    
    $end = $_POST['AcaTaskRecurrEnd'];

    $v_num = 'V00875392';

    //now insert them into the database
    //see if the v_num exists
    $sql =  "INSERT INTO AcademicTask (`task_title`, `task_course`, `task_description`, `date_of`, `task_status`, `task_recurring`,`recurringMon`, `recurringTues`, `recurringWed`, `recurringThurs`, `recurringFri`, `recurringSat`, `recurringSun`, `start_date`, `end_date`, `v_number`) 
    VALUES ('$title', '$course', '$description', '$date', '$status', '$recurring', '$monday', '$tuesday', '$wednesday', '$thursday', '$friday', '$saturday', '$sunday', '$start', '$end', '$v_num')";
           
             
           if (mysqli_query($link, $sql)) {    
            echo "New record created successfully";
            echo "<h3>data stored in a database successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"; 
  
            echo nl2br("\n$title\n $course\n $description\n $date\n $status\n $recurring\n $monday\n $tuesday\n $wednesday\n $thursday\n $friday\n $saturday\n $sunday\n $start\n $end\n $v_num\n");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }

mysqli_close($link);

?>