<?php 
include('../admin/config/connect.php');
    $product_id = $_GET['product_id'];
    $sql = "DELETE FROM tbl_product WHERE product_id=$product_id";
    $res = mysqli_query($conn,$sql) or die();
    if($res==TRUE){
        $_SESSION['delete'] = "<div style ='color:blue'>Xoá product thành công</div>";
        header('location:../admin/ql_product.php');
    }
    else{
        $_SESSION['delete'] = "<div style ='color:red'>Delete product không Thành công</div>";
        header('location:../admin/ql_product.php');
    }
?>