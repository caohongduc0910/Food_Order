<?php include('../admin/partial/menu.php')?>

<div class="content">
  <div class="wrapper">
    <h1>Cập nhật quản trị viên</h1>

    <?php
      $id = $_GET['id'];

      $sql = "SELECT * FROM admin WHERE id = $id";
      $res = mysqli_query($conn, $sql) or die(mysqli_error());
      
      if($res==true) {
        $count = mysqli_num_rows($res);

        if($count == 1) {
          $row = mysqli_fetch_array($res);
          $id = $row['id'];
          $fullName = $row['full_name'];
          $userName = $row['username'];
        }
        else {
          header("location:".SITEURL."admin/category.php");
        }
      }
      else{
        header("location:".SITEURL."admin/category.php");
      }
    ?>


    <form action="" method="POST">
      <div class="mb-3">
        <label for="FormControlInput1" class="form-label">Họ tên</label>
        <input type="text" class="form-control" id="FormControlInput1" value = "<?php echo $fullName; ?>" name="fullname">
      </div>

      <div class="mb-3">
        <label for="FormControlInput2" class="form-label">Tên đăng nhập</label>
        <input type="text" class="form-control" id="FormControlInput2" value = "<?php echo $userName; ?>" name="username">
      </div>

      <div class="mb-3">
        <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
      </div>
    </form>
  </div>
</div>

<?php include('../admin/partial/footer.php')?>

<?php
  if(isset($_POST['submit'])) {
    $fullName = $_POST['fullname'];
    $userName = $_POST['username'];

    $sql = "UPDATE admin SET
      full_name = '$fullName',
      username = '$userName'
      WHERE id = '$id'
      ";

    $res = mysqli_query($conn, $sql);

    if($res==true) {
      // display msg with session 
      $_SESSION['update'] = "<div class='alert alert-success'>Admin updated successfully</div>";
      //redirect page
      header("location:".SITEURL."admin/admin.php");
    }
    else{
      $_SESSION['add'] = "<div class='alert alert-danger'>Admin updated unsuccessfully</div>";
      header("location:".SITEURL."admin/admin.php");
    }
  }
?>

