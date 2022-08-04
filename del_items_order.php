<?php 
include('config/connect.php'); 
    $order_id = $_GET['order_id'];
    $sql10 = "DELETE FROM tbl_order WHERE order_id=$order_id";
    $res10 = mysqli_query($conn,$sql10) or die();
    if($res10==TRUE){
        $_SESSION['delete'] = "<div style ='color:green; font-size:17px;margin-left:10px'>Remove item from order</div>";
        header('location:../NewWS_Technology/order.php');
    }
    else{
        $_SESSION['delete'] = "<div style ='color:red;font-size:17px;'>Not complete</div>";
        header('location:../NewWS_Technology/order.php');
    }
?>