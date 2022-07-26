<!--Menu Section Starts-->
<?php include('../admin/lib/header.php'); ?>
    <!--Content Starts-->
    <div class='main-content'>
         <div class="wrapper">
             <h1>ADD admin GUI</h1>
                <br> <br>
                <form action="" method="post">
                    <table class="tbl-30">
                        <tr>
                            <td>Admin name: </td>
                            <td><input type="text" name="admin_name"></td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td><input type="text" name="admin_email"></td>
                        </tr>
                        <tr>
                            <td>Password: </td>
                            <td><input type="password" name="admin_pass"></td>
                        </tr>
                        <tr>
                            <td colspan="2"> 
                                <input type="submit" name="submit" value="Add Admin" class="btn-option">
                            </td>
                        </tr>
                    </table>
                </form>
         </div>
    </div>
     <!--Footer Starts-->
<?php include('../admin/lib/footer.php') ?>
<?php 
    if(isset($_POST['submit'])){
        $admin_name = $_POST['admin_name'];
        $admin_email = $_POST['admin_email'];
        $admin_pass= $_POST['admin_pass'];
    
    $sql = "INSERT INTO tbl_admin SET
        admin_name='$admin_name',
        admin_email='$admin_email',
        admin_pass='$admin_pass'
        ";
        $res = mysqli_query($conn,$sql) or die();
        if($res==TRUE){
            $_SESSION['add'] = "<div style='color:#3498DB'>Admin added thành công</div>";
            header("location:".SITEURL.'../admin/ql_admin.php');
        }
        else{
            $_SESSION['add'] = "<div style ='color:red'>Không Thành công</div>";
            header("location".SITEURL.'../admin/ql_admin.php');
        }
    }    
?>
