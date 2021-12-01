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
        <h2 class='title'>Edit Personal Task</h2>
        
        <?php

            // get the values 
            $edit_taskP_id = $_POST['taskP_id'];

            $edit_taskP_title = $_POST['taskP_title'];

            $edit_taskP_with = $_POST['taskP_with'];

            $edit_taskP_location = $_POST['taskP_location'];

            $edit_taskP_description = $_POST['taskP_description'];

            $edit_taskP_date = $_POST['taskP_date'];

            $edit_taskP_status = $_POST['taskP_status'];

            $edit_taskP_recurring = $_POST['taskP_recurring'];

                $edit_taskP_monday = $_POST['taskP_monday'];
                $edit_taskP_tuesday = $_POST['taskP_tuesday'];
                $edit_taskP_wednesday = $_POST['taskP_wednesday'];
                $edit_taskP_thursday = $_POST['taskP_thursday'];
                $edit_taskP_friday = $_POST['taskP_friday'];
                $edit_taskP_saturday = $_POST['taskP_saturday'];
                $edit_taskP_sunday = $_POST['taskP_sunday'];
                $edit_taskP_start = $_POST['taskP_start'];
                $edit_taskP_end = $_POST['taskP_end'];

            //edit form
            echo "
                <form method='POST' action='updateEditPerTask.php'>

                <input type='hidden' name='PersonalTaskID' value='$edit_taskP_id'>

                <label for='personalTaskName'>
                Task Label:
                <input type='text' id='personalTaskName' name='PersonalTaskName' value='$edit_taskP_title'><br><br>
              </label>
              
              <label for='personalTaskWith'>
                With:
                <input type='text' id='personalTaskWith' name='PersonalTaskWith' value='$edit_taskP_with'><br><br>
              </label>
              
              <label for='personalTaskLocation'>
                Location:
                <input type='text' id='personalTaskLocation' name='PersonalTaskLocation' value='$edit_taskP_location'><br><br>
              </label>
              
              <label for='personalTaskDesc'>
                Description:
                <textarea id='personalTaskDesc' name='PersonalTaskDesc'>$edit_taskP_description</textarea><br><br>
              </label>
              
              <label for='personalTaskDate'>
                Date:
                <input type='date' id='personalTaskDate' name='PersonalTaskDate' value='$edit_taskP_date'><br><br>
              </label>
              
              <label for='status'>Task Status: </label>
                <select name='PersonalTaskStatus' id='status' value='$edit_taskP_status'>
                    <option value='Not Started'"
                    .($edit_taskP_status=="Not Started" ? "selected" : "")."
                    >Not Started</option>
                    <option value='On Going'"
                    .($edit_taskP_status=="On Going" ? "selected" : "")."
                    >On Going</option>
                    <option value='Completed'"
                    .($edit_taskP_status=="Completed" ? "selected" : "")."
                    >Completed</option>
                  </select>
                <br><br><br>
              </label>

              <input type='checkbox' id='recurringTask' name='recurring' value='Recurring' style='position: relative;right: -23px;'"
              .($edit_taskP_recurring ? "checked" : "")."
              >
                  <label for='recurring' style='font-weight:400;'> Recurring Task:</label><br><br>

              <label for='personalTaskRecurrDay'>Weekdays: </label>
                  
                  <input type='checkbox' id='personalTaskRecurrDay' name='monday' value='Monday' style='left: -27px;position: relative;'"
                  .($edit_taskP_monday ? "checked" : "")."
                  >
                  <label for='monday' style='position: relative;font-weight:400;left: -27px;'> Monday</label><br>

                  <input type='checkbox' id='personalTaskRecurrDay' name='tuesday' value='Tuesday' style='position: relative;right: -102px;'"
                  .($edit_taskP_tuesday ? "checked" : "")."
                  >
                  <label for='tuesday' style='font-weight:400; position: relative;right: -103px;'> Tuesday</label><br>

                  <input type='checkbox' id='personalTaskRecurrDay' name='wednesday' value='Wednesday' style='position: relative;right: -102px;'"
                  .($edit_taskP_wednesday ? "checked" : "")."
                  >
                  <label for='wendsday' style='font-weight:400; position: relative;right: -103px;'> Wendsday</label><br>

                  <input type='checkbox' id='personalTaskRecurrDay' name='thursday' value='Thursday' style='position: relative;right: -102px;'"
                  .($edit_taskP_thursday ? "checked" : "")."
                  >
                  <label for='thursday' style='font-weight:400; position: relative;right: -103px;'> Thursday</label><br>

                  <input type='checkbox' id='personalTaskRecurrDay' name='friday' value='Friday' style='position: relative;right: -102px;'"
                  .($edit_taskP_friday ? "checked" : "")."
                  >
                  <label for='firday' style='font-weight:400; position: relative;right: -103px;'> Friday</label><br>

                  <input type='checkbox' id='personalTaskRecurrDay' name='saturday' value='Saturday' style='position: relative;right: -102px;'"
                  .($edit_taskP_saturday ? "checked" : "")."
                  >
                  <label for='staurday' style='font-weight:400; position: relative;right: -103px;'> Saturday</label><br>

                  <input type='checkbox' id='personalTaskRecurrDay' name='sunday' value='Sunday' style='position: relative;right: -102px;'"
                  .($edit_taskP_sunday ? "checked" : "")."
                  >
                  <label for='sunday' style='font-weight:400; position: relative;right: -103px;'> Sunday</label><br><br>

              
              <label for='personalTaskRecurrStart'>
                Start Date:
                <input type='date' id='personalTaskRecurrStart' name='PersonalTaskRecurrStart' value='$edit_taskP_start'><br><br>
              </label>
              
              <label for='personalTaskRecurrEnd'>
                End Date:
                <input type='date' id='personalTaskRecurrEnd' name='PersonalTaskRecurrEnd' value='$edit_taskP_end'><br><br>
              </label>
                    
                <input class='btn' type='submit' value='Update 'style='margin-left: 24px;'>
              </form>"
        ?>
        </div>
        </div>
        </div>
</body>
</html>