<!DOCTYPE html>
<html>
<head>
    <title> 508 Group Project </title>
    <link rel = "stylesheet" type = "text/css" href = "login-signup-style.css">
</head>
<body>
<div id="day-view-container">
  <div id="input-field">
    <h2 class="title">Please Log In or Sign Up: </h2>

    <div class="mytabs">

      <input type="radio" id="loginTab" name="mytabs" checked="checked">
      <label for="loginTab">Log In</label>
      <div class="tab">
        <div class="login">

       <form method='POST' action='sendLogin.php'>
            
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
    </div>

  </div>
</div>
</body>
</html>