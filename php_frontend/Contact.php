<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Toka Fitness</title>
  <link rel="stylesheet" href="Stylesheets/homestyles.css" />
  <link rel="stylesheet" href="Stylesheets/contact.css" />
</head>
<body>

<!-- HERO -->
<section class="contact-hero">
  <h1>Get In Touch</h1>
  <p>Ready to start your fitness journey? Have questions about our programs?  
  We’re here to help every step of the way. Let’s talk!</p>
</section>


<!-- CONTACT CARDS -->
<section class="contact-cards container">
  <div class="contact-card">
    <h3>Visit Us</h3>
    <p>123 Fitness Ave, Suite 400<br>New York, NY</p>
  </div>

  <div class="contact-card">
    <h3>Call Us</h3>
    <p>(123) 456-7890<br>Mon–Sun 6am–10pm</p>
  </div>

  <div class="contact-card">
    <h3>Email Us</h3>
    <p>support@tokafitness.com<br>We reply within 24 hours</p>
  </div>

  <div class="contact-card">
    <h3>Hours</h3>
    <p>Mon–Fri: 5am–11pm<br>Sat–Sun: 6am–9pm</p>
  </div>
</section>

<!-- FORM + MAP -->
<section class="form-map container">
  <div class="contact-form">
    <h2>Send Us a Message</h2>
    <p>Fill out the form and our team will respond shortly.</p>

    <form>
      <div class="row">
        <input type="text" placeholder="First Name" required />
        <input type="text" placeholder="Last Name" required />
      </div>

      <div class="row">
        <input type="email" placeholder="Email" required />
        <input type="text" placeholder="Phone Number" />
      </div>

      <textarea placeholder="Message" rows="5" required></textarea>

      <button class="btn" type="submit">Send Message</button>
    </form>
  </div>

  <div class="contact-map">
    <h2>Find Us</h2>
    <div class="map-box">Map Placeholder</div>
    <img src="https://via.placeholder.com/550x260" alt="Gym facility" class="map-img" />
    <p class="map-caption">Our modern training facility is equipped with premium equipment and expert coaches.</p>
  </div>
</section>

<!-- FAQ -->
<section class="faq container">
  <h2 class="section-title">Quick Answers</h2>

  <div class="faq-grid">
    <div class="faq-card">
      <h4>What are your membership options?</h4>
      <p>We offer monthly, yearly, student and family plans.</p>
    </div>

    <div class="faq-card">
      <h4>Do you offer personal training?</h4>
      <p>Yes — certified trainers available for 1-on-1 sessions.</p>
    </div>

    <div class="faq-card">
      <h4>Can I try before I join?</h4>
      <p>Yes! Enjoy a free 1-day trial pass anytime.</p>
    </div>

    <div class="faq-card">
      <h4>What safety measures do you follow?</h4>
      <p>Regular cleaning, spaced equipment and trained staff.</p>
    </div>
  </div>

  <div class="center">
    <a class="btn" href="FAQ.php">More FAQs</a>
  </div>
</section>
	<script src = "Scripts/Hamburger.js"></script>
	<script src="Scripts/theme.js"></script>
</body>
</html>

<?php include 'footer.php'; ?>