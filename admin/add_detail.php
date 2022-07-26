<?php include('../admin/lib/header.php') ?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Add Details Product</h1>
            <br> <br>
            <?php
                if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);}
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                <tr>
                        <td>Product ID: </td>
                        <td>
                            <select name="product_id">
                                <?php
                                 $sql = "SELECT * FROM tbl_product";
                                 $res = mysqli_query($conn,$sql);
                                 $count = mysqli_num_rows($res);
                                 if($count>0){
                                    while($row=mysqli_fetch_assoc($res)){
                                        $product_id=$row['product_id'];
                                        $product_name=$row['product_name'];
                                        ?>
                                            <option value="<?php echo $product_id; ?>"><?php echo $product_name ?></option>
                                        <?php
                                    }
                                 }else{
                                    ?>
                                        <option value="0">No product Found</option>
                                    <?php
                                 }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Detail Name: </td>
                        <td>
                            <input type="text" name="detail_name">
                        </td>
                    </tr>
                    <tr>
                        <td>Image 1:</td>
                        <td>
                            <input type="file" name="img_1">
                        </td>
                    </tr>
                    <tr>
                        <td>Content 1:</td>
                        <td>
                            <textarea type="description" name="content_1" cols="60" rows="10"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Image 2:</td>
                        <td>
                            <input type="file" name="img_2">
                        </td>
                    </tr>
                    <tr>
                        <td>Content 2:</td>
                        <td>
                            <textarea type="description" name="content_2" cols="60" rows="10"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Image 3:</td>
                        <td>
                            <input type="file" name="img_3">
                        </td>
                    </tr>
                    <tr>
                        <td>Content 3:</td>
                        <td>
                            <textarea type="description" name="content_3" cols="60" rows="10"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>General: </td>
                        <td>
                            <textarea type="description" name="general" cols="60" rows="10"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Detail Product" class="btn-option">
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
        $detail_name = $_POST['detail_name'];
        $img_1=$_POST['img_1'];
        $content_1=$_POST['content_1'];

        if(isset($_FILES['image']['name'])){
            $img_2 = $_FILES['image']['name'];
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../image/".$img_2;
            $upload = move_uploaded_file($source_path,$destination_path);
            if($upload==FALSE){
                $_SESSION['upload'] = "<div style ='color:red'>Không Thành công up ảnh</div>";
                header('location:../admin/add_detail.php');
                die();
            }
        }else{
            $img_2="";
        }
        $content_2=$_POST['content_2'];

        if(isset($_FILES['image']['name'])){
            $img_3 = $_FILES['image']['name'];
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../image/".$img_3;
            $upload = move_uploaded_file($source_path,$destination_path);
            if($upload==FALSE){
                $_SESSION['upload'] = "<div style ='color:red'>Không Thành công up ảnh</div>";
                header('location:../admin/add_detail.php');
                die();
            }
        }else{
            $img_3="";
        }
        $content_3=$_POST['content_3'];
        $general = $_POST['general'];

        $sql2 = "INSERT INTO tbl_detail SET 
            product_id='$product_id',
            detail_name='$detail_name',
            img_1='$img_1',
            content_1='$content_1',
            img_2='$img_2',
            content_2='$content_2',
            img_3='$img_3',
            content_3='$content_3',
            general = '$general'
            ";
        $res2 = mysqli_query($conn,$sql2);
        if($res2==TRUE){
            $_SESSION['add'] = "<div style='color:#3498DB'>Product detail added thành công</div>";
            header('location:../admin/ql_detail.php');
        }
        else{
            $_SESSION['add'] = "<div style ='color:red'>Không Thành công</div>";
            header('location:../admin/add_detail.php');
        }
    }
    ?>        