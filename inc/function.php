<?php
$conn = mysqli_connect("localhost", "root", "", "silkroad");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}

function register($data){
    global $conn;
    
    // username agar tidak ada '/' nya dan dibikin low semua hurufnya
    $username = strtolower(stripslashes($data["username"]));

    // supaya ngga bisa masukkin char berbahaya di SQL.
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // Cek apakah username nya udah ada di database
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");
    if (mysqli_fetch_assoc($result)){
        echo "
        <script>
            alert('Username sudah digunakan!');
        </script>
        ";
        return false;      
    }

    // Cek jika konfirmasi password dan password tidak sama
    if ($password !== $password2){
        echo "
        <script>
            alert('Konfirmasi password dan password tidak sama');
        </script>
        ";
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Masukkan data ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password'); ");

    return mysqli_affected_rows($conn);
}

?>