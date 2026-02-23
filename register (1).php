<?php
session_start();
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Register | YarnSpot</title>
  <link href="../assets/css/style.css" rel="stylesheet" />
  <style>
    body { font-family: 'Segoe UI', sans-serif; background:#fafafa; }
    .card { max-width:480px; margin:50px auto; background:#fff; padding:30px; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.1); }
    .card h2 { margin-bottom:20px; color:#6a1b9a; }
    label { display:block; margin-top:15px; font-weight:600; }
    input { width:100%; padding:10px; margin-top:5px; border:1px solid #ccc; border-radius:6px; }
    button { margin-top:20px; padding:12px; width:100%; background:#6a1b9a; color:#fff; border:none; border-radius:6px; font-weight:600; cursor:pointer; }
    button:hover { background:#4a148c; }
    .error { color:red; margin-top:10px; }
  </style>
</head>
<body>
  <?php include_once(__DIR__ . '/../includes/header.php'); ?>

  <div class="card">
    <h2>Create Account</h2>
    <?php if (!empty($error)): ?>
      <p class="error"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form method="post" action="../actions/register_action.php">
      <label>Full Name</label>
      <input type="text" name="fullname" required>

      <label>Username</label>
      <input type="text" name="name" required>

      <label>Email</label>
      <input type="email" name="email" required>

      <label>Password</label>
      <input type="password" name="password" required>

      <button type="submit">Register</button>
    </form>
  </div>

  <?php include_once(__DIR__ . '/../includes/footer.php'); ?>
</body>
</html>
