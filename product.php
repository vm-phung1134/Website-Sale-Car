<?php include('lib/header.php'); ?>
    <link rel="stylesheet" style="text/css" href="css/product.css">
    <?php
        if(isset($_GET['category_id'])){
            $category_id = $_GET['category_id'];
            $sql="SELECT category_name FROM tbl_category WHERE category_id=$category_id";
            $res=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($res);
            $category_name=$row['category_name'];
        }else{
            header('location:');
        }
    ?>
    <div class="header-product">
        <?php 
            $sql3 ="SELECT * FROM tbl_category WHERE category_id=$category_id";
            $res3 = mysqli_query($conn,$sql3);
            $row3=mysqli_fetch_assoc($res3);
            $count3 = mysqli_num_rows($res3);
            if($count3>0){
                $image=$row3['image'];
                ?>
                <div class="product-img">
                    <img src="image/<?php echo $image?>">
                </div>
                <?php 
                
            }else{
                echo  '<div>Not Found</div>';
            }
        ?>
    </div>
    
    <div class="product">
        <h1>Models <?php echo $category_name; ?></h1>
    </div>
    <div class="main-product">
        <?php 
            $sql2 ="SELECT * FROM tbl_product WHERE category_id=$category_id";
            $res2 = mysqli_query($conn,$sql2);
            $count2 = mysqli_num_rows($res2);
            if($count2>0){
                while($row2=mysqli_fetch_assoc($res2)){
                    $product_id=$row2['product_id'];
                    $product_name=$row2['product_name'];
                    $image=$row2['image'];
                    $price=$row2['price'];
                    ?>
                        <div class="card">
                                <div class="imgBox">
                                    <a href="detail.php?product_id=<?php echo $product_id; ?>"><img src="image/<?php echo $image?>" alt="mouse corsair" class="mouse"></a>
                                </div>
                                <div class="contentBox">
                                    <h3><?php echo $product_name ?></h3>
                                    <h2 class="price"><?php echo $price."$"; ?></h2>
                                    <div class="btn-product"> 
                                        <a href="#" class="buy">Buy Now</a>
                                        <a href="#" class="buy">Add Cart</a>
                                    </div>
                                    
                                </div>
                            </div>
                    <?php
                }
            }else{
                echo  '<div>Not Found</div>';
            }
        ?>
    </div>
<?php include('lib/footer.php'); ?>