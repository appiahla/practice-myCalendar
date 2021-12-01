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
-- could create individual views with these
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
ORDER BY due_date ASC LIMIT 10;

SELECT task_title AS Title, date_of AS Date, task_with AS Accompany, task_description AS Description, task_status as Status
FROM PersonalTask
ORDER BY date_of ASC LIMIT 1;

SELECT task_title AS Title, date_of AS Date, task_course AS Course, task_description AS Description, task_status as Status
FROM AcademicTask
ORDER BY date_of ASC LIMIT 1;


-- 
-- 
-- all other queries used

-- display the 5 assignments due soon
CALL assignments_due_soon('V00875392');

-- select course list where the v_number is a specific value
SELECT course_name FROM Course WHERE v_number='$get_v';

-- select course name, number, professor name, and location for all courses under a user
SELECT course_num, course_name, professor_name, location FROM Course WHERE v_number = '$v_num';

-- delete an academic task that matches a specific id and v_number
DELETE FROM AcademicTask WHERE task_id='$delete_taskA_id' AND v_number='$get_v';

-- select all academic tasks that match a v_number
SELECT * FROM AcademicTask WHERE v_number='$get_v';

-- delete an academic tasks that matches an id and v_number
DELETE FROM Assignment WHERE assignment_id='$delete_assignment_id' AND assignment_v_number='$get_v';

-- select all assignments that match a v_number
SELECT * FROM Assignment WHERE assignment_v_number='$get_v';

-- delete personal tasks that match an id and v_number
DELETE FROM PersonalTask WHERE task_id='$delete_taskP_id' AND v_number='$get_v';

-- select all personal tasks that match a v_number
SELECT * FROM PersonalTask WHERE v_number='$get_v';

-- delete quiz assessments that match an id and v_number
DELETE FROM Assessment WHERE assessment_id='$delete_assessmentQ_id' AND assessment_type='Quiz' AND assessment_v_number='$get_v';

-- select all assessments that match type quiz and a specific v_number
SELECT * FROM Assessment WHERE assessment_type='Quiz' AND assessment_v_number='$get_v';

-- delete test assessments that match an id and v_number
DELETE FROM Assessment WHERE assessment_id='$delete_assessmentT_id' AND assessment_type='Test' AND assessment_v_number='$get_v';

-- select all test assessments that match a v_number
SELECT * FROM Assessment WHERE assessment_type='Test' AND assessment_v_number='$get_v';

-- insert a new academic task
INSERT INTO AcademicTask (`task_title`, `task_course`, `task_description`, `date_of`, `task_status`, `task_recurring`,`recurringMon`, `recurringTues`, `recurringWed`, `recurringThurs`, `recurringFri`, `recurringSat`, `recurringSun`, `start_date`, `end_date`, `v_number`) 
VALUES ('$title', '$course', '$description', '$date', '$status', '$recurring', '$monday', '$tuesday', '$wednesday', '$thursday', '$friday', '$saturday', '$sunday', '$start', '$end', '$get_v');

-- insert a new assignment
INSERT INTO Assignment (`assignment_title`, `due_date`, `course_name_assignment`,`description_section`, `notes`, `assignment_v_number`) 
VALUES ('$title', '$date', '$course_name', '$description', '$notes', '$get_v');

-- insert a new personal task
INSERT INTO PersonalTask (`task_title`, `task_with`, `task_location`, `task_description`, `date_of`, `task_status`, `task_recurring`,`recurringMon`, `recurringTues`, `recurringWed`, `recurringThurs`, `recurringFri`, `recurringSat`, `recurringSun`, `start_date`, `end_date`, `v_number`) 
VALUES ('$title', '$with', '$location', '$description', '$date', '$status', '$recurring', '$monday', '$tuesday', '$wednesday', '$thursday', '$friday', '$saturday', '$sunday', '$start', '$end', '$get_v');

