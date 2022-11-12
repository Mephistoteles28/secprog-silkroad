<?php
session_start();
require 'inc/function.php';

// Cek ada cookie nya atau ngga
if (isset($_COOKIE['id']) && isset($_COOKIE['username'])){
    $id = $_COOKIE['id'];
    $username = $_COOKIE['username'];

    // Bandingkan id dan username dengan yang ada di database
    $query = mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");

    // Kalau ada hasil dari $query
    if (mysqli_num_rows($query)){
        $row = mysqli_fetch_assoc($query);
        // var_dump($row); die;
        // Cek apakah hasil hash dari username cookie dan database sama.
        if ($username === hash("SHA256", $row["username"])){
            $_SESSION['login'] = true;
        }
    }else{
        $_SESSION['login'] = false;
    }
    
}



// Cek apakah sudah punya session atau belum
if (isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check username ada di database atau ngga
    $check_username = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username';");

    // Cek ada apa ngga username nya
    if (mysqli_num_rows($check_username)){
        $row = mysqli_fetch_assoc($check_username);
        var_dump($row);
        // Kalau ada, cek password nya
        if (password_verify($password, $row["password"])){
            
            // Cek jika user memencet remember me
            if (isset($_POST["remember"])){
                // setcookie('login', 'true', time()+60);
                setcookie('id', $row['id'], time()+60);
                setcookie('username', hash('SHA256', $_POST['username']), time()+60);
            }

            header("Location: index.php");
            $_SESSION["login"] = true;
            exit;
        }
    }else{
        echo "<p style='color: red'> Login gagal! </p>";
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
    <title>Login</title>
</head>

<body>
    <!-- Navbar -->
    <nav>
        <div class="left-nav">
            <img src="img/SilkRoad-logo.png" alt="logo" width="100px">
        </div>
        <div class="right-nav-login">
            <h2>Login Page</h2>
        </div>
    </nav>

    <!-- Login Form -->
    <div class="form-login">
        <form action="" method="post">
            <label for="username">Username : </label>
            <input type="text" name="username" id="username">
            <br>
            <label for="password">Password : </label>
            <input type="password" name="password" id="password">
            <br>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember"> Remember me </label>
            <br><br>
            <button type="submit" name="login">Login!</button>
        </form>
    </div>

    <p id="login-text">Dont have an account yet? <a href="register.php"> Register here!</a> </p>

</body>