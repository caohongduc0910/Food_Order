<?php include ('./partial/menu.php') ?>

<div class="content">
  <div class="wrapper">
    <h1>Add Category</h1>
    <br>

    <?php
    if (isset($_POST['submit'])) {
      $title = $_POST['title'];
      $featured = $_POST['featured'];
      $status = $_POST['status'];

      if (isset($_FILES['img']['name'])) {
        $img_name = $_FILES['img']['name'];
        if ($img_name != '') {
          $img_path = $_FILES['img']['tmp_name'];

          $destination_path = '../images/category/' . $img_name;

          $upload = move_uploaded_file($img_path, $destination_path);

          if ($upload == false) {
            $_SESSION['update'] = "<div class='alert alert-danger'>Fail to upload</div>";
            header("location:" . SITEURL . "admin/addCategory.php");
            die();
          }
        }
      } else {
        $img_name = "";
      }

      $sql = "INSERT INTO category SET
      title = '$title',
      img_name = '$img_name',
      featured = '$featured',
      status = '$status'
      ";

      $res = mysqli_query($conn, $sql);

      if ($res == true) {
        $_SESSION['add'] = "<div class='alert alert-success'>Category added successfully</div>";
        header("location:" . SITEURL . "admin/category.php");
      } else {
        $_SESSION['add'] = "<div class='alert alert-danger'>Category added unsuccessfully</div>";
        header("location:" . SITEURL . "admin/category.php");
      }
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="FormControlInput1" class="form-label">Title</label>
        <input type="text" class="form-control" id="FormControlInput1" placeholder="Enter title" name="title">
      </div>

      <div class="mb-3">
        <label for="FormControlInput2" class="form-label">Image</label>
        <input type="file" class="form-control" id="FormControlInput2" name="img" accept="image/*">
      </div>

      <div class="row">
        <div class="col-6">
          <div class="mb-2">Featured</div>
          <div class="container">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="featured" id="flexRadioDefault1" value="yes" checked>
              <label class="form-check-label" for="flexRadioDefault1">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="featured" id="flexRadioDefault2" value="no">
              <label class="form-check-label" for="flexRadioDefault2">
                No
              </label>
            </div>
          </div>
        </div>

        <div class="col-6">
          <div class="mb-2">Status</div>
          <div class="container">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="flexRadioDefault3" value="active" checked>
              <label class="form-check-label" for="flexRadioDefault3">
                Active
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="flexRadioDefault4" value="inactive">
              <label class="form-check-label" for="flexRadioDefault4">
                Inactive
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-2">
        <button type="submit" name="submit" class="btn btn-primary"> Create </button>
      </div>
    </form>
  </div>
</div>

<?php include ('./partial/footer.php') ?>