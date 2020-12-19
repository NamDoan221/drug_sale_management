<?php
  session_start();
  include '../../connect.php';
  $id_user = $_SESSION['user_detail']->id_user;
  $id = $_GET['id'];
  $query = mysqli_query($conn, "DELETE FROM `cart_product` WHERE id_product = '$id' AND id_user = '$id_user'");
  echo '<script language="javascript">alert("Xoa san pham thanh cong");window.location="./cart.php";</script>';
?>