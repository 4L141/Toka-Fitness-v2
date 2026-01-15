<?php

// If form submitted
if (isset($_POST["update_now"])) {

    $data = [
        "Action" => "update_user",
        "user_id" => intval($_POST["user_id"]),
        "first_name" => $_POST["first_name"],
        "last_name" => $_POST["last_name"],
        "email" => $_POST["email"]
    ];

    file_put_contents("request.json", json_encode($data, JSON_PRETTY_PRINT));

    // Run backend
    $exePath = __DIR__ . 'console_backend\console_backend\bin\Debug\net8.0\console_backend.exe';
    $inputPath = __DIR__ . 'json/request.json';
    $outputPath = __DIR__ . 'json/response.json';

    exec("\"$exePath\" \"$inputPath\" \"$outputPath\"");

    $response = json_decode(file_get_contents($outputPath), true);

    if ($response["Status"] === "success") {
        echo "<p style='color:green;text-align:center;'>User updated successfully!</p>";
        echo "<p style='text-align:center;'><a href='admin.php'>Return to Admin Panel</a></p>";
        exit;
    } else {
        echo "<p style='color:red;text-align:center;'>{$response['Message']}</p>";
        exit;
    }
}

// FIRST LOAD → show form
$user_id = $_POST["user_id"];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
</head>
<body style="background-color: lightblue; font-family:Arial;">

<h2 style="text-align:center;">Update User</h2>

<form method="post" style="width:300px; margin:auto;">
    <input type="hidden" name="user_id" value="<?= $user_id ?>">

    First Name:<br>
    <input type="text" name="first_name" required><br><br>

    Last Name:<br>
    <input type="text" name="last_name" required><br><br>

    Email:<br>
    <input type="email" name="email" required><br><br>

    <button type="submit" name="update_now" style="padding:10px;width:100%;">Update User</button>
</form>

</body>
</html>
