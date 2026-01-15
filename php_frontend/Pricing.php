<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Pricing • Toka Fitness</title>

  <!-- global site styles -->
  <link rel="stylesheet" href="Stylesheets/homestyles.css" />
  <!-- page specific styles -->
  <link rel="stylesheet" href="Stylesheets/pricing.css" />
</head>
<body>

  <!-- Theme toggle (if you don't have it globally in header) -->
  <button id="themeToggle" class="theme-toggle" aria-label="Toggle theme">🌙</button>

  <!-- Hero -->
  <section class="pricing-hero">
    <div class="container">
      <h1>Choose the plan that's right for you</h1>
      <p class="lead">Flexible memberships for every goal — from getting started to training like an athlete.</p>
    </div>
  </section>

  <!-- Pricing Cards -->
  <section class="pricing-cards container">
    <div class="plan plan--popular">
      <div class="plan-head">
        <h3>Standard</h3>
        <p class="sub">Most popular</p>
      </div>
      <div class="plan-price">
        <span class="price">$39</span><span class="period">/mo</span>
      </div>

      <ul class="features">
        <li>Unlimited gym access</li>
        <li>Group classes</li>
        <li>1 free assessment</li>
        <li>Access to app</li>
      </ul>

      <a class="btn plan-cta" href="Contact.php">Join Standard</a>
    </div>

    <div class="plan">
      <div class="plan-head">
        <h3>Basic</h3>
        <p class="sub">For starters</p>
      </div>
      <div class="plan-price">
        <span class="price">$19</span><span class="period">/mo</span>
      </div>

      <ul class="features">
        <li>Access 3x per week</li>
        <li>Selected group classes</li>
        <li>Shared locker</li>
        <li>Community support</li>
      </ul>

      <a class="btn plan-cta" href="Contact.php">Join Basic</a>
    </div>

    <div class="plan">
      <div class="plan-head">
        <h3>Premium</h3>
        <p class="sub">All-in, best value</p>
      </div>
      <div class="plan-price">
        <span class="price">$69</span><span class="period">/mo</span>
      </div>

      <ul class="features">
        <li>Unlimited access + premium hours</li>
        <li>Unlimited classes</li>
        <li>4 personal training sessions / mo</li>
        <li>Nutrition plan</li>
      </ul>

      <a class="btn plan-cta" href="Contact.php">Join Premium</a>
    </div>
  </section>

  <!-- Comparison table -->
  <section class="pricing-compare container">
    <h2 class="section-title">Compare features</h2>
    <div class="table-wrap">
      <table class="compare-table" aria-label="Pricing comparison">
        <thead>
          <tr>
            <th>Feature</th>
            <th>Basic</th>
            <th>Standard</th>
            <th>Premium</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>Gym Access</td><td>Limited</td><td>Unlimited</td><td>Unlimited</td></tr>
          <tr><td>Group Classes</td><td>Selected</td><td>All</td><td>All + Priority</td></tr>
          <tr><td>Personal Training</td><td>—</td><td>1/mo</td><td>4/mo</td></tr>
          <tr><td>Nutrition Plan</td><td>—</td><td>Optional</td><td>Included</td></tr>
          <tr><td>Mobile App</td><td>✓</td><td>✓</td><td>✓</td></tr>
          <tr><td>Locker</td><td>Shared</td><td>Shared</td><td>Private</td></tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- CTA Banner -->
  <section class="pricing-cta">
    <div class="container">
      <p>Not sure which plan suits you? Book a free consultation and we’ll help tailor your path.</p>
      <a class="btn" href="Contact.php">Book Consultation</a>
    </div>
  </section>

  <?php include 'footer.php'; ?>

  <!-- scripts loaded at end so theme.js can bind correctly -->
	<script src = "Scripts/Hamburger.js"></script>
	<script src="Scripts/theme.js"></script>
</body>
</html>
