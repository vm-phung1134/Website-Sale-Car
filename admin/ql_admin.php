<!--Menu Section Starts-->
<?php include('../admin/lib/header.php'); ?>
    <!--Content Starts-->
    <div class='main-content'>
         <div class="wrapper">
               <h1>Admin Management</h1>
               <br>
               <a href="add_admin.php" class="btn-primary">Add Admin</a>
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
                    if(isset($_SESSION['not-found']))
                    {
                         echo $_SESSION ['not-found'];
                         unset($_SESSION ['not-found']);
                    }
                    if(isset($_SESSION['not-match']))
                    {
                         echo $_SESSION ['not-match'];
                         unset($_SESSION ['not-match']);
                    }
                    if(isset($_SESSION['change']))
                    {
                         echo $_SESSION ['change'];
                         unset($_SESSION ['change']);
                    }
               ?>
               <br> <br>
               <table class="tbl-full">
                    <tr>
                         <th>S.N.</th>
                         <th>Admin Name</th>
                         <th>Email</th>
                         <th>Action</th>   
                    </tr>
                    

                    <?php 
                         $sql = "SELECT * FROM tbl_admin";
                         $res = mysqli_query($conn,$sql);
                         $sn=1;
                         if($res==TRUE){
                              $count = mysqli_num_rows($res);
                              if($count>0)
                              {
                                   while($rows = mysqli_fetch_assoc($res)){
                                        $admin_id=$rows['admin_id'];
                                        $admin_name=$rows['admin_name'];
                                        $admin_email=$rows['admin_email'];
                                        ?>
                                             <tr>
                                                  <td><?php echo $sn++; ?></td>
                                                  <td><?php echo $admin_name ?></td>
                                                  <td><?php echo $admin_email ?></td>
                                                  <td>
                                                       <a href="../admin/change_pw.php?admin_id=<?php echo $admin_id; ?>" class="btn-option">Change Password</a>
                                                       <a href="../admin/update_admin.php?admin_id=<?php echo $admin_id; ?>" class="btn-option">Update Admin</a>
                                                       <a href="../admin/del_admin.php?admin_id=<?php echo $admin_id; ?>" class="btn-option">Delete Admin</a>
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