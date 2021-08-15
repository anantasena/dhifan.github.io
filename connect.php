<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "antasena";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
} catch(PDOException $e) {
    die("Koneksi Gagal: " . $e->getMessage());
}
?>