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
    <div class="container">
        <h2 class="section-title">Trending Foods</h2>
        <div class="trending-grid">
            <?php
            $trending_sql = "SELECT * FROM tbl_food WHERE active='Yes' ORDER BY RAND() LIMIT 3";
            $trending_res = mysqli_query($conn, $trending_sql);
            while($trending_row = mysqli_fetch_assoc($trending_res)) {
                $id = $trending_row['id'];
                $title = $trending_row['title'];
                $price = $trending_row['price'];
                $image_name = $trending_row['image_name'];
            ?>
                <div class="trending-item" data-aos="fade-up" data-aos-delay="100">
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
</section>

<section class="food-menu">
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
                    <div class="food-item" data-aos="fade-up" data-aos-delay="100">
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
</section>

<style>
/* Trending Foods Section - Fixed Alignment */
.trending-foods {
    padding: 40px 0;
    background-color: #fff;
}

.trending-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 20px;
}

.trending-item {
    background-color: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding-bottom: 20px;
    height: 100%;
}

.trending-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
}

.trending-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.trending-title {
    font-size: 20px;
    color: #333;
    margin: 15px 0 10px;
    font-weight: 600;
    padding: 0 15px;
}

.trending-price {
    font-size: 18px;
    color: #ff6b6b;
    font-weight: 600;
    margin-bottom: 15px;
    flex-grow: 1;
}

/* Food Menu Section - Consistent Styling */
.food-menu {
    padding: 80px 0;
    background-color: #f9f9f9;
}

.menu-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.food-item {
    background-color: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
}

.food-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
}

.food-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.food-info {
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    flex-grow: 1;
}

.food-title {
    font-size: 20px;
    color: #333;
    margin-bottom: 10px;
    font-weight: 600;
}

.food-price {
    font-size: 18px;
    color: #ff6b6b;
    font-weight: 600;
    margin-bottom: 10px;
}

.food-description {
    font-size: 14px;
    color: #666;
    margin-bottom: 20px;
    line-height: 1.5;
}

.btn {
    display: inline-block;
    padding: 12px 24px;
    background-color: #ff6b6b;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    transition: all 0.3s ease;
    font-weight: 600;
    font-size: 14px;
    border: none;
    cursor: pointer;
    margin-top: auto;
}

.btn:hover {
    background-color: #ff5252;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
}

/* Responsive Design */
@media (max-width: 768px) {
    .trending-grid,
    .menu-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .trending-foods,
    .food-menu {
        padding: 30px 0;
    }
    
    .trending-item,
    .food-item {
        margin: 0 auto;
        max-width: 350px;
    }
}

@media (max-width: 480px) {
    .trending-title,
    .food-title {
        font-size: 18px;
    }
    
    .trending-price,
    .food-price {
        font-size: 16px;
    }
    
    .food-description {
        font-size: 13px;
    }
}
</style>

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