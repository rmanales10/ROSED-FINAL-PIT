<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('location: ./error');
}
include('db.php');
session_start();
if(isset($_POST['email']) && $_POST['password']){
$user = $_POST['email'];
$pass = $_POST['password'];
$studentProfile = $db->selectWithWhere('credentials inner join student_profile using(student_id)','*','id_number = "'.$user.'"')[0];
    $_SESSION = $studentProfile['full_name'];
    $_SESSION = $studentProfile['section'];
    $_SESSION = $studentProfile['gender'];
    $_SESSION = $studentProfile['address'];
    $_SESSION = $studentProfile['date_of_birth'];
    $_SESSION = $studentProfile['age'];
    $_SESSION = $studentProfile['civil_status'];
    

if($user === '0000000000' && $pass === '1234'){
    $_SESSION['authenticated'] = true;
    $_SESSION['name'] = "Admin Login";
    header('Location: user/dashboard');
    exit();
}
if($db->selectWithWhere('credentials','*','id_number="'.$user.'" AND psword="'.$pass.'"')){
    $_SESSION['authenticated'] = true;
    $_SESSION['name'] = "Admin Login";
    
    header('location: user/profile');
    exit();
}
$db->closeConnection();
}
/*
function g($string, $start, $end) {
    $str = explode($start, $string);
    if (isset($str[1])) {
        $str = explode($end, $str[1]);
        return $str[0];
    }
    return false;
}

function clearCookies() {
    foreach (glob('cookie/*.txt') as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }
}

if (!is_dir('cookie')) {
    mkdir('cookie');
}

$cookie = [
    getcwd() . '/cookie/' . mt_rand() . rand() . '.txt',
];


$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_URL, 'https://prisms.ustp.edu.ph/auth/login');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Origin: https://prisms.ustp.edu.ph';
$headers[] = 'Referer: https://prisms.ustp.edu.ph/auth/login';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie[0]);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie[0]);
$response = curl_exec($ch);
$token = g($response, 'name="_token" id="_token" value="', '">');
curl_close($ch);

$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_URL, 'https://prisms.ustp.edu.ph/auth/login');
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Host: prisms.ustp.edu.ph';
$headers[] = 'Origin: https://prisms.ustp.edu.ph';
$headers[] = 'Referer: https://prisms.ustp.edu.ph/auth/login';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie[0]);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie[0]);
curl_setopt($ch, CURLOPT_POSTFIELDS, '_token=' . $token . '&Username=' . $user . '&password=' . $pass . '&remember=0');
$response1 = curl_exec($ch);
curl_close($ch);
if (strpos($response1, 'Welcome To Dashboard!')) {

    $_SESSION['authenticated'] = true;
    $_SESSION['name'] = strtoupper(g($response1, '<span class="username uppercase username-hide-on-mobile">', '</span>'));
    $_SESSION['profile_pic'] = g($response1,'<img alt="" class="img-circle" src="','"/>');
    header('Location: user/dashboard');
    exit();
} else {
    $_SESSION['error'] = 'Wrong username or password';
    header('Location: ./');
    exit();     
}
*/

//clearCookies();

?>
