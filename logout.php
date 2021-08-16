<?php
session_start();
unset($_SESSION['username']);
session_destroy();
echo "<script>alert('Berhasil Logout')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.html'>";
    return true;
?>