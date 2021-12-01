SELECT task_id, v_number, task_title, task_type, task_course, NULL as task_with, NULL as task_location, task_description, date_of, task_status, task_recurring, recurringMon, recurringTues, recurringWed, recurringThurs, recurringFri, recurringSat, recurringSun, start_date, end_date
  FROM AcademicTask
UNION 
SELECT task_id, v_number, task_title, task_type, NULL as task_course, task_with, task_location, task_description, date_of, task_status, task_recurring, recurringMon, recurringTues, recurringWed, recurringThurs, recurringFri, recurringSat, recurringSun, start_date, end_date
  FROM PersonalTask
  
  WHERE v_number='V00875392';