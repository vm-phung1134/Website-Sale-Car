<?php 
include('config/connect.php'); 
    $cart_id = $_GET['cart_id'];
    $sql = "DELETE FROM tbl_cart WHERE cart_id=$cart_id";
    $res = mysqli_query($conn,$sql) or die();
    if($res==TRUE){
        $_SESSION['delete'] = "<div style ='color:green'>Remove item form cart</div>";
        header('location:../NewWS_Technology/cart.php');
    }
    else{
        $_SESSION['delete'] = "<div style ='color:red'>Not complete</div>";
        header('location:../NewWS_Technology/cart.php');
    }
?>