<?php include('config/connect.php'); ?>
<html>
    <title>Login Web</title>
    <link rel="stylesheet" style="text/css" href="css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
        <body data-vide-bg="video/car6_2">
            <div  class="container">
                    <div class="container_logo">
                        <span class="text1">Star<img src="image/wheel.png" width="60px" height="60px">Car</span>
                        <span class="text2">Register</span>
                    </div>
                <div id='login-form'class='login-page'>
                    <div class="form-box">
                        <div class='button-box'>
                            <div id='btn'></div>
                            <button type='button'onclick='login()'class='toggle-btn'>Log In</button>
                            <button type='button'onclick='register()'class='toggle-btn'>Sign Up</button>
                            <button type='button'onclick='admin()'class='toggle-btn'>Admin</button>
                        </div>
                        <!------------------------Log in with customer------------------->
                        <?php 
                            if(isset($_SESSION['login']))
                            {
                                echo $_SESSION ['login'];
                                unset($_SESSION ['login']);
                            }
                        ?>
                        <br>
                        <form id='login' class='input-group-login' method="POST">
                            <input type='text'class='input-field' name="customer_email" placeholder='Email Id'>
                            <input type='password'class='input-field' name="customer_pass" placeholder='Enter Password'>
                            <input type='checkbox'class='check-box'><span >Remember Password</span>
                            <button type='submit'class='submit-btn' name="submit_1">Log In</button>
                        </form>
                        <?php 
                            if(isset($_POST['submit_1'])){
                            $customer_email = $_POST['customer_email'];
                            $customer_pass = $_POST['customer_pass'];
                            $sql1 = "SELECT * FROM tbl_customer WHERE customer_email='$customer_email' AND customer_pass='$customer_pass'";
                            $res1 = mysqli_query($conn,$sql1);
                            $row1 = mysqli_fetch_assoc($res1);
                            $count1 = mysqli_num_rows($res1);
                            if($count1==1){
                                $customer_name=$row1['customer_name'];
                                $_SESSION['login'] = "<div style='color:#ececee; font-size:9vh;font-weight:800'>WELCOME, $customer_name</div>";
                                header('location:../NewWS_Technology/index.php');
                            }else{
                                $_SESSION['login'] = "<div style ='color:red; font-size:20px; display:flex; justify-content:center;'>Account or Password incorrect</div>";
                                header('location:../NewWS_Technology/login.php');
                            }
                            }
                            ?>
                            <!------------------------Register with customer------------------->
                            <?php 
                                if(isset($_SESSION['sign_up']))
                                {
                                    echo $_SESSION ['sign_up'];
                                    unset($_SESSION ['sign_up']);
                                }
                            ?>
                            </br>
                        <form id='register' class='input-group-register' method="POST">
                            <input type='text'class='input-field' name='customer_email' placeholder='Email Id' required>
                            <input type='text'class='input-field' name='customer_name' placeholder='Name' required>
                            <input type='text'class='input-field' name='customer_address' placeholder='Address' required>
                            <input type='password'class='input-field' name='customer_pass' placeholder='Enter Password' required>
                            <input type='checkbox'class='check-box'><span >I agree to the terms conditions</span>
                            <button type='submit'class='submit-btn' name="submit_2">Sign Up</button>
                        </form>
                        <?php 
                            if(isset($_POST['submit_2'])){
                                $customer_email = $_POST['customer_email'];
                                $customer_name = $_POST['customer_name'];
                                $customer_address= $_POST['customer_address'];
                                $customer_pass = $_POST['customer_pass'];
                            
                            $sql2 = "INSERT INTO tbl_customer SET
                                customer_email='$customer_email',
                                customer_name='$customer_name',
                                customer_address='$customer_address',
                                customer_pass='$customer_pass'
                                ";
                                $res2 = mysqli_query($conn,$sql2) or die();
                                if($res2==TRUE){
                                    $_SESSION['sign_up'] = "<div style='color:#3498DB;font-size:20px; display:flex; justify-content:center;'>Congulations! Welcome to my website</div>";
                                    header('location:../NewWS_Technology/login.php');
                                }
                                else{
                                    $_SESSION['sign_up'] = "<div style ='color:red'>Register Incomplete</div>";
                                    header('location:../NewWS_Technology/login.php');
                                }
                            }    
                        ?>
                        <!------------------------Log in with admin------------------>
                        <?php 
                            if(isset($_SESSION['login-admin']))
                            {
                                echo $_SESSION ['login-admin'];
                                unset($_SESSION ['login-admin']);
                            }
                        ?>
                        <br>
                        <form action=""  id='admin' class='input-group-admin' method="POST">
                            <input type='text'class='input-field' name="admin_name"  placeholder='Account Admin' required >
                            <input type='password'class='input-field' name="admin_pass"  placeholder='Enter Password' required>
                            <input type='checkbox'class='check-box'><span>Remember Password</span>
                            <button type='submit' name="submit_3" class='submit-btn'>Log In</button>
                        </form>
                         <?php 
                            if(isset($_POST['submit_3'])){
                            $admin_name = $_POST['admin_name'];
                            $admin_pass = $_POST['admin_pass'];
                            $sql3 = "SELECT * FROM tbl_admin WHERE admin_name='$admin_name' AND admin_pass='$admin_pass'";
                            $res3 = mysqli_query($conn,$sql3);
                            $count3 = mysqli_num_rows($res3);
                            if($count3==1){
                                $_SESSION['login-admin'] = "<div style='color:#3498DB'>Hello Admin, $admin_name</div>";
                                $_SESSION['user'] = $admin_name;
                                header('location:../NewWS_Technology/admin/index.php');
                            }else{
                                $_SESSION['login-admin'] = "<div style ='color:red; font-size:20px; display:flex; justify-content:center;'>Account or Password incorrect </br></div>";
                                header('location:../NewWS_Technology/login.php');
                            }
                            }
                            ?>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
            <script src="js/jquery.vide.js"></script>
            <script src="js/login.js"></script>
        </body>
                            
                           
</html>