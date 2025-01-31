<?php
require  './includes/db.php';

session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sibers-test</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap");
    </style>
</head>

<body>
    <div class="sibers-test-panel">
        <div class="wrapper">
            <div class="home-panel">
                <div>
                    <div class="logo"> <img src="./assets/sibers-logo.svg" alt="logo" class="logo-img" /></div>
                    <h3>Web interface of the database of registered users</h3>
                    <div class="admin-part control-part">
                        <button class="panel-btn" onclick="window.location.href='login.php'">Admin panel</button>
                    </div>
                    <div class="register-part control-part">
                        <button class="panel-btn" onclick="window.location.href='add_user.php'">User Registration panel</button>
                    </div>
                </div>
            </div>
            <div class="image-block">
                <img src="./assets/smile-background.png" alt="smile-background" />
            </div>
        </div>
    </div>
</body>

</html>