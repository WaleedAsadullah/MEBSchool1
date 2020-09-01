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