<?php
  include '../../connect.php';
  $id = $_GET['id'];
  $query = mysqli_query($conn, "DELETE FROM `employee` WHERE id_employee = '$id'");
  echo '<script language="javascript">alert("Xoá nhân viên thành công");window.location="../employee-management/employee-management.php";</script>';
?>