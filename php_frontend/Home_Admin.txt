<?php include 'header_loggedin.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Toka Fitness</title>
  <link rel="stylesheet" href="Stylesheets/homestyles.css" />
</head>

<body>

<!-- THEME BUTTON (only ONE body tag now) -->
<button id="themeToggle" class="theme-toggle">🌙</button>

<section class="hero" style="
    height: 500px;
    background-image: url('Images/Image1.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    position: relative;
    padding: 40px;
">
  <div class="hero-text" style="text-align: center; z-index: 2;">
    <h1>BODY & MIND</h1>
    <p>Join thousands achieving their fitness goals with expert trainers, state-of-the-art facilities, and personalized programs.</p>
    <a class="btn" href="#" style="
        padding: 12px 25px;
        color: white;
        text-decoration: none;
        border-radius: 6px;
    ">Start Free Trial</a>
  </div>
</section>

<section class="stats">
  <div><strong>5000+</strong><br>Active Members</div>
  <div><strong>98%</strong><br>Success Rate</div>
  <div><strong>15+</strong><br>Expert Trainers</div>
  <div><strong>4.9</strong><br>Rating</div>
</section>

<h2 class="section-title">Daily Motivation</h2>
<div class="motivation">
  <div class="quote active">"Your body can stand almost anything. It’s your mind you have to convince."</div>
  <div class="quote">"The only bad workout is the one that didn’t happen."</div>
  <div class="quote">"Strength doesn’t come from what you can do; it comes from overcoming the things you once thought you couldn’t."</div>
</div>

<h2 class="section-title">World-Class Facilities</h2>
<div class="facilities">
  <div class="facility-box">
    <img src="php_frontend/cardio.jpg" alt="Cardio Zone">
    <h3>Premium Cardio Zone</h3>
    <p>Top-tier cardio equipment for maximum endurance improvement.</p>
  </div>
  <div class="facility-box">
    <img src="php_frontend/strength.jpg" alt="Strength Area">
    <h3>Strength Training Area</h3>
    <p>High-quality machines and free weights for serious strength building.</p>
  </div>
</div>

<h2 class="section-title">Success Stories</h2>
<div class="success">
  <div class="card">
    <h4>Sarah Johnson</h4>
    <p>“Amazing trainers and supportive atmosphere! I reached my fitness goal in 3 months.”</p>
  </div>
  <div class="card">
    <h4>Mike Carr</h4>
    <p>“Best gym experience I’ve ever had. Equipment is modern and super clean.”</p>
  </div>
  <div class="card">
    <h4>Elena Rodriguez</h4>
    <p>“Their personalized plan helped me change my life completely.”</p>
  </div>
</div>

	<script src = "Scripts/Hamburger.js"></script>
	<script src="Scripts/theme.js"></script>
	<script src="Scripts/Motivation.js"></script>

<?php include 'footer.php'; ?>
</body>
</html>
