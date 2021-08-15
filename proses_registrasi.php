<?php
require "connect.php";

$username = $_POST['username'];
$password = md5($_POST['password']);
$name = $_POST['name'];
$email = $_POST['email'];

try {
    $conn = new PDO("mysql:host=localhost;dbname=antasena", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "INSERT INTO alogin (username, password, name, email) VALUES (:username,:password,:name,:email)";
    $stmt = $conn->prepare($query);
    $stmt->execute(array(":username" => $username,":password" => $password,":name" => $name,":email" => $email));
    
    if ($query){
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