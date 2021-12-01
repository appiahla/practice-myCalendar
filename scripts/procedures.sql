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


-- find what tasks I have today
DELIMITER //

CREATE PROCEDURE create_todays_tasks(
					IN v_num VARCHAR(9))

BEGIN

SELECT tasks.task_title, tasks.task_description, tasks.task_status, tasks.start_date, tasks.end_date
FROM (
		SELECT task_title,task_description, task_status, start_date, end_date, v_number FROM PersonalTask
        UNION
        SELECT task_title, task_description, task_status, start_date, end_date, v_number FROM AcademicTask
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
