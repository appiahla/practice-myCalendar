-- student View
CREATE VIEW student_view (V_Number, Username, Password, First_name, Last_name, DOB, Age, School_Year, GPA) AS
	SELECT v_num, username, password, first_name, last_name, date_of_birth, timestampdiff(YEAR, date_of_birth, current_date()) as Age, school_year, gpa
	FROM Student;
