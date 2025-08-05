<footer class="main-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Bite.</h3>
                <p>Delivering delicious food to your doorstep with passion and precision.</p>
            </div>
            
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="categories.php">Categories</a></li>
                    <li><a href="foods.php">Menu</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>Contact</h4>
                <div class="contact-info">
                    <p><i class="fas fa-phone"></i> +1 234 567 8900</p>
                    <p><i class="fas fa-envelope"></i> info@bite.com</p>
                    <p><i class="fas fa-clock"></i> Mon-Sun: 8AM-10PM</p>
                </div>
            </div>
            
            <div class="footer-section">
                <h4>Follow Us</h4>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2024 Bite. All rights reserved.</p>
        </div>
    </div>
</footer>

<style>
.main-footer {
    background-color: #333;
    color: #fff;
    padding: 40px 0 20px;
    margin-top: 60px;
}

.footer-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-bottom: 30px;
}

.footer-section h3 {
    color: #ffd166;
    font-size: 24px;
    margin-bottom: 15px;
    font-weight: 700;
}

.footer-section h4 {
    color: #ffd166;
    font-size: 18px;
    margin-bottom: 15px;
    font-weight: 600;
}

.footer-section p {
    color: #f9f9f9;
    line-height: 1.6;
    margin-bottom: 10px;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 8px;
}

.footer-section ul li a {
    color: #f9f9f9;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-section ul li a:hover {
    color: #ffd166;
}

.contact-info p {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
}

.contact-info i {
    color: #ffd166;
    margin-right: 10px;
    width: 16px;
}

.social-links {
    display: flex;
    gap: 15px;
}

.social-links a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background-color: #ff6b6b;
    color: #fff;
    border-radius: 50%;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-links a:hover {
    background-color: #ffd166;
    transform: translateY(-2px);
}

.footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding-top: 20px;
    text-align: center;
}

.footer-bottom p {
    color: #bdc3c7;
    font-size: 14px;
    margin: 0;
}

@media (max-width: 768px) {
    .footer-content {
        grid-template-columns: 1fr;
        gap: 25px;
    }
    
    .social-links {
        justify-content: center;
    }
}
</style>

<script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>