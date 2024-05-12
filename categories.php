<?php include ('./partials/menu.php') ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

    <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Tìm kiếm.." required>
            <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Khám phá</h2>

        <?php

        $sql = "SELECT * FROM category WHERE status = 'active'";
        $res = mysqli_query($conn, $sql);
        
        if ($res == true) {
            $count = mysqli_num_rows($res);
            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $img_name = $row['img_name'];
                    ?>
                    <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <img src="<?php echo SITEURL; ?>/images/category/<?php echo $img_name; ?>" alt="Pizza"
                                class="img-responsive img-curve">
                            <h3 class="float-text text-white"><?php echo $title; ?></h3>
                        </div>
                    </a>
                    <?php
                }
            } else {
                echo "<div> Category not found </div>";
            }
        }

        ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->


<?php include ('./partials/footer.php') ?>