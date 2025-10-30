<?php
session_start();

// Dynamically decide where the Explore button goes
$exploreLink = isset($_SESSION['email']) ? 'explore.php' : 'login.php';
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
      <a href="Sos.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
        </svg></a>
      <a href="aboutus.php">About Us</a>
      <a href="login.php" class="login-btn">Login</a>
      
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="hero">
    <img src="img/Mt._Marami.jpg" alt="Mountains">
    <div class="hero-text">
      <h2>Discover Your Next <span class="highlight"><br>Adventure</span></h2>
      <p>Find the perfect hiking trail and connect with expert guides to explore nature safely and confidently.</p>
      <button id="myButton" onclick="location.href='<?php echo $exploreLink; ?>'">
  Start Exploring
</button>
    </div>
  </section>

  <!-- Gallery Section -->
  <section class="gallery-section">
    <h3>Gallery</h3>
    <p>Explore stunning hiking destinations captured by our community of adventurers</p>
    <div class="gallery">
      <div class="card">
        <img src="img/bundok5.jpg" alt="">
        <span class="difficulty moderate">Moderate</span>
      </div>
      <div class="card">
        <img src="img/bundok1.jpg" alt="">
        <span class="difficulty easy">Easy</span>
      </div>
      <div class="card">
        <img src="img/bundok2.jpg" alt="">
        <span class="difficulty moderate">Moderate</span>
      </div>
      <div class="card">
        <img src="img/bundok3.jpg" alt="">
        <span class="difficulty easy">Easy</span>
      </div>
      <div class="card">
        <img src="img/bundok4.jpg" alt="">
        <span class="difficulty moderate">Moderate</span>
      </div>
      <div class="card">
        <img src="img/bundok6.jpg" alt="">
        <span class="difficulty easy">Easy</span>
      </div>
    </div>
  </section>
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

    .hero {
      position: relative;
      text-align: center;
      color: white;
    }

    .hero img {
      width: 100%;
      height: 700px;
      object-fit: cover;
      filter: brightness(70%);
    }

    .hero-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .hero-text h2 {
      font-size: 36px;
      font-weight: bold;
    }

    .hero-text p {
      margin: 15px 0;
      font-size: 16px;
    }

    .hero-text button {
      padding: 10px 20px;
      background: black;
      color: white;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
    }

    .gallery-section {
      text-align: center;
      padding: 40px 20px;
    }

    .gallery-section h3 {
      font-size: 24px;
      margin-bottom: 10px;
      color: #2e8b57;
    }

    .gallery-section p {
      margin-bottom: 30px;
      color: #333;
    }

    .gallery {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      max-width: 800px;
      margin: auto;
    }

    .card {
      background: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      text-align: center;
    }

    .card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .difficulty {
      display: inline-block;
      margin: 10px;
      padding: 5px 15px;
      border-radius: 20px;
      font-weight: bold;
    }

    .easy {
      background: #d8f5d2;
      color: #2e8b57;
    }

    .moderate {
      background: #fff1c6;
      color: #a67c00;
    }

    .highlight {
    color: #00ff88; 
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
.profile-tag{
  text-decoration: none;
  color: inherit;
}
.profile-tag .name-profile{
  color:inherit;
  margin:0;
  padding:0;
}
  </style>
