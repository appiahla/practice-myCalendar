<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>;
    <script src="../src/js/database.js"></script>;
</head>
<body>
<div id="day-view-container">
  <div id="input-field">
    <h2 class="title">Please Log In or Sign Up: </h2>

    <div class="mytabs">

      <input type="radio" id="loginTab" name="mytabs" checked="checked">
      <label for="loginTab">Log In</label>
      <div class="tab" ng-app="loginForm">

        <div class="login" ng-controller="loginControl">

          <form>

            <label for="loginVNum">
              V Num:
            </label>
            <input id="loginVNum" type="text" ng-model="vnum"/><br><br>

            <label for="loginEmail">
              Email:
            </label>
            <input id="loginEmail" type="email" ng-model="email" /><br><br>

            <label for="loginPassword">
              Password:
            </label>
            <input id="loginPassword" type="password" ng-model="password" /><br><br>

              <button type="button" ng-click="insertLoginData();">Log In</button>
          </form>

        </div>
      </div>
      
<!---->
<!--&lt;!&ndash;      &lt;!&ndash;SignUp Section&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;      <input type="radio" id="signUpTab" name="mytabs">&ndash;&gt;-->
<!--&lt;!&ndash;      <label for="signUpTab">Sign Up</label>&ndash;&gt;-->
<!--&lt;!&ndash;      <div class="tab">&ndash;&gt;-->
<!--&lt;!&ndash;        <div class="signUp">&ndash;&gt;-->
<!--&lt;!&ndash;          &lt;!&ndash;Here add the input fields&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;          <form action="connect-signin-login.php" method="POST">&ndash;&gt;-->
<!--&lt;!&ndash;            <label for="signUpFName">First Name:</label>&ndash;&gt;-->
<!--&lt;!&ndash;            <input type="text" id="signUpFName" name="SignUpFName"><br><br>&ndash;&gt;-->
<!--&lt;!&ndash;            <label for="signUpLName">Last Name:</label>&ndash;&gt;-->
<!--&lt;!&ndash;            <input type="text" id="signUpLName" name="SignUpLName"><br><br>&ndash;&gt;-->
<!--&lt;!&ndash;            <label for="signUpDOB">Date of Birth:</label>&ndash;&gt;-->
<!--&lt;!&ndash;            <input type="date" id="signUpDOB" name="SignUpDOB"><br><br>&ndash;&gt;-->
<!--&lt;!&ndash;            <label for="signUpNum">VNumber:</label>&ndash;&gt;-->
<!--&lt;!&ndash;            <input type="text" id="signUpNum" name="SignUpNum"><br><br>&ndash;&gt;-->
<!--&lt;!&ndash;            <label for="signUpYear">School Year (please enter number):</label>&ndash;&gt;-->
<!--&lt;!&ndash;            <input type="number" id="signUpYear" name="SignUpYear"><br><br>&ndash;&gt;-->
<!--&lt;!&ndash;            <label for="signUpGPA"> Current GPA:</label>&ndash;&gt;-->
<!--&lt;!&ndash;            <input type="number" id="signUpGPA" name="SignUpGPA"><br><br>&ndash;&gt;-->
<!--&lt;!&ndash;            <label for="signUpEmail">Email:</label>&ndash;&gt;-->
<!--&lt;!&ndash;            <input type="email" id="signUpEmail" name="SignUpEmail"><br><br>&ndash;&gt;-->
<!--&lt;!&ndash;            <label for="signUpPassword">Password:</label>&ndash;&gt;-->
<!--&lt;!&ndash;            <input type="password" id="signUpPassword" name="SignUpPassword"><br><br>&ndash;&gt;-->
<!--&lt;!&ndash;            <input type="submit" value="Sign Up">&ndash;&gt;-->
<!--&lt;!&ndash;          </form>&ndash;&gt;-->
<!--&lt;!&ndash;        </div>&ndash;&gt;-->
<!--&lt;!&ndash;      </div>&ndash;&gt;-->
    </div>

  </div>
</div>
</body>
</html>