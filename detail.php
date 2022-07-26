<?php include('lib/header.php'); ?>
    <link rel="stylesheet" href="css/detail.css">
    <?php
        if(isset($_GET['product_id'])){
            $product_id = $_GET['product_id'];
            $sql="SELECT product_name FROM tbl_product WHERE product_id=$product_id";
            $res=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($res);
            $product_name=$row['product_name'];
        }else{
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
                                                    <h5 class="info-5"><?php echo $price ?></h5>
                                                <?php 
                                                
                                            }else{
                                                echo  '<div>Not Found</div>';
                                            }
                                        ?>
                                    </div>
                                    <h4 class="info-4">Quanlity: </h4>
                                    
                                    <ul class="bg">
                                        <h4 class="info-4">Color: </h4>                      
                                    </ul>
                                    <p class="foot-1">Buy Now</p>
                                    <p class="foot-1">Add TO Cart</p>
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
    
<?php include('lib/footer.php'); ?>



