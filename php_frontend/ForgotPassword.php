<?php $pageTitle = 'Forgot Password - Toka Fitness'; include 'header.php'; ?>
<link rel="stylesheet" href="Stylesheets/forgot_password.css">
    <div class="forgot-password-container">
        <h1>Forgot Password</h1>
        <form method="post">
            <input type="email" name="email" placeholder="Enter your email" required>
            <button type="submit" name="submit" class="btn">Submit</button>
        </form>
    </div>
<?php include 'footer.php'; ?>
