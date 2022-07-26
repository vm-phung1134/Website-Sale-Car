<?php include('../admin/lib/header.php') ?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Add Product</h1>
            <br> <br>
            <?php 
                $product_id=$_GET['product_id'];
                $sql = "SELECT * FROM tbl_product WHERE product_id=$product_id";
                $res=mysqli_query($conn,$sql);
                if($res==TRUE){
                    $count = mysqli_num_rows($res);
                    if($count==1){
                        $row=mysqli_fetch_assoc($res);
                        $product_name = $row['product_name'];
                        $image = $row['image'];
                        $product_quanlity=$row['product_quanlity'];
                        $product_soldout=$row['product_soldout'];
                        $product_remain=$row['product_remain'];
                        $category_id=$row['category_id'];
                        $product_descript=$row['product_descript'];
                        $price=$row['price'];
                    }
                }else{
                    header('location:../admin/ql_product.php');
                }
            ?>
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Product Name: </td>
                        <td>
                            <input type="text" name="product_name" placeholder="Product Name" value="<?php echo $product_name; ?>">
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
                            <input type="text" name="product_quanlity" value="<?php echo $product_quanlity; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Sold Out: </td>
                        <td>
                            <input type="text" name="product_soldout" value="<?php echo $product_soldout; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Remain: </td>
                        <td>
                            <input type="text" name="product_remain" value="<?php echo $product_remain; ?>">
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
                            <textarea type="description" name="product_descript" cols="40" rows="10" value="<?php echo $product_descript; ?>"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Price: </td>
                        <td>
                            <input type="text" name="price" value="<?php echo $price; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                            <input type="submit" name="submit" value="Update Product" class="btn-option">
                        </td>
                    </tr>
                </table>
            </form>
        </div>  
    </div>


<?php include('../admin/lib/footer.php') ?>
<?php 
    if(isset($_POST['submit'])){
            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $image = $_POST['image'];
            $product_quanlity=$_POST['product_quanlity'];
            $product_soldout=$_POST['product_soldout'];
            $product_remain=$_POST['product_remain'];
            $category_id=$_POST['category_id'];
            $product_descript=$_POST['product_descript'];
            $price=$_POST['price'];
        
        $sql2 = "UPDATE tbl_product SET
            product_name='$product_name',
            image='$image',
            product_quanlity = '$product_quanlity',
            product_soldout = '$product_soldout',
            product_remain='$product_remain',
            category_id='$category_id',
            product_descript='$product_descript',
            price='$price'
        WHERE
            product_id='$product_id'
            ";
        $res2 = mysqli_query($conn,$sql2) or die();
        if($res==TRUE){
            $_SESSION['update'] = "<div style='color:#3498DB'>Product updated thành công</div>";
            header('location:../admin/ql_product.php');
        }
        else{
            $_SESSION['update'] = "<div style ='color:red'>Update không Thành công </div>";
            header('location:../admin/update_product.php');
        }
    }    
?>