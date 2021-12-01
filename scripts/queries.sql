-- find all assignments that are due in the next week
SELECT due_date AS Due_Date, assignment_title AS Title, course_name_assignment AS Course, description_section AS Description, notes AS notes
FROM Assignment
WHERE due_date BETWEEN current_date() AND DATE_ADD(current_date(), INTERVAL 7 DAY);


-- Find what classes I have a C or lower in
SELECT course_num AS Course_Number, course_name AS Course_Name, grade AS Grade
FROM Course
WHERE grade <= 79.0;


-- find what assignments I have for a given course
CALL find_assignments_for_course('Software as a Service');


-- select notes on my assessment
SELECT assessment_title AS Title, course_name_assessment AS Course, date_of AS Date, notes AS Notes
FROM Assessment;


-- when is the soonest due date for a task/assignment
SELECT assignment_title AS Title, due_date AS Due_Date, course_name_assignment AS Course, description_section AS Description, notes AS Notes
FROM Assignment
ORDER BY due_date ASC LIMIT 10;


SELECT task_title AS Title, date_of AS Date, task_with AS Accompany, task_description AS Description, task_status as Status
FROM PersonalTask
ORDER BY date_of ASC LIMIT 1;


SELECT task_title AS Title, date_of AS Date, task_course AS Course, task_description AS Description, task_status as Status
FROM AcademicTask
ORDER BY date_of ASC LIMIT 1;



-- find what courses I have a test for in the upcoming week
SELECT course_name_assessment as Course, assessment_title as Title
FROM Assessment
WHERE date_of BETWEEN current_date() AND DATE_ADD(current_date(), INTERVAL 7 DAY);


-- find what days I have a test this month
SELECT date_of as Date, course_name_assessment as Course, material AS Material, notes AS Notes
FROM Assessment
WHERE date_of BETWEEN current_date() AND LAST_DAY(current_date()) AND assessment_type = 'Test'; 


-- list my class schedule for the week
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
ORDER BY start_time ASC;

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

-- student view (with age)
SELECT * FROM student_view;


-- find what tasks I have today
CALL create_todays_tasks('V00875392');


-- check the status of a particular task
CALL check_task_status(“Day Off”);

-- find what tasks I have for a given course
CALL find_tasks(“Software as a Service’);

-- display the 5 assignments due soon
CALL assignments_due_soon('V00875392');
