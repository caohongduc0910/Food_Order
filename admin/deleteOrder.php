<?php

  include('../config/constant.php'); 

  $id = $_GET['id'];

  $sql = "DELETE FROM `order` WHERE id = $id";
  $res = mysqli_query($conn, $sql);
  
  if($res==true) {
    $_SESSION['delete'] = "<div class='alert alert-success'>Order deleted successfully</div>";
    header("location:".SITEURL."admin/order.php");
  }
  else{
    $_SESSION['delete'] = "<div class='alert alert-danger'>Order deleted unsuccessfully</div>";
    header("location:".SITEURL."admin/order.php");
  }
?>