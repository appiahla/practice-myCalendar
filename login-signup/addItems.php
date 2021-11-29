<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    <link rel = "stylesheet" href = "../navigation.css">
    <link rel = "stylesheet" type = "text/css" href = "add-items.css">
    <nav class="nav-bar" >
      <div style="display: flex; justify-content: space-between;">
        <a id="home-pic" href="">myCalendar</a>
          <ul class="list">
            <li class="list-item">
              <a href="">Home</a>
            </li>
            <li class="list-item">
              <a href="">
                <button class="btn">+ Add</button>
              </a>
            </li>
            <li class="list-item">
              <a href="">
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
             
              <input type="submit" value="Submit">
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
                  Date:
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
                
                <input type="submit" value="Submit">
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
                  Date:
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
                
                <input type="submit" value="Submit">
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
            <input type="radio" id="academicTab" name="task" checked>
            <label for="academicTab">Academic</label>
            <div class="tab">
              <form action="/action_page.php">
                <label for="acaTaskName">Task Label:</label>
                <input type="text" id="acaTaskName" name="AcaTaskName"><br><br>
                <label for="acaTaskCourse">Course:</label>
                <input type="text" id="acaTaskCourse" name="AcaTaskCourse"><br><br>
                <label for="acaTaskDesc">Description:</label>
                <textarea id="acaTaskDesc" name="AcaTaskDesc"></textarea><br><br>
                <label for="acaTaskDate">Date:</label>
                <input type="date" id="acaTaskDate" name="AcaTaskDate"><br><br>
                <p>Recurring Task:</p>
                <label for="acaTaskRecurrDay">Weekdays: </label>
                <input type="text" id="acaTaskRecurrDay" name="AcaTaskRecurrDay"><br><br>
                <label for="acaTaskRecurrStart">Start Date:</label>
                <input type="date" id="acaTaskRecurrStart" name="AcaTaskRecurrStart"><br><br>
                <label for="acaTaskRecurrEnd">End Date:</label>
                <input type="date" id="acaTaskRecurrEnd" name="AcaTaskRecurrEnd"><br><br>
                <input type="submit" value="Submit">
              </form>
            </div>
            <input type="radio" id="personalTab" name="task">
            <label for="personalTab">Personal</label>
            <div class="tab">
              <form action="/action_page.php">
                <label for="personalTaskName">Task Label:</label>
                <input type="text" id="personalTaskName" name="PersonalTaskName"><br><br>
                <label for="personalTaskWith">With:</label>
                <input type="text" id="personalTaskWith" name="PersonalTaskWith"><br><br>
                <label for="personalTaskLocation">Location:</label>
                <input type="text" id="personalTaskLocation" name="PersonalTaskLocation"><br><br>
                <label for="personalTaskDesc">Description:</label>
                <textarea id="personalTaskDesc" name="PersonalTaskDesc"></textarea><br><br>
                <label for="personalTaskDate">Date:</label>
                <input type="date" id="personalTaskDate" name="PersonalTaskDate"><br><br>
                <p>Recurring Task:</p>
                <label for="personalTaskRecurrDay">Weekdays: </label>
                <input type="text" id="personalTaskRecurrDay" name="PersonalTaskRecurrDay"><br><br>
                <label for="personalTaskRecurrStart">Start Date:</label>
                <input type="date" id="personalTaskRecurrStart" name="PersonalTaskRecurrStart"><br><br>
                <label for="personalTaskRecurrEnd">End Date:</label>
                <input type="date" id="personalTaskRecurrEnd" name="PersonalTaskRecurrEnd"><br><br>
                <input type="submit" value="Submit">
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </body>
  </html>
