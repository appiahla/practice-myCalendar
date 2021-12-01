CREATE DATABASE groupMyCalendar;

USE groupMyCalendar;
CREATE TABLE Student
(
	v_num VARCHAR(9) PRIMARY KEY UNIQUE NOT NULL, 
	username VARCHAR(25) NOT NULL,
	password VARCHAR(25) NOT NULL,
	first_name VARCHAR(25) NOT NULL,
	last_name VARCHAR(25) NOT NULL,
	date_of_birth DATE NOT NULL,
	school_year INT CHECK(school_year > 11),
	gpa DOUBLE CHECK(gpa > 0.0)
);

USE groupMyCalendar;
CREATE TABLE Course
(
	crn INT NOT NULL,
    course_num VARCHAR(10),
	course_name VARCHAR(40) NOT NULL,
	section_num INT,
	professor_name VARCHAR(50) NOT NULL,
	grade DOUBLE,
	location VARCHAR(50),
	address VARCHAR(50),
	start_time TIME,
	end_time TIME,
	v_number VARCHAR(9) NOT NULL, 
	-- make separate table like ‘meetingtimes’?
	-- if there’s time - consider it
	start_time TIME,
	end_time TIME,
	meetMon VARCHAR(10),
	meetTues VARCHAR(10),
	meetWednes VARCHAR(10),
	meetThurs VARCHAR(10),
	meetFri VARCHAR(10),
    PRIMARY KEY (course_name),
    FOREIGN KEY (v_number) REFERENCES Student(v_num)
);



USE groupMyCalendar;
CREATE TABLE Assignment
(
	assignment_id INT NOT NULL auto_increment,
    assignment_title VARCHAR(30) NOT NULL,
	due_date DATE,
	course_name_assignment VARCHAR(40) NOT NULL,
	description_section TEXT,
	notes TEXT,
    PRIMARY KEY (assignment_id ),
    FOREIGN KEY (course_name_assignment) REFERENCES Course(course_name)
);

USE groupMyCalendar;
CREATE TABLE Assessment
(
	assessment_id INT NOT NULL auto_increment,
    -- test or quiz
    assessment_type VARCHAR(20) NOT NULL,
    assignment_title VARCHAR(20) NOT NULL,
	course_name_assessment VARCHAR(20) NOT NULL,
    due_of DATE,
	material TEXT,
	notes TEXT,
    PRIMARY KEY (assessment_id),
    FOREIGN KEY (course_name_assessment) REFERENCES Course(course_name)
);


USE groupMyCalendar;
CREATE TABLE PersonalTask
(
	task_id INT NOT NULL auto_increment,
    task_title VARCHAR(20) NOT NULL,
    task_with VARCHAR(20),  
    task_location VARCHAR(40),
	task_description TEXT,
    date_of DATE,
    task_status VARCHAR(15),
    task_recurring VARCHAR(15),
    recurringMon VARCHAR(20),
    recurringTues VARCHAR(20),
    recurringWed VARCHAR(20),
    recurringThurs VARCHAR(20),
    recurringFri VARCHAR(20),
    recurringSat VARCHAR(20),
    recurringSun VARCHAR(20),
    start_date DATE,
    end_date DATE,
    v_number VARCHAR(9),
    PRIMARY KEY (task_id),
	FOREIGN KEY (v_number) REFERENCES Student(v_num)
);


USE groupMyCalendar;
CREATE TABLE AcademicTask
(
	task_id INT NOT NULL auto_increment,
    task_title VARCHAR(20) NOT NULL,
    task_course VARCHAR(40), 
	task_description TEXT,
    date_of DATE,
    task_status VARCHAR(15),
    task_recurring VARCHAR(15),
    recurringMon VARCHAR(20),
    recurringTues VARCHAR(20),
    recurringWed VARCHAR(20),
    recurringThurs VARCHAR(20),
    recurringFri VARCHAR(20),
    recurringSat VARCHAR(20),
    recurringSun VARCHAR(20),
    start_date DATE,
    end_date DATE,
    v_number VARCHAR(9),
    PRIMARY KEY (task_id),
	FOREIGN KEY (v_number) REFERENCES Student(v_num)
);


ALTER TABLE Assignment ADD COLUMN assignment_v_number VARCHAR(9);
UPDATE Assignment SET assignment_v_number = 'V00875392';

ALTER TABLE Assessment ADD COLUMN assessment_v_number VARCHAR(9);
UPDATE Assessment SET assessment_v_number = 'V00875392';

ALTER TABLE Assessment ADD FOREIGN KEY (course_name_assessment) REFERENCES Course(course_name) ON UPDATE CASCADE;