<?php include('lib/header.php'); ?>
    <link rel="stylesheet" href="css/cart.css">
    <?php
        if(isset($_GET['customer_id'])){
            $customer_id = $_GET['customer_id'];
            $sql="SELECT * FROM tbl_customer WHERE customer_id=$customer_id";
            $res=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($res);
            $customer_name=$row['customer_name'];
        }else{
            header('location:');
        }
    ?>
    <div class="shopping-cart">
      <div class="back-page">
        <p><a href="category.php">Countinue Shopping</a></p>
      </div>
  <div class="column-labels">
    <label class="product-image-cart">Image</label>
    <label class="product-details-cart">Product</label>
    <label class="product-price-cart">Price</label>
    <label class="product-quantity-cart">Quantity</label>
    <label class="product-line-price">Total</label>
    <label class="product-removal"></br></label>
  </div>
  <?php 
    
            $customer_id=$_SESSION['user-id'];
            $sql2 ="SELECT * FROM tbl_cart WHERE customer_id=$customer_id";
            $res2 = mysqli_query($conn,$sql2);
            $count2 = mysqli_num_rows($res2);
            if($count2>0){
                $subtotal=0;
                $shipping=1500;
                while($row2=mysqli_fetch_assoc($res2)){
                    $cart_id=$row2['cart_id'];
                    $customer_id=$row2['customer_id'];
                    $product_id=$row2['product_id'];
                    $product_name=$row2['product_name'];
                    $img=$row2['img'];
                    $quanlity=$row2['quanlity'];
                    $price=$row2['price'];
                    ?>
                        <div class="product-cart">
                        <input type="checkbox" id="myCheck" class="checkbox-cart" name="checkbox_cart" value="Yes">
                        <div class="product-image-cart">
                            <img src="image/<?php echo $img; ?>">
                          </div>
                          <div class="product-details-cart">
                            <div class="product-title-cart"><?php echo $product_name ?></div>
                          </div>
                          <div class="product-price-cart">
                          <div class="space"></div>
                              <?php echo $price.".00$"?></div>
                          <div class="product-quantity-cart">
                            <div class="space"></div> 
                              <input type="number" value="<?php echo $quanlity ?>" min="1">
                            </div>
                          <div class="product-removal">
                          <div class="space"></div>
                            <button class="remove-product">
                              <a href="del_cart.php?cart_id=<?php echo $cart_id; ?>">Remove</a>
                            </button>
                          </div>
                          <div class="space"></div>
                          <div class="product-line-price">
                          <?php 
                              $total = $row2['price'] * $row2['quanlity'];
                              echo $total.".00$";
									          ?>
                          </div>
                        </div>
                        <?php $subtotal += $total; ?>

                    <?php

                }
                ?>
                <?php $tax=$subtotal*0.05 ?>
                <div class="totals">
                  <div class="totals-item">
                    <label>Subtotal</label>
                    <div class="totals-value" id="cart-subtotal"><?php echo $subtotal.".00$"; ?></div>
                  </div>
                  <div class="totals-item">
                    <label>Tax (5%)</label>
                    <div class="totals-value" id="cart-tax"><?php echo $tax.".00$"; ?></div>
                  </div>
                  <div class="totals-item">
                    <label>Shipping</label>
                    <div class="totals-value" id="cart-shipping"><?php echo $shipping.".00$"; ?></div>
                  </div>
                  <div class="totals-item totals-item-total">
                    <label>Grand Total</label>
                    <div class="totals-value" id="cart-total"><?php echo $subtotal+$tax+$shipping.".00$"; ?></div>
                  </div>
                </div>
                <?php

            }else{
                echo  "<div style='margin: 40px 100px; font-size:30px;font-weight: 500; text-transform: uppercase;'>Your Cart are being empty</div>";
            }
        ?>


<form action="payment.php" method="POST" id="hi">  
    <button type="submit" class="checkout" name="submit-order">Payment</button>
</form>

      

</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/cart.js"></script>
<?php include('lib/footer.php'); ?>

