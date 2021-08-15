<?php
require "connect.php";

try {
    if(isset($_POST['Login'])) {
    $conn = new PDO("mysql:host=localhost;dbname=antasena", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->query("SELECT * FROM alogin WHERE username = 'username' AND password = 'password'");
    $stmt->execute();

    if ($stmt){
        echo "<script>alert('Berhasil Registrasi')</script>";
        echo "<meta http-equiv='refresh' content='1 url=timeline.html'>";
        return true;
    }else{
        echo "<script>alert('Gagal Registrasi')</script>";
        echo "<meta http-equiv='refresh' content='1 url=index.php'>";
        return false;
    }
    }
} catch(PDOException $e) {
    echo "Error: ". $e->getMessage();
}
$conn = null;

?>