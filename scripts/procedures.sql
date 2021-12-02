-- find what assignments I have for a given course
DELIMITER //

CREATE PROCEDURE find_assignments_for_course(
					IN course_nm VARCHAR(40))
BEGIN
	SELECT assignment_title AS Title, due_date AS Due_Date, description_section AS Description, notes AS Notes
    FROM Assignment
    WHERE course_name_assignment = course_nm;
END //

DELIMITER ;

-- check a specific task status
DELIMITER //

CREATE PROCEDURE check_task_status (
				IN title VARCHAR(20))
BEGIN
	SELECT tasks.task_status
    FROM (
			SELECT task_title, task_status FROM AcademicTask
            UNION
            SELECT task_title, task_status FROM PersonalTask
    ) tasks
    WHERE tasks.task_title = title;
END //

DELIMITER ;


--- find tasks for a specific course
DELIMITER //

CREATE PROCEDURE find_tasks(
				IN course VARCHAR(40))
BEGIN
	SELECT task_title, task_description, date_of, start_date, end_date
    FROM AcademicTask
    WHERE task_course = course AND task_status != 'Completed';
END //

DELIMITER ;


-- find what tasks I have today (recurring)
DELIMITER //

CREATE PROCEDURE create_todays_tasks(
					IN v_num VARCHAR(9))

BEGIN

	SELECT tasks.task_title AS Title, tasks.task_description AS Description, tasks.task_status AS Status, tasks.task_recurring, tasks.start_date AS Start, tasks.end_date AS End, tasks.task_type AS Type
	FROM (
			SELECT task_title,task_description, task_status, task_recurring, start_date, end_date, task_type, v_number FROM PersonalTask WHERE task_recurring='Recurring'
			UNION
			SELECT task_title, task_description, task_status, task_recurring, start_date, end_date, task_type, v_number FROM AcademicTask WHERE task_recurring='Recurring'
	) tasks
	WHERE (current_date() BETWEEN tasks.start_date AND tasks.end_date) AND (tasks.task_status != 'Completed') AND (tasks.v_number = v_num);

END //

DELIMITER ;


-- when is the soonest due date for a task/assignment
DELIMITER //

CREATE PROCEDURE assignments_due_soon(
				IN v_num VARCHAR(9))
BEGIN
	SELECT assignment_title AS Title, due_date AS Due_Date, course_name_assignment AS Course, description_section AS Description, notes AS Notes
	FROM Assignment
	WHERE assignment_v_number = v_num
	ORDER BY due_date ASC LIMIT 5;
END //

DELIMITER ;


-- show today's tasks that do are not recurring
DELIMITER //

CREATE PROCEDURE create_todays_not_recurring_tasks(
				IN v_num VARCHAR(9))
BEGIN
	SELECT tasks.task_title, tasks.date_of, tasks.task_description, tasks.task_status, tasks.v_number, tasks.task_type
	FROM (
			SELECT task_title, date_of, task_description, task_status, task_recurring, v_number, task_type FROM PersonalTask WHERE task_recurring=''
			UNION
			SELECT task_title, date_of, task_description, task_status, task_recurring, v_number, task_type FROM AcademicTask WHERE task_recurring=''
	) tasks
	WHERE (current_date() = tasks.date_of) AND (tasks.task_status != 'Completed') AND (tasks.v_number = v_num);
END //

DELIMITER ;


-- display today's tasks thate are not completed
DELIMITER //

CREATE PROCEDURE create_todays_not_recurring_tasks(
				IN v_num VARCHAR(9))
BEGIN
	
	SELECT task_title, date_of, task_description, task_status, NULL AS task_recurring, NULL AS start_date, NULL AS end_date, v_number, task_type, task_course, task_location
	FROM (
			SELECT task_title, date_of, task_description, task_status, task_recurring, v_number, task_type, NULL as task_course, task_location FROM PersonalTask WHERE task_recurring=''
			UNION
			SELECT task_title, date_of, task_description, task_status, task_recurring, v_number, task_type, task_course, NULL as task_location FROM AcademicTask WHERE task_recurring=''
	) tasks WHERE (current_date() = date_of) AND (task_status != 'Completed')  AND (v_number = v_num)

	UNION

	SELECT task_title, NULL AS date_of, task_description, task_status, task_recurring, start_date, end_date, v_number, task_type, task_course, task_location
	FROM (
			SELECT task_title,task_description, task_status, task_recurring, start_date, end_date, task_type, v_number, NULL as task_course, task_location FROM PersonalTask WHERE task_recurring='Recurring'
			UNION
			SELECT task_title, task_description, task_status, task_recurring, start_date, end_date, task_type, v_number, task_course, NULL as task_location  FROM AcademicTask WHERE task_recurring='Recurring'
	) tasksR WHERE (current_date() BETWEEN start_date AND end_date) AND (task_status != 'Completed')  AND (v_number = v_num);
	
END //

DELIMITER ;