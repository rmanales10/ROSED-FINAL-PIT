<?php
include 'db.php';
$studentProfile = $db->selectWithWhere('users','*','id_number=2020203002')[0];
$Sfullname = $studentProfile['full_name'];
$Semail = $studentProfile['email'];
$Ssection = $studentProfile['section'];
$Sid_number = $studentProfile['id_number'];
$Sdate_registered = $studentProfile['date_registered'];
?>