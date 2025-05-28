<?php
include('../template.php');
$id_vente = $_GET['id_vente'];
$sql = "SELECT id,nom,prix_vente,qte_sortie,lot,péremption FROM sorties_produits WHERE id_sortie=$id_vente";
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "[[[";
while (!$rs->EOF)
{
echo $rs->Fields[0]->Value . "|";
echo $rs->Fields[1]->Value . "|";
echo $rs->Fields[2]->Value . "|";
echo $rs->Fields[3]->Value . "|";
echo $rs->Fields[4]->Value . "|";
echo $rs->Fields[5]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
?>