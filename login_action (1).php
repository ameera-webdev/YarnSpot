<?php
session_start();
include_once(__DIR__ . '/../config/db.php');

$email    = trim($_POST['email']);
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password_hash'])) {
    $_SESSION['user_id']   = $user['id'];
    $_SESSION['fullname']  = $user['fullname'];
    $_SESSION['username']  = $user['name'];
    $_SESSION['email']     = $user['email'];

    header("Location: ../index.php");
    exit;
} else {
    $_SESSION['error'] = "Invalid email or password.";
    header("Location: ../pages/login.php");
    exit;
}
