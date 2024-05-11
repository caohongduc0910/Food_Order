<?php include ('../admin/partial/menu.php') ?>

<div class="content">
  <div class="wrapper">
    <h1>Update Order</h1>

    <?php
    $id = $_GET['id'];

    $sql = "SELECT * FROM `order` WHERE id = $id";
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
      $count = mysqli_num_rows($res);

      if ($count == 1) {
        $row = mysqli_fetch_array($res);
        // $id = $row['id'];
        $food = $row['food'];
        $price = $row['price'];
        $quantity = $row['quantity'];
        $total = $row['total'];
        $order_date = $row['order_date'];
        $status = $row['status'];
        $customer_name = $row['customer_name'];
        $customer_contact = $row['customer_contact'];
        $customer_email = $row['customer_email'];
        $customer_address = $row['customer_address'];
      } else {
        header("location:" . SITEURL . "admin/order.php");
      }
    } else {
      // $_SESSION['delete'] = "Deleted unsuccessfully";
      header("location:" . SITEURL . "admin/order.php");
    }
    ?>

    <?php
    if (isset($_POST['submit'])) {
      $food = $_POST['food'];
      $price = $_POST['price'];
      $quantity = $_POST['qty'];
      $total = $price * $quantity;
      $status = $_POST['status'];
      $customer_name = $_POST['customer_name'];
      $customer_contact = $_POST['customer_contact'];
      $customer_email = $_POST['customer_email'];
      $customer_address = $_POST['customer_address'];

      $sql = "UPDATE `order` SET
        quantity = $quantity,
        total = $total,
        status = '$status',
        customer_name = '$customer_name',
        customer_contact = '$customer_contact',
        customer_email = '$customer_email',
        customer_address = '$customer_address'
        WHERE id = $id";

      echo $sql;

      $res = mysqli_query($conn, $sql);

      if ($res == true) {
        $_SESSION['update'] = "<div class='alert alert-success'>Order updated successfully</div>";
        header("location:" . SITEURL . "admin/order.php");
      } else {
        $_SESSION['update'] = "<div class='alert alert-danger'>Order updated unsuccessfully</div>";
        header("location:" . SITEURL . "admin/order.php");
      }
    }
    ?>

    <form action="" method="POST">
      <div class="mb-3">
        <label class="form-label"><b>Food</b></label>
        <input type="text" class="form-control" id="FormControlInput1" name="food" value="<?php echo $food; ?>"
          readonly>
      </div>

      <div class="mb-3">
        <label class="form-label"><b>Price</b></label>
        <input type="text" class="form-control" id="FormControlInput1" name="price" value="<?php echo $price; ?>"
          readonly>
      </div>

      <div class="mb-3">
        <label for="FormControlInput2" class="form-label"><b>Quantity</b></label>
        <input type="number" class="form-control" id="FormControlInput2" name="qty" value="<?php echo $quantity; ?>">
      </div>

      <div class="mb-3">
        <label for="FormControlInput2" class="form-label"><b>Status</b></label>
        <select class="form-select" name="status">
          <option value="Ordered" <?php if ($status == "Ordered") {
            echo 'selected';
          } ?>>Ordered</option>
          <option value="On Delivery" <?php if ($status == "On Delivery") {
            echo 'On Delivery';
          } ?>>On Delivery</option>
          <option value="Delivered" <?php if ($status == "Delivered") {
            echo 'Delivered';
          } ?>>Delivered</option>
          <option value="Cancelled" <?php if ($status == "Cancelled") {
            echo 'Cancelled';
          } ?>>Cancelled</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="FormControlInput3" class="form-label"><b>Customer Name</b></label>
        <input type="text" class="form-control" id="FormControlInput3" name="customer_name"
          value="<?php echo $customer_name; ?>">
      </div>

      <div class="mb-3">
        <label for="FormControlInput4" class="form-label"><b>Customer Contact</b></label>
        <input type="text" class="form-control" id="FormControlInput4" name="customer_contact"
          value="<?php echo $customer_contact; ?>">
      </div>

      <div class="mb-3">
        <label for="FormControlInput5" class="form-label"><b>Customer Email</b></label>
        <input type="text" class="form-control" id="FormControlInput5" name="customer_email"
          value="<?php echo $customer_email; ?>">
      </div>

      <div class="mb-3">
        <label for="FormControlInput3" class="form-label"><b>Customer Address</b></label>
        <input type="text" class="form-control" id="FormControlInput3" name="customer_address"
          value="<?php echo $customer_address; ?>">
      </div>


      <div class="mt-2">
        <button type="submit" name="submit" class="btn btn-primary"> Update </button>
      </div>
    </form>
  </div>
</div>

<?php include ('../admin/partial/footer.php') ?>