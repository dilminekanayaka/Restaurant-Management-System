<?php include('partials/menu.php'); ?>

<div class="dashboard-container">
    <div class="sidebar">
        <div class="logo">
        <h1>Bite.</h1>
        </div>
        <nav>
            <a href="index.php"><i class="fas fa-home"></i> <span>Dashboard</span></a>
            <a href="manage-admin.php"><i class="fas fa-users-cog"></i> <span>Admin</span></a>
            <a href="manage-category.php"><i class="fas fa-list"></i> <span>Category</span></a>
            <a href="manage-food.php" class="active"><i class="fas fa-utensils"></i> <span>Food</span></a>
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
            <span class="title-icon"><i class="fas fa-utensils"></i></span>
            Manage Foods
        </h1>

                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                    if(isset($_SESSION['unauthorize']))
                    {
                        echo $_SESSION['unauthorize'];
                        unset($_SESSION['unauthorize']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                
                ?>
 <div class="admin-actions">
            <a href="add-food.php" class="btn-primary" id="addadmin-btn">
                <i class="fas fa-plus"></i> Add Food
            </a>
        </div>

        <div class="food-grid">
            <?php 
                $sql = "SELECT * FROM tbl_food";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count > 0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                        ?>
                        
                        <div class="food-card">
                            <div class="food-image">
                                <?php 
                                    if($image_name == "")
                                    {
                                        echo "<div class='no-image'>No Image</div>";
                                    }
                                    else
                                    {
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>">
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="food-info">
                                <h3><?php echo $title; ?></h3>
                                <p class="price">Rs. <?php echo $price; ?></p>
                                <p>
                                    <span class="badge <?php echo $featured == 'Yes' ? 'badge-featured' : ''; ?>">
                                        <?php echo $featured == 'Yes' ? 'Featured' : 'Not Featured'; ?>
                                    </span>
                                    <span class="badge <?php echo $active == 'Yes' ? 'badge-active' : ''; ?>">
                                        <?php echo $active == 'Yes' ? 'Active' : 'Inactive'; ?>
                                    </span>
                                </p>
                            </div>
                            <div class="food-actions">
                                <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-update"><i class="fas fa-edit"></i> Update</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-delete"><i class="fas fa-trash-alt"></i> Delete</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    echo "<p class='no-foods'>No foods found.</p>";
                }
            ?>
        </div>
    </div>
</div>

<script src="js/admin.js"></script>

<?php include('partials/footer.php'); ?>