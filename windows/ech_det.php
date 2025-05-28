<?php
include('../template.php');
$id_ech = $_GET['id_ech'];
$type = $_GET['type'];

if ($type=="Sortie")
{
$sql = "SELECT id,nom,prix_vente,qte,lot,péremption FROM echanges_sorties_produits WHERE id_echange=$id_ech";
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
}

else
{
 $sql = "SELECT id,nom,prix_vente,qte_entree,lot,péremption FROM entrees_produits WHERE entrées_produits.id_echange=$id_ech";
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
}


?>