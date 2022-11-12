<?php
require 'inc/function.php';

// Kalau tombol submit udah di pencet
if(isset($_POST["submit"])){
    $check = register($_POST);
    if ($check>0){
        echo "
        <script>
            alert('User berhasil ditambahkan!');
            document.location.href= 'login.php';
        </script>
        ";
    }else{
        $error = mysqli_error($conn);
        echo "
        <script>
            alert('User gagal ditambahkan, $error');
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
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Register</title>
</head>

<body>
    <nav>
        <div class="left-nav">
            <img src="img/SilkRoad-logo.png" alt="logo" width="100px">
        </div>
        <div class="right nav">
            <h2 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif ;">SilkRoad Registration</h2>
        </div>
    </nav>
    <div class="form-register">
        <form action="" method="post">
            <label for="username">Username : </label></li>
            <input type="text" name="username" id="username" required autocomplete="off">
            <br>
            <label for="password">Password : </label></li>
            <input type="password" name="password" id="password" required autocomplete="off">
            <br>
            <label for="password2">Konfirmasi password : </label></li>
            <input type="password" name="password2" id="password2" required autocomplete="off">
            <br><br>
            <button type="submit" name="submit">Submit</button>
        </form>
        <br>
        <hr>
        <a href="login.php">Already has an account? Click here to login</a>
    </div>
</body>

</html>