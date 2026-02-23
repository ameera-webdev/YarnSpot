<?php
session_start();
$brand = $_GET['brand'] ?? null;
$fibre = $_GET['fibre'] ?? null;
$thickness = $_GET['thickness'] ?? null;
$project = $_GET['project'] ?? null;
$search = $_GET['q'] ?? null;

// Apply search filter
if ($search) {
  $filtered = array_filter($products, function($p) use ($search) {
    return stripos($p['name'], $search) !== false 
        || stripos($p['meta'], $search) !== false
        || stripos($p['tags']['brand'] ?? '', $search) !== false
        || stripos($p['tags']['fibre'] ?? '', $search) !== false
        || stripos($p['tags']['project'] ?? '', $search) !== false;
  });
}

// Demo products (replace with DB fetch if needed)
$products = [
  ['name'=>'Magic Needle','price'=>299,'image'=>'../assets/images/magic-needle.jpg','meta'=>'Acrylic • Tools','tags'=>['brand'=>'Anchor','fibre'=>'Acrylic','thickness'=>'DK','project'=>'Sweaters']],
  ['name'=>'Yarn Bundle','price'=>499,'image'=>'../assets/images/yarn-bundle.jpg','meta'=>'Cotton • DK','tags'=>['brand'=>'DMC','fibre'=>'Cotton','thickness'=>'DK','project'=>'Baby Wear']],
  ['name'=>'Crochet Hook','price'=>199,'image'=>'../assets/images/crochet-hook.jpg','meta'=>'Tool • 3.5mm','tags'=>['brand'=>'Pony','fibre'=>'—','thickness'=>'—','project'=>'Home Décor']],

  // Add more products
  ['name'=>'Anchor Wool Yarn','price'=>599,'image'=>'../assets/images/anchor-wool.jpg','meta'=>'Wool • Worsted','tags'=>['brand'=>'Anchor','fibre'=>'Wool','thickness'=>'Worsted','project'=>'Sweaters']],
  ['name'=>'DMC Baby Cotton','price'=>249,'image'=>'../assets/images/dmc-baby-cotton.jpg','meta'=>'Cotton • DK','tags'=>['brand'=>'DMC','fibre'=>'Cotton','thickness'=>'DK','project'=>'Baby Wear']],
  ['name'=>'KnitPro Bamboo Needles','price'=>399,'image'=>'../assets/images/knitpro-bamboo.jpg','meta'=>'Bamboo • Tools','tags'=>['brand'=>'KnitPro','fibre'=>'Bamboo','thickness'=>'Chunky','project'=>'Shawls']],
  ['name'=>'Pony Acrylic Yarn','price'=>349,'image'=>'../assets/images/pony-acrylic-yarn.jpg','meta'=>'Acrylic • Chunky','tags'=>['brand'=>'Pony','fibre'=>'Acrylic','thickness'=>'Chunky','project'=>'Home Décor']],
  ['name'=>'Anchor Cotton Thread','price'=>149,'image'=>'../assets/images/anchor-cotton-thread.jpg','meta'=>'Cotton • Fine','tags'=>['brand'=>'Anchor','fibre'=>'Cotton','thickness'=>'DK','project'=>'Shawls']],
  ['name'=>'DMC Metallic Yarn','price'=>699,'image'=>'../assets/images/dmc-metallic.jpg','meta'=>'Metallic • DK','tags'=>['brand'=>'DMC','fibre'=>'Metallic','thickness'=>'DK','project'=>'Sweaters']],
  ['name'=>'KnitPro Jumbo Yarn','price'=>899,'image'=>'../assets/images/knitpro-jumbo.jpg','meta'=>'Wool • Jumbo','tags'=>['brand'=>'KnitPro','fibre'=>'Wool','thickness'=>'Jumbo','project'=>'Home Décor']],
  ['name'=>'Anchor Baby Wool','price'=>299,'image'=>'../assets/images/anchor-baby-wool.jpg','meta'=>'Wool • DK','tags'=>['brand'=>'Anchor','fibre'=>'Wool','thickness'=>'DK','project'=>'Baby Wear']],
  ['name'=>'DMC Shawl Yarn','price'=>499,'image'=>'../assets/images/dmc-shawl.jpg','meta'=>'Cotton • Worsted','tags'=>['brand'=>'DMC','fibre'=>'Cotton','thickness'=>'Worsted','project'=>'Shawls']],
  ['name'=>'Pony Knitting Needles','price'=>199,'image'=>'../assets/images/pony-needles.jpg','meta'=>'Tool • 4mm','tags'=>['brand'=>'Pony','fibre'=>'—','thickness'=>'—','project'=>'Sweaters']],
  ['name'=>'Anchor Acrylic DK','price'=>399,'image'=>'../assets/images/anchor-acrylic-dk.jpg','meta'=>'Acrylic • DK','tags'=>['brand'=>'Anchor','fibre'=>'Acrylic','thickness'=>'DK','project'=>'Sweaters']],
  ['name'=>'DMC Cotton Jumbo','price'=>799,'image'=>'../assets/images/dmc-cotton-jumbo.jpg','meta'=>'Cotton • Jumbo','tags'=>['brand'=>'DMC','fibre'=>'Cotton','thickness'=>'Jumbo','project'=>'Home Décor']],
  ['name'=>'KnitPro Wool Worsted','price'=>599,'image'=>'../assets/images/knitpro-wool-worsted.jpg','meta'=>'Wool • Worsted','tags'=>['brand'=>'KnitPro','fibre'=>'Wool','thickness'=>'Worsted','project'=>'Sweaters']],
  ['name'=>'Pony Baby Cotton','price'=>249,'image'=>'../assets/images/pony-baby-cotton.jpg','meta'=>'Cotton • DK','tags'=>['brand'=>'Pony','fibre'=>'Cotton','thickness'=>'DK','project'=>'Baby Wear']],
  ['name'=>'Anchor Shawl Wool','price'=>499,'image'=>'../assets/images/anchor-shawl.jpg','meta'=>'Wool • Worsted','tags'=>['brand'=>'Anchor','fibre'=>'Wool','thickness'=>'Worsted','project'=>'Shawls']],
  ['name'=>'DMC Acrylic Chunky','price'=>349,'image'=>'../assets/images/dmc-acrylic-chunky.jpg','meta'=>'Acrylic • Chunky','tags'=>['brand'=>'DMC','fibre'=>'Acrylic','thickness'=>'Chunky','project'=>'Home Décor']],
  ['name'=>'KnitPro Cotton DK','price'=>299,'image'=>'../assets/images/knitpro-cotton-dk.jpg','meta'=>'Cotton • DK','tags'=>['brand'=>'KnitPro','fibre'=>'Cotton','thickness'=>'DK','project'=>'Shawls']],
  ['name'=>'Pony Wool Jumbo','price'=>899,'image'=>'../assets/images/pony-wool-jumbo.jpg','meta'=>'Wool • Jumbo','tags'=>['brand'=>'Pony','fibre'=>'Wool','thickness'=>'Jumbo','project'=>'Home Décor']],
  ['name'=>'Anchor Metallic Thread','price'=>199,'image'=>'../assets/images/anchor-metallic-thread.jpg','meta'=>'Metallic • Fine','tags'=>['brand'=>'Anchor','fibre'=>'Metallic','thickness'=>'DK','project'=>'Sweaters']],
  ['name'=>'DMC Baby Acrylic','price'=>249,'image'=>'../assets/images/dmc-baby-acrylic.jpg','meta'=>'Acrylic • DK','tags'=>['brand'=>'DMC','fibre'=>'Acrylic','thickness'=>'DK','project'=>'Baby Wear']],
  ['name'=>'KnitPro Shawl Cotton','price'=>399,'image'=>'../assets/images/knitpro-shawl-cotton.jpg','meta'=>'Cotton • Worsted','tags'=>['brand'=>'KnitPro','fibre'=>'Cotton','thickness'=>'Worsted','project'=>'Shawls']],
  ['name'=>'Pony Chunky Wool','price'=>499,'image'=>'../assets/images/pony-chunky-wool.jpg','meta'=>'Wool • Chunky','tags'=>['brand'=>'Pony','fibre'=>'Wool','thickness'=>'Chunky','project'=>'Sweaters']],
  ['name'=>'Anchor Baby Cotton','price'=>299,'image'=>'../assets/images/anchor-baby-cotton.jpg','meta'=>'Cotton • DK','tags'=>['brand'=>'Anchor','fibre'=>'Cotton','thickness'=>'DK','project'=>'Baby Wear']],
  ['name'=>'DMC Worsted Wool','price'=>599,'image'=>'../assets/images/dmc-worsted-wool.jpg','meta'=>'Wool • Worsted','tags'=>['brand'=>'DMC','fibre'=>'Wool','thickness'=>'Worsted','project'=>'Sweaters']],
  ['name'=>'KnitPro Jumbo Acrylic','price'=>799,'image'=>'../assets/images/knitpro-jumbo-acrylic.jpg','meta'=>'Acrylic • Jumbo','tags'=>['brand'=>'KnitPro','fibre'=>'Acrylic','thickness'=>'Jumbo','project'=>'Home Décor']],
[
  'name' => 'Punch Needle',
  'price' => 399,
  'image' => '../assets/images/punch-needle.jpg',
  'meta'  => 'Tool • Embroidery',
  'tags'  => ['brand' => 'Generic', 'fibre' => '—', 'thickness' => '—', 'project' => 'Home Décor']
],
[
  'name' => 'Stitch Markers & Holders',
  'price' => 149,
  'image' => '../assets/images/stitch-markers.jpg',
  'meta'  => 'Tool • Accessories',
  'tags'  => ['brand' => 'Generic', 'fibre' => '—', 'thickness' => '—', 'project' => 'Sweaters']
],
[
  'name' => 'Wool & Tapestry Needles',
  'price' => 199,
  'image' => '../assets/images/tapestry-needles.jpg',
  'meta'  => 'Tool • Sewing',
  'tags'  => ['brand' => 'Generic', 'fibre' => '—', 'thickness' => '—', 'project' => 'Baby Wear']
],
[
  'name' => 'Knitting Gauge & Swatch Tools',
  'price' => 249,
  'image' => '../assets/images/knitting-gauge.jpg',
  'meta'  => 'Tool • Measurement',
  'tags'  => ['brand' => 'Generic', 'fibre' => '—', 'thickness' => '—', 'project' => 'Shawls']
],
[
  'name' => 'Crochet Kit – DIY Beginners',
  'price' => 599,
  'image' => '../assets/images/crochet-kit.jpg',
  'meta'  => 'Kit • DIY',
  'tags'  => ['brand' => 'Generic', 'fibre' => 'Cotton', 'thickness' => 'DK', 'project' => 'Baby Wear']
],
[
  'name' => 'Baby Blanket',
  'price' => 999,
  'image' => '../assets/images/baby-blanket.jpg',
  'meta'  => 'Handmade • Cotton',
  'tags'  => ['brand' => 'Handmade', 'fibre' => 'Cotton', 'thickness' => 'DK', 'project' => 'Baby Wear']
],
[
  'name' => 'Crochet Flowers',
  'price' => 199,
  'image' => '../assets/images/crochet-flowers.jpg',
  'meta'  => 'Handmade • Décor',
  'tags'  => ['brand' => 'Handmade', 'fibre' => 'Cotton', 'thickness' => 'Fine', 'project' => 'Home Décor']
],
[
  'name' => 'Dining Décor',
  'price' => 799,
  'image' => '../assets/images/dining-decor.jpg',
  'meta'  => 'Handmade • Crochet',
  'tags'  => ['brand' => 'Handmade', 'fibre' => 'Cotton', 'thickness' => 'DK', 'project' => 'Home Décor']
],
[
  'name' => 'Handmade Crochet Fridge Magnets',
  'price' => 249,
  'image' => '../assets/images/fridge-magnets.jpg',
  'meta'  => 'Handmade • Décor',
  'tags'  => ['brand' => 'Handmade', 'fibre' => 'Cotton', 'thickness' => 'Fine', 'project' => 'Home Décor']
],
[
  'name' => 'Handmade Crochet Keychains',
  'price' => 149,
  'image' => '../assets/images/keychains.jpg',
  'meta'  => 'Handmade • Accessories',
  'tags'  => ['brand' => 'Handmade', 'fibre' => 'Cotton', 'thickness' => 'Fine', 'project' => 'Home Décor']
],
[
  'name' => 'Handmade Toys',
  'price' => 499,
  'image' => '../assets/images/handmade-toys.jpg',
  'meta'  => 'Handmade • Cotton',
  'tags'  => ['brand' => 'Handmade', 'fibre' => 'Cotton', 'thickness' => 'DK', 'project' => 'Baby Wear']
],
[
  'name' => 'Project Bags, Totes & Pouches',
  'price' => 699,
  'image' => '../assets/images/project-bags.jpg',
  'meta'  => 'Handmade • Storage',
  'tags'  => ['brand' => 'Handmade', 'fibre' => 'Cotton', 'thickness' => '—', 'project' => 'Shawls']
],

];


