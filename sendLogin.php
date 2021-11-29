<!DOCTYPE html>
<html>
  
<head>
    <title>Insert Page page</title>
</head>
  
<body>
    <center>
        <?php

    $link = mysqli_connect(
        'team2-database.cstfewbdata2.us-east-1.rds.amazonaws.com',
        'admin',
        'databasegroup',
        'groupMyCalendar',
        '3306');
    
    // Check connection
    if (!$link) {
            
        //kill the connection
        die("Connection failed:" .mysqli_connect_error());
    }

        //Conditional to check for if the submit button was pressed or not
       // if(isset( $_POST['loginFormPost'])) {
        
            //Once the button is pressed -> insert into database
        
                //Get the variables that will be inserted into the database
                $v_num = $_POST[vnum];
        
                $email = $_POST[email];
        
                $password = $_POST[password];

        
                //now insert them into the database
                $sql = "INSERT INTO Student (`v_num`, `username`, `password`) 
                        VALUES ('$v_num', '$email', '$password')";
                
                
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
   // }

?>
</center>
</body>
  
</html>