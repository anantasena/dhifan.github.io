<?php
require "connect.php";

$username = $_POST['username'];
$password = md5($_POST['password']);
$name = $_POST['name'];
$email = $_POST['email'];

try {
    $conn = new PDO("mysql:host=localhost;dbname=antasena", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO alogin (username, password, name, email) VALUES (:username,:password,:name,:email)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username',$username);
    $stmt->bindParam(':password',$password);
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':email',$email);
    $stmt->execute();
    
    if ($stmt){
        echo "<script>alert('Berhasil Registrasi')</script>";
        echo "<meta http-equiv='refresh' content='1 url=index.html'>";
    }else{
        echo "<script>alert('Gagal Registrasi')</script>";
        echo "<meta http-equiv='refresh' content='1 url=registrasi.html'>";
    }
}catch(PDOException $e){
    echo "Error : ".$e->getMessage();
}
$conn = null;
?>