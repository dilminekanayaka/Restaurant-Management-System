<?php include('partials/menu.php'); ?>

<div class="dashboard-container">
    <div class="sidebar">
        <div class="logo">
        <h1>Bite.</h1>
        </div>
        <nav>
            <a href="index.php" class="active"><i class="fas fa-home"></i> <span>Dashboard</span></a>
            <a href="manage-admin.php"><i class="fas fa-users-cog"></i> <span>Admin</span></a>
            <a href="manage-category.php"><i class="fas fa-list"></i> <span>Category</span></a>
            <a href="manage-food.php"><i class="fas fa-utensils"></i> <span>Food</span></a>
            <a href="manage-order.php"><i class="fas fa-shopping-cart"></i> <span>Order</span></a>
        </nav>
        <div class="sidebar-footer">
            <div class="user-profile">
                <i class="fas fa-user"></i>
                <span><?php echo $_SESSION['user']; ?></span>
            </div>
            <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>

    <div class="main-content">
        <h1 class="dashboard-title">
            <span class="title-icon"><i class="fas fa-chart-line"></i></span>
            Dashboard Overview
        </h1>
        
        <?php 
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
     
            // Categories count
            $sql = "SELECT * FROM tbl_category";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            // Foods count
            $sql2 = "SELECT * FROM tbl_food";
            $res2 = mysqli_query($conn, $sql2);
            $count2 = mysqli_num_rows($res2);

            // Orders count
            $sql3 = "SELECT * FROM tbl_order";
            $res3 = mysqli_query($conn, $sql3);
            $count3 = mysqli_num_rows($res3);

            // Total Revenue
            $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";
            $res4 = mysqli_query($conn, $sql4);
            $row4 = mysqli_fetch_assoc($res4);
            $total_revenue = $row4['Total'];
        ?>

        <div class="dashboard-stats">
            <div class="stat-card categories">
                <div class="stat-icon"><i class="fas fa-list"></i></div>
                <div class="stat-info">
                    <h2><?php echo $count; ?></h2>
                    <p>Categories</p>
                </div>
            </div>

            <div class="stat-card foods">
                <div class="stat-icon"><i class="fas fa-utensils"></i></div>
                <div class="stat-info">
                    <h2><?php echo $count2; ?></h2>
                    <p>Foods</p>
                </div>
            </div>

            <div class="stat-card orders">
                <div class="stat-icon"><i class="fas fa-shopping-cart"></i></div>
                <div class="stat-info">
                    <h2><?php echo $count3; ?></h2>
                    <p>Total Orders</p>
                </div>
            </div>

            <div class="stat-card revenue">
                <div class="stat-icon"><i class="fas fa-dollar-sign"></i></div>
                <div class="stat-info">
                    <h2>Rs.<?php echo $total_revenue; ?></h2>
                    <p>Revenue Generated</p>
                </div>
            </div>
        </div>

        <div class="recent-activity">
            <h2>Recent Activity</h2>
            <ul id="activity-list">
                <!-- Activity items will be dynamically added here -->
            </ul>
        </div>
    </div>
</div>

<script src="js/dashboard.js"></script>