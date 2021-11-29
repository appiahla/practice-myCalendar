<!DOCTYPE html>
<html>
  
<head>
    <title>Insert Page page</title>
</head>
  
<body>
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
        $v_num = $_POST['SignUpNum'];
        echo("$v_num\n");
        
        $username = $_POST['SignUpEmail'];
        echo("$username\n");
        
        $password = $_POST['SignUpPassword'];
        echo("$password\n");

        $first_name = $_POST['SignUpFName'];
        echo("$first_name\n");

        $last_name = $_POST['SignUpLName'];
        echo("$last_name\n");

        $date_of_birth = $_POST['SignUpDOB'];
        echo("$date_of_birth\n");

        $school_year = $_POST['SignUpYear'];
        echo("$school_year\n");

        $gpa =  $_POST['SignUpGPA'];
        echo("$gpa\n");

        //now insert them into the database
        // $sql = "INSERT INTO Student (`v_num`, `username`, `password`,`first_name`, `last_name`, `date_of_birth`, `school_year`, `gpa`) 
        //         VALUES ('$v_num', '$username', '$password', '$first_name', '$last_name', '$date_of_birth', '$school_year', '$gpa')";
                
                
        // if (mysqli_query($link, $sql)) {    
        //     echo "New record created successfully";
        //     echo "<h3>data stored in a database successfully." 
        //         . " Please browse your localhost php my admin" 
        //         . " to view the updated data</h3>"; 
  
        //     echo nl2br("\n$v_num\n $email\n $password\n $first_name\n $last_name\n $date_of_birth\n $school_year\n $gpa\n");
        // } else {
        //     echo "Error: " . $sql . "<br>" . mysqli_error($link);
        // }
  
    mysqli_close($link);

?>
</body>
  
</html>