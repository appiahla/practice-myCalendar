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
        $sql = "SELECT * FROM Student WHERE v_num = '$v_num'";
               
        if ($result = mysqli_query($link,$sql)) {

        // Return the number of rows in result set
        $rowcount = mysqli_num_rows($result);
        
        //if there is a row
        if($rowcount == 1) { 
            echo "<h3>You are in the database!.</h3>\n"; 

                // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo "V Number: " . $row["v_num"]. " - Email: " . $row["username"]. " - Password: " . $row["password"]. "<br>";
                
                    //check if the email is correct
                    if ($row["username"] == $email){ 
                        echo "The emails match!";
                    }

                    //check if the password is correct
                    if ($row["password"] == $password) {
                        echo "The passwords match!";
                    }
                
                }
              } else {
                echo "0 results";
              }

            
            

        // Free result set
        mysqli_free_result($result);
        }
  
    mysqli_close($link);

?>
</body>
  
</html>