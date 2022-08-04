<?php include('lib/header.php'); ?>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit-order2'])){
        if(isset($_POST['pt'])){ 
            $gender = $_POST['pt'];
        }else{
        $gender = 'Pay Cash';
        }
        $sql7="SELECT * FROM tbl_cart";
        $res7=mysqli_query($conn,$sql7);
        $count7 = mysqli_num_rows($res7);
        if($count7>0){
          while($row7=mysqli_fetch_assoc($res7)){
            $cart_id=$row7['cart_id'];
            $customer_id=$row7['customer_id'];
            $product_id=$row7['product_id'];
            $product_name=$row7['product_name'];
            $img=$row7['img'];
            $quanlity=$row7['quanlity'];
            $price=$row7['price'];
            $sql8="INSERT INTO tbl_order SET 
              customer_id='$customer_id',
              product_name='$product_name',
              order_image='$img',
              order_quanlity='$quanlity',
              order_mode= '$gender',
              order_price='$price'
            ";
            $res8= mysqli_query($conn,$sql8) or die();
            $sql9 = "DELETE FROM tbl_cart where cart_id='$cart_id'";
            $res9 = mysqli_query($conn,$sql9) or die();
        }
         
        }
        
    }
      
  ?>



    <link rel="stylesheet" href="css/order.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <!--First Order-->

    <div class="container-fluid my-5  d-flex  justify-content-center container-order">
        <div class="card card-1">
            <div class="card-header bg-white">
                <div class="media flex-sm-row flex-column-reverse justify-content-between  ">
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
                    <div class="col my-auto"> <h4 class="mb-0">Thanks for your Order, <span class="change-color"> <?php echo $customer_name; ?></span> !</h4> </div>
                    <div class="col-auto text-center  my-auto pl-0 pt-sm-4"> <img class="img-fluid my-auto align-items-center mb-0 pt-3"  src="image/logo.png" width="100" height="90" style="background-color:black;border-radius:50px;"> </div>

                </div>
            </div>
            <?php 
            if(isset($_SESSION['delete']))
                    {
                         echo $_SESSION ['delete'];
                         unset($_SESSION ['delete']);
                    }
            ?>
                
            <div class="card-body">
                <div class="row justify-content-between mb-3">
                    <div class="col-auto"> <h6 class="color-1 change-color">Invoice</h6> </div>
                    <div class="col-auto"> <small>Standard Delivery: <?php $today = date("d/m"); echo $today;?> - <?php $today = date("10/m"); echo $today;?>  </small> </div>
                </div>
                <div class="info-client">
                    <button class="btn-client"><p>Contact Information!</p></button>
                </div>
                <div class="client">
                    <p class="cl-1">Name: <?php echo $customer_name; ?></p>
                    <p class="cl-1">Address: <?php echo $customer_address; ?></p>
                    <p class="cl-1">Email Address: <?php echo $customer_email; ?></p>
                    <p class="cl-1">Phone: 093216424</p>
                </div>
        <?php
    }
?>

