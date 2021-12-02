DELIMITER //

-- check if new assignment course name is a course
CREATE TRIGGER check_new_assignment_course
	BEFORE INSERT
    ON Assignment FOR EACH ROW
BEGIN
	IF NEW.course_name_assignment NOT IN (SELECT course_name FROM Course) THEN
		SET NEW.assignment_title = null;
	END IF;
END //

-- check if new assessment course name is a course
CREATE TRIGGER check_new_assessment_course
	BEFORE INSERT
    ON Assessment FOR EACH ROW
BEGIN
	IF NEW.course_name_assessment NOT IN (SELECT course_name FROM Course) THEN
		SET NEW.assessment_type = null;
	END IF;
END //

-- check if new academic task course name is a course
CREATE TRIGGER check_new_academic_task_course
	BEFORE INSERT
    ON AcademicTask FOR EACH ROW
BEGIN
	IF NEW.task_course NOT IN (SELECT course_name FROM Course) THEN
		SET NEW.task_title = null;
	END IF;
END //

DELIMITER ;