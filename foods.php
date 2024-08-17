<?php 
include('partials-front/menu.php');
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

<section class="food-search">
    <div class="container">
        <h2 class="section-title">Find Your Favorite Food</h2>
        <form action="<?php echo SITEURL; ?>food-search.php" method="POST" class="search-form">
            <input type="search" name="search" placeholder="Search for food..." required>
            <button type="submit" name="submit" class="search-btn">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
</section>



<section class="trending-foods">
<div class="trending-item" data-aos="fade-up" data-aos-delay="100">
    <div class="container">
        <h2 class="section-title">Trending Foods</h2>
        <div class="trending-grid">
            <?php
            // Fetch 3 random foods for trending section
            $trending_sql = "SELECT * FROM tbl_food WHERE active='Yes' ORDER BY RAND() LIMIT 3";
            $trending_res = mysqli_query($conn, $trending_sql);
            while($trending_row = mysqli_fetch_assoc($trending_res)) {
                $id = $trending_row['id'];
                $title = $trending_row['title'];
                $price = $trending_row['price'];
                $image_name = $trending_row['image_name'];
            ?>
                <div class="trending-item">
                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="trending-img">
                    <h3 class="trending-title"><?php echo $title; ?></h3>
                    <p class="trending-price">Rs.<?php echo $price; ?></p>
                    <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn">Order Now</a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    </div>
</section>

<section class="food-menu">
<div class="food-item" data-aos="fade-up" data-aos-delay="100">
    <div class="container">
        <h2 class="section-title">Our Food Menu</h2>
        <div class="menu-grid">
            <?php 
            $sql = "SELECT * FROM tbl_food WHERE active='Yes'";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if($count > 0) {
                while($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
            ?>
                    <div class="food-item">
                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="food-img">
                        <div class="food-info">
                            <h3 class="food-title"><?php echo $title; ?></h3>
                            <p class="food-price">Rs.<?php echo $price; ?></p>
                            <p class="food-description"><?php echo $description; ?></p>
                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn">Order Now</a>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<div class='error'>No food items found.</div>";
            }
            ?>
        </div>
    </div>
    </div>
</section>

<?php include('partials-front/footer.php'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        mirror: false
    });
</script>