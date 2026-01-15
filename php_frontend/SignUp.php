<?php $pageTitle = 'Sign Up - Toka Fitness'; include 'header.php'; ?>
<link rel="stylesheet" href="Stylesheets/signup.css">
    <div class="signup-container">
        <h1>Sign Up</h1>
        <form method="post">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="signup" class="btn">Sign Up</button>
        </form>
    </div>
<?php include 'footer.php'; ?>

<?php
if (isset($_POST['signup'])) {
    // Step 1: Gather form data
    $data = [
        "Action" => "register",
        "first_name" => $_POST['first_name'],
        "last_name" => $_POST['last_name'],
        "email" => $_POST['email'],
        "password" => $_POST['password']
    ];

    // Save JSON request
    $inputFile = __DIR__ . '/json/register_request.json';
    $outputFile = __DIR__ . '/json/register_response.json';
    file_put_contents($inputFile, json_encode($data, JSON_PRETTY_PRINT));

    // Step 3: Run the C# console backend
    $exePath = '..\console_backend\console_backend\bin\Debug\net8.0\console_backend.exe'; // ⚠️ update this path to your actual location
    exec("\"$exePath\" \"$inputFile\" \"$outputFile\"");

    // Read backend response
    if (file_exists($outputFile)) {
        $response = json_decode(file_get_contents($outputFile), true);

        if ($response['Status'] === 'success') {
            echo "<p style='color:green; text-align:center;'>{$response['Message']}</p>";
            echo "<p style='text-align:center;'><a href='login.php'>Click here to log in</a></p>";
        } else {
            echo "<p style='color:red; text-align:center;'>{$response['Message']}</p>";
        }
    } else {
        echo "<p style='color:red; text-align:center;'>Error: No response from backend.</p>";
    }
}
?>
