<?php
session_start();
include "../config/classDB.php";

if (isset($_POST['login'])) {
    extract($_POST);
    $sel = $dbo->select("petugas where username='$username'");
    foreach ($sel as $row) {
        $pass = $row['password'];
    }
    if (password_verify($password, $pass)) {
        $_SESSION['iduser'] = $row['idpetugas'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama_petugas'] = $row['nama_petugas'];
        echo "<script>location.href='index.php';</script>";
    } else {
        echo "<script>alert('Login Gagal, Periksa Username Dan Password');location.href='login.php';</script>";
    }
}
?>