<?php
session_start();
$cart = $_SESSION['cart'] ?? [];

// helper for formatting
function money($v) { return number_format($v, 0); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>YarnSpot | Cart</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="../assets/css/style.css" rel="stylesheet" />
</head>
<body>
  <?php include_once('../includes/header.php'); ?>

  <main class="container" style="padding:24px 0;">
    <h2>Your Cart</h2>

    <?php if (empty($cart)): ?>
      <p>Your cart is empty.</p>
    <?php else: ?>
      <table>
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th>Qty</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
        <?php $grand = 0; foreach ($cart as $idx => $item): 
          $total = (int)$item['price'] * (int)$item['qty'];
          $grand += $total;
        ?>
          <tr>
            <td><?= htmlspecialchars($item['name']) ?></td>
            <td>₹<?= money($item['price']) ?></td>
            <td>
              <!-- Update quantity form -->
              <form method="post" action="../actions/update_qty.php" class="flex" style="gap:8px;">
                <input type="hidden" name="index" value="<?= $idx ?>">
                <input type="number" name="qty" min="1" value="<?= (int)$item['qty'] ?>" 
                       style="width:60px;padding:6px;border:1px solid #eca8ecff;border-radius:8px;">
                <button class="btn" type="submit">Update</button>
              </form>
            </td>
            <td>₹<?= money($total) ?></td>
            <td>
              <!-- ✅ Correct Remove form -->
              <form method="post" action="../actions/remove_item.php">
                <input type="hidden" name="index" value="<?= $idx ?>">
                <button class="btn" type="submit">Remove</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
        <tr>
          <td colspan="3"><strong>Grand Total</strong></td>
          <td colspan="2"><strong>₹<?= money($grand) ?></strong></td>
        </tr>
      </table>
<form method="post" action="../actions/clear_item.php">
  <button type="submit" class="btn">Clear Cart</button>
  <a href="checkout.php" class="btn">Checkout</a>
</form>
      </div>
    <?php endif; ?>
  </main>

  <footer><div class="container">© 2025 YarnSpot</div></footer>
</body>
</html>
