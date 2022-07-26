<!--Menu Section Starts-->
<?php include('../admin/lib/header.php'); ?>
    <!--Content Starts-->
<div class='main-content'>
     <div class="wrapper">
             <h1>Update Category GUI</h1>
         <br> <br>
            <?php 
                $category_id=$_GET['category_id'];
                $sql = "SELECT * FROM tbl_category WHERE category_id=$category_id";
                $res=mysqli_query($conn,$sql);
                if($res==TRUE){
                    $count = mysqli_num_rows($res);
                    if($count==1){
                        $row=mysqli_fetch_assoc($res);
                        $category_name = $row['category_name'];
                        $image_name = $row['image_name'];
                        $category_featured=$row['category_featured'];
                        $category_active=$row['category_active'];
                    }
                }else{
                    header('location:../admin/ql_category.php');
                }
            ?>

         <form action="" method="post">
            <table class="tbl-30">
                        <tr>
                            <td>Category Name: </td>
                            <td><input type="text" name="category_name" value="<?php echo $category_name; ?>"></td>
                        </tr>
                        <tr>
                        <td>Choose Image:</td>
                        <td>
                            <input type="file" name="image_name">
                        </td>
                    </tr>
                    <tr>
                        <td>Futured: </td>
                        <td>
                            <input type="radio" name="category_featured" value="Yes"> Yes
                            <input type="radio" name="category_featured" value="No"> No
                        </td>
                    </tr>
                    <tr>
                        <td>Active: </td>
                        <td>
                            <input type="radio" name="category_active" value="Yes"> Yes
                            <input type="radio" name="category_active" value="No"> No
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
                            <input type="submit" name="submit" value="Update Category" class="btn-option">
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
        $category_id = $_POST['category_id'];
        $category_name = $_POST['category_name'];
        $image_name = $_POST['image_name'];
        $category_featured = $_POST['category_featured'];
        $category_active = $_POST['category_active'];
    
    $sql = "UPDATE tbl_category SET
        category_name='$category_name',
        image_name='$image_name',
        category_featured='$category_featured',
        category_active='$category_active'
        WHERE
        category_id='$category_id'
        ";
        $res = mysqli_query($conn,$sql) or die();
        if($res==TRUE){
            $_SESSION['update'] = "<div style='color:#3498DB'>Category updated thành công</div>";
            header('location:../admin/ql_category.php');
        }
        else{
            $_SESSION['update'] = "<div style ='color:red'>Update không Thành công </div>";
            header('location:../admin/ql_category.php');
        }
    }    
?>