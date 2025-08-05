<?php
ob_start(); 
include('partials-front/menu.php');


if(isset($_GET['food_id'])) {
    $food_id = $_GET['food_id'];
    $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if($count==1) {
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
        $description = $row['description'];
    } else {
        header('location:'.SITEURL);
        exit();
    }
} else {
    header('location:'.SITEURL);
    exit();
}


if(isset($_POST['submit'])) {
    
    $food = $_POST['food'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $total = $price * $qty;
    $order_date = date("Y-m-d h:i:sa");
    $status = "Ordered";
    $customer_name = $_POST['full-name'];
    $customer_contact = $_POST['contact'];
    $customer_email = $_POST['email'];
    $customer_address = $_POST['address'];

   
    $sql2 = "INSERT INTO tbl_order SET 
        food = '$food',
        price = $price,
        qty = $qty,
        total = $total,
        order_date = '$order_date',
        status = '$status',
        customer_name = '$customer_name',
        customer_contact = '$customer_contact',
        customer_email = '$customer_email',
        customer_address = '$customer_address'
    ";

    $res2 = mysqli_query($conn, $sql2);

    if($res2==true) {
        $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
        header('location:'.SITEURL);
        exit();
    } else {
        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
        header('location:'.SITEURL);
        exit();
    }
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

   <section class="order-section">
    <div class="container">
        <div class="order-header">
            <h1>Complete Your Order</h1>
            <p>Fill in your details to confirm your order</p>
        </div>
        
        <div class="order-container">
            <div class="food-preview fade-in">
                <div class="food-card">
                <?php 
                if($image_name == "") {
                    echo "<div class='error'>Image not Available.</div>";
                } else {
                    ?>
                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="food-image">
                    <?php
                }
                ?>
                    <div class="food-info">
                        <h3><?php echo $title; ?></h3>
                        <p class="food-description"><?php echo $description; ?></p>
                        <div class="price-info">
                            <span class="price">Rs.<?php echo $price; ?></span>
                            <span class="per-item">per item</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="order-form-container fade-in">
                <div class="form-card">
                    <h2>Order Details</h2>
                    <form action="" method="POST" class="order-form" id="orderForm">
                        <div class="form-row">
                    <div class="form-group">
                        <label for="qty">Quantity</label>
                                <div class="quantity-input">
                                    <button type="button" class="qty-btn" onclick="decreaseQty()">-</button>
                                    <input type="number" id="qty" name="qty" value="1" min="1" max="10" required>
                                    <button type="button" class="qty-btn" onclick="increaseQty()">+</button>
                                </div>
                            </div>
                            <div class="total-display">
                                <span class="total-label">Total:</span>
                                <span class="total-amount">Rs.<span id="totalAmount"><?php echo $price; ?></span></span>
                            </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="full-name">Full Name</label>
                            <input type="text" id="full-name" name="full-name" placeholder="Enter your full name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="contact">Phone Number</label>
                        <input type="tel" id="contact" name="contact" placeholder="Enter your phone number" required>
                    </div>
                    
                    <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                    </div>
                    
                    <div class="form-group">
                            <label for="address">Delivery Address</label>
                            <textarea id="address" name="address" rows="3" placeholder="Enter your complete delivery address" required></textarea>
                    </div>
                    
                    <input type="hidden" name="food" value="<?php echo $title; ?>">
                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                    
                        <button type="submit" name="submit" class="submit-btn">
                            <i class="fas fa-check"></i>
                            <span>Confirm Order</span>
                        </button>
                </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.order-section {
    padding: 120px 0 80px;
    background-color: #f9f9f9;
    min-height: 100vh;
}

.order-header {
    text-align: center;
    margin-bottom: 60px;
}

.order-header h1 {
    font-size: 48px;
    color: #333;
    margin-bottom: 15px;
    font-weight: 700;
}

.order-header p {
    font-size: 18px;
    color: #666;
    max-width: 500px;
    margin: 0 auto;
}

.order-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: start;
}

.food-preview {
    display: flex;
    justify-content: center;
}

.food-card {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

.food-image {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

.food-info {
    padding: 25px;
    text-align: center;
}

.food-info h3 {
    font-size: 24px;
    color: #333;
    margin-bottom: 10px;
    font-weight: 600;
}

.food-description {
    color: #666;
    font-size: 14px;
    line-height: 1.5;
    margin-bottom: 20px;
}

.price-info {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
}

.price {
    font-size: 28px;
    color: #ff6b6b;
    font-weight: 700;
}

.per-item {
    font-size: 12px;
    color: #999;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.form-card {
    background: #fff;
    padding: 40px;
    border-radius: 16px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
}

.form-card h2 {
    font-size: 28px;
    color: #333;
    margin-bottom: 30px;
    font-weight: 600;
    text-align: center;
}

.order-form {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    align-items: end;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group label {
    font-size: 14px;
    color: #333;
    margin-bottom: 8px;
    font-weight: 500;
}

.form-group input,
.form-group textarea {
    padding: 15px;
    border: 2px solid #e1e1e1;
    border-radius: 8px;
    font-size: 16px;
    color: #333;
    background: #fff;
    transition: all 0.3s ease;
    font-family: 'Poppins', sans-serif;
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #ff6b6b;
    box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.1);
}

.form-group textarea {
    resize: vertical;
    min-height: 80px;
}

.quantity-input {
    display: flex;
    align-items: center;
    border: 2px solid #e1e1e1;
    border-radius: 8px;
    overflow: hidden;
}

.qty-btn {
    background: #f5f5f5;
    border: none;
    padding: 15px 20px;
    cursor: pointer;
    font-size: 18px;
    font-weight: 600;
    color: #333;
    transition: all 0.3s ease;
}

.qty-btn:hover {
    background: #ff6b6b;
    color: white;
}

.quantity-input input {
    border: none;
    text-align: center;
    font-size: 18px;
    font-weight: 600;
    padding: 15px 10px;
    width: 80px;
    background: #fff;
}

.total-display {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 8px;
    border: 2px solid #e1e1e1;
}

.total-label {
    font-size: 14px;
    color: #666;
    font-weight: 500;
}

.total-amount {
    font-size: 24px;
    color: #ff6b6b;
    font-weight: 700;
}

.submit-btn {
    background: #ff6b6b;
    color: #fff;
    border: none;
    padding: 18px 32px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    font-family: 'Poppins', sans-serif;
    margin-top: 10px;
}

.submit-btn:hover {
    background: #ff5252;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
}

.submit-btn i {
    font-size: 14px;
}

/* Success/Error Messages */
.success {
    background: #d4edda;
    color: #155724;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
    border-left: 4px solid #28a745;
}

.error {
    background: #f8d7da;
    color: #721c24;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
    border-left: 4px solid #dc3545;
}

/* Responsive Design */
@media (max-width: 768px) {
    .order-container {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .order-header h1 {
        font-size: 36px;
    }
    
    .form-card {
        padding: 30px 20px;
    }
    
    .form-row {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .food-card {
        max-width: 100%;
    }
}

@media (max-width: 480px) {
    .order-section {
        padding: 100px 0 60px;
    }
    
    .order-header h1 {
        font-size: 28px;
    }
    
    .form-card h2 {
        font-size: 24px;
    }
}

/* Simple fade-in animation */
.fade-in {
    opacity: 0;
    animation: fadeInSimple 0.7s ease-in forwards;
}

@keyframes fadeInSimple {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const qtyInput = document.getElementById('qty');
    const totalAmount = document.getElementById('totalAmount');
    const price = <?php echo $price; ?>;
    function updateTotal() {
        const qty = parseInt(qtyInput.value);
        const total = qty * price;
        totalAmount.textContent = total;
    }
    qtyInput.addEventListener('input', updateTotal);
    window.increaseQty = function() {
        const currentQty = parseInt(qtyInput.value);
        if (currentQty < 10) {
            qtyInput.value = currentQty + 1;
            updateTotal();
        }
    };
    window.decreaseQty = function() {
        const currentQty = parseInt(qtyInput.value);
        if (currentQty > 1) {
            qtyInput.value = currentQty - 1;
            updateTotal();
        }
    };
    // Form validation
    const orderForm = document.getElementById('orderForm');
    orderForm.addEventListener('submit', function(e) {
        const requiredFields = this.querySelectorAll('[required]');
        let isValid = true;
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.style.borderColor = '#dc3545';
            } else {
                field.style.borderColor = '#e1e1e1';
            }
        });
        if (!isValid) {
            e.preventDefault();
            alert('Please fill in all required fields.');
        }
    });
    // Real-time validation
    const inputs = orderForm.querySelectorAll('input, textarea');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.hasAttribute('required') && !this.value.trim()) {
                this.style.borderColor = '#dc3545';
            } else {
                this.style.borderColor = '#e1e1e1';
            }
        });
    });
});
</script>

<?php include('partials-front/footer.php'); ?>

<?php
ob_end_flush(); 
?>