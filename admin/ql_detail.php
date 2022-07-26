<!--Menu Section Starts-->
<?php include('../admin/lib/header.php') ?>
    <!--Content Starts-->
    <div class='main-content'>
         <div class="wrapper">
                <h1>Management Detail Product</h1>
               <br>
                <a href="../admin/add_detail.php" class="btn-primary">Add Details Product</a>
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
                         <th>Image 1</th>
                         <th>Image 2</th>
                         <th>Image 3</th>
                    </tr>
                    

                    <?php 
                         $sql = "SELECT * FROM tbl_detail";
                         $res = mysqli_query($conn,$sql);
                         $sn=1;
                         if($res==TRUE){
                              $count = mysqli_num_rows($res);
                              if($count>0)
                              {
                                   while($rows = mysqli_fetch_assoc($res)){
                                        $detail_id=$rows['detail_id'];
                                        $product_id=$rows['product_id'];
                                        $img_1=$rows['img_1'];
                                        $img_2=$rows['img_2'];
                                        $img_3=$rows['img_3'];
                                        ?>
                                             <tr>
                                                  <td><?php echo $sn++; ?></td>
                                                  <td><?php echo $product_id ?></td>
                                                  <td>
                                                    <?php 
                                                        if($img_1!=""){
                                                            ?>
                                                                <img src="../image/<?php echo $img_1 ?>" width="100px">
                                                            <?php
                                                        }else{

                                                        }
                                                    ?>
                                                   </td>
                                                   <td>
                                                    <?php 
                                                        if($img_2!=""){
                                                            ?>
                                                                <img src="../image/<?php echo $img_2 ?>" width="100px">
                                                            <?php
                                                        }else{

                                                        }
                                                    ?>
                                                   </td>
                                                   <td>
                                                    <?php 
                                                        if($img_3!=""){
                                                            ?>
                                                                <img src="../image/<?php echo $img_3 ?>" width="100px">
                                                            <?php
                                                        }else{

                                                        }
                                                    ?>
                                                   </td>
                                                  <td>
                                                       <a href="../admin/update_product.php?detail_id=<?php echo $detail_id; ?>" class="btn-option">Update Details</a>
                                                       <a href="../admin/del_product.php?detail_id=<?php echo $detail_id; ?>" class="btn-option">Delete Details</a>
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