<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('location: ./error');
}
include('db.php');
session_start();
#-------------------------------------------------Register-----------------------------------------------------#
if (isset($_POST['emaildb']) && isset($_POST['idnumber']) && isset($_POST['pass'])) {
    $email = $_POST['emaildb'];
    $idnumber = $_POST['idnumber'];
    $pass = $_POST['pass'];
    $newUserData = [
        'email' => $email,
        'id_number' => $idnumber,
        'psword' => $pass
    ];
    $insertId = $db->insert('credentials', $newUserData);
    $_SESSION['success'] = 'Registered Successfully';
    header('location: ./');
}
#-------------------------------------------------Student-Profile-----------------------------------------------------#
if (isset($_POST['fullName']) && isset($_POST['section']) && isset($_POST['gender']) && isset($_POST['address']) && isset($_POST['dob']) && isset($_POST['age']) && isset($_POST['civilStatus'])) {
    // Retrieve form data
    $fullName = $_POST['fullName'];
    $section = $_POST['section'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $civilStatus = $_POST['civilStatus'];
    $student_profile = [
        'full_name' => $fullName,
        'section' => $section,
        'gender' => $gender,
        'address' => $address,
        'date_of_birth' => $dob,
        'age' => $age,
        'civil_status' => $civilStatus
    ];
    $insertId = $db->insert('student_profile', $student_profile);
    echo $_SESSION['edit'] = 'Edit Successfully';
}


$db->closeConnection();
