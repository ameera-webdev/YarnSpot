<?php
session_start();

// Clear the entire cart
unset($_SESSION['cart']);

header('Location: ../pages/cart.php'); // redirect back to cart page
exit;
