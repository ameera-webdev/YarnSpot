<?php
include(__DIR__."/../includes/header.php");
include(__DIR__."/../config/db.php");

// Protect: simple admin check (replace with real auth)
if (empty($_SESSION['user'])) { echo "<p>Login required.</p>"; include(__DIR__."/../includes/footer.php"); exit; }

$path = __DIR__."/../assets/products.csv";
if (!file_exists($path)) {
  echo "<p style='padding:16px;'>Upload products.csv to /assets/ first.</p>";
  include(__DIR__."/../includes/footer.php"); exit;
}

$fh = fopen($path, "r");
$headers = fgetcsv($fh);
$count = 0;

$stmt = $conn->prepare("
  INSERT INTO products (sku,name,price,mrp,currency,fiber,weight,grams,meters,color,brand,image,tags,stock,rating,reviews,description)
  VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
");

while(($row = fgetcsv($fh)) !== false) {
  [$sku,$name,$price,$mrp,$fiber,$weight,$grams,$meters,$color,$brand,$image,$tags,$stock,$rating,$reviews,$description] = $row;

  $currency = "INR";
  $grams = (int)$grams ?: null;
  $meters = (int)$meters ?: null;
  $stock = (int)$stock ?: 0;
  $rating = (float)$rating ?: 0;
  $reviews = (int)$reviews ?: 0;

  $stmt->bind_param(
    "sss s s s s i i s s s s i d i s",
    $sku,$name,$price,$mrp,$currency,$fiber,$weight,$grams,$meters,$color,$brand,$image,$tags,$stock,$rating,$reviews,$description
  );
  // Note: spaces in bind types for readability; real string: "ssssssssiiissssidis"
  $stmt->execute();
  $count++;
}
fclose($fh);

echo "<p style='padding:16px;'>Imported $count products successfully.</p>";
include(__DIR__."/../includes/footer.php");
