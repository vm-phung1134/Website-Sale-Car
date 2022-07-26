<?php include('../admin/lib/header.php') ?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Add Category</h1>
            <br> <br>
            <?php
                if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);}      
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Name: </td>
                        <td>
                            <input type="text" name="category_name" placeholder="Category Name">
                        </td>
                    </tr>
                    <tr>
                        <td>Choose Image:</td>
                        <td>
                            <input type="file" name="image">
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
                            <input type="submit" name="submit" value="Add Category" class="btn-option">
                        </td>
                    </tr>
                </table>
            </form>
        </div>  
    </div>


<?php include('../admin/lib/footer.php') ?>
<?php
    if(isset($_POST['submit'])){
        $category_name = $_POST['category_name'];
        if(isset($_FILES['image']['name'])){
            $image = $_FILES['image']['name'];
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../image/".$image;
            $upload = move_uploaded_file($source_path,$destination_path);
            if($upload==FALSE){
                $_SESSION['upload'] = "<div style ='color:red'>Không Thành công up ảnh</div>";
                header('location:../admin/add_product.php');
                die();
            }
        }else{
            $image="";
        }
        if(isset($_POST['category_featured'])){
            $category_featured = $_POST['category_featured'];
        }else{
            $category_featured='No';
        }
        if(isset($_POST['category_active'])){
            $category_active = $_POST['category_active'];
        }else{
            $category_active='No';
        }
        $sql = "INSERT INTO tbl_category SET 
            category_name='$category_name',
            image='$image',
            category_featured = '$category_featured',
            category_active='$category_active'";
        $res = mysqli_query($conn,$sql);
        if($res==TRUE){
            $_SESSION['add'] = "<div style='color:#3498DB'>Category added thành công</div>";
            header('location:../admin/ql_category.php');
        }else{
            $_SESSION['add'] = "<div style ='color:red'>Không Thành công</div>";
            header('location:../admin/add_category.php');
        }
    }
?>        