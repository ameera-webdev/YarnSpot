<?php
session_start();

// Must be logged in and have address
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?redirect=checkout");
    exit;
}
if (!isset($_SESSION['address'])) {
    header("Location: checkout.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Checkout - Payment Method</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    body {
      background: #fdf1f4;
      font-family: 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif;
      margin: 0;
      padding: 0;
      color: #333;
    }

    .payment-wrapper {
      max-width: 700px;
      margin: 60px auto;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.1);
      padding: 40px;
    }

    .payment-wrapper h2 {
      text-align: center;
      font-size: 28px;
      color: #d6336c;
      margin-bottom: 30px;
    }

    .payment-options {
      margin-bottom: 25px;
    }

    .payment-option {
      display: flex;
      align-items: center;
      padding: 14px;
      border: 1px solid #ccc;
      border-radius: 8px;
      margin-bottom: 15px;
      cursor: pointer;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .payment-option:hover {
      border-color: #d6336c;
      box-shadow: 0 0 6px rgba(214,51,108,0.2);
    }

    .payment-option input[type="radio"] {
      margin-right: 12px;
      accent-color: #d6336c;
    }

    .payment-option img {
      height: 28px;
      margin-right: 12px;
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
      width: 100%;
      transition: background 0.3s ease;
    }

    .btn-primary:hover {
      background: #b02a54;
    }

    @media (max-width: 640px) {
      .payment-wrapper {
        margin: 20px;
        padding: 20px;
      }
      .payment-option img {
        height: 22px;
      }
    }
  </style>
</head>
<body>
  <div class="payment-wrapper">
    <h2>Select Payment Method</h2>
    <form method="post" action="../actions/process_payment.php" class="payment-options">
      
      <label class="payment-option">
        <input type="radio" name="payment" value="cod" required>
        <img src="../assets/images/cod.png" alt="Cash on Delivery">
        Cash on Delivery
      </label>

      <label class="payment-option">
        <input type="radio" name="payment" value="card">
        <img src="../assets/images/visa.png" alt="Visa">
        <img src="../assets/images/mastercard.png" alt="MasterCard">
        Credit / Debit Card
      </label>

      <label class="payment-option">
        <input type="radio" name="payment" value="upi">
        <img src="../assets/images/gpay.png" alt="Google Pay">
        <img src="../assets/images/paytm.png" alt="Paytm">
        <img src="../assets/images/phonepe.png" alt="PhonePe">
        UPI (Google Pay / PhonePe / Paytm)
      </label>

      <button type="submit" class="btn-primary">Place Order</button>
    </form>
  </div>
</body>
</html>
