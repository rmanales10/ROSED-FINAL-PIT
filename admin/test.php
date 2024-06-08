<?php
include './db.php';
$student = $db->selectWithWhere('attendance_users ','*','');
foreach($student as $a){
    echo $a['id'];
  }
?>