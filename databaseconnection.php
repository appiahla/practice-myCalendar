<?php

$link = mysqli_connect(
    'team2-database.cstfewbdata2.us-east-1.rds.amazonaws.com',
    'admin',
    'databasegroup',
    'groupMyCalendar',
    '3306');

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Check if server is alive
if (mysqli_ping($link))
{
    echo "Connection is ok!";
}
else
{
    echo "Error: ". mysqli_error($link);
}



// mysqli_query($link,"INSERT INTO Student
//     (`v_num`,`username`, `password`)
//     VALUES ('$vnum','$email','$password')")
// or die(mysqli_error($link));


echo "Entered data successfully\n";

mysqli_close($link);

?>
