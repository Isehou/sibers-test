<link rel="stylesheet" href="css/style.css">
<style>
    @import url("https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap");
</style>

<?php

require  './includes/db.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username = '$login'";
    $result = $CONNECT_DB->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['admin'] = true;
            header('Location: admin.php');
            exit();
        } else {
            $error = "Incorrect password";
        }
    } else {
        $error = "User does not exist";
    }
}
?>

<div class="sibers-test-panel">
    <div class="wrapper">
        <div class="home-panel">
            <div style="width: 85%;">
                <div class="logo"> <img src="./assets/sibers-logo.svg" alt="logo" class="logo-img" /></div>
                <h3>Welcome to Admin panel</h3>

                <form class="login-form" method="POST">
                    <div>
                        <label for="username">Login:</label>
                        <input type="text" name="username" id="username" placeholder="Yourname@login" required>
                    </div>

                    <div>
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" placeholder="Enter your password" required>
                    </div>
                    <button class="panel-btn" style="width: 100%;" type="submit">Submit</button>
                </form>
            </div>
        </div>
        <div class="image-block">
            <img src="./assets/smile-background.png" alt="smile-background" />
        </div>

    </div>
</div>

<?php if (isset($error)) echo "<p>$error</p>"; ?>