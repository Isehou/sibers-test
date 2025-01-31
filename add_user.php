<link rel="stylesheet" href="css/style.css">

<?php


require  './includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // a POST request 
    $login = filter_var(trim($_POST['login']));
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $first_name = filter_var(trim($_POST['first_name']));
    $last_name = filter_var(trim($_POST['last_name']));
    $gender = $_POST['gender'];
    $birth_day = $_POST['birth_day'];


    $sql = "INSERT INTO `users` (login, password, first_name, last_name, birth_day, gender) 
        VALUES ('$login', '$password', '$first_name', '$last_name', '$birth_day', '$gender')";

    if ($CONNECT_DB->query($sql) === TRUE) {
        echo  "Users access added!";
        header("Location: /sibers-test/index.php");
        exit;
    } else {
        echo  "Error: ";
    }
}
?>

<!-- For add new user form -->
<div class="add-user__block">
    <div class="add-user__wrapper">
        <div class="form-wrapper">
            <form class="form" action="add_user.php" method="post">
                <label>Login</label>
                <input type="text" name="login" id="login" placeholder="Yourname@login" required>

                <label>Password</label>
                <input type="password" name="password" id="password" placeholder="********" required>

                <label>First name</label>
                <input type="text" name="first_name" id="first_name" placeholder="Winston" required>

                <label>Last name</label>
                <input type="text" name="last_name" id="last_name" placeholder="Churchill" required>

                <label>Birth_date</label>
                <input type="date" name="birth_day" id="birth_day" required>

                <label>Gender</label>
                <select class="gender minimal" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Helicopter">Helicopter</option>
                </select>

                <button class="add-user-btn" type="submit" class="button">Register</button>
            </form>
        </div>
        <div class="image-block">
            <img src="./assets/smile-background.png" alt="smile-background" />
        </div>
    </div>
</div>


<!-- validation
     if (mb_strlen($login) < 5 || mb_strlen($login) > 30 {
         echo "Login must be between 5 and 30 characters";
         exit;
     }  
     if (mb_strlen($password) < 5 || mb_strlen($password) > 30) {  
         echo "Password must be between 5 and 30 characters";
         exit;
     }   
     if (mb_strlen($first_name) < 5 || mb_strlen($first_name) > 30  {
         echo "First name must be between 5 and 30 characters";
         exit;
     }   
     if (mb_strlen($last_name) < 5 || mb_strlen($last_name) > 30  {
         echo "Last name must be between 5 and 30 characters";
         exit;
     } -->