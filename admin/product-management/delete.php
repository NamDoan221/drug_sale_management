<?php
  include '../../connect.php';
  $id = $_GET['id'];
  $query = mysqli_query($conn, "DELETE FROM `product` WHERE id_product = '$id'");
  echo '<script language="javascript">alert("Xoa san pham thanh cong");window.location="../product-management/product-management.php";</script>';
?>