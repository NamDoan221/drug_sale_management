<?php
  // echo '<script language="javascript">const rs = confirm("Ban co muon xoa san pham!"); if(!rs){window.location="../product-management/product-management.php";};</script>';
  include '../../connect.php';
  $id = $_GET['id'];
  $query = mysqli_query($conn, "DELETE FROM `product` WHERE id_product = '$id'");
  echo '<script language="javascript">alert("Xoa san pham thanh cong");window.location="../product-management/product-management.php";</script>';
?>