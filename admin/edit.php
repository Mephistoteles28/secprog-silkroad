<?php
session_start();
// Cek apakah belum login, kalau belum maka akan dilempar ke login page
if (!isset($_SESSION["login-admin"])){
    header("Location: login-admin.php");
}

// Update data
require 'function.php';

$id = $_GET["id"];
$product = query("SELECT * FROM products WHERE id='$id'")[0];

if (isset($_POST["submit"])){

    
    $check = edit($_POST);
    if ($check > 0){
        echo "
        <script>
            alert('Data berhasil ditambahkan');
            document.location.href = 'index.php';
        </script>        
        ";
    }else{
        $error =  mysqli_error($conn);
        echo "
        <script> 
            alert('Data gagal diubah, $error');
            document.location.href = 'ubah.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>

<body>
    <h1> Edit Product </h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <input type="hidden" name="id" value="<?=$product["id"]?>">
            <input type="hidden" name="gambarLama" value="<?=$product["product_img"]?>">
            <li>
                <label for="name">Name : </label>
                <input type="text" name="name" id="name" required autocomplete="no"
                    value="<?=$product["product_name"]?>">
            </li>
            <li>
                <label for="price">Price : </label>
                <input type="number" name="price" id="price" required value="<?=$product["product_price"]?>">
            </li>
            <li>
                <label for="quantity">Quantity : </label>
                <input type="number" name="quantity" id="quantity" required value="<?=$product["product_quantity"]?>">
            </li>
            <li>
                <label for="description">Description : </label>
                <input type="text" name="description" id="description" required
                    value="<?=$product["product_description"]?>">
            </li>
            <br>
            <li>
                <img src="../img/img_drug/<?=$product["product_img"] ?>" alt="<?=$product["product_img"] ?>" width="250px">
                <br>
                <label for="image">Image : </label>
                <input type="file" name="image" id="image" value="<?=$product["product_img"] ?>">
            </li>
            <br>
            <li>
                <button type="submit" name="submit">
                    Send!
                </button>
                <button type="reset">
                    Reset
                </button>
            </li>
        </ul>
    </form>
    <a href="index.php">Go back</a>
</body>

</html>
