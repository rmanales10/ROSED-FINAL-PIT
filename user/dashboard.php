<?php 
session_start();
if (!isset($_SESSION['authenticated'])) {
    header("location: ../");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="script.js" defer ></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Dashboard</title>
  </head>
  <body class="m-0 bg-zinc-900">
    <div class="flex">
      <ul class="menu bg-base-200 gap-5 h-full w-[20%] flex flex-col items-center justify-center bg-zinc-900 fixed z-50">
        <div class="flex justify-center flex-col items-center gap-3 mt-5">
          <img src="../src/usg.jpg" class="rounded-full w-[100px]">
          
        </div>
        <li class="bg-gray-800 rounded-sm w-full">
          <a class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Homepage">
            <i class="bi bi-house text-white"></i><h1 class="hidden md:block text-white">Homepage</h1>
          </a>
        </li>
        <li class="w-full">
          <a href="#" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="QR code">
            <i class="bi bi-qr-code text-white"></i><h1 class="hidden md:block text-white">QR code</h1>
          </a>
        </li>
        <li class="w-full">
          <a class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Attendance">
            <i class="bi bi-file-earmark-check-fill text-white"></i><h1 class="hidden md:block text-white">Attendance</h1>
          </a>
        </li>
        <li class="w-full">
          <a class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Upcoming Events">
            <i class="bi bi-calendar-check text-white"></i><h1 class="hidden md:block text-white">Upcoming Events</h1>
          </a>
        </li>
        <li class="w-full">
          <a class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Student Profile">
            <i class="bi bi-person-circle text-white"></i><h1 class="hidden md:block text-white">Student Profile</h1>
          </a>
        </li>
        <li class="w-full">
          <a class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Penalty">
            <i class="bi bi-exclamation-octagon-fill text-white"></i><h1 class="hidden md:block text-white">Penalty</h1>
          </a>
        </li>
        <li class="w-full">
          <a class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Enrolment Fees">
            <i class="bi bi-cash text-white"></i><h1 class="hidden md:block text-white">Enrolment Fees</h1>
          </a>
        </li>
        <li class="w-full">
          <a class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Notification">
            <i class="bi bi-bell-fill text-white"></i><h1 class="hidden md:block text-white">Notification</h1>
          </a>
        </li>
        <li class="w-full">
          <a href="../logout.php" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Logout">
            <i class="bi bi-box-arrow-left text-white"></i><h1 class="hidden md:block text-white">Logout</h1>
          </a>
        </li>
      </ul>
      
      <div class="flex-1 ml-[20%] p-5 w-full h-full bg-slate-800">
        
        <!-----------------navbar------------------>

        <div class="navbar bg-base-100">
          <div class="flex-1">
            <a class="btn btn-ghost text-xl"><img src="../src/ustp.jpg" class="w-[40px] rounded-full"></a>
            <p>University of Science & Technology of Southern Philippines</p>
          </div>
          <div class="flex-none">
           
            <div class="dropdown dropdown-end">
              <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                  <img src="<?php echo $_SESSION['profile_pic']?>" />
                </div>
              </div>
              <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li>
                  <a class="justify-between">
                    Profile
                    <span class="badge">New</span>
                  </a>
                </li>
                <li><a>Settings</a></li>
                <li><a href="../logout.php">Logout</a></li>
              </ul>
            </div>
          </div>
          
        </div>
<!------------------------------------------>
<div role="alert" class="alert alert-info mt-10">
  <span>Welcome, <?php echo $_SESSION['name']; ?></span>
</div>
<!-- #Quick Acces -->
<h1 class="text-[2rem] text-center mt-10 font-bold">Quick Access</h1>
<div class="flex flex-col mt-10 items-center justify-center text-center gap-10 lg:flex-row">

<a href="dashboard.php" class="card w-96 h-[192px] bg-base-100 shadow-xl image-full">
  <figure><img src="../src/image-qr-code.webp" /></figure>
  <div class="card-body">
    <h2 class="card-title">QR CODE</h2>
    <p>A QR code for student verification is a digital solution used to streamline and secure the process of verifying student identities.</p>
    <div class="card-actions justify-end">
    </div>
  </div>
</a>
<a href="dashboard.php" class="card w-96 h-[192px] bg-base-100 shadow-xl image-full">
  <figure><img src="../src/attendance.jpg" /></figure>
  <div class="card-body">
    <h2 class="card-title">ATTENDANCE</h2>
    <p>Attendance refers to the act of being present at a designated place during a specified time.</p>
    <div class="card-actions justify-end">
    </div>
  </div>
</a>
<!-- #Quick Acces -->
       </div>
       <div class="flex flex-col mt-10 items-center justify-center text-center gap-10 lg:flex-row">

        <a href="dashboard.php" class="card w-96 h-[192px] bg-base-100 shadow-xl image-full">
          <figure><img src="../src/eenves.jpg "  /></figure>
          <div class="card-body">
            <h2 class="card-title">UPCOMING EVENTS</h2>
            <p>Upcoming events are scheduled activities or occasions that are set to occur in the near future.</p>
            <div class="card-actions justify-end">
            </div>
          </div>
        </a>
        <a href="dashboard.php" class="card w-96 h-[192px] bg-base-100 shadow-xl image-full">
          <figure><img src="../src/penalty.jpg"  /></figure>
          <div class="card-body">
            <h2 class="card-title">PENALTY</h2>
            <p>Penalty refers to a punitive consequence or disciplinary action imposed as a result of violating rules, regulations, or failing to meet obligations.</p>
            <div class="card-actions justify-end">
            </div>
          </div>
        </a>
        <!-- #Quick Acces -->
        
               </div>
               <footer class="footer footer-center p-4 bg-base-300 text-base-content mt-10">
                <aside>
                  <p>Copyright © 2024 - WAla ko kabalo ani</p>
                </aside>
              </footer>
               
    </div>
  </body>
</html>
