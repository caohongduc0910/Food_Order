<?php include ('./partial/menu.php') ?>

<div class="content">
  <div class="wrapper">
    <h1>Đơn hàng</h1>
    <br>

    <?php
    if (isset($_SESSION['update'])) {
      echo $_SESSION['update'];
      unset($_SESSION['update']);
    }

    if (isset($_SESSION['delete'])) {
      echo $_SESSION['delete'];
      unset($_SESSION['delete']);
    }
    ?>

    <table class="table table-hover">
      <thead class="table-dark">
        <tr>
          <th>STT</th>
          <th>Tên</th>
          <th>Giá</th>
          <th>Số lượng</th>
          <th>Tổng</th>
          <th>Trạng thái</th>
          <th>Tên</th>
          <th>Liên lạc</th>
          <th>SĐT</th>
          <th>Địa chỉ</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <?php
      $sql = "SELECT * FROM `order`";
      $res = mysqli_query($conn, $sql);
      $sn = 1;
      if ($res == true) {
        $count = mysqli_num_rows($res);
        if ($count > 0) {
          while ($row = mysqli_fetch_assoc($res)) {
            $id = $row['id'];
            $food = $row['food'];
            $price = $row['price'];
            $quantity = $row['quantity'];
            $total = $row['total'];
            $status = $row['status'];
            $customername = $row['customer_name'];
            $customercontact = $row['customer_contact'];
            $customeremail = $row['customer_email'];
            $customeraddress = $row['customer_address'];
            ?>

            <tr>
              <td><?php echo $sn++ ?></td>
              <td><?php echo $food ?></td>
              <td><?php echo $price ?></td>
              <td><?php echo $quantity ?></td>
              <td><?php echo $total ?></td>
              <td><?php echo $status ?></td>
              <td><?php echo $customername ?></td>
              <td><?php echo $customercontact ?></td>
              <td><?php echo $customeremail ?></td>
              <td><?php echo $customeraddress ?></td>
              <td>
                <a href="<?php echo SITEURL; ?>admin/updateOrder.php?id=<?php echo $id; ?>"
                  class="btn btn-primary">Cập nhật</a>
                <a href="<?php echo SITEURL; ?>admin/deleteOrder.php?id=<?php echo $id; ?>"
                  class="btn btn-danger">Xóa</a>
              </td>
            </tr>
            <?php
          }
        }
      }
      ?>
    </table>
    <div class="clearfix"></div>
  </div>
</div>

<?php include ('./partial/footer.php') ?>