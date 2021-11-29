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
        $v_num = $_POST['vnum'];
        
        $email = $_POST['email'];
        
        $password = $_POST['password'];

        //now insert them into the database
        //see if the v_num exists
        $sql = "SELECT v_num FROM Student WHERE civ_numty = '$v_num'";
               
        $result = mysqli_query($link, $sql);
        $row_count = $result->num_rows;
        echo("There is " + $row_count + " row(s)");
                
        if (mysqli_query($link, $sql)) {    
            echo "New record created successfully";
            echo "<h3>data stored in a database successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"; 
  
            echo nl2br("\n$v_num\n $email\n $password\n ");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }
  
    mysqli_close($link);

?>
</body>
  
</html>