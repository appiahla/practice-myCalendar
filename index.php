<?php
    //include the php file that contains the database conncetion code
    include 'databaseconnection.php';
    
    //include the php file that will contain the nessacarry functions to post and retrieve comments to the database
    include 'sendLogin.php';

   echo "<form method='POST' action='".insertLoginData($link)."'>

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
    
    </form>";
?>