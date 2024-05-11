<?php include ('./partials/menu.php') ?>

<?php

if (isset($_GET['food_id'])) {
    $food_id = $_GET['food_id'];

    $sql = "SELECT * FROM food WHERE id = '$food_id'";
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $count = mysqli_num_rows($res);
        if ($count == 1) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $img_name = $row['img_name'];
            }
        } else {
            header('location:' . SITEURL);
        }
    }
} else {
    header('location:' . SITEURL);
}

?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="" method = "POST" class="order">
            <fieldset>
                <legend>Selected Food</legend>

                <div class="food-menu-img">
                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $img_name; ?>" alt="Chicke Hawain Pizza"
                        class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $title; ?></h3>
                    <p class="food-price"><?php echo $price; ?>đ</p>

                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>

                </div>

            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g. Cao Duc" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. duccao@gmail.com" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive"
                    required></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>

        </form>

        <?php
        if (isset($_POST['submit'])) {

            $quantity = $_POST['qty'];
            $total = $price * $quantity;
            $order_date = date('Y-m-d h:i:sa');
            $status = "Ordered";
            $customer_name = $_POST['full-name'];
            $customer_contact = $_POST['contact'];
            $customer_email = $_POST['email'];
            $customer_address = $_POST['address'];

            $sql = "INSERT INTO `order` SET
            food = '$title',
            price = $price,
            quantity = $quantity,
            total = $total,
            order_date = '$order_date',
            status = '$status',
            customer_name = '$customer_name',
            customer_contact = '$customer_contact',
            customer_email = '$customer_email',
            customer_address = '$customer_address'";

            echo $sql;

            $res = mysqli_query($conn, $sql);

            if ($res == true) {
                $_SESSION['order'] = "<div class='success text-center'>Food ordered successfully</div>";
                header("location:" . SITEURL);
            } else {
                $_SESSION['order'] = "<div class='error text-center'>Food ordered unsuccessfully</div>";
                header("location:" . SITEURL);
            }
        }
        ?>

    </div>
</section>

<?php include ('./partials/footer.php') ?>