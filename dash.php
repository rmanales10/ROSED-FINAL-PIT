<?php 
session_start();
if (!isset($_SESSION['authenticated'])) {
    header("location: ./");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>dasd
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative min-h-screen bg-gray-800">
<div class="absolute inset-0 flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow">
        <p class="font-bold";>Welcome, <?php echo $_SESSION['name']; ?></p>
        </div>
        <a href="logout.php" class="btn btn-accent float-end">Logout</a>
    </div>
    
</body>
</html>
