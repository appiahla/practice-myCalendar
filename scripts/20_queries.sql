-- Query 1: find all assignments that are due in the next week
SELECT due_date AS Due_Date, assignment_title AS Title, course_name_assignment AS Course, description_section AS Description, notes AS notes
FROM Assignment
WHERE due_date BETWEEN current_date() AND DATE_ADD(current_date(), INTERVAL 7 DAY);

-- Query 2: find what days I have a test this month
SELECT date_of as Date, course_name_assessment as Course, material AS Material, notes AS Notes
FROM Assessment
WHERE date_of BETWEEN current_date() AND LAST_DAY(current_date()) AND assessment_type = 'Test'; 

-- Query 3: Find what classes I have a C or lower in
SELECT course_num AS Course_Number, course_name AS Course_Name, grade AS Grade
FROM Course
WHERE grade <= 79.0;

-- Query 4: find what assignments I have for a given course
CALL find_assignments_for_course('Software as a Service');

-- Query 5: list my class schedule for the week
-- monday
SELECT course_num AS Course, location as Location, address as Address, TIME_FORMAT(start_time, "%r") as Start, TIME_FORMAT(end_time, "%r") as End
FROM Course
WHERE meetMon IS NOT NULL
ORDER BY start_time;

-- tuesday
SELECT course_num AS Course, location as Location, address as Address, TIME_FORMAT(start_time, "%r") as Start, TIME_FORMAT(end_time, "%r") as End
FROM Course
WHERE meetTues IS NOT NULL
ORDER BY start_time;

-- wednesday
SELECT course_num AS Course, location as Location, address as Address, TIME_FORMAT(start_time, "%r") as Start, TIME_FORMAT(end_time, "%r") as End
FROM Course
WHERE meetWednes IS NOT NULL
ORDER BY start_time;

-- thursday
SELECT course_num AS Course, location as Location, address as Address, TIME_FORMAT(start_time, "%r") as Start, TIME_FORMAT(end_time, "%r") as End
FROM Course
WHERE meetThurs IS NOT NULL
ORDER BY start_time;

-- friday
SELECT course_num AS Course, location as Location, address as Address, TIME_FORMAT(start_time, "%r") as Start, TIME_FORMAT(end_time, "%r") as End
FROM Course
WHERE meetFri IS NOT NULL
ORDER BY start_time;

-- Query 6: find my gpa; student view (with age) for a v_number
SELECT * FROM student_view WHERE V_Number = '$temp_profile';

-- Query 7: what would my gpa look like with my current course grades
SELECT AVG(grade) as avg_grade, SUM(credit) as total_credit FROM Course WHERE v_number='$get_v';

-- Query 8, 9: see if a user has an account; select a specific student; (logged in is checked in frontend code)
SELECT * FROM Student WHERE v_num = '$v_num'; 

-- Query 10: find what tasks I have today
CALL create_todays_tasks('V00875392');

-- Query 11: check the status of a particular task
CALL check_task_status(“Day Off”);

-- Query 12: find what tasks I have for a given course
CALL find_tasks(“Software as a Service’);

-- Query 13: find the number of assignments that are incomplete for a time period

-- Query 14: show all recurring tasks
SELECT task_id, task_title, task_type, task_course, NULL as task_with, NULL as task_location, task_description, date_of, task_status, task_recurring, recurringMon, recurringTues, recurringWed, recurringThurs, recurringFri, recurringSat, recurringSun, start_date, end_date FROM AcademicTask WHERE task_recurring!=''
UNION 
SELECT task_id, task_title, task_type, NULL as task_course, task_with, task_location, task_description, date_of, task_status, task_recurring, recurringMon, recurringTues, recurringWed, recurringThurs, recurringFri, recurringSat, recurringSun, start_date, end_date FROM PersonalTask WHERE task_recurring!='';

-- Query 15: find what courses I have a test for in the upcoming week
SELECT course_name_assessment
FROM Assessment
WHERE assessment_type = 'Test' AND assessment_v_number = 'V00875392';

-- Query 16: Find what tasks I will be doing with someone else
SELECT task_title AS Title, task_with AS Accompanying, task_description AS Description
FROM PersonalTask
WHERE task_with IS NOT NULL AND v_number = 'V00875392';

-- Query 17, 18: delete a specific assignment, task; update a specific meeting/task/etc
-- done with the update/delete queries

-- Query 19: select notes on my assessment
SELECT assessment_title AS Title, course_name_assessment AS Course, date_of AS Date, notes AS Notes
FROM Assessment;

-- Query 20: when is the soonest due date for a task/assignment
SELECT assignment_title AS Title, due_date AS Due_Date, course_name_assignment AS Course, description_section AS Description, notes AS Notes
FROM Assignment
WHERE assignment_v_number = '$temp_assignment'
ORDER BY due_date ASC LIMIT 5;

SELECT task_title AS Title, date_of AS Date, task_with AS Accompany, task_description AS Description, task_status as Status
FROM PersonalTask
WHERE assignment_v_number = '$temp_assignment'
ORDER BY date_of ASC LIMIT 1;

SELECT task_title AS Title, date_of AS Date, task_course AS Course, task_description AS Description, task_status as Status
FROM AcademicTask
WHERE assignment_v_number = '$temp_assignment'
ORDER BY date_of ASC LIMIT 1;