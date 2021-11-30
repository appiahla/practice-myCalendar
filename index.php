<!DOCTYPE html>
<html>
<head>
    <title> 508 Group Project </title>
    <link rel = "stylesheet" type = "text/css" href = "/login-signup/login-signup-style.css">
    <link rel = "stylesheet" href = "navigation.css">

    <nav class="nav-bar" >
      <div style="display: flex; justify-content: space-between;">
        <a id="home-pic" href="">myCalendar</a>
          <ul class="list">
            <li class="list-item">
              <a href="https://team2-508database.herokuapp.com/login-signup/checkLogin.php">Home</a>
            </li>
            <li class="list-item">
              <a a href="">
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
    <h2 class="title">Welcome to the myCalendar Web App!</h2>
    <h3 class="subtitle"> Please Log In or Sign Up to Continue: </h3> 

    <div class="mytabs">

      <!-- Login Section -->
      <input type="radio" id="loginTab" name="mytabs" checked="checked">
      <label for="loginTab">Log In</label>
      <div class="tab">
        <div class="login">

        <!-- Login Form -->
       <form method='POST' action='/login-signup/checkLogin.php'>
            
            <label for='loginVNum'>
                V Num:
                <input id='loginVNum' type='text' name='vnum'/><br><br>
            </label>

            <label for='loginEmail'>
                Email:
                <input id='loginEmail' type='email' name='email' /><br><br>
            </label>

            <label for='loginPassword'>
                Password:
                <input id='loginPassword' type='password' name='password' /><br><br>
            </label>

            <input type='submit' name='loginFormPost' value='Log In'/>

            </form>

        </div>
      </div>

    <!-- Sign Up Section -->
        <input type="radio" id="signUpTab" name="mytabs">
        <label for="signUpTab">Sign Up</label>
        <div class="tab">
            <div class="signUp">
                <!-- Sign Up Form -->
                <form method="POST" action="/login-signup/sendSignUp.php" >

                <label for="signUpFName">
                    First Name:
                    <input id="signUpFName" type="text" name="SignUpFName"><br><br>
                </label>

                <label for="signUpLName">
                    Last Name:
                    <input id="signUpFName" type="text" name="SignUpFName"><br><br>
                </label>

                <label for="signUpDOB">
                    Date of Birth:</label>
                    <input id="signUpDOB" type="date" name="SignUpDOB"><br><br>
                </label>

                <label for="signUpNum">
                  VNumber:</label>
                  <input id="signUpNum" type="text" name="SignUpNum"><br><br>
                </label>

                <label for="signUpYear">
                  School Year (please enter number):
                  <input id="signUpYear" type="number" name="SignUpYear"><br><br>
                </label>

                <label for="signUpGPA"> 
                  Current GPA:
                  <input id="signUpGPA" type="number" name="SignUpGPA"><br><br>
                </label>

                <label for="signUpEmail">
                  Email: 
                  <input id="signUpEmail" type="email"  name="SignUpEmail"><br><br>
                </label>

                <label for="signUpPassword">
                  Password: 
                  <input id="signUpPassword" type="password" name="SignUpPassword"><br><br>
                </label>
              
                <input type="submit" value="Sign Up">
          </form>
        </div>
    </div>
    </div>
  </div>
</div>
</body>
</html>