// Filter logic
$filtered = array_filter($products, function($p) use ($brand, $fibre, $thickness, $project) {
  if ($brand && ($p['tags']['brand'] ?? '') !== $brand) return false;
  if ($fibre && ($p['tags']['fibre'] ?? '') !== $fibre) return false;
  if ($thickness && ($p['tags']['thickness'] ?? '') !== $thickness) return false;
  if ($project && ($p['tags']['project'] ?? '') !== $project) return false;
  return true;
});
$items = !empty($filtered) ? $filtered : $products;
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>YarnSpot | Shop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="../assets/css/style.css" rel="stylesheet" />
</head>
<body>
  <?php include_once('../includes/header.php'); ?>

  <section class="hero">
    <div class="container wrap">
      <h1>Shop</h1>
      <p>Soft pastels, clean layout, curated essentials.</p>
    </div>
  </section>

  <main class="container">
    <div class="grid">
      <?php foreach ($items as $p): ?>
        <div class="card">
          <img src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>">
          <div class="body">
            <div class="title"><?= htmlspecialchars($p['name']) ?></div>
            <div class="price">₹<?= htmlspecialchars($p['price']) ?></div>
            <div class="meta"><?= htmlspecialchars($p['meta']) ?></div>
            <form method="post" action="../actions/add_to_cart.php" style="margin-top:10px;">
              <input type="hidden" name="product" value="<?= htmlspecialchars($p['name']) ?>">
              <input type="hidden" name="price" value="<?= htmlspecialchars($p['price']) ?>">
              <button class="btn" type="submit">Add to Cart</button>
              <a href="../actions/wishlist_add.php?product_name=<?= urlencode($p['name']) ?>" 
   class="wishlist-icon" title="Add to Wishlist">
   ❤️
</a>
            </form>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </main>

  <footer><div class="container">© 2025 YarnSpot</div></footer>
  <script src="../assets/js/site.js"></script>
</body>
</html>
