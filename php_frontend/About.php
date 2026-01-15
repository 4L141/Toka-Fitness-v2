<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About/Toka Fitness</title>
  <link rel="stylesheet" href="Stylesheets/homestyles.css" />
  <link rel="stylesheet" href="Stylesheets/about.css" />
</head>
<body>

  <!-- THEME BUTTON -->
  <button id="themeToggle" class="theme-toggle">🌙</button>

  <section class="about-hero">
    <div class="hero-overlay"></div>
    <div class="about-hero-inner container">
      <div class="about-copy">
        <h1>About Toka Fitness</h1>
        <p class="lead">
          Founded in 2008, Toka Fitness has been transforming lives through training, nutrition, and community.
          We combine evidence-based coaching with modern facilities to help every member move, feel, and live better.
        </p>
        <div class="hero-ctas">
          <a class="btn" href="#">Join a Class</a>
          <a class="btn" href="#">Contact Us</a>
        </div>
      </div>
    </div>
  </section>


    <!-- MISSION -->
    <section class="mission container">
      <h2 class="section-title">Our Mission</h2>
      <p class="mission-text">To empower individuals to achieve their best through tailored training, nutritional guidance, and community support — building confidence, resilience, and lifelong healthy habits.</p>
    </section>

    <!-- CORE VALUES -->
    <section class="core-values container">
      <h2 class="section-title">Our Core Values</h2>
      <div class="values-grid">
        <div class="value-card">
          <div class="value-icon">💪</div>
          <h4>Passion for Fitness</h4>
          <p>We love movement and help members discover what they enjoy so fitness becomes sustainable.</p>
        </div>

        <div class="value-card">
          <div class="value-icon">🎯</div>
          <h4>Goal-Oriented</h4>
          <p>Personalized plans and measurable progress so you always know how you're improving.</p>
        </div>

        <div class="value-card">
          <div class="value-icon">🤝</div>
          <h4>Community Support</h4>
          <p>Training alongside encouraging teammates makes success faster and more fun.</p>
        </div>

        <div class="value-card">
          <div class="value-icon">⭐</div>
          <h4>Excellence in Service</h4>
          <p>Friendly, certified coaches and spotless facilities for a premium experience every visit.</p>
        </div>
      </div>
    </section>

    <!-- TRAINERS -->
    <section class="trainers container">
      <h2 class="section-title">Meet Our Expert Trainers</h2>

      <div class="trainers-grid">
        <article class="trainer-card">
          <img src="Images/Marcus.jpg" alt="Marcus Thompson" />
          <div class="trainer-body">
            <h4>Marcus Thompson</h4>
            <p class="text-muted">Strength & Conditioning Coach</p>
            <p>Specializes in hypertrophy and athletic performance. 10+ years coaching experience and competitive background.</p>
          </div>
        </article>

        <article class="trainer-card">
          <img src="Images/Jessica.jpg" alt="Jessica Martinez" />
          <div class="trainer-body">
            <h4>Jessica Martinez</h4>
            <p class="text-muted">Nutrition & Wellness</p>
            <p>Registered nutrition coach who designs meal plans tailored to lifestyle, goals, and preferences.</p>
          </div>
        </article>

        <article class="trainer-card">
          <img src="Images/Kim.jpg" alt="David Kim" />
          <div class="trainer-body">
            <h4>Kim David</h4>
            <p class="text-muted">Functional Training</p>
            <p>Focuses on mobility, injury prevention and movement efficiency. Ideal for every age and level.</p>
          </div>
        </article>
      </div>
    </section>

    <!-- JOURNEY / TIMELINE -->
    <section class="journey container">
      <h2 class="section-title">Our Journey</h2>

      <ul class="timeline">
        <li>
          <div class="timeline-dot">2008</div>
          <div class="timeline-content">
            <h4>Toka Fitness Founded</h4>
            <p>Our first gym opened with a simple mission: provide community-led training with heart.</p>
          </div>
        </li>

        <li>
          <div class="timeline-dot">2013</div>
          <div class="timeline-content">
            <h4>Major Expansion</h4>
            <p>We expanded to three new locations and increased group-class offerings.</p>
          </div>
        </li>

        <li>
          <div class="timeline-dot">2019</div>
          <div class="timeline-content">
            <h4>Digital Innovation</h4>
            <p>Launch of our online coaching platform and mobile workout tracking app.</p>
          </div>
        </li>

        <li>
          <div class="timeline-dot">2024</div>
          <div class="timeline-content">
            <h4>2,000+ Members Strong</h4>
            <p>Now a thriving community of members who train, learn and grow together.</p>
          </div>
        </li>
      </ul>
    </section>

  </main>
	<script src = "Scripts/Hamburger.js"></script>
	<script src="Scripts/theme.js"></script>
</body>
</html>

<?php include 'footer.php'; ?>