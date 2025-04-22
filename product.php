<?php
include("includes/db.php");

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id=$id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $product['name'] ?> - Sharma Computers</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-5">
      <img src="assets/images/<?= $product['image'] ?>" class="img-fluid" alt="<?= $product['name'] ?>">
    </div>
    <div class="col-md-7">
      <h2><?= $product['name'] ?></h2>
      <h4 class="text-success">₹<?= $product['price'] ?></h4>
      <p><?= $product['description'] ?></p>
      <form method="post" action="user/cart.php">
        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
        <label>Quantity:</label>
        <input type="number" name="quantity" value="1" min="1" max="<?= $product['stock'] ?>" class="form-control w-25 mb-2">
        <button type="submit"  class="btn btn-primary">Add to Cart</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>
