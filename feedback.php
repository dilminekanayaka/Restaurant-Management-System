<?php 
include('partials-front/menu.php'); // Include database connection
?>

<!----review section----->
<div>
    <h1>Feedbacks</h1>
</div>

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

<section class="review" id="review">
    <div class="review-slider">
        <?php
        $reviews = [
            [
                "img" => "imgg/buwanika_anthoney.jpg",
                "text" => "The mojito received rave reviews for its refreshing taste and perfect balance of mint and lime. Customers loved its sweetness and fresh mint, with minor suggestions for more lime or stronger mint. It was praised as a great drink for hot days.",
                "name" => "Buwanika Anthony",
                "stars" => 4.5
            ],
            [
                "img" => "imgg/pubudu_chathuranga.jfif",
                "text" => "The Crispy Chicken Submarine excels with crunchy chicken and balanced flavors. Fresh veggies contrast well with the tangy sauce. Improvements could include softer bread and more sauce for extra flavor.",
                "name" => "Pubudu Chathuranga",
                "stars" => 4.5
            ],
            [
                "img" => "imgg/anusha_damayanthi.jpg",
                "text" => "The Signature Seafood Treat Pizza delivers a delicious experience with fresh seafood and a cheese-tomato base. Enhancing it with more seafood variety and a crispier crust would elevate the flavor and texture.",
                "name" => "Anusha Damayanthi",
                "stars" => 4
            ],
            [
                "img" => "imgg/nayanathara_wickramaarachchi.jpg",
                "text" => "The Classic Hot and Spicy Chicken Pizza impresses with balanced heat and juicy chicken. For improvement, a thicker crust and a cooling drizzle of ranch or blue cheese could enhance the experience.",
                "name" => "Nayanathara Wickramaarachchi",
                "stars" => 5
            ],
            [
                "img" => "imgg/saranaga_dissasekara.jfif",
                "text" => "The Cheeseburger offers a satisfying mix of juicy beef, melted cheese, and fresh toppings. Toasting the bun more and adding a signature sauce could enhance texture and flavor, making each bite better.",
                "name" => "Saranga Disasekara",
                "stars" => 4.5
            ],
            [
                "img" => "imgg/nethmi_roshel.jpg",
                "text" => "The Hamburger shines with its classic flavors and balanced ingredients. To improve it, add more seasoning to the patty and offer extras like bacon or avocado for extra variety and richness.",
                "name" => "Nethmi Roshel",
                "stars" => 5
            ],
            [
                "img" => "imgg/akila_danuddara.jfif",
                "text" => "The Beef Submarine is hearty and satisfying, featuring tender, well-seasoned beef. To enhance it, add a touch more seasoning or a complementary sauce to boost the beef’s richness and flavor.",
                "name" => "Akila Dhanuddara",
                "stars" => 3.5
            ],
            [
                "img" => "imgg/shanudri_priyasad.jpg",
                "text" => "The Classic Hot and Spicy Chicken Pizza excels with balanced spiciness and juicy chicken. To improve, try a thicker crust for better support and add a cooling ranch or blue cheese drizzle.",
                "name" => "Shanudri Priyasad",
                "stars" => 4.5
            ],
            [
                "img" => "imgg/WhatsApp Image 2024-08-06 at 11.04.23.jpeg",
                "text" => "The Shallow Fried Prawn Momos are delightful with succulent prawns and a crispy texture. To improve, add more spice or seasoning to the filling and offer a zesty dipping sauce for enhancement.",
                "name" => "Sonali Jayakodi",
                "stars" => 4.5
            ],
            [
                "img" => "imgg/WhatsApp Image 2024-08-06 at 11.37.32.jpeg",
                "text" => "The Wok Fried Chicken Momos shine with tender chicken and a crispy exterior. To enhance them, add more wok flavor with stir-fried veggies or a robust sauce for a deeper, more complex taste.",
                "name" => "Inuka Mapa",
                "stars" => 4.5
            ],
            [
                "img" => "imgg/WhatsApp Image 2024-06-01 at 15.34.39.jpeg",
                "text" => "The mac and cheese submarine is rich, creamy, and indulgent, with a great mix of textures and appealing presentation. Generous portion size, with potential for additional toppings and a half-size option.",
                "name" => "Sashika Dilmina",
                "stars" => 5
            ],
            [
                "img" => "imgg/dilmin_ekanayake.png",
                "text" => "The delight chili chicken pizza combines spicy, savory flavors with a crispy crust and tender toppings. Visually vibrant and well-portioned, it’s a satisfying meal, enhanced by fresh vegetables and melted cheese.",
                "name" => "Pasindu Dilmin",
                "stars" => 5
            ]
           
        ];

        foreach ($reviews as $review) {
            echo '<div class="box">';
            echo '<img src="' . $review['img'] . '"/>';
            echo '<p>' . $review['text'] . '</p>';
            echo '<h3>' . $review['name'] . '</h3>';
            echo '<div class="stars">';
            for ($i = 0; $i < floor($review['stars']); $i++) {
                echo '<i class="fa fa-star"></i>';
            }
            if ($review['stars'] - floor($review['stars']) > 0) {
                echo '<i class="fa fa-star-half"></i>';
            }
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</section>


<?php include('partials-front/footer.php'); ?>