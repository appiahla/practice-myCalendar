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
    $sql =  "SELECT * FROM Assignment WHERE assignment_v_number=$get_v";

    if ($assignments = mysqli_query($link,$sql)) {
        
        // Return the number of rows in result set
        $rowcount_assignments = mysqli_num_rows($assignments);
        
        //if there is a row
        if($rowcount_assignments > 0) { 

            // output data of each row
            while($row_current_assignments = $assignments->fetch_assoc()) {

            echo "Assignment Title: ".$row_current_assignments['assignment_title']."<br>";
            echo "Assignment Due Date: ".$row_current_assignments['due_date']."<br>";
            echo "Assignment Course: ".$row_current_assignments['course_name_assignment']."<br>";
            echo "Assignment Description: ".$row_current_assignments['description_section']."<br>";
            echo "Assignment Notes: ".$row_current_assignments['notes']."<br>";

            echo "<br>";
            }
        } else {
        echo "No Assignments yet!";
    }
    // Free result set
    mysqli_free_result($result_current_tasks);
    }
            
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }

mysqli_close($link);


    

mysqli_close($link);

?>