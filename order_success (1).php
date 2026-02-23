<?php
session_start();

// Clear cart after order
unset($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order Confirmation</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    body {
      background: #fdf1f4;
      font-family: 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif;
      margin: 0;
      padding: 0;
      color: #333;
    }

    .success-wrapper {
      max-width: 700px;
      margin: 80px auto;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.1);
      padding: 40px;
      text-align: center;
      animation: fadeIn 0.8s ease-in-out;
    }

    /* Green tick circle */
    .success-icon {
      display: inline-block;
      width: 90px;
      height: 90px;
      border-radius: 50%;
      background: #28a745;
      color: #fff;
      font-size: 50px;
      line-height: 90px;
      margin-bottom: 20px;
      animation: popOut 0.6s ease forwards;
    }

    .success-wrapper h2 {
      font-size: 28px;
      color: #28a745;
      margin-bottom: 15px;
    }

    .success-wrapper p {
      font-size: 16px;
      color: #555;
      margin-bottom: 25px;
    }

    .btn-primary {
      background: #d6336c;
      color: #fff;
      border: none;
      padding: 14px 20px;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s ease;
      text-decoration: none;
      display: inline-block;
      margin: 10px 0;
    }

    .btn-primary:hover {
      background: #b02a54;
    }

    /* Animations */
    @keyframes popOut {
      0% { transform: scale(0.5); opacity: 0; }
      100% { transform: scale(1); opacity: 1; }
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="success-wrapper">
  <div class="success-icon">✔</div>
  <h2>Your Order Has Been Successfully Placed!</h2>
  <p>Thank you for shopping with YarnSpot. Your order is on its way — why stop here? Explore more and keep the joy coming!</p>

  <!-- Continue Shopping button -->
  <a href="../index.php" class="btn-primary">Continue Shopping</a>

  <!-- Shop Now button -->
  <a href="shop.php" class="btn-primary">Shop Now</a>
</div>

</body>
</html>