<?php 
    $sql2 ="SELECT * FROM tbl_order where customer_id=$customer_id";
    $res2 = mysqli_query($conn,$sql2);
    $count2 = mysqli_num_rows($res2);
    if($count2>0){
        $subtotal=0;
        $sum=0;
        $subshipping=0;
        while($row2=mysqli_fetch_assoc($res2)){
            $order_id=$row2['order_id'];
            $product_name=$row2['product_name'];
            $order_quanlity=$row2['order_quanlity'];
            $order_image=$row2['order_image'];
            $order_price=$row2['order_price'];
            ?>   
                <div class="row">
                    <div class="col">
                        <div class="card card-2" style="border: 1px solid black;font-family: monospace;">
                            <div class="card-body">
                                <div class="media">
                                    <div class="sq align-self-center "> <img class="img-fluid  my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="image/<?php echo $order_image; ?>" width="135" height="135" /> </div>
                                    <div class="media-body my-auto text-right">
                                        <div class="row  my-auto flex-column flex-md-row">
                                            <div class="col my-auto"> <h6 class="mb-3"><?php echo $product_name; ?></h6>  </div>
                                            <div class="col my-auto"> <small>Color : Black</small></div>
                                            <div class="col my-auto"> <small>Quanlity : <?php echo $order_quanlity; ?></small></div>
                                            <div class="col my-auto"><h6 class="mb-5">Price : <?php echo $order_price.".00$";?>
                                              </h6>

                                            </div>
                                        </div>
                                        
                                    </div>    
                                </div>
                                <hr class="my-3 ">
                                <div class="row">
                                    <div class="col-md-3 mb-3"> <small> Delivery status <span><i class=" ml-2 fa fa-refresh"  aria-hidden="true"></i></span></small> </div>
                                    <div class="col mt-auto">
                                        <div class="progress my-auto"> <div class="progress-bar progress-bar  rounded" style="width: 5%" role="progressbar" aria-valuenow="25" aria-valuemin="0"  aria-valuemax="100"></div> </div>
                                        <div class="media row justify-content-between ">
                                            <div class="col-auto text-right"><span> <small  class="text-right mr-sm-2">Checking</small> <i class="fa fa-circle active"></i> </span></div>
                                            <div class="flex-col"> <span> <small class="text-right mr-sm-2">Out for delivary</small><i class="fa fa-circle active"></i></span></div>
                                            <div class="col-auto flex-col-auto"><small  class="text-right mr-sm-2">Delivered</small><span> <i  class="fa fa-circle"></i></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="totals">
                                        <?php 
                                        $total = $row2['order_price'] * $row2['order_quanlity'];
                                        $voucher=$total*0.05;
                                        $shipping=1500;
                                        $sum=$total - $voucher + $shipping;
                                        ?>
                                                <div class="totals-item">
                                                    <label>Subtotal</label>
                                                    <div class="totals-value" id="cart-subtotal"><?php echo $total.".00$";?></div>
                                                </div>
                                                <div class="totals-item">
                                                    <label>Voucher (-5%)</label>
                                                    <div class="totals-value" id="cart-tax"><?php echo $voucher.".00$";?></div>
                                                </div>
                                                <div class="totals-item">
                                                    <label>Shipping</label>
                                                    <div class="totals-value" id="cart-shipping"><?php echo $shipping.".00$" ?></div>
                                                </div>
                                                <div class="totals-item totals-item-total">
                                                    <label>Total</label>
                                                    <div class="totals-value" id="cart-total"><?php echo $sum.".00$" ?></div>
                                                </div>
                                </div>
                                <div class="cancel-items">
                                    <button class="delete-items"><a href="del_items_order.php?order_id=<?php echo $order_id;?>">✗ Cancel</a></button>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                <?php $subtotal += $sum; ?>
                <?php $subshipping += $shipping; ?>
            <?php

        }
    }
    ?>
                <?php $tax=$subtotal*0.05; ?>
                <div class="row mt-4">
                    <div class="col" style="font-family: monospace;">
                        <div class="row justify-content-between">
                            <div class="col-auto "><p class="mb-1 text-dark"><b style="font-size:22px;">ORDER DETAILS</b></p></div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="flex-sm-col text-left col"><p class="mb-1"><b>Subtotal Delivery Charges</b></p></div>
                            <div class="flex-sm-col col-auto"><p class="mb-1"><?php echo $subshipping.".00$" ?></p></div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="flex-sm-col text-left col"><p class="mb-1"><b>Tax </b></p></div>
                            <div class="flex-sm-col col-auto"><p class="mb-1"><?php echo $tax.".00$"; ?></p></div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="flex-sm-col text-left col"> <p class="mb-1"><b>Total</b></p> </div>
                            <div class="flex-sm-col col-auto"> <p class="mb-1" style="font-size:23;color:blue;"><?php echo ($subtotal+$tax).'.00$'; ?></p> </div>
                        </div>
                    </div>
                </div>

                <div class="row invoice">
                
                </div>
            </div>
            <div class="wrapper-btn">
                <button class="delete-order">Cancel Order</button>
            </div>       
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php include('lib/footer.php'); ?>