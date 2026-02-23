<?php
session_start();

// Save payment method
if (isset($_POST['payment'])) {
    $_SESSION['payment'] = $_POST['payment'];
}

// Redirect to styled success page
header("Location: ../pages/order_success.php");
exit;
