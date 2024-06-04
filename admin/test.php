<?php
include './db.php';
$student = $db->selectWithWhere('users','*','');
foreach($student as $a){
    echo $a['id'];
  }
?>