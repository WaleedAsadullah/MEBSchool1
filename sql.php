SELECT `which_month`, `year`, `class_id`, `class_name`, `section`, count(`class_id`) "number of records generated" FROM `ac_fee_collection` group by `class_id` , `which_month`, `year` ORDER BY `user_date` DESC

//delete with run date
SELECT `user_date` "Run date" ,`which_month`, `year`, `class_id`, `class_name`, `section`, count(`class_id`) "number of records generated" FROM `ac_fee_collection` group by `user_date` ORDER BY `user_date` DESC

SELECT * FROM `ad_class_fee` WHERE `class_id` = 19
SELECT * FROM `ad_fee_concession`,`ad_assign_student_class` WHERE `student_id` = `gr_no` and `assign_class` = 19
//dashboard
SELECT `guardian_name`, count(a.`addmission_id`) "Number_of_siblings" FROM `ad_admission` a WHERE a.`cnic_guradian` in (SELECT b.`cnic_guradian` from `ad_admission` b group by b.`cnic_guradian`) group by a.`cnic_guradian`

//show on discount
SELECT count(a.`addmission_id`) "Number_of_siblings" FROM `ad_admission` a WHERE a.`cnic_guradian` = (SELECT b.`cnic_guradian` from `ad_admission` b where b.`addmission_id` = 55)


studnet siblings view

SELECT * FROM `ad_admission` a WHERE a.`cnic_guradian` = (SELECT b.`cnic_guradian` from `ad_admission` b where b.`addmission_id` = 55)

SELECT `type`, `account_title`, SUM(`exp_amount`) FROM `ac_rev_exp` WHERE `date_of_rev_exp` <= '2021-08-20' AND `date_of_rev_exp` >= '2019-08-20' GROUP BY `account_title`

SELECT * FROM `ad_teacher_class` WHERE `class_id` in (select `class_id` from `ad_teacher_class` where `class_id` > 1)

SELECT `type`, `account_title`, SUM(`exp_amount`) FROM `ac_rev_exp` WHERE `type` = 'Expenses' AND `date_of_rev_exp` <= '2021-08-20' AND `date_of_rev_exp` >= '2019-08-20' GROUP BY `account_title`


<!-- absent count students-->
SELECT count(`status`) FROM `ad_std_attendance` WHERE `status` = "Absent"

<!-- number of student -->
SELECT count(`addmission_id`) FROM `ad_admission`

<!-- number of teacher -->
SELECT count(`Teacher_records_id`) FROM `ad_teacher_records`

<!-- number of staff -->
SELECT count(`employee_record_id`) FROM `ad_employee_record` 

<!-- number of subject -->
SELECT count(`subject_id`) FROM `ad_subject`

<!-- number of counts -->
SELECT count(`char_of_account_id`) FROM `ac_receivable_chart_of_account`

<!-- number of absent staff -->
SELECT count(`status`) FROM `ad_employee_attendance` WHERE `status` ="Absent"

<!-- number of absent teacher -->
SELECT count(`status`) FROM `ad_teacher_attendance` WHERE `status`= "Absent"

<!-- upcoming booking hall -->
SELECT `date_event` FROM `ac_hall_booking` WHERE `date_event` <= "'.$p_date.'"

<!-- total fee collection -->
SELECT sum(`total`) FROM `ac_fee_module` WHERE `fee_month_name` = ".$pre_month."

<!-- my attendance -->
SELECT count(`status`) FROM `ad_std_attendance` WHERE `status` = "Present" AND `date` <= "'.$month.'" and `gr_no` = "'.$_SESSION['id'].'"