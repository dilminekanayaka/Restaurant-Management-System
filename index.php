<?php 
include('partials-front/menu.php'); // Include database connection
?>

<header class="main-header">
    <div class="container header-container">
        <div class="logo-container">
          
            <h1 class="logo">Bite.</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="categories.php">Categories</a></li>
                <li><a href="foods.php">Menu</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>

<section id="home" class="hero">
    <video autoplay loop muted playsinline class="hero-video">
        <source src="images\bg-vedio.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="hero-content">
        <h2>Delicious Food at Your Doorstep</h2>
        <p>Explore our wide range of cuisines and order now!</p>
        <div class="search-container">
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for food..." class="search-input" required>
                <button type="submit" name="submit" class="search-btn"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
</section>

<section id="categories" class="categories">
    <div class="container">
        <h2 class="section-title">Explore Foods</h2>
        <div class="category-grid">
            <?php 
            $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
            $res = mysqli_query($conn, $sql);
            if($res==TRUE) {
                $count = mysqli_num_rows($res);
                if($count>0) {
                    while($row=mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>" class="category-item">
                            <?php 
                            if($image_name=="") {
                                echo "<div class='error'>Image not Available</div>";
                            } else {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="category-img">
                                <?php
                            }
                            ?>
                            <h3 class="category-title"><?php echo $title; ?></h3>
                        </a>
                        <?php
                    }
                } else {
                    echo "<div class='error'>Category not Added.</div>";
                }
            }
            ?>
        </div>
    </div>
</section>

<section id="menu" class="food-menu">
    <div class="container">
        <h2 class="section-title">Food Menu</h2>
        <div class="menu-grid">
            <?php 
            $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";
            $res2 = mysqli_query($conn, $sql2);
            $count2 = mysqli_num_rows($res2);
            if($count2>0) {
                while($row=mysqli_fetch_assoc($res2)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>
                    <div class="food-item">
                        <?php 
                        if($image_name=="") {
                            echo "<div class='error'>Image not available.</div>";
                        } else {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="food-img">
                            <?php
                        }
                        ?>
                        <h3 class="food-title"><?php echo $title; ?></h3>
                        <p class="food-price">$<?php echo $price; ?></p>
                        <p class="food-description"><?php echo $description; ?></p>
                        <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                    </div>
                    <?php
                }
            } else {
                echo "<div class='error'>Food not available.</div>";
            }
            ?>
        </div>
        <p class="text-center">
            <a href="<?php echo SITEURL; ?>foods.php" class="btn btn-primary">See All Foods</a>
        </p>
    </div>
</section>

<?php include('partials-front/footer.php'); ?>