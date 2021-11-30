<?php
	session_start();
?> 
<!DOCTYPE html>
<html>
<head>
    <title> 508 Group Project </title>
    <!-- <link rel = "stylesheet" type = "text/css" href = "successSubmit.css"> -->
    <link rel = "stylesheet" href = "../navigation.css">
	<link rel = "stylesheet" type = "text/css" href = "viewAll.css">


    <nav class="nav-bar" >
      <div style="display: flex; justify-content: space-between;">
        <a id="home-pic" href="">myCalendar</a>
          <ul class="list">
            <li class="list-item">
              <a href="https://team2-508database.herokuapp.com/login-signup/checkLogin.php">Home</a>
            </li>
            <li class="list-item">
              <a a href="https://team2-508database.herokuapp.com/login-signup/addItems.php">
                <button class="btn">+ Add</button>
              </a>
            </li>
            <li class="list-item">
              <a href="https://team2-508database.herokuapp.com/login-signup/profilePage.php">
                <button class="btn">Profile</button>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</head>

<body>
<div id="day-view-container">
  <div id="input-field">
    <h2 class="title">Profile</h2> 
	<div style="border: 1px solid black">
	<? 
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

          // student view variables
          $vnum = $_POST['V_Number'];
          $username = $_POST['Username'];
        //   $password = $_POST['Password'];
          $first_name = $_POST['First_name'];
          $last_name = $_POST['Last_name'];
		  $dob = $_POST['DOB'];
		  $age = $_POST['Age'];
		  $school_year = $_POST['School_Year'];
		  $gpa = $_POST['GPA'];

          $temp_profile = $_SESSION['v_num'];

          $sql_current_profile = "SELECT * FROM student_view WHERE V_Number = '$temp_profile';";

          if ($result_current_profile = mysqli_query($link,$sql_current_profile)) {
              // Return the number of rows in result set
          $rowcount_current_profile = mysqli_num_rows($result_current_profile);
          
          //if there is a row
          if($rowcount_current_profile > 0) { 

              // output data of each row
              while($row_current_profile = $result_current_profile->fetch_assoc()) {
              
                echo "VNumber: ".$row_current_profile['V_Number']."<br>";
                echo "Username: ".$row_current_profile['Username']."<br>";
                // echo "Password: ".$row_current_profile['Password']."<br>";
                echo "First Name: ".$row_current_profile['First_Name']."<br>";
                echo "Last Name: ".$row_current_profile['Last_Name']."<br>";
				echo "Date of Birth: ".$row_current_profile['DOB']."<br>";
				echo "Age: ".$row_current_profile['AGE']."<br>";
				echo "School Year: ".$row_current_profile['School_Year']."<br>";
				echo "GPA: ".$row_current_profile['GPA']."<br>";

                echo "<br>";
              }
          } else {
            echo "Nothing here!";
          }
          // Free result set
          mysqli_free_result($result_current_profile);
          }
		  mysqli_close($link);
        ?>
	</div>
    <!-- <a href="">
      <button class="btn">View All Academic Tasks</button>
    </a> -->
  </div>
</div>
</body>
</html>