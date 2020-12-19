<?php 
    session_start();
    if (!$_SESSION['user_detail']->id_user) {
        echo '<script language="javascript">window.location="../../user/login.php";</script>';
    }
    include '../../connect.php';
    $id = $_GET['id'];
    $amount = $_GET['amount'];
    $id_user = $_SESSION['user_detail']->id_user;
    $query = mysqli_query($conn, "SELECT * FROM `cart_product` WHERE id_product = '$id'");
    $row = mysqli_fetch_assoc($query);
    if ($row) {
        $amount += $row['amount'];
        $queryInsertCart = "UPDATE `cart_product` SET `amount`= '$amount' WHERE id_user = '$id_user' AND id_product = '$id'";
    } else {
        $queryInsertCart = "INSERT INTO `cart_product`(`id_user`, `id_product`, `amount`) VALUES ('$id_user','$id', $amount)";
    }
    $result = mysqli_query($conn, $queryInsertCart);
    echo '<script language="javascript">alert("Thao tac thanh cong!");window.location="./drugstore.php";</script>';
?>