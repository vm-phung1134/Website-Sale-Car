<?php include('lib/header.php'); ?>
    <link rel="stylesheet" href="css/payment.css">



    <div class="content-payment">
        <div class="order-payment">
            <h1 class="title-h1">Confirm your order</h1>
        <table class="tbl-full">
            
                    <tr>
                         <th>S.N.</th>
                         <th>Image</th>
                         <th>Product Name</th>
                         <th>Quantity</th>
                         <th>Price</th> 
                         <th>Total</th>     
                    </tr>
                    

                    <?php 
                         $sql2 = "SELECT * FROM tbl_cart";
                         $res2 = mysqli_query($conn,$sql2);
                         $sn=1;
                         if($res2==TRUE){
                              $count2 = mysqli_num_rows($res2);
                              if($count2>0)
                              {
                                $subtotal=0;
                                $shipping=1500;
                                   while($rows2 = mysqli_fetch_assoc($res2)){
                                        $cart_id=$rows2['cart_id'];
                                        $product_name=$rows2['product_name'];
                                        $img=$rows2['img'];
                                        $quanlity=$rows2['quanlity'];
                                        $price=$rows2['price'];
                                        ?>
                                             <tr>
                                                  <td><?php echo $sn++; ?></td>
                                                  <td><?php 
                                                        if($img!=""){
                                                            ?>
                                                                <img src="image/<?php echo $img ?>" width="100px">
                                                            <?php
                                                        }else{

                                                        }
                                                    ?></td>
                                                  <td><?php echo $product_name ?></td>
                                                  <td><?php echo $quanlity ?></td>
                                                  <td><?php echo $price.".00$" ?></td>
                                                  <td><?php 
                                                        $total = $rows2['price'] * $rows2['quanlity'];
                                                        echo $total.".00$";
									          ?></td>
                                             </tr>
                                        <?php $subtotal += $total; ?>
                                        <?php 
                                       
                                   }

                              }
                                                           
                         }
                    ?>
            </table>
            <hr>
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
            <form action="order.php" method="POST" id="hi">  
            <div class="custom-select">
                <select name="pt">
                <option value="Pay Cash">Mode of Payment</option>
                <option  value="Momo">Momo</option>
                <option  value="Zalopay">Zalopay</option>
                <option  value="Banking">Banking</option>
                <option  value="Pay Cash">Pay Cash</option>
                
                </select>
            <button type="submit" class="checkout" name="submit-order2">Place Order</button>
            </div>
        </form>
        </div>
        <?php
    $customer_id=$_SESSION['user-id'];
    $sql1 ="SELECT * FROM tbl_customer WHERE customer_id=$customer_id";
    $res1 = mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_assoc($res1);
    $count1 = mysqli_num_rows($res1);
    if($count1==1){
        $customer_email=$row1['customer_email'];
        $customer_name=$row1['customer_name'];
        $customer_address=$row1['customer_address'];
       ?>
        <div class="info">
        <div class="info-client">
            <h1 class="title-h1">Client Information</h1>
            <p ><span class="note">Name: </span>  <?php echo $customer_name; ?></p>
            <p ><span class="note">Address: </span> <?php echo $customer_address; ?></p>
            <p ><span class="note">Email: </span> <?php echo $customer_email; ?></p>
            <p ><span class="note">Phone: </span>01841745</p>
        </div>
        <div class="info-client2">
            <button class="btn-client"><p>Contact Information!</p></button>
        </div>
        </div>
        <?php
    }
    ?>
</div>
<?php include('lib/footer.php'); ?>