<!--Menu Section Starts-->
<?php include('../admin/lib/header.php') ?>
    <!--Content Starts-->
    <div class='main-content'>
         <div class="wrapper">
                <h1>Management Category</h1>
               <br>
                <a href="../admin/add_category.php" class="btn-primary">Add Category</a>
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
                         <th>Category Name</th>
                         <th>Image</th>
                         <th>Featured</th>
                         <th>Active</th>
                    </tr>
                    

                    <?php 
                         $sql = "SELECT * FROM tbl_category";
                         $res = mysqli_query($conn,$sql);
                         $sn=1;
                         if($res==TRUE){
                              $count = mysqli_num_rows($res);
                              if($count>0)
                              {
                                   while($rows = mysqli_fetch_assoc($res)){
                                        $category_id=$rows['category_id'];
                                        $category_name=$rows['category_name'];
                                        $image=$rows['image'];
                                        $category_featured=$rows['category_featured'];
                                        $category_active=$rows['category_active'];
                                        ?>
                                             <tr>
                                                  <td><?php echo $sn++; ?></td>
                                                  <td><?php echo $category_name ?></td>
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
                                                  <td><?php echo $category_featured ?></td>
                                                  <td><?php echo $category_active ?></td>
                                                  <td>
                                                       <a href="../admin/update_category.php?category_id=<?php echo $category_id; ?>" class="btn-option">Update Category</a>
                                                       <a href="../admin/del_category.php?category_id=<?php echo $category_id; ?>" class="btn-option">Delete Category</a>
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