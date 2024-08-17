<footer class="main-footer">
    <div class="footer-wave">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>
    <div class="container">
        <div class="footer-content">
            <div class="footer-section about">
                <h3>Bite</h3>
                <p>Delivering delicious food to your doorstep.</p>
                <div class="contact">
                    <span><i class="fas fa-phone"></i> +1 234 567 8900</span> <br>
                    <span><i class="fas fa-envelope"></i> info@bite.com</span>
                </div>
            </div>
            <div class="footer-section quick-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="foods.php">Menu</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section social">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                  
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Bite. All rights reserved.</p>
    </div>
</footer>

<style>
.main-footer {
    background-color: #333;
    color: #fff;
    position: relative;
    padding: 60px 0 10px;
    overflow: hidden;
    font-size: 14px;
}

.footer-wave {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
}

.footer-wave svg {
    position: relative;
    display: block;
    width: calc(100% + 1.3px);
    height: 60px;
}

.footer-wave .shape-fill {
    fill: #f9f9f9;
}

.footer-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 20px;
}

.footer-section {
    flex: 1;
    min-width: 150px;
}

.footer-section h3 {
    color: #ffd166;
    font-size: 18px;
    margin-bottom: 10px;
    position: relative;
}

.footer-section p,
.footer-section span {
    font-size: 15px;
    line-height: 1.4;
    margin-bottom: 5px;
}

.footer-section.quick-links ul {
    list-style-type: none;
    padding: 0;
}

.footer-section.quick-links ul li {
    margin-bottom: 5px;
}

.footer-section.quick-links ul li a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-section.quick-links ul li a:hover {
    color: #ffd166;
}

.social-icons {
    display: flex;
    gap: 10px;
    flex-wrap: nowrap;
    flex-direction: row;
    justify-content: center;
}

.social-icon {
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.1);
    color: #fff;
    font-size: 14px;
    transition: all 0.3s ease;
}

.social-icon:hover {
    background-color: #ff6b6b;
    transform: translateY(-3px);
}

.footer-bottom {
    text-align: center;
    padding-top: 10px;
    margin-top: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    font-size: 12px;
}

@media (max-width: 768px) {
    .footer-content {
        flex-direction: column;
    }
    
    .footer-section {
        width: 100%;
    }
}
</style>

<script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const footerSections = document.querySelectorAll('.footer-section');
    
    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    function animateFooter() {
        footerSections.forEach((section, index) => {
            if (isInViewport(section)) {
                setTimeout(() => {
                    section.style.opacity = '1';
                    section.style.transform = 'translateY(0)';
                }, index * 200);
            }
        });
    }

    // Initial animation
    animateFooter();

    // Animate on scroll
    window.addEventListener('scroll', animateFooter);
});
</script>
</body>
</html>