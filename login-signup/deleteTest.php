<?php

    include 'showAllTests.php';
    
    $db_host = 'team2-database.cstfewbdata2.us-east-1.rds.amazonaws.com';
    $db_user = 'admin';
    $db_pass = 'databasegroup';
    $db_name = 'groupMyCalendar';
    $db_port = '3306';

    $link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name", "$db_port");

    $delete_assessmentT_id = $_POST['assessmentT_id'];

    // Check connection
    if (!$link) {
            
        //kill the connection
        die("Connection failed:" .mysqli_connect_error());
    }

        $get_v = $_SESSION['v_num'];

        //see if the v_num exists
        $sql =  "DELETE FROM Assessment WHERE assessment_id='$delete_assessmentT_id' AND assessment_type='Test' AND assessment_v_number='$get_v'";

        if (mysqli_query($link,$sql)) {
            
    
        }
                
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }

    mysqli_close($link);
?>