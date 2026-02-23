<?php
session_start();
include_once(__DIR__ . '/../config/db.php');

$fullname = trim($_POST['fullname'] ?? '');
$name     = trim($_POST['name'] ?? '');
$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if ($fullname === '' || $name === '' || $email === '' || $password === '') {
    $_SESSION['error'] = "All fields are required.";
    header("Location: ../pages/register.php");
    exit;
}

// Check if email already exists
$stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
$stmt->execute([$email]);
if ($stmt->fetch()) {
    $_SESSION['error'] = "Email already registered.";
    header("Location: ../pages/register.php");
    exit;
}

// Hash password
$hash = password_hash($password, PASSWORD_DEFAULT);

// Insert new user
$stmt = $pdo->prepare("INSERT INTO users (fullname, name, email, password_hash) VALUES (?, ?, ?, ?)");
$stmt->execute([$fullname, $name, $email, $hash]);

// Redirect to login with success message
$_SESSION['success'] = "Registration successful! Please login.";
header("Location: ../pages/login.php");
exit;
