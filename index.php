<?php
require 'inc/function.php';
session_start();
// Cek apakah belum login, kalau belum maka akan dilempar ke login page
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}
$products = query("SELECT * FROM products");

if(!$products){
    echo "<br>";
    echo mysqli_error($conn);
    echo "<br>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Home</title>
</head>

<body>
    <!-- Navbar -->
    <nav>
        <div class="left-nav">
            <img src="img/SilkRoad-logo.png" alt="logo" width="100px">
            <a href="index.php" id="navbar-item"> Home </a>
            <a href="contact-us.php" id="navbar-item"> Contact Us </a>
        </div>
        <div class="right nav">
            <a href="about-me"><img src="img/user-icon.png" alt="user-icon" width="50px"></a>
        </div>
    </nav>

    <!-- Content -->
    <div class="content">
        <?php foreach($products as $product): ?>
        <div class="content-item">
            <img src="img/<?=$product["product_img"]?>" alt="<?=$product["product_img"]?>" id="item-image">
            <div>
                <h3><?=$product["product_name"]?></h3>
            </div>
            <div>
                <p><b>Rp <?=$product["product_price"]?></b></p>
                <p><?=$product["product_description"]?></p>
            </div>
            <div id="item-detail">
                <a href="#">More detail</a>
            </div>
        </div>
        <?php endforeach ?>
    </div>
    <a href="logout.php"> Logout </a>

    <!-- Footer -->
    <div class="footer">

    </div>

</body>

</html>