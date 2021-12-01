<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title> 508 Group Project </title>
    <link rel = "stylesheet" type = "text/css" href = "editForm.css">
    <link rel = "stylesheet" href = "../navigation.css">

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
        </div>
      </div>
    </nav>

  </head>
<body>
<div id="day-view-container">
  <div id="input-field">
    <div class="mytabs">
        <h2 class='title'>Edit Academic Task</h2>
        
        <?php

            // get the values 
            $edit_taskA_id = $_POST['taskA_id'];

            $edit_taskA_title = $_POST['taskA_title'];

            $edit_taskA_course = $_POST['taskA_course'];

            $edit_taskA_description = $_POST['taskA_description'];

            $edit_taskA_date = $_POST['taskA_date'];

            $edit_taskA_status = $_POST['taskA_status'];

            $edit_taskA_recurring = $_POST['taskA_recurring'];

                $edit_taskA_monday = $_POST['taskA_monday'];
                $edit_taskA_tuesday = $_POST['taskA_tuesday'];
                $edit_taskA_wednesday = $_POST['taskA_wednesday'];
                $edit_taskA_thursday = $_POST['taskA_thursday'];
                $edit_taskA_friday = $_POST['taskA_friday'];
                $edit_taskA_saturday = $_POST['taskA_saturday'];
                $edit_taskA_sunday = $_POST['taskA_sunday'];
                $edit_taskA_start = $_POST['taskA_start'];
                $edit_taskA_end = $_POST['taskA_end'];

            //edit form
            echo "
                <form method='POST' action='updateEditAcaTask.php'>

                <input type='hidden' name='AcaTaskID' value='$edit_taskA_id'>

                <label for='acaTaskName'>
                Task Label:
                <input type='text' id='acaTaskName' name='AcaTaskName' value='$edit_taskA_title'><br><br>
              </label>
              
              <label for='acaTaskCourse'>
                Course:
                <input type='text' id='acaTaskCourse' name='AcaTaskCourse' value='$edit_taskA_course'><br><br>
              </label>
              
              <label for='acaTaskDesc'>
                Description:
                <textarea id='acaTaskDesc' name='AcaTaskDesc'>$edit_taskA_description</textarea><br><br>
              </label>
              
              <label for='acaTaskDate'>
                Date:
                <input type='date' id='acaTaskDate' name='AcaTaskDate' value='$edit_taskA_date'><br><br>
              </label>

              <label for='status'>Task Status: </label>
                <select name='AcaTaskStatus' id='status' value='$edit_taskA_status'>
                    <option value='Not Started'>Not Started</option>
                    <option value='On Going'>On Going</option>
                    <option value='Completed'>Completed</option>
                  </select>
                  <br><br><br>
                </label>

                <input type='checkbox' id='recurringTask' name='recurring' value='Recurring' style='position: relative;right: -23px;'"
                    .($edit_taskA_recurring ? "checked" : "")."
                >
                    <label for='recurring' style='font-weight:400;''> Recurring Task:</label><br><br>


              <label for='acaTaskRecurrDay'>Weekdays: </label>
                  
                  <input type='checkbox' id='acaTaskRecurrDay' name='monday' value='Monday' style='left: -27px;position: relative;'"
                    .($edit_taskA_monday ? "checked" : "").
                  ">
                    <label for='monday' style='position: relative;font-weight:400;left: -27px;'> Monday</label><br>

                  <input type='checkbox' id='acaTaskRecurrDay' name='tuesday' value='Tuesday' style='position: relative;right: -102px;'"
                  .($edit_taskA_tuesday ? "checked" : "").
                  ">
                    <label for='tuesday' style='font-weight:400; position: relative;right: -103px;'> Tuesday</label><br>

                  <input type='checkbox' id='acaTaskRecurrDay' name='wednesday' value='Wednesday' style='position: relative;right: -102px;'"
                  .($edit_taskA_wednesday ? "checked" : "").
                  ">
                  <label for='wendsday' style='font-weight:400; position: relative;right: -103px;'> Wendsday</label><br>

                  <input type='checkbox' id='acaTaskRecurrDay' name='thursday' value='Thursday' style='position: relative;right: -102px;'"
                  .($edit_taskA_thursday ? "checked" : "").
                  ">
                  <label for='thursday' style='font-weight:400; position: relative;right: -103px;'> Thursday</label><br>

                  <input type='checkbox' id='acaTaskRecurrDay' name='friday' value='Friday' style='position: relative;right: -102px;'"
                  .($edit_taskA_friday ? "checked" : "").
                  ">
                  <label for='firday' style='font-weight:400; position: relative;right: -103px;'> Friday</label><br>

                  <input type='checkbox' id='acaTaskRecurrDay' name='saturday' value='Saturday' style='position: relative;right: -102px;'"
                  .($edit_taskA_saturday ? "checked" : "").
                  ">
                  <label for='staurday' style='font-weight:400; position: relative;right: -103px;'> Saturday</label><br>

                  <input type='checkbox' id='acaTaskRecurrDay' name='sunday' value='Sunday' style='position: relative;right: -102px;'"
                  .($edit_taskA_sunday ? "checked" : "").
                  ">
                  <label for='sunday' style='font-weight:400; position: relative;right: -103px;'> Sunday</label><br><br>

              
              <label for='acaTaskRecurrStart'>
                Start Date:
                <input type='date' id='acaTaskRecurrStart' name='AcaTaskRecurrStart' value='$edit_taskA_start'><br><br>
              </label>
              
              <label for='acaTaskRecurrEnd'>
                End Date:
                <input type='date' id='acaTaskRecurrEnd' name='AcaTaskRecurrEnd' value='$edit_taskA_end'><br><br>
              </label>
              
                    
                <input class='btn' type='submit' value='Update 'style='margin-left: 24px;'>
              </form>"
        ?>
        </div>
        </div>
        </div>
</body>
</html>