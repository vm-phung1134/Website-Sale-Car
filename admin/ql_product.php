<!--Menu Section Starts-->
<?php include('../admin/lib/header.php') ?>
    <!--Content Starts-->
    <div class='main-content'>
         <div class="wrapper">
                <h1>Management Category</h1>
               <br>
                <a href="../admin/add_product.php" class="btn-primary">Add Category</a>
                <br> <br>
                <?php
                    //insert
                    if(isset($_SESSION['add']))
                    {
                         echo $_SESSION ['add'];
                         unset($_SESSION ['add']);
                    }
                    //delete
                    if(isset($_SESSION['delete']))
                    {
                         echo $_SESSION ['delete'];
                         unset($_SESSION ['delete']);
                    }
                    //update
                    if(isset($_SESSION['update']))
                    {
                         echo $_SESSION ['update'];
                         unset($_SESSION ['update']);
                    }
               ?>
               <br> <br>
               <table class="tbl-full">
                    <tr>
                         <th>S.N.</th>
                         <th>Product Name</th>
                         <th>Image</th>
                         <th>Quanlity</th>
                         <th>Sold Out</th>
                         <th>Remain</th>
                         <th>Price</th>
                    </tr>
                    

                    <?php 
                         $sql = "SELECT * FROM tbl_product";
                         $res = mysqli_query($conn,$sql);
                         $sn=1;
                         if($res==TRUE){
                              $count = mysqli_num_rows($res);
                              if($count>0)
                              {
                                   while($rows = mysqli_fetch_assoc($res)){
                                        $product_id=$rows['product_id'];
                                        $product_name=$rows['product_name'];
                                        $image=$rows['image'];
                                        $product_quanlity=$rows['product_quanlity'];
                                        $product_soldout=$rows['product_soldout'];
                                        $product_remain=$rows['product_remain'];
                                        $price=$rows['price'];
                                        ?>
                                             <tr>
                                                  <td><?php echo $sn++; ?></td>
                                                  <td><?php echo $product_name ?></td>
                                                  <td>
                                                    <?php 
                                                        if($image!=""){
                                                            ?>
                                                                <img src="../image/<?php echo $image ?>" width="100px">
                                                            <?php
                                                        }else{

                                                        }
                                                    ?>
                                                   </td>
                                                  <td><?php echo $product_quanlity ?></td>
                                                  <td><?php echo $product_soldout ?></td>
                                                  <td><?php echo $product_remain ?></td>
                                                  <td><?php echo $price ?></td>
                                                  <td>
                                                       <a href="../admin/update_product.php?product_id=<?php echo $product_id; ?>" class="btn-option">Update Product</a>
                                                       <a href="../admin/del_product.php?product_id=<?php echo $product_id; ?>" class="btn-option">Delete Product</a>
                                                  </td>
                                             </tr>

                                        <?php 
                                   }

                              }
                                                           
                         }
                    ?>

               </table>
         </div>
    </div>
     <!--Footer Starts-->
<?php include('../admin/lib/footer.php') ?>