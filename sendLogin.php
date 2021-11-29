<!DOCTYPE html>
<html>
  
<head>
    <title>Insert Page page</title>
</head>
  
<body>

    <?php

        $link = mysqli(
            'team2-database.cstfewbdata2.us-east-1.rds.amazonaws.com',
            'admin',
            'databasegroup',
            'groupMyCalendar',
            '3306');
        
        // Check connection
        if ($link->connect_error) {
            die("Connection failed: " . $link->connect_error);
        } 

            
            //Get the variables that will be inserted into the database
            $v_num = $_POST['vnum'];
            
            $email = $_POST['email'];
            
            $password = $_POST['password'];

            
            //now insert them into the database
            $sql = "INSERT INTO Student (`v_num`, `username`, `password`) 
                    VALUES ('$v_num', '$email', '$password')";
                    

        if ($link->query($sql) === TRUE) {
            echo "New record created successfully"; 
            echo "New record created successfully";
            echo "<h3>data stored in a database successfully." 
                            . " Please browse your localhost php my admin" 
                            . " to view the updated data</h3>"; 
        } else {
        echo "Error: " . $sql . "<br>" . $link->error;
        }

        $link->close();
    ?>
</body>
  
</html>