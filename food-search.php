<?php 
include('partials-front/menu.php');

// Initialize $search
$search = '';

// Check if the search form was submitted
if(isset($_POST['search'])) {
    // Get the Search Keyword
    $search = mysqli_real_escape_string($conn, $_POST['search']);
} elseif(isset($_GET['search'])) {
    // If the search parameter is in the URL (for GET requests)
    $search = mysqli_real_escape_string($conn, $_GET['search']);
}

// Initialize $count
$count = 0;

if(!empty($search)) {
    //SQL Query to Get foods based on search keyword
    $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Count Rows
    $count = mysqli_num_rows($res);
}
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

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">
        <div class="search-results-container">
            <h2 class="search-title">Search Results</h2>
            <div class="search-info">
                <span class="search-term">"<?php echo htmlspecialchars($search); ?>"</span>
                <span class="search-count"><?php echo $count; ?></span>
                <span class="search-count-text"><?php echo $count != 1 ? 'results' : 'result'; ?> found</span>
            </div>
        </div>
    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="section-title">Food Menu</h2>
        <div class="menu-grid">
            <?php 
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
                echo "<div class='error'>No foods found matching your search.</div>";
            }
            ?>
        </div>
    </div>
</section>
<!-- fOOD Menu Section Ends Here -->

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