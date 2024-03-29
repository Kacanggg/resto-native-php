<?php
session_start();
include "../config/classDB.php";
$id = isset($_GET['id']) ? $_GET['id'] : "";
if (!isset($_SESSION['iduser'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/styleadmin.css">
    <title>Dashboard Admin</title>
</head>

<body>
    <div class="sidebar">
        <h2>Resto</h2>
        <ul>
            <li><a href="?hal=dashboard"><i class="fa fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="?hal=petugas"><i class="fa fa fa-users"></i>Petugas</a></li>
            <li><a href="?hal=kategori"><i class="fa fa-cube"></i>Kategori</a></li>
            <li><a href="?hal=menu"><i class="fa fa-list"></i>Menu</a></li>
            <li><a href="?hal=transaksi"><i class="fa fa-dollar"></i>Transaksi</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="topbar">
            <h1>Dashboard Admin</h1>
            <a href="?hal=logout">Logout</a>
        </div>
        <?php
        $hal = isset($_GET["hal"]) ? $_GET["hal"] : "";
        if ($hal) {
            include $hal . ".php";
        }
        ?>
    </div>
</body>

</html>