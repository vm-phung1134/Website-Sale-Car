<?php include('lib/header.php'); ?>
    <link rel="stylesheet" href="css/detail.css">
    
    <?php
        if(isset($_GET['product_id'])){
            $product_id = $_GET['product_id'];
            $sql="SELECT product_name FROM tbl_product WHERE product_id=$product_id";
            $res=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($res);
            $product_name=$row['product_name'];
        }
        else{
            header('location:');
        }
    ?>
    <?php 
            $sql3 ="SELECT * FROM tbl_detail WHERE product_id=$product_id";
            $res3 = mysqli_query($conn,$sql3);
            $row3=mysqli_fetch_assoc($res3);
            $count3 = mysqli_num_rows($res3);
            if($count3>0){
                $detail_name=$row3['detail_name'];
                $image=$row3['image'];
                $img_1=$row3['img_1'];
                $content_1=$row3['content_1'];
                $img_2=$row3['img_2'];
                $content_2=$row3['content_2'];
                $img_3=$row3['img_3'];
                $content_3=$row3['content_3'];
                $general=$row3['general'];
                ?>     
                    <div class="card-detail">
                        <div class="main-detail">
                            <div class="left">
                                <img src="image/<?php echo $image?>" alt="shoe" class="img-detail">
                            </div>
                            <div class="right">
                                <div class="product-info">
                                    <div class="product-name">
                                        <h1 class="info-1">Details of Product</h1>
                                        <div class="clear"></div>
                                        <br>
                                        <?php 
                                            if(isset($_SESSION['cart']))
                                            {
                                                echo $_SESSION ['cart'];
                                                unset($_SESSION ['cart']);
                                            }
                                        ?>
                                    </div>
                                    <div class="details">
                                        <h3 class="info-3"><?php echo $product_name ?></h3>
                                        <h2 class="info-2"><?php echo $detail_name ?></h2>
                                        <?php 
                                            $sql2 ="SELECT * FROM tbl_product WHERE product_id=$product_id";
                                            $res2 = mysqli_query($conn,$sql2);
                                            $row2=mysqli_fetch_assoc($res2);
                                            $count2 = mysqli_num_rows($res2);
                                            if($count2>0){
                                                $price=$row2['price'];
                                                ?>
                                                    <h5 class="info-5"><?php echo $price."$" ?></h5>
                                                <?php 
                                                
                                            }else{
                                                echo  '<div>Not Found</div>';
                                            }
                                        ?>
                                    </div>
                                    <form action="" method="POST">
                                    <div class="quanlity">
                                        <h4 class="info-4">Quanlity: </h4>
                                        <input type="number" value="1" min="1" name="quanlity">
                                    </div>
                                    
                                    <ul class="bg">
                                        <h4 class="info-4">COLOR: </h4>
                                        <li class="yellow"></li>
                                        <li class="black"></li>
                                        <li class="blue"></li>
                                    </ul>
                                    
                                    <?php
                                    if (isset($_SESSION['login'])){
                                                ?>  
                                                    <p class="foot-1">Buy Now</p>
                                                    <input class="foot-1" type="submit" name="submit_5" value="ADD TO CART">
                                                </form>
                                                <?php        
                                    }else{
                                            ?>
                                                <p class="foot-1"><a href="login.php">Login now</a></p>
                                            <?php 
                                        }
                                ?>
                                
                                <?php
                                if(isset($_POST['submit_5'])){
                                    $product_id=$_GET['product_id'];
                                    $quanlity=$_POST['quanlity'];
                                    $sql5 = "SELECT * FROM tbl_product WHERE product_id=$product_id";
                                    $res5=mysqli_query($conn,$sql5);
                                    if($res5==TRUE){
                                        $count5 = mysqli_num_rows($res5);
                                        if($count5==1){
                                            $row5=mysqli_fetch_assoc($res5);
                                            $product_name = $row5['product_name'];
                                            $product_id=$row5['product_id'];
                                            $image = $row5['image'];
                                            $price=$row5['price'];
                                            $user_id = $_SESSION['user-id'];
                                            $sql6 = "INSERT INTO tbl_cart SET
                                                    customer_id='$user_id',
                                                    product_id='$product_id',
                                                    product_name='$product_name',
                                                    img='$image',
                                                    quanlity='$quanlity',
                                                    price='$price'
                                                    ";
                                                    $res6 = mysqli_query($conn,$sql6) or die();
                                                    if($res6==TRUE){
                                                    }
                                                    else{
                                                        header('location:');
                                                    }
                                                }    
                                        }
 
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="body-btn">
                            <div class="scroll-btn">
                                <div class="chevron"></div>
                                <div class="chevron"></div>
                                <div class="chevron"></div>
                                <p class="text-btn">More Detail</p>
                            </div>
                        </div>

                        <div>
                            <ul id="card-details">
                                <li class="card-detail2" id="card_1">
                                    <div class="card__content">
                                        <div>
                                            <h2 class="info-2-2">OVERVIEW</h2>
                                            <p class="more-detail"><?php echo $content_1 ?></p>
                                        </div>
                                        <figure>
                                            <img src="image/<?php echo $img_1 ?>" alt="Image description" class="img-detail2">
                                        </figure>
                                    </div>
                                </li>
                                <li class="card-detail2" id="card_2">
                                    <div class="card__content">
                                        <div>
                                            <h2 class="info-2-2">EXTERIOR</h2>
                                            <p class="more-detail"><?php echo $content_2 ?></p>
                                        </div>
                                        <figure>
                                            <img src="image/<?php echo $img_2 ?>" alt="Image description" class="img-detail2">
                                        </figure>
                                    </div>
                                </li>
                                <li class="card-detail2" id="card_3">
                                    <div class="card__content">
                                        <div>
                                            <h2 class="info-2-2">TECHNICAL SPECIFICATIONS</h2>
                                            <p class="more-detail"><?php echo $general ?></p>
                                        </div>
                                        <figure>
                                            <img src="image/<?php echo $img_3 ?>" alt="Image description" class="img-detail2">
                                        </figure>
                                    </div>
                                </li>
                            </ul>
                        </div>
                <?php

            }else{
                echo  '<div>Not Found</div>';
            }
        ?>
    </script>
<?php include('lib/footer.php'); ?>



