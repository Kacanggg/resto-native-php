<?php
session_start();
include "config/classDB.php";
if (!empty($_SESSION['cart'])) {
    $insertOrder = $dbo->insert("orders(idorder,idpelanggan,tglorder)", "null,'1',now()");
    $idorder = $dbo->lastInsert();
    if ($insertOrder) {
        foreach ($_SESSION['cart'] as $id => $val) {
            $menu = $dbo->select('menu where idmenu=' . $id);
            foreach ($menu as $row) {

            }
            $harga = $row['harga'];
            $insertOrder = $dbo->insert("orderdetail", "null,'$idorder',$id,$val,$harga,''");
            unset($_SESSION['cart'][$id]);
        }
    }
}
?>
<script>
    location.href = "index.php";
</script>