<?php
session_start();
$error   = $_SESSION['error'] ?? '';
$success = $_SESSION['success'] ?? '';
unset($_SESSION['error'], $_SESSION['success']);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login | YarnSpot</title>
  <link href="../assets/css/style.css" rel="stylesheet" />
  <style>
    body { font-family: 'Segoe UI', sans-serif; background:#fafafa; }
    .card {
      max-width:420px; margin:60px auto; background:#fff;
      padding:30px; border-radius:12px;
      box-shadow:0 4px 12px rgba(0,0,0,0.1);
    }
    .card h2 { margin-bottom:20px; color:#d6336c; text-align:center; }
    label { display:block; margin-top:15px; font-weight:600; color:#6a1b9a; }
    input {
      width:100%; padding:12px; margin-top:5px;
      border:1px solid #ccc; border-radius:6px;
      font-size:14px;
    }
    button {
      margin-top:25px; padding:12px; width:100%;
      background:#6a1b9a; color:#fff; border:none;
      border-radius:6px; font-weight:600; cursor:pointer;
      transition:background 0.3s ease;
    }
    button:hover { background:#4a148c; }
    .error { color:#d6336c; margin-top:10px; text-align:center; }
    .success { color:#2e7d32; margin-top:10px; text-align:center; }
    .links { margin-top:20px; text-align:center; }
    .links a { color:#6a1b9a; text-decoration:none; font-weight:600; }
    .links a:hover { text-decoration:underline; }
  </style>
</head>
<body>
  <?php include_once(__DIR__ . '/../includes/header.php'); ?>

  <div class="card">
    <h2>Login to YarnSpot</h2>
    <?php if (!empty($success)): ?>
      <p class="success"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>
    <?php if (!empty($error)): ?>
      <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post" action="../actions/login_action.php">
      <label>Email</label>
      <input type="email" name="email" required>

      <label>Password</label>
      <input type="password" name="password" required>

      <button type="submit">Login</button>
    </form>

    <div class="links">
      <p>Don’t have an account? <a href="register.php">Register here</a></p>
    </div>
  </div>

  <?php include_once(__DIR__ . '/../includes/footer.php'); ?>
</body>
</html>
<?php
session_start();

// Fake login for demo (replace with DB check)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Example: if username == test and password == 123
    if ($username === 'test' && $password === '123') {
        $_SESSION['user_id'] = 1; // store user ID
        // Redirect back to checkout if requested
        if (isset($_GET['redirect']) && $_GET['redirect'] === 'checkout') {
            header("Location: checkout.php");
        } else {
            header("Location: index.php");
        }
        exit;
    } else {
        $error = "Invalid login!";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
  <h2>Login</h2>
  <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
  <form method="post">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit" class="btn">Login</button>
  </form>
</body>
</html>
