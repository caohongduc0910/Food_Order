<?php include ('./partial/menu.php') ?>

<div class="content">
  <div class="wrapper">
    <h1>Đổi mật khẩu</h1>
    <br>
    <form action="" method="POST">
      <div class="mb-3">
        <label for="FormControlInput1" class="form-label">Mật khẩu mới</label>
        <input type="text" class="form-control" id="FormControlInput1" placeholder="Current Password"
          name="current_password">
      </div>

      <div class="mb-3">
        <label for="FormControlInput2" class="form-label">Mật khẩu hiện tại</label>
        <input type="text" class="form-control" id="FormControlInput2" placeholder="New Password" name="new_password">
      </div>

      <div class="mb-3">
        <label for="FormControlInput3" class="form-label">Xác nhận mật khẩu</label>
        <input type="text" class="form-control" id="FormControlInput3" placeholder="Confirm Password"
          name="confirm_password">
      </div>

      <div class="mb-3">
        <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
      </div>
    </form>
  </div>
</div>

<?php include ('./partial/footer.php') ?>

<?php
if (isset($_POST['submit'])) {
  $currentPassword = md5($_POST['current_password']);
  $newPassword = md5($_POST['new_password']);
  $confirmPassword = md5($_POST['confirm_password']);

  $id = $_GET['id'];

  $sql = "SELECT * FROM admin WHERE id = $id AND password = '$currentPassword'";

  $res = mysqli_query($conn, $sql) ;

  if ($res == true) {
    $count = mysqli_num_rows($res);

    if ($count == 1) {
      if ($newPassword == $confirmPassword) {
        $sql2 = "UPDATE admin SET password = '$newPassword'";
        $res2 = mysqli_query($conn, $sql2);

        if ($res2 == true) {
          $_SESSION['change_password'] = "<div class='alert alert-success'>Changed Password Successfully</div>";
          header("location:" . SITEURL . "admin/admin.php");
        } else {
          $_SESSION['change_password'] = "<div class='alert alert-danger'>Changed Password Unsuccessfully</div>";
          header("location:" . SITEURL . "admin/admin.php");
        }
      } else {
        $_SESSION['password_not_match'] = "<div class='alert alert-danger'>Password not match</div>";
        header("location:" . SITEURL . "admin/admin.php");
      }
    } else {
      $_SESSION['user_not_found'] = "<div class='alert alert-danger'>Password incorrect or ID not found</div>";
      header("location:" . SITEURL . "admin/admin.php");
    }
  }
}
?>