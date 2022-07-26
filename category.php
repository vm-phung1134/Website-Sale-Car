<?php include('lib/header.php'); ?>
<link rel="stylesheet" style="text/css" href="css/category.css">
    <div class="header-category">
        <div class="slider"></div>
        <ul class="nav"></div>
    </div>
<!-------------------main 1---------------->
    <div class="category">
        <h1>the best luxury car brands in the world</h1>
    </div>
    <div class="main-category">
        <?php
            $sql = "SELECT * FROM tbl_category";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count>0){
                while($row=mysqli_fetch_assoc($res)){
                    $category_id=$row['category_id'];
                    $category_name=$row['category_name'];
                    $image=$row['image'];
                ?>
                        <div class="card">
                            <div class="imgBox">
                                <img src="image/<?php echo $image ?>" alt="mouse corsair" class="mouse">
                            </div>
                            <div class="contentBox">
                                <h3><?php echo $category_name ?></h3>
                                <h2 class="price"></h2>
                                <a href="product.php?category_id=<?php echo $category_id; ?>" class="buy">Explore</a>
                            </div>
                        </div>
                <?php
                }
            }else{
            }
        ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/category.js"></script>
<?php include('lib/footer.php'); ?>