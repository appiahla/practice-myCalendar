<?php
  session_start();  

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

  $get_v = $_SESSION['v_num'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    <link rel = "stylesheet" href = "../navigation.css">
    <link rel = "stylesheet" type = "text/css" href = "/login-signup/add-items.css">
    <nav class="nav-bar" >
      <div style="display: flex; justify-content: space-between;">
        <a id="home-pic" href="">myCalendar</a>
          <ul class="list">
            <li class="list-item">
              <a href="https://team2-508database.herokuapp.com/login-signup/checkLogin.php">Home</a>
            </li>
            <li class="list-item">
              <a href="">
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
      <h2 class="title">Please Input A New: </h2>

      <div class="mytabs">

        <!--Assignment Section-->
        <input type="radio" id="assignmentTab" name="mytabs" checked="checked">
        <label for="assignmentTab">Assignment</label>
        <div class="tab">
          <div class="assignment">
            <!--Here add the input fields-->
            <form method="POST" action="insertNewAssignment.php">
             
            <label for="assignmentName">
                Assignment Title:
                <input id="assignmentName" type="text" name="AssignmentName"><br><br>
            </label>
              
            <label for="dueDate">
                Due Date:
                <input  id="dueDate" type="date" name="DueDate"><br><br>
            </label>
              
            <label for="courseName"> Course Name: </label>
                <select name="CourseName">
                    <?php 
                    $sql = mysqli_query($link, "SELECT course_name FROM Course WHERE v_number=$get_v");
                      while ($row = $sql->fetch_assoc()){
                        $course_name_option=  $row['course_name'];
                        echo "<option value=$course_name_option>" . $row['course_name'] . "</option>";
                      }
                    ?>
                    </select><br><br>
           
              
            <label for="assignmentDesc">
                Description:
                <textarea id="assignmentDesc" name="AssignmentDesc"></textarea><br><br>
            </label>
              
            <label for="assignmentNotes">
                Notes:
                <textarea id="assignmentNotes" name="AssignmentNotes"></textarea><br><br>
            </label>
             
              <input class="btn" type="submit" value="Submit">
            </form>
          </div>
        </div>

        
        <!--Assessment Section-->
        <input type="radio" id="assessmentTab" name="mytabs">
        <label for="assessmentTab">Assessment</label>
        <div class="tab">

          <!--Here add the circle radio buttons-->
          <div class="assessment">

            <!--Test-->
            <input type="radio" id="testTab" name="assessment" checked>
            <label for="testTab">Test</label>
            <div class="tab">
              <form method="POST" action="insertNewTest.php">

                <label for="testName">
                  Test Title:
                  <input type="text" id="testName" name="TestName"><br><br>
                </label>
                
                <label for="testDate">
                 Test Date:
                  <input type="date" id="testDate" name="TestDate"><br><br>
                </label>
                
                <label for="testCourseName">
                  Course Name:
                  <input type="text" id="testCourseName" name="TestCourseName"><br><br>
                </label>
                
                <label for="testMaterial">
                  Material:
                  <textarea id="testMaterial" name="TestMaterial"></textarea><br><br>
                </label>
                
                <label for="testNotes">
                  Notes:
                  <textarea id="testNotes" name="TestNotes"></textarea><br><br>
                </label>
                
                <input class="btn" type="submit" value="Submit" style="position: relative;top: 40px;left: -250px;">
              </form>
            </div>

             <!--Quiz-->
            <input type="radio" id="quizTab" name="assessment">
            <label for="quizTab">Quiz</label>
            <div class="tab">
              <form method="POST" action="insertNewQuiz.php">
               
                <label for="quizName">
                  Quiz Title:
                  <input type="text" id="quizName" name="QuizName"><br><br>
                </label>
                
                <label for="quizDate">
                  Quiz Date:
                  <input type="date" id="quizDate" name="QuizDate"><br><br>
                </label>
                
                <label for="quizCourseName">
                  Course Name:
                  <input type="text" id="quizCourseName" name="QuizCourseName"><br><br>
                </label>
                
                <label for="quizMaterial">
                  Material:
                  <textarea id="quizMaterial" name="QuizMaterial"></textarea><br><br>
                </label>
                
                <label for="quizNotes">
                  Notes:
                  <textarea id="quizNotes" name="QuizNotes"></textarea><br><br>
                </label>
                
                <input class="btn" type="submit" value="Submit" style="position: relative;top: 27px;left: -255px;">
              </form>
            </div>
          </div>
        </div>

        <!--Task Section-->
        <input type="radio" id="taskTab" name="mytabs">
        <label for="taskTab">Task</label>
        <div class="tab">
          <!--Here add the circle radio buttons-->
          <div class="task">

            <!--Academic-->
            <input type="radio" id="academicTab" name="task" checked>
            <label for="academicTab">Academic</label>
            <div class="tab">
              <form method="POST" action="insertNewAcademicTask.php">

                <label for="acaTaskName">
                  Task Label:
                  <input type="text" id="acaTaskName" name="AcaTaskName"><br><br>
                </label>
                
                <label for="acaTaskCourse">
                  Course:
                  <input type="text" id="acaTaskCourse" name="AcaTaskCourse"><br><br>
                </label>
                
                <label for="acaTaskDesc">
                  Description:
                  <textarea id="acaTaskDesc" name="AcaTaskDesc"></textarea><br><br>
                </label>
                
                <label for="acaTaskDate">
                  Date:
                  <input type="date" id="acaTaskDate" name="AcaTaskDate"><br><br>
                </label>

                <label for="status">Task Status: </label>
                  <select name="AcaTaskStatus" id="status">
                      <option value="Not Started">Not Started</option>
                      <option value="On Going">On Going</option>
                      <option value="Completed">Completed</option>
                    </select>
                    <br><br><br>
                  </label>
  
                  <input type="checkbox" id="recurringTask" name="recurring" value="Recurring">
                      <label for="recurring" style="font-weight:400;"> Recurring Task:</label><br><br>
  
                <label for="acaTaskRecurrDay">Weekdays: </label>
                    
                    <input type="checkbox" id="acaTaskRecurrDay" name="monday" value="Monday">
                    <label for="monday" style="font-weight:400;"> Monday</label><br>

                    <input type="checkbox" id="acaTaskRecurrDay" name="tuesday" value="Tuesday" style="position: relative;right: -102px;">
                    <label for="tuesday" style="font-weight:400; position: relative;right: -103px;"> Tuesday</label><br>

                    <input type="checkbox" id="acaTaskRecurrDay" name="wednesday" value="Wednesday" style="position: relative;right: -102px;">
                    <label for="wendsday" style="font-weight:400; position: relative;right: -103px;"> Wendsday</label><br>

                    <input type="checkbox" id="acaTaskRecurrDay" name="thursday" value="Thursday" style="position: relative;right: -102px;">
                    <label for="thursday" style="font-weight:400; position: relative;right: -103px;"> Thursday</label><br>

                    <input type="checkbox" id="acaTaskRecurrDay" name="friday" value="Friday" style="position: relative;right: -102px;">
                    <label for="firday" style="font-weight:400; position: relative;right: -103px;"> Friday</label><br>

                    <input type="checkbox" id="acaTaskRecurrDay" name="saturday" value="Saturday" style="position: relative;right: -102px;">
                    <label for="staurday" style="font-weight:400; position: relative;right: -103px;"> Saturday</label><br>

                    <input type="checkbox" id="acaTaskRecurrDay" name="sunday" value="Sunday" style="position: relative;right: -102px;">
                    <label for="sunday" style="font-weight:400; position: relative;right: -103px;"> Sunday</label><br><br>

                
                <label for="acaTaskRecurrStart">
                  Start Date:
                  <input type="date" id="acaTaskRecurrStart" name="AcaTaskRecurrStart"><br><br>
                </label>
                
                <label for="acaTaskRecurrEnd">
                  End Date:
                  <input type="date" id="acaTaskRecurrEnd" name="AcaTaskRecurrEnd"><br><br>
                </label>
                
                <input class="btn" type="submit" value="Submit" style="position: relative;top: 30px;right: 370px;">
              </form>
            </div>

            <!--Personal-->
            <input type="radio" id="personalTab" name="task">
            <label for="personalTab">Personal</label>
            <div class="tab">
              <form method="POST" action="insertNewPersonalTask.php">
                
                <label for="personalTaskName">
                  Task Label:
                  <input type="text" id="personalTaskName" name="PersonalTaskName"><br><br>
                </label>
                
                <label for="personalTaskWith">
                  With:
                  <input type="text" id="personalTaskWith" name="PersonalTaskWith"><br><br>
                </label>
                
                <label for="personalTaskLocation">
                  Location:
                  <input type="text" id="personalTaskLocation" name="PersonalTaskLocation"><br><br>
                </label>
                
                <label for="personalTaskDesc">
                  Description:
                  <textarea id="personalTaskDesc" name="PersonalTaskDesc"></textarea><br><br>
                </label>
                
                <label for="personalTaskDate">
                  Date:
                  <input type="date" id="personalTaskDate" name="PersonalTaskDate"><br><br>
                </label>
                
                <label for="status">Task Status: </label>
                  <select name="PersonalTaskStatus" id="status">
                      <option value="Not Started">Not Started</option>
                      <option value="On Going">On Going</option>
                      <option value="Completed">Completed</option>
                    </select>
                  <br><br><br>
                </label>

                <input type="checkbox" id="recurringTask" name="recurring" value="Recurring">
                    <label for="recurring" style="font-weight:400;"> Recurring Task:</label><br><br>

                <label for="personalTaskRecurrDay">Weekdays: </label>
                    
                    <input type="checkbox" id="personalTaskRecurrDay" name="monday" value="Monday">
                    <label for="monday" style="font-weight:400;"> Monday</label><br>

                    <input type="checkbox" id="personalTaskRecurrDay" name="tuesday" value="Tuesday" style="position: relative;right: -102px;">
                    <label for="tuesday" style="font-weight:400; position: relative;right: -103px;"> Tuesday</label><br>

                    <input type="checkbox" id="personalTaskRecurrDay" name="wednesday" value="Wednesday" style="position: relative;right: -102px;">
                    <label for="wendsday" style="font-weight:400; position: relative;right: -103px;"> Wendsday</label><br>

                    <input type="checkbox" id="personalTaskRecurrDay" name="thursday" value="Thursday" style="position: relative;right: -102px;">
                    <label for="thursday" style="font-weight:400; position: relative;right: -103px;"> Thursday</label><br>

                    <input type="checkbox" id="personalTaskRecurrDay" name="friday" value="Friday" style="position: relative;right: -102px;">
                    <label for="firday" style="font-weight:400; position: relative;right: -103px;"> Friday</label><br>

                    <input type="checkbox" id="personalTaskRecurrDay" name="saturday" value="Saturday" style="position: relative;right: -102px;">
                    <label for="staurday" style="font-weight:400; position: relative;right: -103px;"> Saturday</label><br>

                    <input type="checkbox" id="personalTaskRecurrDay" name="sunday" value="Sunday" style="position: relative;right: -102px;">
                    <label for="sunday" style="font-weight:400; position: relative;right: -103px;"> Sunday</label><br><br>

                
                <label for="personalTaskRecurrStart">
                  Start Date:
                  <input type="date" id="personalTaskRecurrStart" name="PersonalTaskRecurrStart"><br><br>
                </label>
                
                <label for="personalTaskRecurrEnd">
                  End Date:
                  <input type="date" id="personalTaskRecurrEnd" name="PersonalTaskRecurrEnd"><br><br>
                </label>
                
                <input class="btn" type="submit" value="Submit" style="position: relative;top: 25px;right: 370px;">
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </body>
  </html>
