UPDATE Course 
SET location='Engineering West Hall'
WHERE v_number="V00875392" AND crn="36125";


UPDATE Course 
SET address='601 W Main St, Richmond, VA 23220'
WHERE v_number="V00875392" AND crn="36125";


USE groupMyCalendar;
INSERT INTO Course (crn, course_num, course_name, section_num, professor_name, grade, location, address, v_number)
	VALUES(
    '40828',
	'CMSC 455',
    'SOFTWARE AS A SERVICE',
    '001',
    'Kostadin Damevski',      
    '97.83',
    'Oliver Hall- Physical Sciences',
    '1015 W Main St, Richmond, VA 23220',
    'V00875392'
);