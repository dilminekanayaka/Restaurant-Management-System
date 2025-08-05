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

<section class="contact-section">
    <div class="container">
        <div class="contact-header">
            <h1>Contact Us</h1>
            <p>Get in touch with us for any questions or concerns. We're here to help!</p>
        </div>
        
        <div class="contact-content">
            <div class="contact-info">
                <div class="info-card">
                    <div class="icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h3>Phone</h3>
                    <p>+1 234 567 8900</p>
                    <span>Mon-Sun: 8AM-10PM</span>
                </div>
                
                <div class="info-card">
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Email</h3>
                    <p>info@bite.com</p>
                    <span>We'll respond within 24 hours</span>
                </div>
                
                <div class="info-card">
                    <div class="icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>Address</h3>
                    <p>123 Food Street</p>
                    <span>Restaurant District, City</span>
                </div>
            </div>
            
            <div class="contact-form-container">
                <div class="form-card">
                    <h2>Send us a message</h2>
                    <form id="contactForm" class="contact-form">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                        </div>
                        
                        <button type="submit" class="submit-btn">
                            <span>Send Message</span>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.contact-section {
    padding: 120px 0 80px;
    background-color: #f9f9f9;
    min-height: 100vh;
}

.contact-header {
    text-align: center;
    margin-bottom: 60px;
}

.contact-header h1 {
    font-size: 48px;
    color: #333;
    margin-bottom: 20px;
    font-weight: 700;
}

.contact-header p {
    font-size: 18px;
    color: #666;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

.contact-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: start;
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 30px;
}

.info-card {
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-left: 4px solid #ff6b6b;
}

.info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
}

.info-card .icon {
    width: 60px;
    height: 60px;
    background: #ff6b6b;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
}

.info-card .icon i {
    color: #fff;
    font-size: 24px;
}

.info-card h3 {
    font-size: 20px;
    color: #333;
    margin-bottom: 10px;
    font-weight: 600;
}

.info-card p {
    font-size: 16px;
    color: #333;
    margin-bottom: 5px;
    font-weight: 500;
}

.info-card span {
    font-size: 14px;
    color: #666;
}

.form-card {
    background: #fff;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
}

.form-card h2 {
    font-size: 28px;
    color: #333;
    margin-bottom: 30px;
    font-weight: 600;
}

.contact-form {
    display: flex;
    flex-direction: column;
    gap: 25px;
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
    min-height: 120px;
}

.submit-btn {
    background: #ff6b6b;
    color: #fff;
    border: none;
    padding: 16px 32px;
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
}

.submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(255, 107, 107, 0.4);
    background: #ff5252;
}

.submit-btn i {
    font-size: 14px;
}

/* Success message styling */
.success-message {
    background: #d4edda;
    color: #155724;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
    border-left: 4px solid #28a745;
    display: none;
}

.error-message {
    background: #f8d7da;
    color: #721c24;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
    border-left: 4px solid #dc3545;
    display: none;
}

@media (max-width: 768px) {
    .contact-content {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .contact-header h1 {
        font-size: 36px;
    }
    
    .contact-header p {
        font-size: 16px;
    }
    
    .form-card {
        padding: 30px 20px;
    }
    
    .info-card {
        padding: 25px 20px;
    }
}

@media (max-width: 480px) {
    .contact-section {
        padding: 100px 0 60px;
    }
    
    .contact-header h1 {
        font-size: 28px;
    }
    
    .form-card h2 {
        font-size: 24px;
    }
}
</style>

<script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(this);
        const name = formData.get('name');
        const email = formData.get('email');
        const subject = formData.get('subject');
        const message = formData.get('message');
        
        // Simple validation
        if (!name || !email || !subject || !message) {
            showMessage('Please fill in all fields.', 'error');
            return;
        }
        
        if (!isValidEmail(email)) {
            showMessage('Please enter a valid email address.', 'error');
            return;
        }
        
        // Simulate form submission
        const submitBtn = this.querySelector('.submit-btn');
        const originalText = submitBtn.innerHTML;
        
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
        submitBtn.disabled = true;
        
        setTimeout(() => {
            showMessage('Thank you! Your message has been sent successfully. We\'ll get back to you soon.', 'success');
            this.reset();
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }, 2000);
    });
    
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    function showMessage(message, type) {
        // Remove existing messages
        const existingMessages = document.querySelectorAll('.success-message, .error-message');
        existingMessages.forEach(msg => msg.remove());
        
        // Create new message
        const messageDiv = document.createElement('div');
        messageDiv.className = type === 'success' ? 'success-message' : 'error-message';
        messageDiv.textContent = message;
        messageDiv.style.display = 'block';
        
        // Insert before form
        const formCard = document.querySelector('.form-card');
        formCard.insertBefore(messageDiv, formCard.firstChild);
        
        // Auto-remove after 5 seconds
        setTimeout(() => {
            if (messageDiv.parentNode) {
                messageDiv.remove();
            }
        }, 5000);
    }
    
    // Add focus effects to form inputs
    const inputs = document.querySelectorAll('input, textarea');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'scale(1.02)';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'scale(1)';
        });
    });
});
</script>

<?php include('partials-front/footer.php'); ?>