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
    $result = mysqli_query($conn, "SELECT username FROM admin WHERE username='$username'");
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
    mysqli_query($conn, "INSERT INTO admin VALUES ('', '$username', '$password'); ");

    return mysqli_affected_rows($conn);
}


function cari($data){
    $data2 = $data["keyword"];
    $query = "SELECT * FROM products
            WHERE product_name LIKE '%$data2%'; ";

    return query($query);
}

function upload(){
    // Buat variable untuk store isi $_FILES
    $namaFile = $_FILES["image"]["name"];
    $tmpFile = $_FILES["image"]["tmp_name"];
    $errorFile = $_FILES["image"]["error"];
    $sizeFile = $_FILES["image"]["size"];

    // Cek apakah ada file atau ngga
    if ($errorFile === 4){
        echo "
        <script>
            alert('file tidak ada!');
        </script>
        ";
        return false;
    }

    // Cek besar filesnya satuan bytes
    if ($sizeFile > 3000000){
        echo "
        <script>
            alert('file terlalu besar, max 3mb');
        </script>";
        return false;
    }

    // check extensionnya
    $validExtension = ['jpg','png','jpeg'];
    $extensionFile = explode('.', $namaFile);
    $extensionFile = end($extensionFile);
    if (!in_array($extensionFile, $validExtension)){
        echo "
        <script>
            alert('file bukan gambar');
        </script>
        ";
        return false;
    }

    // lolos pengecekan, dipindahin dari tmp ke file yang di inginkan
    $uniqueid = strtolower(uniqid().$namaFile);
    move_uploaded_file($tmpFile, '../img/img_drug/'.$uniqueid);

    return $uniqueid;
}

function tambah($data){
    global $conn;
    $name = htmlspecialchars($data["name"]);
    $price = htmlspecialchars($data["price"]);
    $quantity = htmlspecialchars($data["quantity"]);
    $description = htmlspecialchars($data["description"]);
    
    $gambar = upload();
    
    // Jika gambar nya false maka akan return false.
    if (!$gambar){
        return false;
    }
    $query = "INSERT INTO products VALUES ('','$name', '$price', '$gambar', '$quantity', '$description');";

    $result = mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    $query = "DELETE FROM products WHERE id='$id';";
    $result = mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function edit($data){
    global $conn;

    $name = htmlspecialchars($data["name"]);
    $price = htmlspecialchars($data["price"]);
    $quantity = htmlspecialchars($data["quantity"]);
    $description = htmlspecialchars($data["description"]);
    $id = $data["id"];
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user menginput gambar atau tidak
    if ($_FILES["image"]["error"] == 4){
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }

    $query = "UPDATE products SET product_name='$name', product_price='$price', product_img='$gambar', product_quantity='$quantity', product_description='$description' WHERE id='$id';";
    $result = mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>
