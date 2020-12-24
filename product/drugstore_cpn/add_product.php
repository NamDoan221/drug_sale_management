<?php 
    session_start();
    if (!$_SESSION['user_detail']->id_user) { echo '
<script language="javascript">
  window.location = "../../user/login.php";
</script>
'; } include '../../connect.php'; $id = $_GET['id']; $type =
$_GET['type'];$id_user = $_SESSION['user_detail']->id_user; $query =
mysqli_query($conn, "SELECT * FROM `cart_product` WHERE id_product = '$id'");
$row = mysqli_fetch_assoc($query); if ($row) { if($type == 'add'){ $amount =
$row['amount'] + 1; } else{ $amount = $row['amount'] - 1; } $queryInsertCart =
"UPDATE `cart_product` SET `amount`= '$amount' WHERE id_user = '$id_user' AND
id_product = '$id'"; } $result = mysqli_query($conn, $queryInsertCart); echo '
<script language="javascript">
  window.location = "./cart.php";
</script>
'; ?>
