<?php
include './db.php';
function captureTenDigitNumber($input) {
    // Use regex to find a 10-digit number in the string
    preg_match('/\d{10}/', $input, $matches);
    
    if (!empty($matches)) {
        return $matches[0];
    } else {
        return "No 10-digit number found in the input.";
    }
}

// Example usage
$inputString = "Seth Ian Encarnada 2020307507 Marang";
$result = captureTenDigitNumber($inputString);

$student = $db->selectWithWhere('users','*','id_number="'.$result.'"')[1];
echo $full_name = $student['full_name'];
$id_number = $student['id_number'];
$section = $student['section'];
?>
