<!--Menu Section Starts-->
<?php include('../admin/lib/header.php'); ?>
    <!--Content Starts-->
<div class='main-content'>
     <div class="wrapper">
             <h1>Update Admin GUI</h1>
         <br> <br>
            <?php 
                $admin_id=$_GET['admin_id'];
                $sql = "SELECT * FROM tbl_admin WHERE admin_id=$admin_id";
                $res=mysqli_query($conn,$sql);
                if($res==TRUE){
                    $count = mysqli_num_rows($res);
                    if($count==1){
                        $row=mysqli_fetch_assoc($res);
                        $admin_name = $row['admin_name'];
                        $admin_email = $row['admin_email'];
                    }
                }else{
                    header('location:../admin/ql_admin.php');
                }
            ?>

         <form action="" method="post">
            <table class="tbl-30">
                        <tr>
                            <td>Admin Name: </td>
                            <td><input type="text" name="admin_name" value="<?php echo $admin_name; ?>"></td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td><input type="text" name="admin_email"value="<?php echo $admin_email; ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
                                <input type="submit" name="submit" value="Update Admin" class="btn-option">
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
        $admin_name = $_POST['admin_name'];
        $admin_email = $_POST['admin_email'];
    
    $sql = "UPDATE tbl_admin SET
        admin_name='$admin_name',
        admin_email='$admin_email'
        WHERE
        admin_id='$admin_id'
        ";
        $res = mysqli_query($conn,$sql) or die();
        if($res==TRUE){
            $_SESSION['update'] = "<div style='color:#3498DB'>Admin updated thành công</div>";
            header('location:../admin/ql_admin.php');
        }
        else{
            $_SESSION['update'] = "<div style ='color:red'>Không Thành công </div>";
            header('location:../admin/ql_admin.php');
        }
    }    
?>