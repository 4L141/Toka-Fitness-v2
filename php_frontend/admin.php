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

<?php $pageTitle = 'Admin Panel - Toka Fitness'; include 'header.php'; ?>
<link rel="stylesheet" href="Stylesheets/admin.css">
    <div class="admin-container">
        <h1>Admin Panel — User Management</h1>
        <a href="create_user.php" class="btn">Create User</a>
        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Registered</th>
                <th>Admin?</th>
                <th>Actions</th>
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
                    <div class="btn-group">
                        <form action="update_user.php" method="post">
                            <input type="hidden" name="user_id" value="<?= $u['user_id'] ?>">
                            <button class="btn">Update</button>
                        </form>
                        <form action="delete_user.php" method="post">
                            <input type="hidden" name="user_id" value="<?= $u['user_id'] ?>">
                            <button class="btn">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php include 'footer.php'; ?>
