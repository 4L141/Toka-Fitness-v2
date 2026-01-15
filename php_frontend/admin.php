<?php

// 1. Create JSON request
$request = ['Action' => 'get_users'];
file_put_contents('request.json', json_encode($request, JSON_PRETTY_PRINT));

// 2. Run backend console app
$exePath = __DIR__ . '..\console_backend\console_backend\bin\Debug\net8.0\console_backend.exe';  
$inputPath = __DIR__ . '/json/request.json';
$outputPath = __DIR__ . '/json/response.json';

exec("\"$exePath\" \"$inputPath\" \"$outputPath\"");

// 3. Read backend response
if (!file_exists($outputPath)) {
    die("<p style='color:red;text-align:center;'>Backend did not return a response.</p>");
}

$response = json_decode(file_get_contents($outputPath), true);

if ($response["Status"] !== "success") {
    die("<p style='color:red;text-align:center;'>{$response['Message']}</p>");
}

$users = $response["UsersList"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
        body { background: lightblue; font-family: Arial; }
        table { border-collapse: collapse; width: 80%; margin: 20px auto; }
        th, td { border: 1px solid black; padding: 10px; text-align: center; }
        th { background: #444; color: white; }
        .btn { padding: 5px 10px; border: none; cursor: pointer; }
        .update { background: green; color: white; }
        .delete { background: red; color: white; }
    </style>
</head>
<body>

<h2 style="text-align:center;">Admin Panel — User Management</h2>

<table>
    <tr>
        <th>ID</th><th>First</th><th>Last</th><th>Email</th>
        <th>Registered</th><th>Admin?</th><th>Actions</th>
    </tr>

    <?php foreach ($users as $u): ?>
    <tr>
        <td><?= $u["user_id"] ?></td>
        <td><?= $u["first_name"] ?></td>
        <td><?= $u["last_name"] ?></td>
        <td><?= $u["email"] ?></td>
        <td><?= $u["reg_date"] ?></td>
        <td><?= $u["is_admin"] ? "Yes" : "No" ?></td>

        <td>
            <form action="update_user.php" method="post" style="display:inline;">
                <input type="hidden" name="user_id" value="<?= $u['user_id'] ?>">
                <button class="btn update">Update</button>
            </form>

            <form action="delete_user.php" method="post" style="display:inline;">
                <input type="hidden" name="user_id" value="<?= $u['user_id'] ?>">
                <button class="btn delete">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
