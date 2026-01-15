<?php $pageTitle = 'Login - Toka Fitness'; include 'header.php'; ?>
<link rel="stylesheet" href="Stylesheets/login.css">
    <div class="login-container">
        <h1>Login</h1>
        <form method="post">
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login" class="btn">Log In</button>
            <a href="ForgotPassword.php" class="forgot-password">Forgot Password?</a>
        </form>
    </div>
<?php include 'footer.php'; ?>

<?php
if (isset($_POST['login'])) {
    // Build JSON request
    $data = [
        "Action" => "login",
        "email" => $_POST['email'],
        "password" => $_POST['password']
    ];

    $inputFile = __DIR__ . '/json/login_request.json';
    $outputFile = __DIR__ . '/json/login_response.json';
    file_put_contents($inputFile, json_encode($data, JSON_PRETTY_PRINT));

    // Run C# console backend
    $exePath = '..\console_backend\console_backend\bin\Debug\net8.0\console_backend.exe'; 
    exec("\"$exePath\" \"$inputFile\" \"$outputFile\"");

    // Read backend response
    if (file_exists($outputFile)) {
        $response = json_decode(file_get_contents($outputFile), true);

        if ($response["Status"] === "success") {
            echo "<p style='color:green;text-align:center;'>Login successful! Redirecting...</p>";

            // Redirect based on admin/user role
            if (isset($response['User']) && $response['User']['is_admin'] == 1) {
                header("Refresh: 2; url=Admins.php");
            } else {
                header("Refresh: 2; url=home.php");
            }
        } else {
            echo "<p style='color:red;text-align:center;'>{$response['Message']}</p>";
        }
    } else {
        echo "<p style='color:red;text-align:center;'>Backend did not respond.</p>";
    }
}
?>


