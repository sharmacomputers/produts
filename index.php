<?php
include('includes/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sharma Computers</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="assets/images/ico.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
      Sharma Computers
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
      </ul>
      <form class="d-flex me-3" role="search" action="search.php" method="GET">
        <input class="form-control me-2" type="search" name="query" placeholder="Search products" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
      <div class="d-flex">
      <a class="btn btn-success" href="https://wa.me/918910844985" target="_blank">📞 WhatsApp Us</a>
      </div>

    </div>
  </div>
</nav>

<div class="container mt-4">
  <h2 class="text-center mb-4">Latest Products</h2>
  <div class="row">
    <?php
    $result = $conn->query("SELECT * FROM products");
    while($row = $result->fetch_assoc()):
    ?>
    <div class="col-md-3 mb-4">
      <div class="card shadow-sm h-100">
        <img src="assets/images/<?= $row['image'] ?>" class="card-img-top" alt="<?= $row['name'] ?>">
        <div class="card-body">
          <h5 class="card-title"><?= $row['name'] ?></h5>
          <p class="card-text text-success fw-bold"><?= $row['price'] ?></p>
          <a class="btn btn-success text-white" target="_blank" href="https://wa.me/918910844985?text=Hi, I have a query about the product <?= urlencode($row['name']) ?>.">💬 Query on WhatsApp</a>

        </div>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
</div>
<!-- WhatsApp Float Button -->
<a href="https://wa.me/918910844985" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>


<footer class="bg-dark text-white text-center py-3 mt-5">
  &copy; <?= date('Y') ?> Sharma Computers. All Rights Reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
