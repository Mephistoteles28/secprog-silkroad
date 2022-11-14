<?php
session_start();
// Cek apakah belum login, kalau belum maka akan dilempar ke login page
if (!isset($_SESSION["login-admin"])){
    header("Location: login-admin.php");
}

require 'function.php';

// Cek apaka tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])){
    //var_dump($_FILES); die;
    $check = tambah($_POST);
    
    if($check>0){
        echo "
        <script>
            alert('Success! $check rows affected');
            document.location.href = 'index.php';
        </script>
        ";
    }else{
        $error = mysqli_error($conn);
        echo "
        <script>
            alert('Data gagal di tambahkan');
            document.location.href = 'tambah.php'
        </script>
        ";  
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>

<body>
    <h1> Add Products </h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="name">Name : </label>
                <input type="text" name="name" id="name" required autocomplete="no">
            </li>
            <li>
                <label for="price">Price : </label>
                <input type="number" name="price" id="price" required>
            </li>
            <li>
                <label for="quantity">Quantity : </label>
                <input type="number" name="quantity" id="quantity" required>
            </li>
            <li>
                <label for="description">Description : </label>
                <input type="text" name="description" id="description" required>
            </li>
            <br>
            <li>
                <label for="image">Image : </label>
                <input type="file" name="image" id="image">
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