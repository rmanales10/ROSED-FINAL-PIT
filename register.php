<?php
include('db.php');
session_start();
$db = new Database('localhost', 'root', 'root123', 'attendance');
if(isset($_POST['emaildb']) && isset($_POST['idnumber']) && isset($_POST['pass'])){
$email = $_POST['emaildb'];
$idnumbmer = $_POST['idnumber'];
$pass = $_POST['pass'];
$newUserData = [
    'email' => $email,
    'id_number' => $idnumbmer,
    'psword' => $pass
];
$insertId = $db->insert('credentials', $newUserData);
$_SESSION['success'] = 'Registered Successfully';
header('location: ./');
}
$db->closeConnection();
header('location: ./');
?>
