<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?redirect=checkout");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Checkout - Shipping Address</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    body {
      background: #fdf1f4;
      font-family: 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif;
      margin: 0;
      padding: 0;
      color: #333;
    }

    .checkout-wrapper {
      max-width: 700px;
      margin: 60px auto;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.1);
      padding: 40px;
    }

    .checkout-wrapper h2 {
      text-align: center;
      font-size: 28px;
      color: #d6336c;
      margin-bottom: 30px;
    }

    .checkout-form .form-group {
      margin-bottom: 20px;
    }

    .checkout-form label {
      display: block;
      margin-bottom: 6px;
      font-weight: 600;
      color: #444;
    }

    .checkout-form input,
    .checkout-form select {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 15px;
      font-family: 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .checkout-form input:focus,
    .checkout-form select:focus {
      border-color: #d6336c;
      box-shadow: 0 0 6px rgba(214,51,108,0.3);
      outline: none;
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
      .checkout-wrapper {
        margin: 20px;
        padding: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="checkout-wrapper">
    <h2>Shipping Address</h2>
    <form method="post" action="../actions/save_address.php" class="checkout-form">
      
      <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
      </div>

      <div class="form-group">
        <label for="address">Street Address</label>
        <input type="text" id="address" name="address" placeholder="House number, street, area" required>
      </div>

      <div class="form-group">
        <label for="city">City</label>
        <select id="city" name="city" required>
          <option value="">-- Select City --</option>
          <option value="Chennai">Chennai</option>
          <option value="Coimbatore">Coimbatore</option>
          <option value="Madurai">Madurai</option>
          <option value="Tiruchirappalli">Tiruchirappalli</option>
          <option value="Salem">Salem</option>
          <option value="Erode">Erode</option>
          <option value="Vellore">Vellore</option>
          <option value="Thoothukudi">Thoothukudi</option>
          <option value="Tirunelveli">Tirunelveli</option>
          <option value="Dindigul">Dindigul</option>
          <option value="Thanjavur">Thanjavur</option>
          <option value="Kanchipuram">Kanchipuram</option>
          <option value="Nagercoil">Nagercoil</option>
          <option value="Karur">Karur</option>
          <option value="Cuddalore">Cuddalore</option>
          <option value="Nagapattinam">Nagapattinam</option>
          <option value="Ariyalur">Ariyalur</option>
          <option value="Sivakasi">Sivakasi</option>
          <option value="Pudukkottai">Pudukkottai</option>
          <option value="Ranipet">Ranipet</option>
        </select>
      </div>

      <div class="form-group">
        <label for="pincode">Postal Code</label>
        <input type="text" id="pincode" name="pincode" placeholder="Enter postal code" required>
      </div>

      <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
      </div>

      <button type="submit" class="btn-primary">Continue to Payment</button>
    </form>
  </div>
</body>
</html>
