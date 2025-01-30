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
