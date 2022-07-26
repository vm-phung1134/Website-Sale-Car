<?php include('lib/header.php'); ?>
<link rel="stylesheet" style="text/css" href="css/product.css">
    <div class="header-product2">
        <div class="product-img2">
        </div>
    </div>
    <div class="product">
        <h1>Result Search For You</h1>
    </div>
    <div class="main-product">
        <?php 
            $search =$_POST['search'];
            $sql ="SELECT * FROM tbl_product where product_name LIKE '%$search%'";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count>0){
                while($row=mysqli_fetch_assoc($res)){
                    $product_id=$row['product_id'];
                    $product_name=$row['product_name'];
                    $product_descript=$row['product_descript'];
                    $image=$row['image'];
                    $price=$row['price'];
                    ?>
                        <div class="card">
                                <div class="imgBox">
                                    <img src="image/<?php echo $image?>" alt="mouse corsair" class="mouse">
                                </div>
                                <div class="contentBox">
                                    <h3><?php echo $product_name ?></h3>
                                    <h2 class="price"><?php echo $price; ?></h2>
                                    <a href="#" class="buy">Buy Now</a>
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