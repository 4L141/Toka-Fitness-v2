<html>
<body style="background-color: lightblue;">
    <form method="post">
        A program to add user info using PHP<br><br>
        Enter first name:
        <input type="text" name="first_name" required /><br><br>
        Enter last name:
        <input type="text" name="last_name" required /><br><br>
        Enter email address:
        <input type="email" name="email" required /><br><br>
        Enter password:
        <input type="password" name="password" required /><br><br>
        <input type="submit" name="signup" value="Sign Up">
		<a class="btn" href="LogIn.php">LogIn</a>
    </form>
</body>
</html>

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
