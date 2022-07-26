<?php include('../admin/lib/header.php') ?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Add Product</h1>
            <br> <br>
            <?php
                if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);}
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Product Name: </td>
                        <td>
                            <input type="text" name="product_name" placeholder="Product Name">
                        </td>
                    </tr>
                    <tr>
                        <td>Choose Image:</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>
                    <tr>
                        <td>Quanlity: </td>
                        <td>
                            <input type="text" name="product_quanlity">
                        </td>
                    </tr>
                    <tr>
                        <td>Sold Out: </td>
                        <td>
                            <input type="text" name="product_soldout">
                        </td>
                    </tr>
                    <tr>
                        <td>Remain: </td>
                        <td>
                            <input type="text" name="product_remain">
                        </td>
                    </tr>
                    <tr>
                        <td>Category: </td>
                        <td>
                            <select name="category_id">
                                <?php
                                 $sql = "SELECT * FROM tbl_category WHERE category_active='Yes'";
                                 $res = mysqli_query($conn,$sql);
                                 $count = mysqli_num_rows($res);
                                 if($count>0){
                                    while($row=mysqli_fetch_assoc($res)){
                                        $category_id=$row['category_id'];
                                        $category_name=$row['category_name'];
                                        ?>
                                            <option value="<?php echo $category_id; ?>"><?php echo $category_name ?></option>
                                        <?php
                                    }
                                 }else{
                                    ?>
                                        <option value="0">No Category Found</option>
                                    <?php
                                 }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Desciption: </td>
                        <td>
                            <textarea type="description" name="product_descript" cols="40" rows="10"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Price: </td>
                        <td>
                            <input type="text" name="price">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Product" class="btn-option">
                        </td>
                    </tr>
                </table>
            </form>
        </div>  
    </div>


<?php include('../admin/lib/footer.php') ?>
<?php
    if(isset($_POST['submit'])){
        $product_name = $_POST['product_name'];
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
        $product_quanlity = $_POST['product_quanlity'];
        $product_soldout = $_POST['product_soldout'];
        $product_remain = $_POST['product_remain'];
        $category_id=$_POST['category_id'];
        $product_descript = $_POST['product_descript'];
        $price = $_POST['price'];

        $sql2 = "INSERT INTO tbl_product SET 
            product_name='$product_name',
            image='$image',
            product_quanlity = '$product_quanlity',
            product_soldout = '$product_soldout',
            product_remain='$product_remain',
            category_id='$category_id',
            product_descript='$product_descript',
            price='$price'
            ";
        $res2 = mysqli_query($conn,$sql2);
        if($res2==TRUE){
            $_SESSION['add'] = "<div style='color:#3498DB'>Product added thành công</div>";
            header('location:../admin/ql_product.php');
        }else{
            $_SESSION['add'] = "<div style ='color:red'>Không Thành công</div>";
            header('location:../admin/add_product.php');
        }
    }
    ?>        