<?php 
include('../template.php');
$id_lot = $_GET['id_lot'] ;
$bloque = $_GET['bloque'] ;
$sql = "UPDATE entrées_produits SET bloqué = '$bloque' WHERE id = '$id_lot' ";
$rs->Open($sql, $ProviderOLEDBHFSQL);
?>


