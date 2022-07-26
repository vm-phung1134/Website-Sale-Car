        <!--Menu Section Starts-->
        <?php include('../admin/lib/header.php') ?>
        <!--Content Starts-->
        <div class='main-content'>
        <div class="wrapper">
        <br> <br>
        <?php 
            if(isset($_SESSION['login-admin']))
                {
                    echo $_SESSION ['login-admin'];
                    unset($_SESSION ['login-admin']);
                }
         ?>
        <br> <br>
                <h1>DASHBOARD</h1>
                <div class="col-4 text-center">
                    <h1>5</h1>
                    <br>
                    <p>Categories</p>
                </div>
                <div class="col-4 text-center">
                    <h1>5</h1>
                    <br>
                    <p>Categories</p>
                </div>
                <div class="col-4 text-center">
                    <h1>5</h1>
                    <br>
                    <p>Categories</p>
                </div>
                <div class="col-4 text-center">
                    <h1>5</h1>
                    <br>
                    <p>Categories</p>
                </div>
                <div class="clearfix">
                </div>
            </div>
        </div>
        <?php include('../admin/lib/footer.php') ?>