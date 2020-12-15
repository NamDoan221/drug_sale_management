<?php 
    session_start();
    include '../../connect.php';
    $id = $_GET['id'];
    $amount = $_GET['amount'];
    $id_user = $_SESSION['user_detail']->id_user;
    $queryInsertCart = "INSERT INTO `cart_product`(`id_user`, `id_product`, `amount`) VALUES ('$id_user','$id', $amount)";
    $result = mysqli_query($conn, $queryInsertCart);
    echo '<script language="javascript">alert("Thao tac thanh cong!");window.location="./drugstore.php";</script>';
?>