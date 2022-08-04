<?php 
    include('config/connect.php'); 
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Star Car Store</title>
        <link rel="stylesheet" style="text/css" href="css/index.css">
        <link rel="stylesheet" style="text/css" href="css/index_2.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="header">
            <div class="container_logo">
                <a href="index.php"><img src="image/logo.png" alt=""></a>
             </div>
            <nav class="nav_1">
                <a href="index.php"style="text-decoration:none;color:white;">Store</a>
                <a href="product_store.php"style="text-decoration:none;color:white;">Product</a>
                <a href="order.php"style="text-decoration:none;color:white;">Order</a>
                <a href="category.php"style="text-decoration:none;color:white;">Category</a>
                <a href="#"style="text-decoration:none;color:white;">Contact</a>
                <div class="animation start-home"></div>
            </nav>
            <input class="menu-icon" type="checkbox" id="menu-icon" name="menu-icon"/>
            <label for="menu-icon"></label>
                <nav class="nav_2"> 		
                    <ul class="pt-5">
                        <?php 
                            if(isset($_SESSION['login']))
                            {
                                echo $_SESSION ['login'];
                            }
                            else{
                                ?>
                                <li><a href="login.php">Sign In</a></li>
                                <?php
                                
                            }
                        
                        ?>
                        <li><a href="logout.php">Sign Out</a></li>
                        <li><a href="#">Account</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                </nav>  
        </div>

            <form class="search" action="search.php" method="POST">
                <input type="search" name="search" placeholder="...">
                <button type="submit" name="search" class="button_search">Search</button>
            </form>

            <div class="cart">
                <ul class="cart-icon">
                    <?php if(isset($_SESSION['login'])) {
                        ?>
                            <li><a href="cart.php" id="cart"><i class="fa fa-shopping-cart" ></i></a></li>
                        <?php 
                        
                    }else{
                        ?>
                            <li><a href="login.php" id="cart"><i class="fa fa-shopping-cart" ></i></a></li>
                        <?php                     
                        }
                    ?>  
                </ul>
            </div>