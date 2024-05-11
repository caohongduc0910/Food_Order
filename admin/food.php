<?php include ('./partial/menu.php') ?>

<div class="content">
  <div class="wrapper">
    <h1>Food</h1>
    <br>
    <?php
    if (isset($_SESSION['add'])) {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }

    if (isset($_SESSION['delete'])) {
      echo $_SESSION['delete'];
      unset($_SESSION['delete']);
    }

    if (isset($_SESSION['remove'])) {
      echo $_SESSION['remove'];
      unset($_SESSION['remove']);
    }

    if (isset($_SESSION['update'])) {
      echo $_SESSION['update'];
      unset($_SESSION['update']);
    }
    ?>

    <a class="btn btn-success" href="addFood.php">Add Food</a>
    <br>
    <br>
    <table class="table table-hover">
      <thead class="table-dark">
        <tr>
          <th>S.N.</th>
          <th>Title</th>
          <th>Description</th>
          <th>Price</th>
          <th>Image</th>
          <th>Category</th>
          <th>Featured</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <?php
        $sql = "SELECT * FROM food";
        $res = mysqli_query($conn, $sql);
        $sn = 1;
        if ($res == true) {
          $count = mysqli_num_rows($res);
          if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
              $id = $row['id'];
              $title = $row['title'];
              $description = $row['description'];
              $price = $row['price'];
              $img_name = $row['img_name'];
              $category_id = $row['category_id'];
              $featured = $row['featured'];
              $status = $row['status'];
              ?>

              <tr>
                <td><?php echo $sn++ ?></td>
                <td><?php echo $title ?></td>
                <td><?php echo $description ?></td>
                <td><?php echo $price ?></td>
                <td>
                  <img src="<?php echo SITEURL; ?>images/food/<?php echo $img_name; ?>" width="100px">
                </td>
                <td><?php echo $category_id ?></td>
                <td><?php echo $featured ?></td>
                <td><?php echo $status ?></td>
                <td>
                  <a href="<?php echo SITEURL; ?>admin/updateFood.php?id=<?php echo $id; ?>"
                    class="btn btn-primary">Update</a>
                  <a href="<?php echo SITEURL; ?>admin/deleteFood.php?id=<?php echo $id; ?>&img_name=<?php echo $img_name; ?>"
                    class="btn btn-danger">Delete</a>
                </td>
              </tr>
              <?php
            }
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

<?php include ('./partial/footer.php') ?>