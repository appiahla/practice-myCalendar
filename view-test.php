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
              
            <label for="courseName">
                Course Name:
                <input  id="courseName" type="text" name="CourseName"><br><br>
            </label>
              
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
                  <select name="TestCourseName" id="testCourseName" >
                          <?php 
                          $sql = mysqli_query($connection, "SELECT username FROM users");
                          while ($row = $sql->fetch_assoc()){
                          echo "<option value=\"owner1\">" . $row['username'] . "</option>";
                          }
                          ?>
                          </select><br><br>
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
        </div>
      </div>
    </div>
  </body>
  </html>
