<?php
session_start();

$loggedIn = isset($_SESSION['user_id']);
$exploreLink = isset($_SESSION['email']) ? 'explore.php' : 'aboutus.php';
$username = $_SESSION['name'] ?? "Guest";
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HikeHub</title>
 
</head>
<body>
  <!-- Header -->
 <header>
  <a href="index.php" class="logo-link">
    <h1>🌄 HikeHub</h1>
  </a>
  <nav>
    <!-- Phone icon -->
    <a href="Sos.php">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
      </svg>
    </a>

    <?php if ($loggedIn): ?>
      <!-- Logged-in user -->
      <div class="profile-pic">
        <a href="Sos.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
          </svg>
        </a>
        <div class="profile">
          <p class="name-profile"><?php echo htmlspecialchars($username); ?></p>
        </div>
        <div class="prof-svg">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
          </svg>
        </div>
      </div>
    <?php else: ?>
      <!-- Not logged in -->
      <a href="login.php" class="login-btn">Login</a>
    <?php endif; ?>
  </nav>
</header>
<main>
<div class="main-text">
    <h1>About HikeHub</h1>
</div>


    <div class="main-content">
        <div class="content-text">
            <h3><br><br>Connecting adventurers with nature's most breathtaking trails since 2018</h3>
            <h3><br><br>Born from a passion for exploration and a love for the great outdoors, 
                        HikeHub started as a small group of friends sharing trail recommendations around a campfire. 
                            What began as simple conversations 
                        about hidden gems and challenging peaks has evolved into something extraordinary.</h3>
                        <h3><br><br>Today, we've grown into a global community of over 10,000 hiking 
                            enthusiasts who believe that the best adventures happen when we step outside our 
                            comfort zones. Our mission is simple yet powerful: 
                            make hiking accessible, safe, and enjoyable for everyone, regardles of experience level.</h3>
            <h3><br><br>From your first nature walk to conquering challenging peaks, 
                        we're here to guide your journey every step of the way. Because we believe that 
                        every trail has a story, and every hiker has the potential to 
                        discover something incredible—both in nature and within themselves. 
         </div>
        <div class="image">
        <div class="card">
                <img src="img/bundok5.jpg" alt="">
            </div>
            <div class="card">
                <img src="img/bundok1.jpg" alt="">
            </div>
            <div class="card">
                <img src="img/bundok2.jpg" alt="">
            </div>
    </div>
</main>
  </body>
    </html>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }
    body {
      background-color: #f0f9f6;
    }
      header {
      background: #2e8b57;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
    }
    header h1 {
      font-size: 22px;
    }
     header nav a {
      color: white;
      margin-left: 20px;
      text-decoration: none;
      font-weight: bold;
    }
    .image {
        display: flex;
        flex-direction: column;
        justify-content: center; /* or space-between / space-around */
        gap: 20px; /* spacing between images */
        padding: 10px;

    }
     .card {
      background: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      text-align: center;
    }

    .card img {
       width: 300px; /* adjust as needed */
        height: auto;
        border-radius: 8px;
        object-fit: cover;

    }
    .main-content {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding: 30px;
        gap: 60px;
        }

        .content-text {
        flex: 1;
        max-width: 30%;
        }

        h3{
            text-align: center;
        }
        .main-text h1{
            text-align: center;
            color: #2e8b57;
            padding: 30px;
        }
        .logo-link {
            text-decoration: none;     
            color: inherit;            
            display: flex;            
            align-items: center;
            gap: 10px;                
            }

            .logo-link img {
            height: 40px;             
            }
  
  .login-btn {
  background-color: white;
  color: #2e8b57;
  padding: 5px 15px;
  border-radius: 5px;
  font-weight: bold;
  text-decoration: none;
  transition: background 0.2s;
}
.login-btn:hover {
  background-color: #d4f0e0;
}
  </style>
