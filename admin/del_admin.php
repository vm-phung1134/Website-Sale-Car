<?php 
include('../admin/config/connect.php');
    $id = $_GET['admin_id'];
    $sql = "DELETE FROM tbl_admin WHERE admin_id=$id";
    $res = mysqli_query($conn,$sql) or die();
    if($res==TRUE){
        $_SESSION['delete'] = "<div style ='color:blue'>Xoá Admin thành công</div>";
        header('location:../admin/ql_admin.php');
    }
    else{
        $_SESSION['delete'] = "<div style ='color:red'>Không Thành công</div>";
        header('location:../admin/ql_admin.php');
    }
?>