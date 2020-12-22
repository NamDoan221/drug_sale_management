<?php 
    session_start();
    unset($_SESSION['session_id']);
    echo '<script language="javascript">alert("Thao tac thanh cong!");window.location="./index.php";</script>';
?>