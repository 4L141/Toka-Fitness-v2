<?php

$user_id = intval($_POST["user_id"]);

$data = [
    "Action" => "delete_user",
    "user_id" => $user_id
];

file_put_contents("request.json", json_encode($data, JSON_PRETTY_PRINT));

// Run console backend
$exePath = __DIR__ . '..\console_backend\console_backend\bin\Debug\net8.0\console_backend.exe';
$inputPath = __DIR__ . 'json/request.json';
$outputPath = __DIR__ . 'json/response.json';

exec("\"$exePath\" \"$inputPath\" \"$outputPath\"");

$response = json_decode(file_get_contents($outputPath), true);

if ($response["Status"] === "success") {
    echo "<p style='color:green;text-align:center;'>User deleted successfully!</p>";
} else {
    echo "<p style='color:red;text-align:center;'>{$response['Message']}</p>";
}

echo "<p style='text-align:center;'><a href='admin.php'>Return to Admin Panel</a></p>";

?>
