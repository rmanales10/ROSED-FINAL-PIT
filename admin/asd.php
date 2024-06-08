<?php
include './db.php';

// Assuming $db is your mysqli connection
$query = "SELECT COUNT(time_out) AS total_count FROM record WHERE time_out IS NOT NULL";
$result = $db->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    $totalto = $row['total_count'];
    echo $totalto;
}
?>
