<?php 
    include('config/connect.php'); 
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Star Car | Sale Car</title>
        <link rel="stylesheet" style="text/css" href="css/index.css">
        <link rel="stylesheet" style="text/css" href="css/login.css">
        <link rel="stylesheet" style="text/css" href="css/index_2.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="header">
            <div class="container_logo">
                <span class="text1" style="color:white;">Star<img src="image/wheel.png" width="60px" height="60px">Car</span>
             </div>
            <nav class="nav_1">
                <a href="index.php">Home</a>
                <a href="#">Event</a>
                <a href="cart.php">Cart</a>
                <a href="category.php">Category</a>
                <a href="#">Contact</a>
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
                        <li><a href="#">Sign Out</a></li>
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
                    <li><a href="#" id="cart"><i class="fa fa-shopping-cart" ></i></a></li>
                </ul>
            </div>