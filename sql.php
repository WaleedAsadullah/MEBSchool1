//reports on outstanding fee amount

SELECT `student_id`, `student_name`, `class_name`, `section`, sum(`fee_total`) "total fee todate" ,sum(`amount_pay`) "Total fee paid to date" , (sum(`fee_total`)-sum(`amount_pay`)) "Arrears" FROM `ac_fee_collection_done` group by `student_id` 

//reports on outstanding fee amount

SELECT `student_id`, `student_name`, `class_name`, `section`, sum(`fee_total`) "total fee todate" ,sum(`amount_pay`) "Total fee paid to date" , (sum(`fee_total`)-sum(`amount_pay`)) "Arrears" FROM `ac_fee_collection_done` group by `student_id`  where  `student_id` = 52

SELECT count(`student_id`)"Number of students", sum(`fee_total`) "total fee todate" ,sum(`amount_pay`) "Total fee paid to date" , (sum(`fee_total`)-sum(`amount_pay`)) "Arrears" FROM `ac_fee_collection_done`


SELECT `acfcd`.`student_id`, `acfcd`.`student_name`, `acfcd`.`class_name`, `acfcd`.`section`, sum(`acfc`.`fee_total`) "total fee todate" ,sum(`acfcd`.`amount_pay`) "Total fee paid to date" , (sum(`acfc`.`fee_total`)-sum(`acfcd`.`amount_pay`)) "Arrears" FROM `ac_fee_collection_done` `acfcd`,`ac_fee_collection` `acfc` WHERE `acfcd`.`student_id` = `acfc`.`student_id` and `acfcd`.`student_id` = 55 

SELECT `acfcd`.`student_id`, `acfcd`.`student_name`, `acfcd`.`class_name`, `acfcd`.`section`, sum(`acfc`.`fee`) "total fee todate" , sum(`acfcd`.`amount_pay`) "Total fee paid to date" , (sum(`acfc`.`fee`)- sum(`acfcd`.`amount_pay`)) "Arrears" FROM `ac_fee_collection_done` acfcd  LEFT JOIN `ac_fee_collection` acfc ON `student_id` = `studend_id`

SELECT count(`acfc`.`studend_id`),`acfc`.`studend_id`, `acfc`.`student_name`, `acfc`.`class_name`, `acfc`.`section`, sum(`acfc`.`fee`) "total fee due to date" , COALESCE(sum(`acfcd`.`amount_pay`),0) "Total fee paid to date" , (sum(`acfc`.`fee`)- COALESCE(sum(`acfcd`.`amount_pay`),0)) "Arrears" FROM `ac_fee_collection` acfc LEFT JOIN `ac_fee_collection_done` acfcd ON `studend_id` = `student_id` and `which_month` = `month` group by `studend_id`

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