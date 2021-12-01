      <!-- Quiz Section -->
      <input type="radio" id="quizTab" name="mytabs">
        <label for="quizTab">Quiz</label>
        <div class="tab">
            <div class="quiz">
                    
            <?php
 
                $db_host = 'team2-database.cstfewbdata2.us-east-1.rds.amazonaws.com';
                $db_user = 'admin';
                $db_pass = 'databasegroup';
                $db_name = 'groupMyCalendar';
                $db_port = '3306';

                $link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name", "$db_port");


                // Check connection
                if (!$link) {
                        
                    //kill the connection
                    die("Connection failed:" .mysqli_connect_error());
                }


                    $get_v = $_SESSION['v_num'];

                    //see if the v_num exists
                    $sql =  "SELECT * FROM Assessment WHERE assessment_type='Quiz' AND assessment_v_number='$get_v'";

                    if ($assessmentsQ = mysqli_query($link,$sql)) {
                        
                        // Return the number of rows in result set
                        $rowcount_assessmentsQ = mysqli_num_rows($assessmentsQ);
                        
                        //if there is a row
                        if($rowcount_assessmentsQ> 0) {

                            // output data of each row
                            while($row_current_assessmentsQ = $assessmentsQ->fetch_assoc()) {

                                //save variables in the case of wanting to edit
                                $assessmentQ_id = $row_current_assessmentsQ['assignment_id'];
                                $assessmentQ_title = $row_current_assessmentsQ['assessment_title'];
                                $assessmentQ_date = $row_current_assessmentsQ['date_of'];
                                $assessmentQ_course = $row_current_assessmentsQ['course_name_assessment'];
                                $assessmentQ_material = $row_current_assessmentsQ['material'];
                                $assessmentQ_notes= $row_current_assessmentsQ['notes'];

                            echo "Quiz Title: ".$row_current_assessmentsQ['assessment_title']."<br>";
                            echo "Quiz Date: ".$row_current_assessmentsQ['date_of']."<br>";
                            echo "Quiz Course: ".$row_current_assessmentsQ['course_name_assessment']."<br>";
                            echo "Quiz Material: ".$row_current_assessmentsQ['material']."<br>";
                            echo "Quiz Notes: ".$row_current_assessmentsQ['notes']."<br>";

                            echo "<form action='./editQuiz.php' method='POST'>
                                    <input type='hidden' name='assessmentQ_id' value='$assessmentQ_id'>
                                    <input type='hidden' name='assessmentQ_title' value='$assessmentQ_title'>
                                    <input type='hidden' name='assessmentQ_date' value='$assessmentQ_date'>
                                    <input type='hidden' name='assessmentQ_course' value='$assessmentQ_course'>
                                    <input type='hidden' name='assessmentQ_material' value='$assessmentQ_material'>
                                    <input type='hidden' name='assessmentQ_notes' value='$assessmentQ_notes'>
                        
                                    <button type='submit' class='btn' id='viewAll'>Edit</button>
                                </form>";

                            echo "<br>";
                            }
                        } else {
                        echo "No Assessments yet!";
                    }
                    // Free result set
                    mysqli_free_result($row_current_assessmentsQ);
                    }
                            
                    else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($link);
                    }

                mysqli_close($link);

                ?>

        </div>
    </div>
    </div>
  </div>
</div>