<?php 
include('../admin/config/connect.php');
    $category_id = $_GET['category_id'];
    $sql = "DELETE FROM tbl_category WHERE category_id=$category_id";
    $res = mysqli_query($conn,$sql) or die();
    if($res==TRUE){
        $_SESSION['delete'] = "<div style ='color:blue'>Xoá Category thành công</div>";
        header('location:../admin/ql_category.php');
    }
    else{
        $_SESSION['delete'] = "<div style ='color:red'>Không Thành công</div>";
        header('location:../admin/ql_category.php');
    }
?>