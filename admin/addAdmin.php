<?php include ('./partial/menu.php') ?>

<div class="content">
  <div class="wrapper">
    <h1>Thêm quản trị viên</h1>
    <br>
    <form action="" method="POST">
      <div class="mb-3">
        <label for="FormControlInput1" class="form-label">Họ tên</label>
        <input type="text" class="form-control" id="FormControlInput1" placeholder="Enter fullname" name="fullname">
      </div>

      <div class="mb-3">
        <label for="FormControlInput2" class="form-label">Tên đăng nhập</label>
        <input type="text" class="form-control" id="FormControlInput2" placeholder="Enter username" name="username">
      </div>

      <div class="mb-3">
        <label for="FormControlInput3" class="form-label">Mật khẩu</label>
        <input type="text" class="form-control" id="FormControlInput3" placeholder="Enter password" name="password">
      </div>

      <div class="mb-3">
        <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
      </div>
    </form>
  </div>
</div>

<?php include ('./partial/footer.php') ?>

<?php
if (isset($_POST['submit'])) {
  $fullName = $_POST['fullname'];
  $userName = $_POST['username'];
  $passWord = md5($_POST['password']);

  $sql = "INSERT INTO admin SET
      full_name = '$fullName',
      username = '$userName',
      password = '$passWord'
      ";

  $res = mysqli_query($conn, $sql) or die(mysqli_error());

  if ($res == true) {
    // display msg with session 
    $_SESSION['add'] = "<div class='alert alert-success'>Admin added successfully</div>";
    //redirect page
    header("location:" . SITEURL . "admin/admin.php");
  } else {
    $_SESSION['add'] = "<div class='alert alert-danger'>Admin added unsuccessfully</div>";
    header("location:" . SITEURL . "admin/admin.php");
  }
}
?>