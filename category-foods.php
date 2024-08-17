<?php include('partials-front/menu.php'); ?>

<?php 
    //Check whether id is passed or not
    if(isset($_GET['category_id']))
    {
        $category_id = $_GET['category_id'];
        $sql = "SELECT title FROM tbl_category WHERE id=$category_id";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        $category_title = $row['title'];
    }
    else
    {
        header('location:'.SITEURL);
    }

    //Count the number of foods in this category
    $sql2 = "SELECT * FROM tbl_food WHERE category_id=$category_id";
    $res2 = mysqli_query($conn, $sql2);
    $count2 = mysqli_num_rows($res2);
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

<!-- Category Search Section Starts Here -->
<section class="food-search">
    <div class="container">
        <div class="search-results-container">
            <h2 class="search-title">Category Results</h2>
            <div class="search-info">
                <span class="search-term">"<?php echo htmlspecialchars($category_title); ?>"</span>
                <span class="search-count"><?php echo $count2; ?></span>
                <span class="search-count-text"><?php echo $count2 != 1 ? 'items' : 'item'; ?> found</span>
            </div>
        </div>
    </div>
</section>
<!-- Category Search Section Ends Here -->

<!-- Food Menu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="section-title">Food Menu</h2>
        <div class="menu-grid">
            <?php 
            if($count2 > 0)
            {
                while($row2 = mysqli_fetch_assoc($res2))
                {
                    $id = $row2['id'];
                    $title = $row2['title'];
                    $price = $row2['price'];
                    $description = $row2['description'];
                    $image_name = $row2['image_name'];
            ?>
                <div class="food-item" data-aos="fade-up" data-aos-delay="100">
                    <?php 
                    if($image_name == "")
                    {
                        echo "<div class='error'>Image not Available.</div>";
                    }
                    else
                    {
                    ?>
                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="food-img">
                    <?php
                    }
                    ?>
                    <div class="food-info">
                        <h3 class="food-title"><?php echo $title; ?></h3>
                        <p class="food-price">Rs.<?php echo $price; ?></p>
                        <p class="food-description"><?php echo $description; ?></p>
                        <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn">Order Now</a>
                    </div>
                </div>
            <?php
                }
            }
            else
            {
                echo "<div class='error'>No foods available in this category.</div>";
            }
            ?>
        </div>
    </div>
</section>
<!-- Food Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
<script>
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        mirror: false
    });

    document.addEventListener('DOMContentLoaded', function() {
        const searchCount = document.querySelector('.search-count');
        const finalCount = parseInt(searchCount.textContent);
        let currentCount = 0;

        function animateCount() {
            if (currentCount < finalCount) {
                currentCount++;
                searchCount.textContent = currentCount;
                requestAnimationFrame(animateCount);
            }
        }

        animateCount();

        // Animate search term
        const searchTerm = document.querySelector('.search-term');
        searchTerm.innerHTML = searchTerm.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

        anime.timeline({loop: false})
            .add({
                targets: '.search-term .letter',
                translateY: [100,0],
                translateZ: 0,
                opacity: [0,1],
                easing: "easeOutExpo",
                duration: 1400,
                delay: (el, i) => 300 + 30 * i
            });
    });
</script>