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

?>
