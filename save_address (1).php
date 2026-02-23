<?php
session_start();

// Save address in session (or DB)
if (isset($_POST['address'])) {
    $_SESSION['address'] = $_POST['address'];
}

// Redirect to payment page
header("Location: ../pages/payment.php");
exit;
