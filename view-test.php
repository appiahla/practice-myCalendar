<!DOCTYPE html>
<html>
<head>
    <title> 508 Group Project </title>
    <link rel = "stylesheet" type = "text/css" href = "/login-signup/successSubmit.css">
    <link rel = "stylesheet" href = "navigation.css">

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

    <div class="mytabs">

    <?php
            
            echo "Assignment Title: 
            <a href=''>
              <button class='btn' id='edit'>Edit</button>
            </a>";
        ?>
    </div>

    <a href="">
      <button class="btn">View All Tests</button>
    </a>
  </div>
</div>
</body>
</html>