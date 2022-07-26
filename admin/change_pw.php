<!--Menu Section Starts-->
<?php include('../admin/lib/header.php'); ?>
    <!--Content Starts-->
<div class='main-content'>
     <div class="wrapper">
             <h1>Change Password Admin GUI</h1>
         <br> <br>
         <?php 
                if(isset($_GET['admin_id'])){
                    $admin_id=$_GET['admin_id'];
                }
                
            ?>
         <form action="" method="post">
            <table class="tbl-30">
                        <tr>
                            <td>Password: </td>
                            <td><input type="password" name="current_pw"></td>
                        </tr>
                        <tr>
                            <td>New Password: </td>
                            <td><input type="password" name="new_pw" ></td>
                        </tr>
                        <tr>
                            <td>Confirm Password:</td>
                            <td><input type="password" name="re_pw"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
                                <input type="submit" name="submit" value="Update Password Admin" class="btn-option">
                            </td>
                        </tr>
            </table>
                
        </form>
    </div>
</div>
     <!--Footer Starts-->
<?php include('../admin/lib/footer.php'); ?>

<?php 
    if(isset($_POST['submit'])){
        $admin_id = $_POST['admin_id'];
        $current_pw=$_POST['current_pw'];
        $new_pw=$_POST['new_pw'];
        $re_pw=$_POST['re_pw'];
    
        $sql = "SELECT * FROM tbl_admin WHERE admin_id=$admin_id AND admin_pass='$current_pw'";
        $res = mysqli_query($conn,$sql) or die();
        if($res==TRUE){
        $count = mysqli_num_rows($res);
            if($count!=0){
                if($new_pw==$re_pw){
                    $sql2="UPDATE tbl_admin SET admin_pass='$new_pw' WHERE admin_id=$admin_id";
                    $res2 = mysqli_query($conn,$sql2) or die();
                    if($res2==TRUE){
                        $_SESSION['change'] = "<div style='color:#3498DB'>Change password addmin thành công</div>";
                        header('location:../admin/ql_admin.php');
                    }else{
                        $_SESSION['change'] = "<div style ='color:red'>Không Thành công </div>";
                        header('location:../admin/ql_admin.php');
                    }

                }else{
                    $_SESSION['not-match'] = "<div style ='color:red'>Not match</div>";
                    header('location:../admin/ql_admin.php');
                }
            }else{
                $_SESSION['not-found'] = "<div style ='color:red'>Not found</div>";
                header('location:../admin/ql_admin.php');
            }
        }
    }    
?>