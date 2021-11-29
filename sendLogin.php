<?php

function insertLoginData($link) {

       //Conditional to check for if the submit button was pressed or not
       if(isset( $_POST['loginFormPost'])) {
    
        //Once the button is pressed -> insert into database
    
            //Get the variables that will be inserted into the database
            $v_num = $_POST['vnum'];
    
            $email = $_POST['email'];
    
            $password = $_POST['password'];
    
    
            //now insert them into the database
            $sql = "INSERT INTO Student (`v_num`, `email`, `password`) 
                    VALUES ('$v_num', '$email', '$password')";
            
            $result = $link->query($sql);   
        }
    }
?>