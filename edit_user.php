<link rel="stylesheet" href="css/user-setting.css">

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

$sql = "SELECT * FROM users WHERE id = $id";
$result = $CONNECT_DB->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // a POST request 
    $login = $_POST['login'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $birth_day = $_POST['birth_day'];


    $edit_sql = "UPDATE users SET login='$login', password='$password', first_name='$first_name', last_name='$last_name', gender='$gender', birth_day='$birth_day' WHERE id=$id";


    if ($CONNECT_DB->query($edit_sql)) { //
        header("Location: /sibers-test/admin.php");
        exit;
    } else {
        echo  "Error: " . $CONNECT_DB->error;
    }
}
?>


<div class="add-user__block">
    <div class="add-user__wrapper">
        <div class="wrapper">
            <div class="home-panel">

                <form method="POST">
                    <label>Login:</label>
                    <input type="text" name="login" value="<?= $user['login'] ?? '' ?>" required>

                    <label>First name:</label>
                    <input type="text" name="first_name" value="<?= $user['first_name'] ?? '' ?>" required>

                    <label>Last name:</label>
                    <input type="text" name="last_name" value="<?= $user['last_name'] ?? '' ?>" required>

                    <label>Birth Day:</label>
                    <input type="date" name="birth_day" value="<?= $user['birth_day'] ?? '' ?>" required>


                    <button class="panel-btn" type="submit">Save</button>


                    <a class="back-link" class="back-btn" href="admin.php">back</a>

                </form>

            </div>
            <div class="image-block">
                <img src="./assets/smile-background.png" alt="smile-background" />
            </div>
        </div>
    </div>