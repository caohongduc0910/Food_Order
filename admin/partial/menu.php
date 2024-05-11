<?php 

  include ('../config/constant.php');
  include ('partial/login_check.php');

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Order</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
  <div class="menu text-center">
    <div class="wrapper">
      <ul>
        <li> <a href="index.php">Home</a></li>
        <li> <a href="admin.php">Admin</a></li>
        <li> <a href="category.php">Category</a></li>
        <li> <a href="food.php">Food</a></li>
        <li> <a href="order.php">Order</a></li>
        <li> <a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>