-- insert a new quiz assessment
INSERT INTO Assessment (`assessment_type`, `assessment_title`, `course_name_assessment`, `date_of`, `material`, `notes`, `assessment_v_number`) 
VALUES ('$type', '$title', '$course_name', '$date_of', '$material', '$notes', '$get_v');

-- insert a new twst assessment
INSERT INTO Assessment (`assessment_type`, `assessment_title`, `course_name_assessment`, `date_of`, `material`, `notes`, `assessment_v_number`) 
VALUES ('$type', '$title', '$course_name', '$date_of', '$material', '$notes', '$get_v');

-- create a new student
INSERT INTO Student (`v_num`, `username`, `password`,`first_name`, `last_name`, `date_of_birth`, `school_year`, `gpa`) 
VALUES ('$v_num', '$username', '$password', '$first_name', '$last_name', '$date_of_birth', '$school_year', '$gpa');

-- select all assessments for a specific v_number
SELECT * FROM Assessment WHERE assessment_v_number='$get_v';

-- select all courses for a user
SELECT * FROM Course WHERE v_number='$get_v';

-- update an academic task for a specific id and v_number
UPDATE AcademicTask
SET
	`task_title`='$title',
	`task_course`='$course',
	`task_description`='$description',
	`date_of`='$date',
	`task_status`='$status',
	`task_recurring`='$recurring',
	`recurringMon`='$monday',
	`recurringTues`='$tuesday',
	`recurringWed`='$wednesday',
	`recurringThurs`='$thursday',
	`recurringFri`='$friday',
	`recurringSat`='$saturday',
	`recurringSun`='$sunday',
	`start_date`='$start',
	`end_date`='$end'
WHERE `task_id`='$id' AND `v_number`='$get_v';

-- update a specific assignment by v_number and id
UPDATE Assignment
SET `assignment_title`='$title',
	`due_date`='$date',
	`course_name_assignment`='$course_name',
	`description_section`='$description',
	`notes`='$notes'
WHERE `assignment_id`='$id' AND `assignment_v_number`='$get_v';

-- update personal task by id and v_number
UPDATE PersonalTask
SET
	`task_title`='$title',
	`task_with`='$with',
	`task_location`='$location',
	`task_description`='$description',
	`date_of`='$date',
	`task_status`='$status',
	`task_recurring`='$recurring',
	`recurringMon`='$monday',
	`recurringTues`='$tuesday',
	`recurringWed`='$wednesday',
	`recurringThurs`='$thursday',
	`recurringFri`='$friday',
	`recurringSat`='$saturday',
	`recurringSun`='$sunday',
	`start_date`='$start',
	`end_date`='$end'
WHERE `task_id`='$id' AND `v_number`='$get_v';

-- update quiz by id and v_number
UPDATE Assessment
SET `assessment_title`='$title',
	`date_of`='$date',
	`course_name_assessment`='$course_name',
	`material`='$material',
	`notes`='$notes'
WHERE `assessment_type`='Quiz' AND `assessment_id`='$id' AND `assessment_v_number`='$get_v';

-- update test by id and v_number
UPDATE Assessment
SET `assessment_title`='$title',
	`date_of`='$date',
	`course_name_assessment`='$course_name',
	`material`='$material',
	`notes`='$notes'
WHERE `assessment_type`='Test' AND `assessment_id`='$id' AND `assessment_v_number`='$get_v';

-- show academic and personal tasks
SELECT task_id, v_number, task_title, task_type, task_course, NULL as task_with, NULL as task_location, task_description, date_of, task_status, task_recurring, recurringMon, recurringTues, recurringWed, recurringThurs, recurringFri, recurringSat, recurringSun, start_date, end_date
  FROM AcademicTask
UNION 
SELECT task_id, v_number, task_title, task_type, NULL as task_course, task_with, task_location, task_description, date_of, task_status, task_recurring, recurringMon, recurringTues, recurringWed, recurringThurs, recurringFri, recurringSat, recurringSun, start_date, end_date
  FROM PersonalTask
  
  WHERE v_number='V00875392';