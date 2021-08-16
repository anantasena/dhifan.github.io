<?php
session_start();
require "connect.php";

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    try {
        $sql = "SELECT * FROM alogin WHERE (username = :username AND password = :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':password',$password);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if($stmt->rowCount() > 0){
            $_SESSION['username'] = $username;
            echo "<script>alert('Berhasil Login')</script>";
            echo "<meta http-equiv='refresh' content='2 url=timeline.html'>";
        }else{
            echo "<script>alert('Wrong Username or Password')</script>";
            echo "<meta http-equiv='refresh' content='2 url=login.html'>";
        }
    }catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
    }
}
?>