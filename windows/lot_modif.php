<?php 
include('../template.php');
$id_lot = $_GET['id_lot'] ;
$bloque = $_GET['bloque'] ;
$sql = "UPDATE entr�es_produits SET bloqu� = '$bloque' WHERE id = '$id_lot' ";
$rs->Open($sql, $ProviderOLEDBHFSQL);
?>


