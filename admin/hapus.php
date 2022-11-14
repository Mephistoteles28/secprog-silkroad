<?php
session_start();
// Cek apakah belum login, kalau belum maka akan dilempar ke login page
if (!isset($_SESSION["login-admin"])){
    header("Location: login-admin.php");
}

require 'function.php';

$id = $_GET["id"];
$check = hapus($id);

echo $check;
if ($check<0){
    echo "
    <script> 
        alert('Data gagal dihapus');
        document.location.href= 'index.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data berhasil dihapus');
        document.location.href='index.php';
    </script>
    ";
}

?>