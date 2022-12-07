<?php
session_start();
// Cek apakah belum login, kalau belum maka akan dilempar ke login page
if (!isset($_SESSION["login-admin"])){
    header("Location: login-admin.php");
}

require 'function.php';

$products = query("SELECT * FROM products");

// Find command
if(isset($_POST["find"])){
    $products = cari($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css?v=<?php echo time(); ?>">
    <title>Admin Page</title>
</head>

<body>
    <!-- Navbar -->
    <nav>
        <div class="left-nav">
            <img src="../img/SilkRoad-logo.png" alt="logo" width="100px">
            <a href="../index.php" id="navbar-item"> User Page </a>
        </div>
        <div class="right nav">
            <p id="navbar-item"> Admin Panel </p>
            <form action="" method="post">
                <input type="text" name="keyword" autofocus autocomplete="off" placeholder="Type here">
                <button type="submit" name="find">Find!</button>
            </form>
        </div>
    </nav>


    <!-- Content -->
    <h2><a href="tambah.php"> Add products </a></h2>
    <br>
    <table border=2px cellpadding=10px cellspacing=0px;>
        <tr>
            <th>No</th>
            <th>Action</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Desription</th>
            <th>Image</th>
        </tr>
        <?php $i = 1 ?>
        <?php foreach($products as $product): ?>
        <tr>
            <td><?= $i ?></td>
            <td><a href="edit.php?id=<?=$product["id"]?>">edit</a>
                | <a href="hapus.php?id=<?= $product["id"] ?>" onclick="return confirm('Yakin?')">
                    hapus</a></td>
            <td><?= $product["product_name"] ?></td>
            <td><?= $product["product_price"] ?></td>
            <td><?= $product["product_quantity"] ?></td>
            <td><?= $product["product_description"] ?></td>
            <td><img src="../img/img_drug/<?= $product["product_img"] ?>" alt="<?= $product["product_img"] ?>"
                    style="width:100px">
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach ?>
    </table>

    <a href="logout.php"> Logout as Admin </a>

</body>

</html>
