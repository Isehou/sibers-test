<?php
require './includes/db.php';

session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: login.php');
    exit();
}

if (!isset($_GET['id'])) {
    header('Location: admin.php');
    exit();
}

$id = intval($_GET['id']);

$sql = "DELETE FROM users WHERE id = $id";

if ($CONNECT_DB->query($sql)) {
    header("Location: admin.php");
    exit();
} else {
    echo "Error deleting user: " . $CONNECT_DB->error;
}
?>

<div class="add-user__block">
    <div class="add-user__wrapper">
        <div class="form-wrapper">
            <form class="form" action="add_user.php" method="post">
                <label>Login</label>
                <input type="text" name="login" id="login" placeholder="Yourname@login" value="$user['login']" required>

                <label>First name</label>
                <input type="text" name="first_name" id="first_name" placeholder="Winston" required>

                <label>Last name</label>
                <input type="text" name="last_name" id="last_name" placeholder="Churchill" required>

                <label>Birth_date</label>
                <input type="date" name="birth_day" id="birth_day" required>

                <button class="add-user-btn" type="submit" class="button">Register</button>
            </form>
        </div>
    </div>
</div>