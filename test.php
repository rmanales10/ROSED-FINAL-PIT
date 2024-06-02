<?php
//select * from credentials
//inner join student_profile using(student_id) where id_number = '2020307507';
include 'db.php';
$studentProfile = $db->selectWithWhere('credentials inner join student_profile using(student_id)','*','id_number = "2020307507"')[0];
print_r($studentProfile);
/*
 [student_id] => 1
    [email] => sangewaze@gmail.com
    [id_number] => 2020307507
    [psword] => manales
    [full_name] => rolan t maales
    [section] => bsit-23
    [gender] => Male
    [address] => dsadas
    [date_of_birth] => 2024-06-05
    [age] => 0
    [civil_status] => Single
*/