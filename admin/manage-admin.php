<?php include('partials/menu.php'); ?>

<div class="dashboard-container">
    <div class="sidebar">
        <div class="logo">
        <h1>Bite.</h1>
        </div>
        <nav>
            <a href="index.php"><i class="fas fa-home"></i> <span>Dashboard</span></a>
            <a href="manage-admin.php" class="active"><i class="fas fa-users-cog"></i> <span>Admin</span></a>
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
            <span class="title-icon"><i class="fas fa-users-cog"></i></span>
            Manage Admins
        </h1>

        <?php 
            if(isset($_SESSION['add']))
            {
                echo '<div class="alert alert-success">' . $_SESSION['add'] . '</div>';
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['delete']))
            {
                echo '<div class="alert alert-danger">' . $_SESSION['delete'] . '</div>';
                unset($_SESSION['delete']);
            }
            
            if(isset($_SESSION['update']))
            {
                echo '<div class="alert alert-info">' . $_SESSION['update'] . '</div>';
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['user-not-found']))
            {
                echo '<div class="alert alert-warning">' . $_SESSION['user-not-found'] . '</div>';
                unset($_SESSION['user-not-found']);
            }

            if(isset($_SESSION['pwd-not-match']))
            {
                echo '<div class="alert alert-warning">' . $_SESSION['pwd-not-match'] . '</div>';
                unset($_SESSION['pwd-not-match']);
            }

            if(isset($_SESSION['change-pwd']))
            {
                echo '<div class="alert alert-success">' . $_SESSION['change-pwd'] . '</div>';
                unset($_SESSION['change-pwd']);
            }
        ?>

        <div class="admin-actions">
            <a href="add-admin.php" class="btn-primary" id="addadmin-btn">
                <i class="fas fa-plus"></i> Add Admin
            </a>
        </div>

        <div class="admin-list">
            <?php 
                $sql = "SELECT * FROM tbl_admin";
                $res = mysqli_query($conn, $sql);

                if($res == TRUE)
                {
                    $count = mysqli_num_rows($res);

                    if($count > 0)
                    {
                        while($rows = mysqli_fetch_assoc($res))
                        {
                            $id = $rows['id'];
                            $full_name = $rows['full_name'];
                            $username = $rows['username'];
                            ?>
                            
                            <div class="admin-card">
                                <div class="admin-info">
                                    <h3><?php echo $full_name; ?></h3>
                                    <p>@<?php echo $username; ?></p>
                                </div>
                                <div class="admin-actions">
                                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary"><i class="fas fa-key"></i> Change Password</a>
                                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary"><i class="fas fa-edit"></i> Update Admin</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger"><i class="fas fa-trash-alt"></i> Delete Admin</a>
                                </div>
                            </div>

                            <?php
                        }
                    }
                    else
                    {
                        echo "<p>No admins found.</p>";
                    }
                }
            ?>
        </div>
    </div>
</div>

<script src="js/admin.js"></script>

<?php include('partials/footer.php'); ?>