<?php
require  './includes/db.php';


session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: login.php');
    exit();
}

$sql = "SELECT * FROM users";
$result = $CONNECT_DB->query($sql);

if ($result) {
    $users = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $error = "Error: " . $CONNECT_DB->error;
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/admin-style.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap");
    </style>
</head>

<body>
    <h1>Welcome to the admin panel</h1>

    <table>
        <thead>
            <tr>
                <th>Login</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Birth date</th>
                <th>To do</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($users)) {
                foreach ($users as $user) {
                    $id = $user['id'];
                    $login = $user['login'];
                    $firstName = $user['first_name'];
                    $lastName = $user['last_name'];
                    $birthDay = $user['birth_day'];

                    echo "<tr>
                <td>$login</td>
                <td>$firstName</td>
                <td>$lastName</td>
                <td>$birthDay</td>
                <td>
                    <a href='edit_user.php?id=$id'>Edit</a>
                    <a href='delete_user.php?id=$id'>Delete</a>
                </td>
              </tr>";
                }
            } else {
                echo "<tr><td>No users found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>