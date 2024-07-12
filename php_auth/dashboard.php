<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.html');
    exit();
}

date_default_timezone_set('Asia/Dhaka');

$current_hour = date('H');
//$greeting = 'Hello';

if ($current_hour >= 5 && $current_hour < 12) {
  $greeting = 'Good Morning';
} elseif ($current_hour >= 12 && $current_hour < 18) {
  $greeting = 'Good Afternoon';
} elseif ($current_hour >= 18 && $current_hour < 22) {
  $greeting = 'Good Evening';
} else {
  $greeting = 'Good Night';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dash.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>


<div class="navbar">

      <div class="nav-logo">
        <a href="dashboard.php"> Dashboard</a>
        <div class="active"></div>
      </div>  
      <div class="nav-links">
      </div>
      <div class="nav-btns">
      <span class="las la-power-off"></span>
      <span><a href="logout.php">Logout</a></span>

   </div>
    
  </div>


    <div class="container">

    <div class="hero-text">

      <h2> Welcome & <?php echo htmlspecialchars($greeting); ?>!</h2>
      <h3> Currently logged in with : <span style="color: #575fcf;"> <?php echo htmlspecialchars($_SESSION['username']); ?></span></h3>

      <p>This is your personalized dashboard. Manage your tasks, updates, and more.</p>

      <h3> Quick Links ⏬</h3>
        <ul>
          <li><a href="update.html">Update Profile</a></li>
        </ul>
      
    </div>

    <div class="hero-img">
      <img src="images/hero-img.jpg" alt="hero-img">
    </div>
   
    
    </div>

    <footer class="footer">
    <p>&copy; <?php echo date("Y"); ?> All rights reserved.</p>
    </footer>
   
</body>
</html>

