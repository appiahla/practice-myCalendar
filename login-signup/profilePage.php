<?php
	session_start();
?> 
<!DOCTYPE html>
<html>
	<head>
		<title> 508 Group Project </title>
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
					<a href="https://team2-508database.herokuapp.com/login-signup/addItems.php">
						<button class="btn">+ Add</button>
					</a>
					</li>
					<li class="list-item">
					<a href="https://team2-508database.herokuapp.com/login-signup/profilePage.php">
						<button class="btn">Profile</button>
					</a>
					</li>
				</ul>
				<!-- </div> -->
			</div>
		</nav>
	</head>

	<body>
		<div id="day-view-container">
			<div id="input-field">
				<h2 class="title" style="margin-bottom: 30px;">Profile</h2> 
				<div>
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

										$vnum = $row_current_profile['V_Number'];
										$email = $row_current_profile['Username'];
										$firstN = $row_current_profile['First_name'];
										$lastN =$row_current_profile['Last_name'];
										$date_of_birth = $row_current_profile['DOB'];
										$age = $row_current_profile['Age'];
										$school_year =$row_current_profile['School_Year'];
										$gpa = $row_current_profile['GPA'];
									
										echo nl2br("<div id='profileInfo'>");
										echo nl2br("<h4> V-number:</h4>  $vnum\n\n");
										echo nl2br("<h4>Username:</h4>  $email\n\n");
										echo nl2br("<h4>Name:</h4>  $firstN $lastN\n\n");
										echo nl2br("<h4>Date of Birth:</h4>  $date_of_birth\n\n");
										echo nl2br("<h4>Age:</h4>  $age\n\n");
										echo nl2br("<h4>School Year:</h4>  $school_year\n\n");
										echo nl2br("<h4>GPA:</h4>  $gpa\n\n");
										echo nl2br("</div>");

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

				<!-- Assessments -->
				<a href="./showAllAssessments.php">
				<button class="btn">View All Assessments</button>
				</a>

				<a href="./showAllTests.php">
				<button class="btn">View All Tests</button>
				</a>

				<a href="./showAllQuizzes.php">
				<button class="btn">View All Quizzes</button>
				</a>

				<!-- Tasks -->
				<a href="">
				<button class="btn">View All Tasks</button>
				</a>

				<a href="./showAllAcademicTasks.php">
				<button class="btn">View All Academic Tasks</button>
				</a>

				<a href="./showAllPersonalTasks.php">
				<button class="btn">View All Personal Tasks</button>
				</a>
				
				<!-- Other -->
				<a href="./showAllAssignments.php">
				<button class="btn">View All Assignments</button>
				</a>

				<a href="./showAllCourses.php">
				<button class="btn">View All Courses</button>
				</a>

				<a href="">
				<button class="btn">View Grades</button>
				</a>
				
				
			</div>
		</div>
	</body>
</html>